<?php

require_once './Priority.php';
require_once './Status.php';
require_once './Task.php';
require_once './FileWorker.php';

class TaskTracker
{
    private FileWorker $fileWorker;

    protected Task $task;
    public function __construct()
    {
        $this->fileWorker = new FileWorker('./storage/', 'test.txt');
    }

    /**
     * @param string $taskName
     * @param Priority $priority
     * @return void
     */
    public function addTask(string $taskName, Priority $priority): void
    {
        try {

            $this->validateTaskName($taskName);

            $this->task = new Task($taskName, $priority, Status::UNDONE);

            $this->fileWorker->writeFile(serialize($this->task) . PHP_EOL);

        } catch (Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
            exit;
        }
    }

    /**
     * @return array
     */
    public function getTasks(): array
    {
        try {

            $tasksData = $this->fileWorker->readFromFile();

        } catch (Exception $exception) {
            echo $exception->getMessage() . PHP_EOL;
            exit;
        }

        $tasks = [];

        foreach ($tasksData as $taskData) {
            $tasks[] = unserialize($taskData);
        }

        return $this->sortTasks($tasks);
    }

    /**
     * @param array $tasks
     * @return array
     */
    public function sortTasks(array $tasks): array
    {
        usort($tasks, fn($a, $b) => $b->getPriority()->value <=> $a->getPriority()->value);

        return $tasks;
    }

    /**
     * @param $taskId
     * @return void
     * @throws Exception
     */
    public function completeTask($taskId): void
    {
        $tasks = $this->getTasks();

        $taskFound = false;

        foreach ($tasks as $task) {
            if ($task->getTaskId() === $taskId) {
                $task->setStatus(Status::DONE);
                $taskFound = true;
                break;
            }
        }

        if ($taskFound) {
            try {
                $this->fileWorker->writeFile('', true);
                foreach ($tasks as $task) {
                    $this->fileWorker->writeFile(serialize($task) . PHP_EOL);
                }
            } catch (Exception $exception) {
                echo $exception->getMessage() . PHP_EOL;
                exit;
            }
        }

        if ($taskFound === false) {
            throw new Exception('Task not found');
        }
    }

    /**
     * @param $taskId
     * @return void
     * @throws Exception
     */
    public function deleteTask($taskId): void
    {
        $tasks = $this->getTasks();
        $updatedTasks = [];
        $taskFound = false;

        foreach ($tasks as $task) {
            if ($task->getTaskId() === $taskId) {
                $taskFound = true;
                continue;
            }
            $updatedTasks[] = $task;
        }

        if ($taskFound) {
            try {
                $this->fileWorker->writeFile('', true);
                foreach ($updatedTasks as $task) {
                    $this->fileWorker->writeFile(serialize($task) . PHP_EOL);
                }
            } catch (Exception $exception) {
                echo $exception->getMessage() . PHP_EOL;
                exit;
            }
        }

        if ($taskFound === false) {
            throw new Exception('Task not found');
        }
    }

    /**
     * @param string $taskName
     * @return void
     * @throws Exception
     */
    public function validateTaskName(string $taskName): void
    {
        if (strlen($taskName) < 3) {
            throw new Exception('Too short task name');
        }
    }
}