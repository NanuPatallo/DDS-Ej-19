<?php

header('Content-type:application/json');

require_once '../../modelo/Persona.php';
require_once 'responses/modificarResponse.php';
require_once '../../configuracion/database.php';

$json = file_get_contents('php://input', true);
$req = json_decode($json);

$pModificar = new Persona();
$pModificar->Id = $req->Id;
$pModificar->Nombre = $req->Nombre;
$pModificar->Apellido = $req->Apellido;
$pModificar->NroDoc = $req->NroDoc;
$pModificar->Direccion = $req->Direccion;
$pModificar->Email = $req->Email;
$pModificar->Modificar();

$res = new ModificarResponse();
$res->IsOk = true;

echo json_encode($res);
