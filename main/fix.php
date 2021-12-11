<!--NOS PERMITE OBTENER LA INFORMACIÓN Y ACTUALIZARLA EN LA BASE DE DATOS, APLICA PARA GESTIÓN DE PRODUCTOS--->

<?php
    session_start();
    require_once "../Database/Database.php"; // validamos la conexión de los datos
    if($_SESSION['username'] == null){
        echo "<script>alert('Por favor ingrese los datos.')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    }

    if($_POST['value'] > 10){ 
        $discount = (($_POST['shippingPrice']*5)/100); // realiza verificaciones de si la cantidad es > 0 generará un descuento 
    }
    else
    {
        $discount = 0;
    }

    if($_POST['name'] != null && $_POST['value'] != null){
        $sql = "UPDATE product SET productType = '" . trim($_POST['name']) . "' ,amount = '" . trim($_POST['value']) . "',storage = '" . trim($_POST['storage']) . "',
        shippingPrice = '" . trim($_POST['shippingPrice']) . "',priceDiscount = '" .$discount. "',carRegistration = '" . trim($_POST['carRegistration']) . "' WHERE id = '" . $_POST['id'] . "'";
        if($conn->query($sql)){ // se ingresan los datos a la bd
            echo "<script>alert('Proceso completado exitósamente')</script>";
            header("Refresh:0 , url =../list.php");
            exit();

        }
        else{
            echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
            header("Refresh:0 , url =../list.php");
            exit();
        }
    }
    else{
        echo "<script>alert('Por favor diligencia todos los campos')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();
    }
    mysqli_close($conn);
?>
