<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["cod"])) {

    $cod = $_REQUEST["cod"];
    $nome = $_REQUEST["nome"];
    $hora = $_REQUEST["hora"];
    $tipo = $_REQUEST["tipo"];

    $sql = "select * from tb04_itinerario where tb04_cod_linha = ? and tb04_horario=? and tb04_tipo=? and tb04_nome like '%$nome%'";
    $comando = $banco->prepare($sql);
    $comando->execute(array($cod, $hora, $tipo));
    if($comando->fetch()) {
        $mensagem = "Esse horário já está cadastrado!";
        echo json_encode(array("mensagem" => $mensagem));
        exit();
    }

    $sql = 'insert into tb04_itinerario(`tb04_cod_linha`, `tb04_nome`, `tb04_tipo`, `tb04_horario`)
        values (?, ?, ?, ?)';
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($cod, $nome, $tipo, $hora));
        $mensagem = "horário Cadastrado com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao cadastrar esse horário!";
    }

} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>