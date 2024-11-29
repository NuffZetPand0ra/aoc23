<?php
/* https://adventofcode.com/2023/day/1 */
namespace nuffy\aoc23\d01;

function solve1($input) : int
{
    $total = 0;
    foreach($input as $line){
        $letters = str_split($line);
        $numbers = array_values(array_filter($letters, 'is_numeric'));
        $total += $numbers[0]*10 + end($numbers);
    }
    return $total;
}
function solve2($input) : int
{
    $number_map = [
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine"
    ];
    $preg_pattern = '/(?=([0-9]|'.implode("|", $number_map).'))/';
    $modified_input = [];
    foreach($input as $line){
        $matches = [];
        $row = [];
        preg_match_all($preg_pattern, $line, $matches);
        foreach($matches[1] as &$match){
            if(is_numeric($match)){
                $row[] = $match;
            }else{
                $row[] = array_search($match, $number_map);
            }
        }
        $modified_input[] = implode("", $row);
    }
    return solve1($modified_input);
}

$input = str_getcsv(file_get_contents(__DIR__.'/input.txt'), "\n");

echo "#1: ".solve1($input).PHP_EOL;
echo "#2: ".solve2($input).PHP_EOL;