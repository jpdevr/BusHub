
<?php
header("Content-Type: application/json; charset=UTF-8");
include_once "conexao.php";

if(isset($_REQUEST["RA_mot"])) {

    $ra = $_REQUEST["RA_mot"];

    $sql = "delete from tb06_motoristas where tb06_RA = ?";
    
    try {
        $comando = $banco->prepare($sql);
        $comando->execute(array($ra));
        $mensagem = "Motorista excluido com sucesso!";
    } catch (PDOException $e) {
        $mensagem = "Erro ao excluir esse motorista!";
    }
    
} else {
    $mensagem = "Os dados não foram informados!";
}


echo json_encode(array("mensagem" => $mensagem));
?>