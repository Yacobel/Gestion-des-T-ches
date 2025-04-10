<?php

$dsn = "mysql:host=localhost";
$user_name = "root";
$pass = "";

try{
    $conn=new PDO($dsn,$user_name,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
    echo "data base conect sucsusfuly   <br> "  ;

    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        if (isset($_POST["create"])){
            $sql ="CREATE DATABASE IF NOT EXISTS `{$_POST["name"]}` ";
            $conn->exec($sql);
            echo "data base craeate  sucsusfuly <br> ";


        }
        
    }
    if (isset($_POST["tbname"])  ){
        $namee=$_POST["name"];
        $con=new PDO("mysql:host=localhost;dbname=$namee",$user_name,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
        echo "data base 2 conecte sucsusfuly ";
        $sql ="CREATE TABLE `{$_POST["clm"]}`(
        id INT (11) NOT NULL AUTO_INCREMENT  PRIMARY KEY ,
        `{$_POST["c1"]}` VARCHAR(255) ,
        `{$_POST["c2"]}` VARCHAR(255),
        `{$_POST["c3"]}` VARCHAR(255),
        `{$_POST["c4"]}` VARCHAR(255),
        `{$_POST["c5"]}` VARCHAR(255)
        ) ";
        $con->exec($sql);
        
        echo "table craeate  sucsusfuly <br> ";


    }
    
    if (isset($_POST["drop"])  ){
        
        $con=new PDO($dsn,$user_name,$pass);
        $con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION );
        echo "data base 2 conecte sucsusfuly ";
        $sql ="DROP DATABASE `{$_POST["name"]}` ";
        $con->exec($sql);
        
        echo "table craeate  sucsusfuly <br> ";


    }
    
    


} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" >



        

    <input type="text" name="name" id="" placeholder="name database">
    <br>
    <input type="text" name="clm" id="" placeholder="name colum">
    <br>
    <input type="text" name="c1" id="" placeholder="name">
    <br>
    <input type="text" name="c2" id="" placeholder="email">
    <br>
    <input type="text" name="c3" id="" placeholder="pass">
    <br>
    <input type="text" name="c4" id="" placeholder="cin">
    <br>
    <input type="text" name="c5" id="" placeholder="">
    <br>
    <button name="create">craeate data base</button>
    <button name="tbname">craeate table</button>
    <button name="drop">drop</button>
    </form>
    
</body>
</html>
