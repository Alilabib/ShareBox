 <?php
    $host = DB_HOST;
    $dbms = DBMS   ;
    $user = DB_USER;
    $pass = DB_PASS;
    $db   = DB_NAME;

 
try{
    $conn = new PDO("$dbms:host=$host;dbname=$db",$user,$pass,
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::ATTR_PERSISTENT=> false)
    );
}
catch(PDOException $e){
    echo"Not Connected :" . $e->getMessage();
}
?>