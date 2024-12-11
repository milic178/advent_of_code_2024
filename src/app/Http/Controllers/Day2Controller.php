<?php

namespace App\Http\Controllers;

use App\Services\DataDay2;

use Illuminate\Http\Request;

class Day2Controller extends Controller
{
    public function __construct(DataDay2 $dataDay2)
    {
        $this->dataDay2 = $dataDay2;
    }

    public function solve()
    {
        $data = $this->dataDay2->getAllData();

        // Example input data
        /*$data = [
            [7, 6, 4, 2, 1],    //safe part 2
            [1, 2, 7, 8, 9],    //unsafe part 2
            [9, 7, 6, 2, 1],    //unsafe part 2
            [1, 3, 2, 4, 5],    //safe part 2
            [8, 6, 4, 4, 1],    //safe part 2
            [1, 3, 6, 7, 9]     //safe part 2
        ];
        */

        // Count the number of safe reports
        $safeReportsCount = 0;
        $problemDampenerRule = 0;
        foreach ($data as $report) {
            if ($this->isSafeReport($report)) {
                $safeReportsCount++;
            } else {
                //part two
                foreach ($report as $index => $reportItem) {
                    //copy report
                    $modifiedReport = $report;
                    //remove first item
                    unset($modifiedReport[$index]);
                    //reindex array
                    $modifiedReport = array_values($modifiedReport);
                    //check if safe, if so then its ok dont check anymore (only 1 item can be removed)
                    if($this->isSafeReport($modifiedReport)) {
                        $problemDampenerRule++;
                        break;
                    }
                }
            }
        }
        $totalSafeReports = $safeReportsCount + $problemDampenerRule;

        // Output the result
        error_log("Number of originally safe reports: $safeReportsCount\n");
        error_log("Number of problem dampener rule: $problemDampenerRule\n");
        error_log("Number of total safe reports: $totalSafeReports\n");

        return view('day2.day2', compact('data', 'safeReportsCount', 'problemDampenerRule', 'totalSafeReports'));
    }

    // Function to check if a report is safe
    function isSafeReport(array $levels): bool
    {
        // Not enough levels to determine safety
        if (count($levels) < 2) {
            return false;
        }
        $isIncreasing = true;
        $isDecreasing = true;

        for ($i = 1; $i < count($levels); $i++) {
            $difference = $levels[$i] - $levels[$i - 1];

            // Check if difference is outside the range [1, 3]
            if (abs($difference) < 1 || abs($difference) > 3) {
                return false;
            }

            // Determine if the sequence is not strictly increasing
            if ($difference < 0) {
                $isIncreasing = false;
            }

            // Determine if the sequence is not strictly decreasing
            if ($difference > 0) {
                $isDecreasing = false;
            }
        }

        // A safe report must be either strictly increasing or strictly decreasing
        return $isIncreasing || $isDecreasing;
    }
}
