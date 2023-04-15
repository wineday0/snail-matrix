<?php

use Tests\MainTest;

require_once 'src/Main.php';
require_once 'tests/MainTest.php';

$main = new MainTest();
echo $main->testSuccess();
