// SE REPRESENTA LA FORMA EN LA QUE REALIZAREMOS EL JAVASCRIPT PARA LA BÚSQUEDA

$(get_logs()); // Forma abreviada del document 

function get_logs(product) //Se crea la función a la cual obtenemos registro
{
    $.ajax({   // estructura inicial de ajax
        url : 'App/search.php', // fichero al que realizamos la petición
        type : 'POST',  // forma de procesar de datos
        dataType : 'html',  // tipo de fichero que esperamos comunicarnos
        data : { product: product }, // datos que vamos a procesar
    })

    .done(function(result){     // si nuestra función se cumple : 
        $("#table_result").html(result); // Mostrará la tabla 
    })
}

$(document).on('keyup', '#search', function() // procesar lo que se encuentra o no en la caja 
{
    var searchValue=$(this).val(); // obtenemos el valor que escribío la persona en la búsqueda
    if(searchValue!="")  // Si el valor es diferente a vacío, mostraremos la variable búsqueda
    {
        get_logs(searchValue);
    }
    else
    {
        get_logs();
    }
});