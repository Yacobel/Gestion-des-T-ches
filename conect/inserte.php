<?php

$dsn="mysql:host=localhost;dbname=solicode";
$user_name="root";
$pass="";
$msg="";



if(isset($_POST["insert"])){
    try{
        $conn=new PDO($dsn,$user_name,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        $name=$_POST["v1"];
        $email=$_POST["v2"];
        $pass=$_POST["v3"];
        $cin=$_POST["v4"];
        $sql="INSERT INTO students(name , email , pass , cin) VALUES ('$name','$email','$pass',' $cin')";
        $sql2="SELECT id FROM students ORDER BY id DESC LIMIT 2";
        $all=$conn->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
        foreach($all as $names){
            echo $names['name']."<br>";
            echo $names['email']."<br>";
            echo $names['pass']."<br>";
            echo $names['cin']."<br>";

        }
        $conn->exec($sql);

      
       

    }catch(PDOException $e){
        $msg ="insert faild" .$e->getMessage();
        
        

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
        
        <input type="text" name="v1" placeholder="name">
        <input type="text" name="v2" placeholder="email">
        <input type="text" name="v3" placeholder="password">
        <input type="text" name="v4" placeholder="cin">
        <input type="text" name="v5" placeholder="age">
        <button name="insert">insert</button>
        
       
    </form>
    <?php echo $msg ;?>
    
</body>
</html>