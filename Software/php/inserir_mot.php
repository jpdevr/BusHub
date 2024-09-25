<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["RA_mot"])) {

    $cpf = $_REQUEST["cpf_mot"];
    $ra = $_REQUEST["RA_mot"];
    $nome = $_REQUEST["nome_mot"];
    $email = $_REQUEST["email_mot"];
    $dtnasc = $_REQUEST["dt_nasc_mot"];
    $fone = $_REQUEST["fone_mot"];
    $foto = $_REQUEST["foto"];

    $sql = "select * from tb06_motoristas where tb06_RA = ?";
    $comando = $banco->prepare($sql);
    $comando->execute(array($ra));
    if($comando->fetch()) {
        $mensagem = "Esse motorista já está cadastrado!";
        echo json_encode(array("mensagem" => $mensagem));
        exit();
    }

    $sql = 'insert into tb06_motoristas(tb06_RA, tb06_nome, tb06_cpf, tb06_email, tb06_dt_nascimento, tb06_fone, tb06_foto)
        values (?, ?, ?, ?, ?, ?, ?)';
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($ra, $nome, $cpf, $email, $dtnasc, $fone, $foto));
        $mensagem = "Motorista inserido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao inserir o motorista!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>