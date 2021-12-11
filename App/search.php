<?php 
    $host = 'localhost';  // Se realiza la conexión a la base de datos..
    $bd = 'ingelogi';
    $user = 'root';
    $password = '';

    $connection = new mysqli($host, $user, $password, $bd);
    if($connection -> connect_errno)
    {
        die("Fallo la conexion:(".$connection -> msqli_connect_errno().")".$connection-> msqli_connect_error());
    }

    // tenemos los valores iniciales

    $table1="";
    $query="SELECT * FROM product ORDER BY id";  // Se selecciona la base de datos que deseamos obtener los resultados

    if(isset($_POST['product']))   // lo que ocurre cuando tecleamos en el selector de búsqueda
    {
        $q=$connection->real_escape_string($_POST['product']);  // Obtenemos la información 
        $query="SELECT * FROM product WHERE
        id LIKE '%" .$q. "%' OR
        productType LIKE '%" .$q. "%' OR
        amount LIKE '%" .$q. "%' OR
        deliveryTime LIKE '%" .$q. "%' OR
        storage LIKE '%" .$q. "%' OR
        shippingPrice LIKE '%" .$q. "%' OR       
        carRegistration LIKE '%" .$q. "%' OR
        numberGuide LIKE '%" .$q. "%' OR
        timeRegistration LIKE '%" .$q. "%'";
    }

    $searchProduct=$connection->query($query);
    if($searchProduct->num_rows >0) // Mostrará la información de la tabla si existe un registro
    {
        $table1.=
        '<table class="table">   
            <tr class="bg-primary">
                <td>ID</td>
                <td>Tipo de producto</td>
                <td>Cantidad de producto</td>
                <td>Fecha registro</td>
                <td>Fecha entrega</td>
                <td>Bodega de entrega</td>
                <td>Precio de envío</td>
                <td>Precio descuento</td>
                <td>Placa vehículo</td>
                <td>Número de guía</td>
                <td>Cliente</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>';

        while($productRow= $searchProduct->fetch_assoc()) // mostramos la información en sus respectivos encabezados
        {
            $table1.=
            '<tr>
                <td>'.$productRow['id'].'</td>
                <td>'.$productRow['productType'].'</td>
                <td>'.$productRow['amount'].'</td>
                <td>'.$productRow['timeRegistration'].'</td>
                <td>'.$productRow['deliveryTime'].'</td>
                <td>'.$productRow['storage'].'</td>
                <td>'.$productRow['shippingPrice'].'</td>
                <td>'.$productRow['priceDiscount'].'</td>
                <td>'.$productRow['carRegistration'].'</td>
                <td>'.$productRow['numberGuide'].'</td>
                <td>'.$productRow['client'].'</td>
                <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id='.$productRow['id'].' &message='.$productRow['productType'].'&storage='.$productRow['storage'].
                '&shippingPrice='.$productRow['shippingPrice'].'&carRegistration='.$productRow['carRegistration'].'&amount='.$productRow['amount'].'" role="button">
                                    Editar
                                </a></td>
                <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id='.$productRow['id'].'" role="button">
                                    Eliminar
                                </a></td>
            </tr>
            ';
        }
        $table1.='</table>'; // añadimos el cierre de la etiqueta
    } 
    else
    {
            $table1="No se encuentran resultados."; // si no existen coincidencias muestra el mensaje de que no hay resultados
    }
        echo $table1; // imprimimos la variable tabla
?>
<br>
<a name="addproduct" id="addproduct" class="Addlist" style="float:right" href="addlist.php" role="button">Agregar Producto</a> <!--Botón que nos permitirá agregar un nuevo registro-->