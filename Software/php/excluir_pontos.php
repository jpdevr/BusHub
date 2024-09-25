<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];

    $sql = "delete from tb03_pontos where tb03_cod_ponto = ?";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod));
        $mensagem = "Ponto excluido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir esse ponto!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>