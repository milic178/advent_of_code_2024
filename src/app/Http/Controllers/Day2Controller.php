<?php

namespace App\Http\Controllers;
use App\Services\AdventOfCodeList;

use Illuminate\Http\Request;

class Day2Controller extends Controller
{
    public function __construct(AdventOfCodeList $adventList)
    {
        $this->adventList = $adventList;
    }

    public function solve()
    {
        $data = $this->adventList->getAllData();

        // First column
        $table1 =  $this->adventList->getColumn(0);
        // Second column
        $table2 =  $this->adventList->getColumn(1);

        $similarityScore = $this->findSimilarityScore($table1, $table2);

        error_log(" similarityScore result: " . $similarityScore . PHP_EOL);

        return view('day2.day2', compact('table1', 'table2','similarityScore',));
    }

    public function findSimilarityScore($table1, $table2){

        $sumSimilarityScore = 0;
        foreach ($table1 as $key => $table1Value){
            $count = $this->adventList->countByValue(1, $table1Value);
            $sumSimilarityScore += $count * $table1Value;
/*
            error_log(" table1Value value: " . $table1Value . PHP_EOL);
            error_log(" count value: " . $count . PHP_EOL);
            error_log(" similarityScore value: " . $sumSimilarityScore . PHP_EOL);
                dd();
       */
        }
        return $sumSimilarityScore;
    }

}
