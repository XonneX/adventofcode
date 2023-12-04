<?php

namespace XonneX\AdventOfCode\Core\Commands;

use DateInterval;
use DateTimeImmutable;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;
use JsonException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

use function assert;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function is_dir;
use function json_decode;
use function ksort;
use function mkdir;
use function usort;

#[AsCommand('leaderboard', aliases: ['lb'])]
class LeaderboardCommand extends Command
{
    private const string CACHE_DIR = __DIR__ . '/../../../../cache';
    private const string LEADERBOARD_ID_FILE = self::CACHE_DIR . '/leaderboard_id.txt';
    private const string COOKIE_FILE = self::CACHE_DIR . '/cookie.txt';
    private const string LEADERBOARD_JSON_FILE = self::CACHE_DIR . '/leaderboard.json';
    private const string LEADERBOARD_TIME_FILE = self::CACHE_DIR . '/leaderboard_time.txt';

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    #[\Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        assert($output instanceof SymfonyStyle);

        if (
            !is_dir(self::CACHE_DIR)
            && !mkdir(self::CACHE_DIR)
            && !is_dir(self::CACHE_DIR)) {
            $output->error('Could not create cache directory');

            return self::FAILURE;
        }

        $leaderboardId = $this->askAndStore(
            $output,
            'Please enter the id of the private leaderboard',
            self::LEADERBOARD_ID_FILE
        );

        $cookie = $this->askAndStore(
            $output,
            'Please enter your cookie',
            self::COOKIE_FILE
        );

        if ($this->isRefreshLeaderboard()) {
            $this->storeLeaderboard($leaderboardId, $cookie);
        }

        $this->renderTable($output);

        return self::SUCCESS;
    }

    private function askAndStore(SymfonyStyle $output, string $question, string $file): string
    {
        if (!file_exists($file)) {
            $value = $output->ask($question);

            file_put_contents($file, $value);
        }

        return file_get_contents($file);
    }

    /**
     * @throws Exception
     */
    private function isRefreshLeaderboard(): bool
    {
        if (
            !file_exists(self::LEADERBOARD_TIME_FILE)
            || !file_exists(self::LEADERBOARD_JSON_FILE)
        ) {
            return true;
        }

        $time = file_get_contents(self::LEADERBOARD_TIME_FILE);
        $time = new DateTimeImmutable('@' . $time);

        return $time < (new DateTimeImmutable())->sub(new DateInterval('PT15M'));
    }

    /**
     * @throws GuzzleException
     */
    private function storeLeaderboard(string $leaderboardId, string $cookie): void
    {
        $jar = CookieJar::fromArray(
            [
                'session' => $cookie,
            ],
            '.adventofcode.com'
        );
        $client = new Client(['cookies' => $jar]);

        $response = $client->get('https://adventofcode.com/2023/leaderboard/private/view/' . $leaderboardId . '.json');

        file_put_contents(self::LEADERBOARD_JSON_FILE, $response->getBody()->getContents());
        file_put_contents(self::LEADERBOARD_TIME_FILE, (new DateTimeImmutable())->getTimestamp());
    }

    /**
     * @throws JsonException
     * @throws Exception
     */
    private function renderTable(SymfonyStyle $output): void
    {
        $json = file_get_contents(self::LEADERBOARD_JSON_FILE);
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        $days = [];
        foreach ($data['members'] as $user) {
            foreach ($user['completion_day_level'] as $day => $parts) {
                foreach ($parts as $part => $times) {
                    $days[$day][] = [
                        'part' => $part,
                        'time' => $times['get_star_ts'],
                        'user' => $user['name'] ?? 'undefined',
                    ];
                }
            }
        }

        $table = new Table($output);
        $table->setHeaders(
            [
                'User',
                'Part',
                'Time',
            ]
        );

        ksort($days);

        foreach ($days as $dayNum => $day) {
            $table->setRows([]);
            $output->title('Day ' . $dayNum);

            usort($day, static fn ($a, $b) => $a['time'] <=> $b['time']);

            $aocTime = new DateTimeImmutable('2023-12-' . $dayNum . ' 05:00:00');

            foreach ($day as $user) {
                $userTime = new DateTimeImmutable('@' . $user['time']);

                $diff = $aocTime->diff($userTime);

                $table->addRow(
                    [
                        $user['user'],
                        $user['part'],
                        $diff->format('%d %H:%I:%S'),
                    ]
                );
            }

            $table->render();
        }
    }
}
