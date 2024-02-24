<?php

declare(strict_types=1);

function getDistance(array $point1, array $point2)
{
    [$x1, $y1] = $point1;
    [$x2, $y2] = $point2;

    $xs = $x2 - $x1;
    $ys = $y2 - $y1;

    return sqrt($xs ** 2 + $ys ** 2);
}

function getTheNearestLocation(array $locations, array $point): array
{
    if (empty($locations)) {
        return [];
    }
    $distance = getDistance($point, $locations[0][1]);
    $location = [$locations[0]];
    for ($i = 1; $i < count($locations); $i++) {
        if (getDistance($point, $locations[$i][1]) < $distance) {
            $location = $locations[$i];
            $distance = getDistance($point, $locations[$i][1]);
        }
    }
    return $location;
}

$locations = [
    ['Park', [10, 5]],
    ['Sea', [1, 3]],
    ['Museum', [8, 4]],
];

$point = [1, 3];
var_dump(getTheNearestLocation($locations, $point));



