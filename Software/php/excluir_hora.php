<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];
    $hora = $_REQUEST["hora"];
    $tipo = $_REQUEST["tipo"];
    $nome = $_REQUEST["nome"];

    $sql = "delete from tb04_itinerario where tb04_cod_linha = ? and tb04_horario=? and tb04_tipo=? and tb04_nome like '%$nome%'";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod, $hora, $tipo));
        $mensagem = "Horário excluido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir esse horário!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>