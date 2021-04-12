<?php

session_start();
$_SESSION['test'] = true;

//para calendario


$arrayerrores = [];
include_once './MODEL/CALENDARIO_MODEL.php';
include_once './VIEW/TEST_VIEW.php';
$calendario = new CALENDARIO_MODEL;
$arrayerrores = $calendario->test_validation($arrayerrores);
$arrayerrores = $calendario->test_action($arrayerrores);


new TEST_VIEW($arrayerrores);

$_SESSION['test'] = false;

session_destroy();

?>
