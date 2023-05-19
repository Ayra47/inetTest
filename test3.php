<?php

$array = [
    ['id' => 1, 'date' => "12.01.2020", 'name' => "test1"],
    ['id' => 4, 'date' => "08.03.2020", 'name' => "test4"],
    ['id' => 2, 'date' => "02.05.2020", 'name' => "test2"],
    ['id' => 3, 'date' => "06.06.2020", 'name' => "test3"],
];

$searchIds = [4, 3];

$newArr = array_filter($array, function($item) use($searchIds) {
    if (in_array($item['id'], $searchIds)) {
        return true;
    } else {
        return false;
    }
});

print_r($newArr);