<?php 
$dsn ="mysql:host=localhost;dbname=solicode";
$user_name="root";
$pass="";
$mssg="";

if(isset($_POST["conect"])){
    try{
        $conn=new PDO($dsn,$user_name,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $mssg= "we are conecting";
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
   
    <button name="conect">conect</button>
    <?php echo $mssg; ?>
</form>
   
</body>
</html>