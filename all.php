<?php
namespace nuffy\aoc21;

$folders = scandir(__DIR__);
foreach($folders as $folder){
    if(preg_match('/d\d{2}/', $folder) && file_exists(__DIR__."/$folder/solve.php")){
        echo "$folder:\n";
        include __DIR__."/$folder/solve.php";
        echo "----\n";
    }
}