<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["RA_mot"])) {

    $cpf = $_REQUEST["cpf_mot"];
    $ra = $_REQUEST["RA_mot"];
    $nome = $_REQUEST["nome_mot"];
    $email = $_REQUEST["email_mot"];
    $fone = $_REQUEST["fone_mot"];
    $dt_nasc = $_REQUEST["dt_nasc"];

    $sql = "update tb06_motoristas set tb06_RA=?,tb06_nome=?,
    tb06_cpf=?,tb06_email=?, tb06_dt_nascimento=?,
    tb06_fone=? where tb06_RA=?";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($ra, $nome, $cpf, $email, $dt_nasc, $fone, $ra));
        $mensagem = "Registro editado com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao editar o registro!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>