<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$email = $_REQUEST["email"];
$RA = $_REQUEST["RA"];

$sql = "select from tb06_motoristas where tb06_email = ? and tb06_RA = ?";

$comando = $banco->prepare($sql);
$comando->execute(array($email, $RA));

$registros = $comando->fetchAll();

echo json_encode($registros);

?>
