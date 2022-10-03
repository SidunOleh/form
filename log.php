<?php

class Log
{
    private static $logname    = 'logs/app.log';
    private static $dateFormat = 'H:i:s d.m.Y';

    public static function write($message)
    {
        $line = '[' . date(self::$dateFormat) . '] ' . $message . "\n";

        file_put_contents(self::$logname, $line, FILE_APPEND);
    }
}
