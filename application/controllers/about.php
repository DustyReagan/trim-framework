<?php
// This is an example Controller.' Put all your fancy "business logic" here.

$date = date('m/d/Y h:i:s a', time());

$rand = rand(1, 10);

// The variables in the $vars array are accessible in the View.
$vars = array('currentDateTime' => $date,
    'aRandomNumber' => $rand
);
