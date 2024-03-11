
$(document).ready(init);


function init() {

    $('#tableEmployees').DataTable();

    $('#cargar').click(function(){
        $.getJSON("http://127.0.0.1:8000/api/products", function (data) {
            //console.table(data);
            $.each(data, function(index, item){
                $("#tabla tbody:last-child").append(
                `<tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.sale_price}</td>
                    <td>${item.quantity}</td>
                    <td>${item.category.name}</td>
                </tr>`
                );
            });
            //https://datatables.net/
            let table = new DataTable('#tabla');
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error: " + textStatus, errorThrown);
        });
    });

    $('#opciones').change(function() {
        let category = $(this).val();
        tblProducts.ajax.url('/api/products_dt?category='+category).load();
    })

    let tblProducts= new DataTable('#tablaDt', {
        ajax: '/api/products_dt',
        columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'sale_price' },
            { data: 'quantity' },
            { data: 'category.name' }
        ]
    });


}



/*
function init (){
    $('#cargar').click(function(){
        $.get('/api/products')
        .done(function (data) {
            var tabla= $('#tabla tbody');
            $.each(data, function (index, item){
                tabla.append(
                `<tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.sale_price}</td>
                    <td>${item.quantity}</td>
                </tr>`
                );
            });
        })
        .fail(function (error) {
            console.error('Hubo un problema con la solicitud AJAX:', error);
        });
    });
}*/