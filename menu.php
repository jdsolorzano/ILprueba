<?php
    session_start();
    require_once "Database/Database.php";
    if ($_SESSION['username'] == null) {
        echo "<script>alert('Por favor ingrese nuevamente.');</script>";
        header("Refresh:0 , url=index.html");
        exit();
    }

    $username = $_SESSION['username'];
    $sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
    $query = mysqli_query($conn, $sql_fetch_todos);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ffffff;
        }
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: #EEEEEE;
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        .header h2 {
            margin-right: 200px;
            margin-top: -60px;
            text-align: right;
            color: black; 
            font-size:  12px;
        }
        .button-logout {
            position: relative;
            margin-top: 10px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            background-color: #e60000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .content{
            width: 100%;
            margin: 0 auto;
            background-color: white;
            border-radius: 30px;
            border: transparent;
            text-align: center;
            margin-top: 150px;
            padding-top: 5px;
            padding-bottom: 20px;
        }
        .content label{
            margin-right: 200px;
        }

        .content img{
            margin-top:-300px;
            margin-left:-300px;
        }
        
        input[type="submit"] {
            border-collapse: collapse;
            border: transparent;
            color: white;
            margin: 15px auto;
            padding: 5px 50px 5px 50px;
            background-color: #fd7e1b;
            transition: 0.5s;
        }
        input[type="submit"]:hover {
            color: rgb(255, 255, 255);
            background-color: #298dba;
        }
        .regis{
            text-decoration: none;
            font-size: 30px;
            border-collapse: collapse;
            border: transparent;
            color: rgb(255, 255, 255);
            margin: 15px;
            padding: 5px 50px 5px 50px;
            background-color: #fd7e1b;
            transition: 0.5s;
        }
        .regis:hover{
            text-decoration: none;
            color: white;
            background-color: #298dba;
        }
        .footer{
            position:absolute;
            left: 0px;
            right: 0px;
            bottom: 0px;
            width: 100%;
            height: 50px;
            color: white;
            font-family: "Mitr", sans-serif;
            padding-top: 5px;
            padding-bottom: 5px;
            background-color: #3BA92E;
        }
        .footer p{
            text-align: center;
            margin-right: 50px;
            position:relative;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="imagenindex.png" height="80px" width="200px">
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class = "content">
        <a href="list.php" class="regis">Terrestre</a>
        <a href="maritimo/list.php" class="regis">Maritimo</a>
    </div>
    <div class="footer">
        <p>© 2021 Todos los derechos reservados, Ingeneo SAS</p>
    </div>
</body>
</html>