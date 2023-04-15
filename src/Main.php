<?php

namespace Snail;

/**
 * Class Main
 */
class Main
{
    public int $matrixHeight = 0;

    /**
     * @return array[]|string
     */
    function run(): array|string
    {
        $matrix = $this->getMatrix();
        if (empty($matrix)) {
            return [[]];
        }

        $result = [];
        $this->matrixHeight = count($matrix);
        for ($i = 1; $i <= $this->matrixHeight; $i++) {
            $this->sortMatrix($matrix, $this->matrixHeight, $result);
        }

        return $this->prepareResultFormat($result);
    }

    /**
     * @param array $matrix
     * @param int $matrixCounter
     * @param array $result
     * @return void
     */
    function sortMatrix(array &$matrix, int $matrixCounter, array &$result): void
    {
        foreach ($matrix as $index => &$list) {
            if ($index == 0) {
                $result = array_merge($result, $list);
                unset($matrix[$index]);
                continue;
            }

            if ($index + 1 == $matrixCounter) {
                $list = array_reverse($list, true);
                $result = array_merge($result, $list);
                unset($matrix[$index]);
                $matrix = array_reverse($matrix, true);
                continue;
            }
            $list = array_reverse($list);

            if ($index + 1 < $matrixCounter) {
                $result[] = $list[0];
                unset($list[0]);
                $list = array_values($list);
            }
        }
        $matrix = array_reverse($matrix);
    }

    /**
     * @return array[]
     */
    public function getMatrix(): array
    {
        return [
            [1, 2, 3, 4, 5, 6, 7, 8],
            [28, 29, 30, 31, 32, 33, 34, 9],
            [27, 48, 49, 50, 51, 52, 35, 10],
            [26, 47, 60, 61, 62, 53, 36, 11],
            [25, 46, 59, 64, 63, 54, 37, 12],
            [24, 45, 58, 57, 56, 55, 38, 13],
            [23, 44, 43, 42, 41, 40, 39, 14],
            [22, 21, 20, 19, 18, 17, 16, 15],
        ];
    }

    /**
     * @param array $result
     * @return string
     */
    public function prepareResultFormat(array $result): string
    {
        return json_encode($result);
    }
}