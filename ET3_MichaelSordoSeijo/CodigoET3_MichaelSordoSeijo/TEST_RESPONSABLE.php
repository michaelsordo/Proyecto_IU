<?php

session_start();
$_SESSION['test'] = true;

//para responsable


$arrayerrores = [];
include_once './MODEL/RESPONSABLE_MODEL.php';
include_once './VIEW/TEST_VIEW.php';
$responsable = new RESPONSABLE_MODEL;
$arrayerrores = $responsable->test_validation($arrayerrores);
$arrayerrores = $responsable->test_action($arrayerrores);


new TEST_VIEW($arrayerrores);

$_SESSION['test'] = false;

session_destroy();


?>
