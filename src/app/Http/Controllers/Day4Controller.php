<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Day4Controller extends Controller
{
    //

    public function solve(){
        //test grid
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
        $countMatchesPartOne = $this->countMatchesPartOne($grid, $directions, $word);
        $countMatchesPartTwo = $this->countMatchesPartTwo($grid);


        error_log("Part One total occurrences of '$word': $countMatchesPartOne\n");
        error_log("Part Two total occurrences of '$word': $countMatchesPartTwo\n");

        return view('day4.day4', compact('word','countMatchesPartOne','countMatchesPartTwo', 'grid'));
    }

    protected function countMatchesPartTwo($grid){
        $countMatches = 0;

        $rows = count($grid);
        $cols = count($grid[0]);

        // Traverse the grid
        for ($x = 1; $x < $rows - 1; $x++) { // Avoid edges to stay within diagonal bounds
            for ($y = 1; $y < $cols - 1; $y++) {
                // Check if the center is 'A'
                if ($grid[$x][$y] === 'A') {
                    // Check diagonals for the "X-MAS" pattern
                    if ($this->isValidXMAS($grid, $x, $y)) {
                        $countMatches++;
                    }
                }
            }
        }

        return $countMatches;
    }

    function isValidXMAS(array $grid, int $x, int $y): bool {
        // Extract diagonal values
        $topLeft = $grid[$x - 1][$y - 1];
        $bottomRight = $grid[$x + 1][$y + 1];
        $topRight = $grid[$x - 1][$y + 1];
        $bottomLeft = $grid[$x + 1][$y - 1];

        // Check the diagonals
        $leftDiagonal = $topLeft . 'A' . $bottomRight;
        $rightDiagonal = $topRight . 'A' . $bottomLeft;

        // Validate "MAS" or "SAM"
        return (
            ($leftDiagonal === 'MAS' || $leftDiagonal === 'SAM') &&
            ($rightDiagonal === 'MAS' || $rightDiagonal === 'SAM')
        );
    }

    protected function countMatchesPartOne($grid, $directions, $word) :int
    {
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
        return $countMatches;
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
