<?php 
$dsn2 ="mysql:host=localhost";
$user_name="root";
$pass="";
$mssg="";
if(isset($_POST["create"])){
    try{
        $conn=new PDO($dsn2,$user_name,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $sql="CREATE DATABASE IF NOT EXISTS `{$_POST["name"]}`";
        $conn->exec($sql);
        $mssg= "<p>database `{$_POST["name"]}` createde</p>";
    }
    catch(PDOException $e){
        $mssg= "conection faild" .$e->getMessage();
    }
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
<form action="" method="post">
    <input type="text" name="name" placeholder="database name" id=""><br>
    <button name="create">create database</button>
    <?php echo  "<p>$mssg</p>" ; ?>
</form>   
</body>
</html>