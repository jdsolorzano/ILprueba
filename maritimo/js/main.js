$(get_logs());

function get_logs(productm)
{
    $.ajax({
        url : 'App/search.php',
        type : 'POST',
        dataType : 'html',
        data : { productm: productm },
    })

    .done(function(result){
        $("#table_result").html(result);
    })
}

$(document).on('keyup', '#search', function()
{
    var searchValue=$(this).val();
    if(searchValue!="")
    {
        get_logs(searchValue);
    }
    else
    {
        get_logs();
    }
});