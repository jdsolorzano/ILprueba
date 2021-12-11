<?php
    session_start();
    require_once "../../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Por favor ingrese los datos.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }

    if($_POST['value'] > 10){ 
        $discount = (($_POST['shippingPrice']*3)/100);
    }
    else
    {
        $discount = 0;
    }

    if($_POST['name'] != null && $_POST['value'] != null){
        $sql = "UPDATE productm SET productTypeM = '" . trim($_POST['name']) . "' ,amountM = '" . trim($_POST['value']) . "',storageM = '" . trim($_POST['storage']) . "',
        shippingPriceM = '" . trim($_POST['shippingPrice']) . "',priceDiscountM = '" .$discount. "',carRegistrationM = '" . trim($_POST['carRegistration']) . "' WHERE idM = '" . $_POST['id'] . "'";
        if($conn->query($sql)){
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
