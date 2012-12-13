<?php

index();

function index() {

    $input = array();
    $input[] = array('1', '3', '2', '4', '4');
    $input[] = array('1', '3', '2', '4', '7');
    $input[] = array('1', '3', '2', '4', '9');
    $input[] = array('1', '3', '2', '4', '12');
    
    foreach ($input as $data) {
        $tax_to_pay = calculateTax($data[0], $data[1], $data[2], $data[3], $data[4]);
        echo '<pre/>';
        print_r($tax_to_pay);
    }
    exit;
}

function calculateTax($initax, $slot1, $slot2, $recent_years, $target_year) {
    $first_year_tax = $initax;

    $years_to_units = array();
    $years_to_units[1] = $first_year_tax;
    
    $temp = $first_year_tax;
    for($i=0; $i < $slot1 + $slot2; $i++) {
        
        if($i < $slot1)
            $temp = $temp + 1;
        else
            $temp = $temp * 2;
        
        end($years_to_units);         // move the internal pointer to the end of the array
        $key = key($years_to_units);
        if($key == $target_year)
            return array_slice($years_to_units, -1, 1, true);
        $years_to_units[$key + 1] = $temp;
    }

    end($years_to_units);         // move the internal pointer to the end of the array
    $key = key($years_to_units);
    if($key != $target_year) {
        for($i = $key; $i < $target_year; $i++) {
            $temp = $years_to_units;
            $years_to_units[$i + 1] = array_product(array_slice($temp, -$recent_years));
        }
    }

    return array_slice($years_to_units, -1, 1, true);
}

?>