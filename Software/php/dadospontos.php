<?php
header("Content-Type: application/json; charset=UTF-8");

try {
    $banco = new PDO(
        'mysql:host=localhost:3307;dbname=bushub',
        'root',
        'usbw',
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
} catch(PDOException $e) {
    echo "banco de dados não disponível";
}

$sql = "select * from tb03_pontos";
if(isset($_GET["p"])) {
	$sql .= " where concat(tb03_nome,tb03_descricao) like '%".$_GET["p"]."%'";
}

$comando = $banco->prepare($sql);
$comando->execute();

$json = array();
while ($registros = $comando->fetch()) {
    array_push($json, array(
        "geometry" => array("type" => "Point",
            "coordinates" => array($registros["tb03_coordy"], $registros["tb03_coordx"])
        ),
        "properties" => array("name" => $registros["tb03_nome"],
            "description" => $registros["tb03_descricao"],
            "localizacao" => $registros["tb03_local"])
    ));
};

echo json_encode(array("type" => "FeatureCollection", "features" => $json));
?>

