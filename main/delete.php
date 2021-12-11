<!--NOS PERMITE OBTENER LA INFORMACIÓN Y ELIMINACIÓN EN LA BASE DE DATOS, APLICA PARA ELIMINACIÓN DE REGISTROS--->

<?php
    session_start();
    require_once "../Database/Database.php"; // validamos la conexión de los datos
    if ($_SESSION['username'] == null){
        echo "<script>alert('Favor ingresar con tus credenciales')</script>";
        header("Refresh:0 , url = ../index.html");
        exit();
    }

    $delete_num = $_GET['id'];
    $sql_delete =  "DELETE FROM product WHERE id = '$delete_num'"; // traemos la variable id del registro y la eliminamos 
    $query_delete = mysqli_query($conn,$sql_delete);

    if(!$row){
        echo "<script>alert('Eliminación de Producto Exitosa')</script>";        
        header("Refresh: 0 , url = ../list.php");
        exit();
    }
    else{
        echo "<script>alert('No se pudo eliminar producto')</script>";
        header("Refresh: 0 , url = ../list.php");
        exit();
    }
    mysqli_close($conn);
?>