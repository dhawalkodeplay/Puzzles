<?php

index();

function index() {

    $string = 'isthebananaofthegreatfruitlikepapayabutfruitofbraziliansoftheworldisineastwestnorthsouththegreatindiasealikn';

    $longest_duplicated_string = getLongestDuplicate($string);
    echo '<pre/>';
    echo 'Longest Duplicated String ==> '. $longest_duplicated_string;
    exit;
}

function getLongestDuplicate($string) {
    $strlen = strlen($string);
    $results = array();
    for($i=0; $i < $strlen; $i++) {
        for($j=1; $j < $strlen-$i; $j++) {
            $substr = substr($string, $i, $j);
            $results[$substr][] = array($i => $j);
        }
    }

    $str_to_count = array();

    foreach($results as $substr => $result) {
        if(count($result) <= 1) continue;
        $str_to_count[$substr] = count($result);
    }
    
    $str_to_length = array();
    foreach($str_to_count as $key => $count) {
        $str_to_length[$key] = strlen($key);
    }
    $keys = array_keys($str_to_length);

    $usort = usort($keys, function($a, $b){return (strlen($a) > strlen($b)) ? -1 : 1; });

    return array_shift($keys);
}

?>