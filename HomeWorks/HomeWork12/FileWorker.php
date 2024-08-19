<?php

class FileWorker
{
    private string $filePath;
    protected string $fileName;

    public function __construct(string $filePath, string $fileName)
    {
        $this->setFilePath($filePath);
        $this->setFileName($fileName);
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function fullPath(): string
    {
        $fullPath = $this->getFilePath() . $this->getFileName();

        return $fullPath;
    }

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
     * @param string $content
     * @param bool $overwrite
     * @param bool $fileExist
     * @return void
     * @throws Exception
     */
    public function writeFile(mixed $content, bool $overwrite = false, bool $fileExist = true): void
    {
        $file = $this->fullPath();
        if ($fileExist) {
            $this->fileExistValidation($file);
        }
        $result = file_put_contents($file, $content, $overwrite ? 0 : FILE_APPEND);

        if ($result === false) {
            throw new Exception('Failed to write file');
        }
    }

    /**
     * @return array
     * @throws Exception
     */
    function readFromFile(): array
    {
        $file = $this->fullPath();
        $this->fileExistValidation($file);
        return file($file);
    }

}