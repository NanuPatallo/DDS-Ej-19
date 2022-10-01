<?php

header('Content-type:application/json');

require_once '../../modelo/Persona.php';
require_once 'responses/consultarResponse.php';
require_once '../../configuracion/database.php';

$id = $_GET['id'];
$resp = new ConsultarResponses();
$resp->Persona = Persona::Buscar($id);

echo json_encode($resp);
