<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];
    $nome = $_REQUEST["nome"];
    $link = $_REQUEST["link"];

    $sql = "select * from tb02_linhas where tb02_cod_linha = ? and tb02_nome= ?";
    $comando = $banco->prepare($sql);
    $comando->execute(array($cod, $nome));
    if($comando->fetch()) {
        $mensagem = "Essa linha já está cadastrada!";
        echo json_encode(array("mensagem" => $mensagem));
        exit();
    }

    $sql = 'insert into tb02_linhas(`tb02_cod_linha`, `tb02_nome`, `tb02_rotas`)
        values (?, ?, ?)';

    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod, $nome, $link));
        $mensagem = "Linha Cadastrada com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao cadastrar essa linha!";
    }

} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>
