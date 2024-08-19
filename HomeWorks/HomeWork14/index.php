<?php

require_once './DefaultText.php';
require_once './UpCaseText.php';

$defaultText = new DefaultText();

$defaultText->print();

$upCaseText = new UpCaseText();

$upCaseText->print();