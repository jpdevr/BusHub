<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$ra = $_REQUEST["RA_mot"];

$sql = "select * from tb06_motoristas where tb06_RA = ?";

$comando = $banco->prepare($sql);
$comando->execute(array($ra));

$registros = $comando->fetchAll();

echo json_encode($registros);
?>
