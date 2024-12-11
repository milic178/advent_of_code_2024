<?php

namespace App\Http\Controllers;
use App\Services\AdventOfCodeList;

use Illuminate\Http\Request;

class Day1Controller extends Controller
{
    public function __construct(AdventOfCodeList $adventList)
    {
        $this->adventList = $adventList;
    }

    public function solve()
    {
        $data = $this->adventList->getAllData();
        // First column
        $table1 = array_column($data, 0);
        // Second column
        $table2 = array_column($data, 1);

        $sumDiff = $this->findSumDifference($table1, $table2);
        error_log(" Sum difference result: " . $sumDiff . PHP_EOL);

        return view('day1.day1', compact('table1', 'table2','sumDiff',));
    }

    public function findSumDifference($table1, $table2)
    {
        sort($table1);
        sort($table2);

        $sum = 0;
        foreach ($table1 as $index => $value) {
            $sum += abs($value - $table2[$index]);
        }
        error_log('Sum = ' . $sum);
        return $sum;
    }

}
