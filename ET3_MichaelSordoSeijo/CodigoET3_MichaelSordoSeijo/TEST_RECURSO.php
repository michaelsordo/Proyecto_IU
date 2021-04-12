<?php

session_start();
$_SESSION['test'] = true;

//para recurso


$arrayerrores = [];
include_once './MODEL/RECURSO_MODEL.php';
include_once './VIEW/TEST_VIEW.php';
$recurso = new RECURSO_MODEL;
$arrayerrores = $recurso->test_validation($arrayerrores);
$arrayerrores = $recurso->test_action($arrayerrores);


new TEST_VIEW($arrayerrores);

$_SESSION['test'] = false;

session_destroy();

?>
