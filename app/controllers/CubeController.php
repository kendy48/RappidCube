<?php
/**
 * Created by PhpStorm.
 * User: kendy
 * Date: 06/07/16
 * Time: 01:20 AM
 */
function solveCube($inputParams)
{
    try {
        $qtyTest = $inputParams[0];
        $baseIndex = 1;
        $result = "";
        //loop for each Test
        for ($x = 1; $x <= $qtyTest; $x++) {
            $subParams = explode(" ", $inputParams[$baseIndex]);
            $cubeSize = $subParams[0];
            $qtyQuery = $subParams[1];
            $cube = initializeCube($cubeSize);
            for ($i = $baseIndex + 1; $i <= $baseIndex + $qtyQuery; $i++) {
                $result = $result . solveQuery($cube, $inputParams[$i]) . "\n";
            }
            $baseIndex+= $qtyQuery+1;
        }

        return $result;
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
};

function initializeCube($size){
    $cube = Array(Array(Array()));

    $cube[0] = array_fill(0, $size, 0);
    for($x = 0; $x < $size; $x++){
        for($y = 0; $y < $size; $y++){
            $cube[$x][$y] = array_fill(0, $size, 0);
        }
    }
    return $cube;
}

function solveQuery(&$cube, $query){
    if (strpos(strtoupper($query), "UPDATE") !== false) {
        return update($cube, $query);
    } else if (strpos(strtoupper($query), "QUERY") !== false) {
        return query($cube, $query);
    }
}

function update(&$cube, $query){
    $params = explode(" ",$query);
    $x = $params[1]-1;
    $y = $params[2]-1;
    $z = $params[3]-1;
    $cube[$x][$y][$z] = $params[4];
    return $params[4];
}

function query($cube, $query){
    $params = explode(" ",$query);
    $x1 = $params[1]-1;
    $y1 = $params[2]-1;
    $z1 = $params[3]-1;
    $x2 = $params[4]-1;
    $y2 = $params[5]-1;
    $z2 = $params[6]-1;

    $result = 0;
    for($x = $x1; $x <= $x2; $x++){
        for($y = $y1; $y <= $y2; $y++){
            for($z = $z1; $z <= $z2; $z++){
                $result = $result + $cube[$x][$y][$z];
            }
        }
    }
    return $result;
}