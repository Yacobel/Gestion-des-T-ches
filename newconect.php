<?php

$dsn ='mysql:host=localhost;dbname=ahmade';
$user='root';
$pass='';
if($_SERVER['REQUEST_METHOD']=='POST'){
   

try{
   $db = new PDO($dsn,$user,$pass);
   $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

   $sql="SELECT id, name,email,lsname FROM products ORDER BY id DESC  LIMIT 1";
   $all=$db->query($sql);
   $sql2="CREATE TABLE IF NOT EXISTS secend(
   name VARCHAR(255),
   email VARCHAR(255),
   lsname VARCHAR(255)
   )";
   $db->exec($sql2);
   $sss = $all->fetchAll(PDO::FETCH_ASSOC);
   foreach($sss as $names){
    $v1= $names['name'] ;
    $v2= $names['email'] ;
    $v3= $names['lsname'] ;
    
    $sql3 ="INSERT INTO secend(name,email,lsname) VALUES('$v1','$v2','$v3')";
    $db->exec($sql3);
   }
    
   echo "insert data";
}
catch(PDOException $e){
   echo "error:".$e->getMessage();
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <form action="" method="post">
   <h2>PHP MYSQL Insert Data</h2>
   <label for="">Firstname: <input type="text" name="fname" id=""></label><br>
   <label for="">Lastname : <input type="text" name="lname" id=""></label><br>
   <label for="">Email <input type="text" name="email" id=""></label><br>
   <label for="">Firstname: <input type="text" name="fname1" id=""></label><br>
   <label for="">Lastname : <input type="text" name="lname1" id=""></label><br>
   <label for="">Email <input type="text" name="email1" id=""></label><br>
   <input type="submit" value="Insert">
   </form>
</body>
</html>