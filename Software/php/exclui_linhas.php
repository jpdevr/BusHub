<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];
    $nome = $_REQUEST["nome"];

    $sql = "delete from tb02_linhas where tb02_cod_linha = ? and tb02_nome =?";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod, $nome));
        $mensagem = "Linha excluida com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir essa linha!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>