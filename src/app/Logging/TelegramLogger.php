<?php

namespace App\Logging;

use Monolog\Logger;

/**
 * Class TelegramLogger
 *
 */
class TelegramLogger
{
    /**
     * Create a custom Monolog instance.
     *
     * @param  array  $config
     * @return \Monolog\Logger
     */
    public function __invoke(array $config): Logger
    {
        return new Logger(config('app.name'), [
            new TelegramLoggerHandler($config['level']),
        ]);
    }
}