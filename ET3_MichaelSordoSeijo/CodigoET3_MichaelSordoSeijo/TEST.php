<?php
// PROBAR TODAS LAS ENTIDADES
// test general

session_start();
$_SESSION['test'] = true;

    $arrayerrores = [];

//  para asignatura
    include './MODEL/USUARIO_MODEL.php';
    include './MODEL/RESPONSABLE_MODEL.php';
    include './MODEL/RECURSO_MODEL.php';
    include './MODEL/HORARIO_MODEL.php';
    include './MODEL/CALENDARIO_MODEL.php';

    include_once './VIEW/TEST_VIEW.php';

    $usuario = new USUARIO_MODEL;
    $arrayerrores = $usuario->test_validation($arrayerrores);
    $arrayerrores = $usuario->test_action($arrayerrores);

    $responsable = new RESPONSABLE_MODEL;
    $arrayerrores = $responsable->test_validation($arrayerrores);
    $arrayerrores = $responsable->test_action($arrayerrores);

    $recurso = new RECURSO_MODEL;
    $arrayerrores = $recurso->test_validation($arrayerrores);
    $arrayerrores = $recurso->test_action($arrayerrores);

    $recurso = new HORARIO_MODEL;
    $arrayerrores = $recurso->test_validation($arrayerrores);
    $arrayerrores = $recurso->test_action($arrayerrores);

    $recurso = new CALENDARIO_MODEL;
    $arrayerrores = $recurso->test_validation($arrayerrores);
    $arrayerrores = $recurso->test_action($arrayerrores);

    new TEST_VIEW($arrayerrores);

    $_SESSION['test'] = false;

    session_destroy();


?>