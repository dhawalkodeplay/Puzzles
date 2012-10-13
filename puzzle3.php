<?php

index();

function index() {
    $number_of_applicants = array('4','5','12','18','30','60','75','90','105','130','150');

    $results = array();

    foreach($number_of_applicants as $number) {
        $best_position = selectBestPosition($number);
        $results[] = array('number_of_applicants' => $number, 'position' => key($best_position));
    }
    echo '<pre/>';
    print_r($results);
    exit;
}

function selectBestPosition($number) {
    if(validate($number)) {
        $applicants_with_position = array();
        for ($i=0; $i < $number; $i++) { 
            $applicants_with_position[$i+1] = $i; 
        }
        $get_best_position = getBestPosition($applicants_with_position);
        return $get_best_position;
    }
}

function getBestPosition($applicants_with_position) {
    if(count($applicants_with_position) == 1) {
        return $applicants_with_position;
    }
    $count = 1;
    foreach ($applicants_with_position as $position => $applicant) {
        if($count % 2 != 0) {
            unset($applicants_with_position[$position]);
        }
        $count++;
    }
    if(count($applicants_with_position) != 1) {
        $applicants_with_position = getBestPosition($applicants_with_position);
    }
    return $applicants_with_position;
}

function validate($number) {
    // TODO
    return true;
}

?>