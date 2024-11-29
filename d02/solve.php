<?php
/* https://adventofcode.com/2023/day/2 */
namespace nuffy\aoc23\d02;

function solve1($input) : int
{
    $id_sum = 0;
    $limits = ["red"=>12, "green"=>13, "blue"=>14];
    $formatted_games = getGameCubes($input);

    foreach($formatted_games as $game => $cubes){
        $possible_game = true;
        foreach($cubes as $cube){
            if($cube[1] > $limits[$cube[2]]){
                $possible_game = false;
                break;
            }
        }
        if($possible_game){
            $id_sum += $game;
        }
    }
    return $id_sum;
}

function solve2($input) : int
{
    $formatted_games = getGameCubes($input);
    $cube_power = 0;
    foreach($formatted_games as $game => $cubes){
        $required_cubes = ["red"=>0, "green"=>0, "blue"=>0];
        foreach($cubes as $cube){
            if($cube[1] > $required_cubes[$cube[2]]){
                $required_cubes[$cube[2]] = $cube[1];
            }
        }
        $cube_power += array_product($required_cubes);
    }
    return $cube_power;
}

function getGameCubes($input) : array
{
    $return = [];
    foreach($input as $row){
        $matches = [];
        preg_match('/Game (\d+): /', $row, $matches);
        $game = $matches[1];
        $row = str_replace($matches[0], '', $row);

        $cube_matches = [];
        preg_match_all('/(\d+) (\w+)/', $row, $cube_matches, PREG_SET_ORDER);
        $return[$game] = $cube_matches;
    }
    return $return;
}

$input = str_getcsv(file_get_contents(__DIR__.'/input.txt'), "\n");

echo "#1: ".solve1($input).PHP_EOL;
echo "#2: ".solve2($input).PHP_EOL;