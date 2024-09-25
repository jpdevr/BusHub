<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$cod = $_REQUEST["cod"];
$nome = $_REQUEST["nome"];

$sql = "select * from tb02_linhas where tb02_cod_linha = ? and tb02_nome like '%$nome%'";

$comando = $banco->prepare($sql);
$comando->execute(array($cod));

$registros = $comando->fetchAll();

echo json_encode($registros);
?>
