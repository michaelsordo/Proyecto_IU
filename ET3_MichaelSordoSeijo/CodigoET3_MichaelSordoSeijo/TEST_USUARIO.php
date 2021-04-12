<?php

session_start();
$_SESSION['test'] = true;

//para usuario


$arrayerrores = [];
include_once './MODEL/USUARIO_MODEL.php';
include_once './VIEW/TEST_VIEW.php';
$usuario = new USUARIO_MODEL;
$arrayerrores = $usuario->test_validation($arrayerrores);
$arrayerrores = $usuario->test_action($arrayerrores);


new TEST_VIEW($arrayerrores);

$_SESSION['test'] = false;

session_destroy();

?>
