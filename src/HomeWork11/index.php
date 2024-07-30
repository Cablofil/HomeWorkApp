<?php

require_once 'Functions/logWorker.php';

writeToLog('logs.log');

$fromLog = readFromLog('logs.log');

 echo $fromLog;
