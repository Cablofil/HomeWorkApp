<?php

require_once 'fileWorker.php';
require_once 'consoleInput.php';

/**
 * @param string $fileName
 * @param string $line
 * @param bool $consoleInput
 * @param bool $overwriteLog
 * @param string $logFilePath
 * @return void
 */
function writeToLog(string $fileName, string $line = '', bool $consoleInput = true, bool $overwriteLog = false, string $logFilePath = './Logs/'): void
{
    if (!$line && $consoleInput) {
        $line = readConsoleInput();
    }
    try {

        writeFile($logFilePath . $fileName, $line, $overwriteLog);

    } catch (Exception $exception) {
       echo $exception->getMessage() . PHP_EOL;
       exit;
    }
}

/**
 * @param string $fileName
 * @param string $logFilePath
 * @return string
 */
function readFromLog(string $fileName, string $logFilePath = './Logs/'): string
{
    try {

        return readFromFile($logFilePath . $fileName);

    } catch (Exception $exception) {
        echo $exception->getMessage() . PHP_EOL;
        exit;
    }
}
