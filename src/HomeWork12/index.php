<?php

require_once  './TaskTracker.php';

$taskTracker = new TaskTracker('test.txt');

try {
    $taskTracker->addTask('Test task 2', Priority::MEDIUM);

    $taskTracker->completeTask('66b2261c56e89');

    $taskTracker->deleteTask('66b21875d0554');

    $tasks = $taskTracker->getTasks();

} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
    exit;
}

print_r($tasks);



