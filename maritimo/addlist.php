<?php  // Se realizan las validaciones 
    session_start();
    require_once "../Database/Database.php";
    if ($_SESSION['username'] == null) {
        echo "<script>alert('Por favor ingrese los datos.');</script>";
        header("Refresh:0 , url=index.html");
    }
    $username = $_SESSION['username'];
    $sql_fetch_todos = "SELECT * FROM product ORDER BY id ASC";
    $query = mysqli_query($conn, $sql_fetch_todos);
?>
<!doctype html>
<html lang="en"> 
<head>
    <title>Agregar Producto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../faviconconfiguroweb.png">
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
        .form-group {
            margin-left: 600px;
        }
        [type=text], [type=number] {
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: transparent;
            padding: 7px 200px 7px 5px;
        }
        .return {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;

        }
        .return:hover {
            background-color: #fdb515;
            color: white;
        }
        .modify {
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
        .modify:hover {
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="../imagenindex.png" height="80px" width="200px">
        <h2><?php echo $str = strtoupper($username) ?></h2>
        <a name="" id="" class="button-logout" href="../logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Agregar Producto</h1>
    </div>
    <div class="table-product">
        <br>
        <div class="addproduct">
            <form method="POST" action="main/addlist.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nombre de Producto</label>
                    <br>
                    <select name="name" required>
                        <option disabled selected="">Selección un tipo de producto</option>
                        <option>Contenedor</option>
                        <option>Grande</option>
                        <option>Mediano</option>
                        <option>Liviano</option>
                        <option>Delicado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Cantidad</label>
                    <br>
                    <input type="number" class="form-control" name="amount" required> </div> <br>
                <div class="form-group">
                    
                    <label for="exampleInputEmail1">Fecha de entrega</label>
                    <br>
                    <input type="date" name="deliveryTime" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Puerto</label>
                    <br>
                    <select name="storage" required>
                        <option disabled selected="">Seleccione puerto</option>
                        <option>Santa Marta</option>
                        <option>Cartagena</option>
                        <option>San Andres</option>
                        <option>Barranquilla</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Precio de envío</label>
                    <br>
                    <input type="number" class="form-control" name="shippingPrice" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Número de flota</label>
                    <br>
                    <input type="text" class="form-control" name="carRegistration" minlength="7" maxlength="7" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Número de guía</label>
                    <br>
                    <input type="text" class="form-control" name="numberGuide" maxlength="10"required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Cliente</label>
                    <br>
                    <input type="text" class="form-control" name="client" maxlength="30"required>
                </div>
                <div class="form-button">
                    <button type="submit" class="modify" style="float:right">Agregar Producto</button>
                    <a name="" id="" class="return" href="list.php" role="button" style="float:left">Volver</a>
                </div>
            </form>
        </div>
    </div>
    <?php
        mysqli_close($conn);
    ?>
</body>
</html>