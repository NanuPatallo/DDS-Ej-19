<?php

header('Content-type:application/json');

require_once '../../modelo/Persona.php';
require_once 'responses/eliminarResponse.php';
require_once '../../configuracion/database.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$pEliminar = new Persona();
$pEliminar->Id = $req->Id;

$pEliminar->Eliminar();

$res = new EliminarResponse();
$res->IsOk = true;

echo json_encode($res);
