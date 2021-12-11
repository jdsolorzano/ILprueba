<?php
    session_start();
    require_once "Database/Database.php";
    if ($_SESSION['username'] == null) {
        echo "<script>alert('Por favor ingrese los datos.');</script>";
        header("Refresh:0 , url=index.html");
        exit();
    }
    $username = $_SESSION['username'];
    $sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
    $query = mysqli_query($conn, $sql_fetch_todos);
    $row = mysqli_fetch_array($query)
?>
<!doctype html>
<html lang="en">
<head>
    <title>Editar Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="faviconconfiguroweb.png">
    <link href="https://fonts.googleapis.com/css2?family=Mitr&display=swap" rel="stylesheet">
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
        .form-group{
            margin-left: 600px;
        }
        [type=text]{
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: transparent;
            padding: 7px 200px 7px 5px;
        }
        .return{
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;
        }
        .return:hover{
            background-color: #fdb515;
            color: white;
        }
        .modify{
            border-radius: 15px;
            border: transparent;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #00A600;
            font-family: "Mitr", sans-serif;
            transition: 0.5s;
        }
        .modify:hover{
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
        <h1>Editar producto</h1>
        <h2>Estás interactuando como: <?php echo $str = strtoupper($username) ?></h2>
    </div>
    <div class="fixproduct">
        <form method="POST" action="main/fix.php">
            <div class="form-group">
                <label for="exampleInputEmail1">Tipo de producto</label>
                <br>
                <input type="text" class="form-control" name="name" value="<?php echo $_GET['message']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Cantidad</label>
                <br>
                <input type="number" value="<?php echo $_GET['amount'] ?>" class="form-control" name="value" required>
                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" />
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Bodega de entrega</label>
                <br>
                <input type="text" class="form-control" name="storage" value="<?php echo $_GET['storage']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Precio</label>
                <br>
                <input type="number" class="form-control" name="shippingPrice" value="<?php echo $_GET['shippingPrice']; ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Placa de vehículo</label>
                <br>
                
                <input type="text" class="form-control" name="carRegistration" value="<?php echo $_GET['carRegistration']; ?>" required>
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Editar</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
            </div>
        </form>
    </div>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>