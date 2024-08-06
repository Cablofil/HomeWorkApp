<?php

require_once  './TaskTracker.php';

$taskTracker = new TaskTracker();

try {
    $taskTracker->addTask('Test task 2', Priority::MEDIUM);

    $taskTracker->completeTask('66b2261c56e89');

    $taskTracker->deleteTask('66b21875d0554');

} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
    exit;
}

$tasks = $taskTracker->getTasks();

print_r($tasks);



