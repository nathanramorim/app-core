<?php
include_once('Config.php');

function connection(){
    $servername = 'localhost';
    $username = "root";
    $password = "root";
    $dbname = '';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
        return $conn;             
    }
    catch(PDOException $e){
         echo "Connection failed: " . $e->getMessage();
    }
}

function update($query,$connection,$encrypt){
    $join_name = constant('db_name').'.'.constant('prefix');
    $attr_value = ($encrypt) ? md5($query['attr_value']) : $query['attr_value'] ;
    $sql = "UPDATE {$join_name}{$query['table']} SET {$query['set_attr']} = '{$attr_value}' {$query['where']}";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":{$query['set_attr']}", $query['set_attr'], PDO::PARAM_STR);
    $result = $stmt->execute();
    $connection = NULL;
    return $result;
}

$conn = connection();


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $grade = utf8_decode($_POST['grade']);
    $id = $_POST['id'];
    $back = $_POST['back'];

    $query = array(
        'table' => 'table name',
        'set_attr' => 'change atribute to update',
        'attr_value' => 'value to update',
        'where' => "clause where"

    );
    $result = update($query,$conn,false);
    if($result){
        $result = 'true';
        echo $result;
    }
}