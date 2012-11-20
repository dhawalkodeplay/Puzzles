<?php

index();

function index() {

    $vowels = array('a', 'e', 'i', 'o', 'u');

    $words = file('words');

    $all_vowels_words = array();
    $all_ascending_words = array();

    foreach($words as $word) {

        $status = getVowelsWords($word, $vowels);
        if($status) $all_vowels_words[] = $word;

        $status = getAscendingWords($word);
        if($status) {
            if(!in_array(strtolower($word), array_map('strtolower', $all_ascending_words)))
                $all_ascending_words[] = $word;
        }
    }
    printOutput($all_vowels_words, $all_ascending_words);
    exit;
}

function getVowelsWords($word, $vowels) {
    if(strlen(trim($word)) < count($vowels)) return FALSE;

    $word = str_split(trim($word));

    foreach ($word as $key => $value) {
        if(!in_array($value, $vowels)) unset($word[$key]);
    }

    if(array_values($vowels) == array_values($word))
        return TRUE;
    else
        return FALSE;
}

function getAscendingWords($word) {
    if(strlen(trim($word)) < 6) return FALSE;
    $word = strtolower(trim(str_replace("'", '', $word)));

    $temp = $word;

    $sorted_word = str_split($word);
    sort($sorted_word);

    if(array_values(str_split($temp)) == array_values($sorted_word))
        return TRUE;
    else
        return FALSE;
}

function printOutput($all_vowels_words, $all_ascending_words) {
    echo '<pre>';
    echo 'All the words in a dictionary that contain exactly five vowels (a, e, i, o and u) in ascending order';
    echo '<pre>';
    print_r($all_vowels_words);
    echo '<pre/>';
    echo 'All the words in a dictionary of length at least six that contain letters in strictly ascending alphabetical order';
    echo '<pre>';
    print_r($all_ascending_words);
    echo '<pre/>';
}

?>