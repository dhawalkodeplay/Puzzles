<?php

index();

function index() {
    $all_combinations = array();
    for($i = 1; $i < 101; $i++) {
        $temp_key = $i;
        $temp = $i;
        for($j = $i + 1; $j < 101; $j++) {
            $temp = $temp + $j;
            if($temp > 100) break;
            $temp_key = $temp_key.'+'.$j;
            $all_combinations[$temp_key] = $temp;
        }
    }

    $revere_all_combinations = array();
    foreach($all_combinations as $key => $value) {
        $revere_all_combinations[$value][] = $key;
    }
    ksort($revere_all_combinations);
    echo '------------------ ALL COMBINATIONS (Number To Combinations) ----------------------';
    echo '<pre/>';
    print_r($revere_all_combinations);
    $combinations_to_numbers = array();
    foreach ($revere_all_combinations as $number => $combinations) {
        $combinations_to_numbers[count($combinations)][] = $number;
    }
    ksort($combinations_to_numbers);
    echo '<br>------------------ NUMBER OF COMBINATIONS TO NUMBERS ----------------------<br>';
    echo '<pre/>';
    print_r($combinations_to_numbers);
    exit;
}

?>