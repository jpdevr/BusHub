<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $nome = $_REQUEST["nome"];
    $coordx = $_REQUEST["coordx"];
    $coordy = $_REQUEST["coordy"];
    $desc = $_REQUEST["desc"];
    $local = $_REQUEST["local"];
    $cod = $_REQUEST["cod"];

    $sql = 'update tb03_pontos set tb03_nome = ?, tb03_descricao = ?,
    tb03_coordx = ?, tb03_coordy = ?, tb03_local = ? where tb03_cod_ponto = ?';

    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($nome, $desc, $coordx, $coordy, $local, $cod));
        $mensagem = "Ponto editado com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao editar o ponto!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
    
}

echo json_encode(array("mensagem" => $mensagem));
?>