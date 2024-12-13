<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Day4Controller extends Controller
{
    //

    public function solve(){
        $grid = [
            ['M', 'M', 'M', 'S', 'X', 'X', 'M', 'A', 'S', 'M'],
            ['M', 'S', 'A', 'M', 'X', 'M', 'S', 'M', 'S', 'A'],
            ['A', 'M', 'X', 'S', 'X', 'M', 'A', 'A', 'M', 'M'],
            ['M', 'S', 'A', 'M', 'A', 'S', 'M', 'S', 'M', 'X'],
            ['X', 'M', 'A', 'S', 'A', 'M', 'X', 'A', 'M', 'M'],
            ['X', 'X', 'A', 'M', 'M', 'X', 'X', 'A', 'M', 'A'],
            ['S', 'M', 'S', 'M', 'S', 'A', 'S', 'X', 'S', 'S'],
            ['S', 'A', 'X', 'A', 'M', 'A', 'S', 'A', 'A', 'A'],
            ['M', 'A', 'M', 'M', 'M', 'X', 'M', 'M', 'M', 'M'],
            ['M', 'X', 'M', 'X', 'A', 'X', 'M', 'A', 'S', 'X'],
        ];

        // Path to the publicly accessible file
        $filePath = public_path('storage/day4.txt');

        $fileContents = file_get_contents($filePath);
        // Split the file contents into rows (lines in the text file)
        $rows = explode("\n", trim($fileContents));
        // Convert each row into an array of characters
        $grid = array_map('str_split', $rows);

        $directions = [
            [0, 1],   // Right
            [0, -1],  // Left
            [1, 0],   // Down
            [-1, 0],  // Up
            [1, 1],   // Diagonal down-right
            [1, -1],  // Diagonal down-left
            [-1, 1],  // Diagonal up-right
            [-1, -1], // Diagonal up-left
        ];

        $word = "XMAS";
        $countMatches = 0;

        for ($x = 0; $x < count($grid); $x++) {
            for ($y = 0; $y < count($grid[0]); $y++) {
                foreach ($directions as $direction) {
                    if ($this->findWord($grid, $x, $y, $direction, $word)) {
                        $countMatches++;
                    }
                }
            }
        }

        error_log("Total occurrences of '$word': $countMatches\n");

        return view('day4.day4', compact('word','countMatches', 'grid'));
    }

    protected function findWord($grid, $x, $y, $direction, $word) {
        $rows = count($grid);
        $cols = count($grid[0]);
        $dx = $direction[0];
        $dy = $direction[1];

        for ($i = 0; $i < strlen($word); $i++) {
            $nx = $x + $i * $dx; // New row
            $ny = $y + $i * $dy; // New column

            // Check boundaries
            if ($nx < 0 || $ny < 0 || $nx >= $rows || $ny >= $cols) {
                return false;
            }

            // Check character match
            if ($grid[$nx][$ny] !== $word[$i]) {
                return false;
            }
        }

        return true; // If all characters match
    }
}
