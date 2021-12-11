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

<!doctype html>
<html lang="en">
<head>
    <title>Ingeneo - Terrestre</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>            
    <script src="js/main.js"></script>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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
            margin-top: -40px;
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
        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;
        }
        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }
        table {
            width: 100%;
        }
        th {
            color: white;
            background-color: #298dba;
        }
        tr {
            background-color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .timeregis {
            text-align: center;
        }
        .modify {
            text-align: center;
        }
        .delete {
            text-align: center;
        }
        .modify .bfix {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .modify .bfix:hover {
            background-color: #fdb515;
            color: white;
        }
        .delete .bdelete {
            border-radius: 15px;
            background-color: #e60000;
            text-decoration: none;
            color: white;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .delete .bdelete:hover {
            background-color: #D9ddd4;
            color: red;
        }
        .Addlist {
            margin-right: 100px;
            padding: 5px 30px 5px 30px;
            border-radius: 15px;
            text-decoration: none;
            color: white;
            background-color: #00A600;
            transition: 0.5s;
        }
        .Addlist:hover {
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="imagenindex.png" height="80px" width="200px">
        <h2><?php echo $str = strtoupper($username) ?></h2>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Lista de Productos - Zona terrestre</h1>
    </div>
    <div class="table-product">
    </div>
    <?php
        mysqli_close($conn);
    ?>
    <section>
        <input type="text" name="search" id="search" placeholder="Buscar">
    </section>
    <br>
    <section id="table_result">
    </section>
</body>
</html>