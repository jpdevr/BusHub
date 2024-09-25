<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];
    $nome = $_REQUEST["nome"];
    $coordx = $_REQUEST["coordx"];
    $coordy = $_REQUEST["coordy"];
    $desc = $_REQUEST["desc"];
    $local = $_REQUEST["local"];
    $foto = $_REQUEST["foto"];

    $sql = "select * from tb03_pontos where tb03_cod_ponto = ?";
    $comando = $banco->prepare($sql);
    $comando->execute(array($cod));
    if($comando->fetch()) {
        $mensagem = "Esse ponto já existe!";
        echo json_encode(array("mensagem" => $mensagem));
        exit();
    }
    
    $sql = 'insert into tb03_pontos(`tb03_cod_ponto`, `tb03_nome`,`tb03_descricao`, `tb03_coordx`, `tb03_coordy`, `tb03_local`, `tb03_foto`)
        values (?, ?, ?, ?, ?, ?, ?)';
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod, $nome, $desc, $coordx, $coordy, $local, $foto));
        $mensagem = "Ponto inserido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao inserir o ponto!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>