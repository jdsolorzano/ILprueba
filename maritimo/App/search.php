<?php
    $host = 'localhost';
    $bd = 'ingelogi';
    $user = 'root';
    $password = '';

    $connection = new mysqli($host, $user, $password, $bd);
    if($connection -> connect_errno)
    {
        die("Fallo la conexion:(".$connection -> msqli_connect_errno().")".$connection-> msqli_connect_error());
    }

    $table1="";
    $query="SELECT * FROM productm ORDER BY idM";

    if(isset($_POST['productm']))
    {
        $q=$connection->real_escape_string($_POST['productm']);
        $query="SELECT * FROM productm WHERE
        idM LIKE '%" .$q. "%' OR
        productTypeM LIKE '%" .$q. "%' OR
        amountM LIKE '%" .$q. "%' OR
        deliveryTimeM LIKE '%" .$q. "%' OR
        storageM LIKE '%" .$q. "%' OR
        shippingPriceM LIKE '%" .$q. "%' OR
        carRegistrationM LIKE '%" .$q. "%' OR
        numberGuideM LIKE '%" .$q. "%' OR
        timeRegistrationM LIKE '%" .$q. "%'";
    }
    $searchProduct=$connection->query($query);
    if($searchProduct->num_rows >0)
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

        while($productRow= $searchProduct->fetch_assoc())
        {
            $table1.=
            '<tr>
                <td>'.$productRow['idM'].'</td>
                <td>'.$productRow['productTypeM'].'</td>
                <td>'.$productRow['amountM'].'</td>
                <td>'.$productRow['timeRegistrationM'].'</td>
                <td>'.$productRow['deliveryTimeM'].'</td>
                <td>'.$productRow['storageM'].'</td>
                <td>'.$productRow['shippingPriceM'].'</td>
                <td>'.$productRow['priceDiscountM'].'</td>
                <td>'.$productRow['carRegistrationM'].'</td>
                <td>'.$productRow['numberGuideM'].'</td>
                <td>'.$productRow['clientM'].'</td>
                <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?id='.$productRow['idM'].' &message='.$productRow['productTypeM'].'&storage='.$productRow['storageM'].
                '&shippingPrice='.$productRow['shippingPriceM'].'&carRegistration='.$productRow['carRegistrationM'].'&amount='.$productRow['amountM'].'" role="button">
                                    Editar
                                </a></td>
                <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?id='.$productRow['idM'].'" role="button">
                                    Eliminar
                                </a></td>
            </tr>
            ';
        }
        $table1.='</table>';
    } 
    else
    {
        $table1="No se encontró nada";
    }
    echo $table1;
?>
<br>
<a name="addproduct" id="addproduct" class="Addlist" style="float:right" href="../maritimo/addlist.php" role="button">Agregar Producto</a>
