<?php
    session_start();
    require_once "../../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Por favor ingrese los datos.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }

    if($_POST['amount'] > 10){ 
        $discount = (($_POST['shippingPrice']*3)/100);
    }
    else
    {
        $discount = 0;
    }

    if($_POST['name'] != null && $_POST['amount'] != null ){
        $sql = "INSERT INTO productM (productTypeM,amountM,deliveryTimeM,storageM,shippingPriceM,priceDiscountM,carRegistrationM,numberGuideM,clientM) VALUES ('". trim($_POST['name']). "','". trim($_POST['amount']). "',
        '". trim($_POST['deliveryTime'])."', '". trim($_POST['storage']). "', '". trim($_POST['shippingPrice']). "', '".$discount. "','". trim($_POST['carRegistration']). "', 
        '". trim($_POST['numberGuide']). "','". trim($_POST['client']). "')";

        if($conn->query($sql)){
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