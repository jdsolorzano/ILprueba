<?php // generamos la conexión a la base de datos, si no conecta nos mostrará el error
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "ingelogi";
    $conn = new mysqli($host , $user, $password, $db);
    mysqli_query($conn , "SET character_set_result=utf8");
    if($conn->connect_error){
        die("Database Error : " . $conn->connect_error);
    }
?>