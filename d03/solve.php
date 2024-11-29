<?php
/* https://adventofcode.com/2023/day/3 */
namespace nuffy\aoc23\d03;

function solve1($input) : int
{
    $valid_parts_sum = 0;
    $one_line_input = implode('', $input);
    $line_length = strlen($input[0]);

    // Find all numbers with their positions
    preg_match_all('/\d+/', $one_line_input, $numbers, PREG_OFFSET_CAPTURE);
    $numbers = $numbers[0];

    foreach ($numbers as $number) {
        $x = $number[1] % $line_length;
        $y = floor($number[1] / $line_length);
        $number_length = strlen($number[0]);
        $is_valid_part = false;

        // Define surrounding positions to check around each digit in the number
        $positions_to_check = [
            [$x - 1, $y],                         // left of the first digit
            [$x + $number_length, $y],            // right of the last digit
            [$x - 1, $y - 1],                     // top-left diagonal
            [$x + $number_length, $y - 1],        // top-right diagonal
            [$x - 1, $y + 1],                     // bottom-left diagonal
            [$x + $number_length, $y + 1],        // bottom-right diagonal
        ];

        // Add positions directly above and below each digit of the number
        for ($i = 0; $i < $number_length; $i++) {
            $positions_to_check[] = [$x + $i, $y - 1]; // above each digit
            $positions_to_check[] = [$x + $i, $y + 1]; // below each digit
        }

        // Check all positions around the number for any symbol other than "."
        foreach ($positions_to_check as $position) {
            if (isset($input[$position[1]][$position[0]]) && $input[$position[1]][$position[0]] != '.') {
                $is_valid_part = true;
                break; // Stop checking once a symbol is found
            }
        }

        // If any symbol was adjacent, add the number to the sum
        if ($is_valid_part) {
            $valid_parts_sum += $number[0];
        }
    }

    return $valid_parts_sum;
}

function solve2($input) : int
{
    return 0;
}

$input = str_getcsv(file_get_contents(__DIR__.'/input.txt'), "\n");
$input = str_getcsv('467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..', "\n");
echo "#1: ".solve1($input).PHP_EOL;
echo "#2: ".solve2($input).PHP_EOL;