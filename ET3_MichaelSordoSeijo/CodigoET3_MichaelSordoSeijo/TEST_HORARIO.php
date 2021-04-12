<?php

session_start();
$_SESSION['test'] = true;

//para horario


$arrayerrores = [];
include_once './MODEL/HORARIO_MODEL.php';
include_once './VIEW/TEST_VIEW.php';
$horario = new HORARIO_MODEL;
$arrayerrores = $horario->test_validation($arrayerrores);
$arrayerrores = $horario->test_action($arrayerrores);


new TEST_VIEW($arrayerrores);

$_SESSION['test'] = false;

session_destroy();

?>
