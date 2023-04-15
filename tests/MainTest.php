<?php

namespace Tests;

use Snail\Main;

/**
 * Class MainTest
 */
class MainTest
{
    /**
     * Using only for sorted matrix, example for 0 to 64
     * @return string
     */
    public function testSuccess(): string
    {
        $snail = new Main();
        $result = $snail->run();
        $count = $snail->matrixHeight ** 2;
        $testResult = $snail->prepareResultFormat(range(1, $count));

        return $testResult == $result
            ? $this->getSuccessResponse()
            : $this->getFailResponse();
    }

    /**
     * @return string
     */
    protected function getSuccessResponse(): string
    {
        return '[SUCCESS] ' . debug_backtrace()[1]['function'];
    }

    /**
     * @return string
     */
    protected function getFailResponse(): string
    {
        return '[FAIL] ' . debug_backtrace()[1]['function'];
    }
}