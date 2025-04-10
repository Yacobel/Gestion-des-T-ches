<?php
$dsn="mysql:host=localhost;dbname=solicode";
$user_name="root";
$pass="";
$msg="";
if(isset($_POST["insert"])){
    try{
        $conn=new PDO($dsn,$user_name,$pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
        $numberid=$_POST["v1"];
        $sql="SELECT id FROM students ORDER BY id DESC LIMIT $numberid";
        $lastid=$conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach($lastid as $el){
            echo $el['id']."<br>";
        }
        $msg="<p>this is the last $numberid id </p>";
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
    <?php echo $msg ;?>
    <form action="" method="post">
        <input type="number" name="v1" placeholder="numbers of id">   
        <button name="insert">GET ID</button>    
    </form>
    
    
</body>
</html>