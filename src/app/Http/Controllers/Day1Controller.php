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
        // First column
        $table1 =  $this->adventList->getColumn(0);
        // Second column
        $table2 =  $this->adventList->getColumn(1);

        $sumDiff = $this->findSumDifference($table1, $table2);
        error_log(" Sum difference result: " . $sumDiff . PHP_EOL);

        $similarityScore = $this->findSimilarityScore($table1);
        error_log(" similarityScore result: " . $similarityScore . PHP_EOL);

        return view('day1.day1', compact('table1', 'table2', 'sumDiff', 'similarityScore'));
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


    public function findSimilarityScore($table1){

        $sumSimilarityScore = 0;
        foreach ($table1 as $table1Value){
            $count = $this->adventList->countByValue(1, $table1Value);
            $sumSimilarityScore += $count * $table1Value;
        }
        return $sumSimilarityScore;
    }

}
