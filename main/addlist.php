<!--NOS PERMITE OBTENER LA INFORMACIÓN Y REGISTRARLA EN LA BASE DE DATOS, APLICA PARA CREACIÓN DE REGISTROS DE PRODUCTOS--->

<?php
    session_start();
    require_once "../Database/Database.php"; // validamos la conexión de los datos
    if($_SESSION['username'] == null){
        echo "<script>alert('Por favor ingrese los datos.')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    }

    if($_POST['amount'] > 10){ 
        $discount = (($_POST['shippingPrice']*5)/100); // realizamos la verificación de si la cantidad es mayor que 10 genere un descuento
    }
    else
    {
        $discount = 0;
    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO product (productType,amount,deliveryTime,storage,shippingPrice,priceDiscount,carRegistration,numberGuide,client) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "',
        '". trim($_POST['deliveryTime'])."', '". trim($_POST['storage']). "', '". trim($_POST['shippingPrice']). "', '".$discount. "','". trim($_POST['carRegistration']). "', 
        '". trim($_POST['numberGuide']). "','". trim($_POST['client']). "')";

        if($conn->query($sql)){ // anteriormente registramos los datos a la base de datos y después validamos si todo se encuentra bien en cuanto a la coenxión de datos
            echo "<script>alert('Producto agregado correctamente')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();
        }
        else{
            echo "<script>alert('Producto no se pudo registrar.')</script>";
            header("Refresh:0 , url = ../list.php");
            exit();
        }
    }
    else{
        echo "<script>alert('Por favor ingresa alguna información.')</script>";
        header("Refresh:0 , url = ../addlist.php");
        exit();
    }
    mysqli_close($conn);
?>