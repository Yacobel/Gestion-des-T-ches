<?php

$dsn ='mysql:host=localhost;dbname=ahmade';
$user='root';
$pass='';
$msg="";
if($_SERVER['REQUEST_METHOD']=='POST'){
try{
   $conn = new PDO($dsn,$user,$pass);
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   $conn->beginTransaction();
   $name=$_POST['fname'];
   $lsname=$_POST['lname'];
   $email=$_POST['email'];
   $name1=$_POST['fname1'];
   $lsname1=$_POST['lname1'];
   $email1=$_POST['email1'];
   $sql="INSERT INTO products(name,email,lsname) VALUES('$name',' $email','$lsname')";
   $conn->exec($sql);
   $sql2="INSERT INTO products(name,email,lsname) VALUES('$name1','$email1','$lsname1')";
   $conn->exec($sql2);
   $conn->commit();
   $msg= "multi data insert";
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
   <?php echo " <p>$msg</p> ";?>
   </form>
</body>
</html>