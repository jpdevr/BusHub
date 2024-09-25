<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

$cod = $_REQUEST["cod"];
$nome = $_REQUEST["nome"];

$sql = "select * from tb04_itinerario where tb04_cod_linha = ? and tb04_nome=? order by tb04_horario";

$comando = $banco->prepare($sql);
$comando->execute(array($cod, $nome));

$registros = $comando->fetchAll();
echo json_encode($registros);
?>
