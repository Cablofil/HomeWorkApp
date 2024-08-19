<?php

/**
 * @param string $file
 * @return void
 * @throws Exception
 */
function fileExistValidation(string $file): void
{
    if (!file_exists($file)) {
         throw new Exception("File $file does not exist");
    }
}

/**
 * @param string $file
 * @param string $content
 * @param bool $overwrite
 * @param bool $fileExist
 * @return void
 * @throws Exception
 */
function writeFile(string $file, string $content, bool $overwrite = false, bool $fileExist = true): void
{
    if ($fileExist) {
        fileExistValidation($file);
    }
    $result = file_put_contents($file, $content, $overwrite ? 0 : FILE_APPEND);

    if ($result === false) {
        throw new Exception('Failed to write file');
    }
}

/**
 * @param string $file
 * @return string
 * @throws Exception
 */
function readFromFile(string $file): string
{
    fileExistValidation($file);
    return file_get_contents($file);
}

