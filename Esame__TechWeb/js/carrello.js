
    //apre voci di menu
    $('#home').click(function () {
       window.location = '../pagine/homepage.php';
    });

$(function () {
    //STAMPA IL CARELLO
    reloadCart();

    //pulisce la carta
    $('#clearCart').click(function () {
        var msg = "Carrello svuotato con successo!";
        $.ajax({
            url: '../dataManagement/clearCart.php',
            type: 'GET',
            data: {"msg" : msg},
            success: function(){
                $("#tableDiv").load(" #tableDiv");
                $(".table").load(" .table");
                $('#clearCart, #checkout').addClass('disabled');
            }
        });
    });

    //elimina un prodotto
    $('.col').on('click', '#deleteProduct', function () {
        var msg = "Prodotto cancellato con successo!";
        var id = $(this).attr("data-value");
        $('.table').empty();
        //$(this).closest('tr').remove();
        $.ajax({
            url: '../dataManagement/deleteProduct.php',
            type: 'GET',
            data: {"msg" : msg, "id": id},
            success: reloadCart,
            complete: function(){
                $("#tableDiv").load(" #tableDiv");
            }
        });
    });

    //compra quello che c'è nel carrello
    $("#checkout").click(function(){
        $(this).html("<div class='loader'></div>");
        setTimeout(() =>{
            $(this).html("Purchased <i class='fa fa-check'></i>");
            $(this).css("color", "white");
            $(this).css("pointer-events", "none");
        }, 2000);
        var msg = "Prodotto acquistato con successo!";
        setTimeout(loadXML, 2300);
        function loadXML(){
            $.ajax({
                url: '../dataManagement/checkout.php',
                type: 'GET',
                data: {"msg" : msg},
                success: function(){
                    $("#tableDiv").load(" #tableDiv");
                    $(".table").load(" .table");
                    $('#clearCart, #checkout').addClass('disabled');
                }

            });
        }

    });


});

function reloadCart(){
    $.ajax({
        url: '../dataManagement/getProductCart.php',
        type: 'GET',
        datatype: 'json',
        success: printCart,
        error: printEmptyCart
    });
}


function printEmptyCart() {
    var thead = $('<thead></thead>')
    var th = $('<th></th><th>Nome</th><th>Prezzo</th><th>Totale</th>');
    var tbody = $('<tbody></tbody>');

    thead.append(th);
    $('.table').append(thead);
    $('.table').append(tbody);
    var tr = $('<tr></tr>');
    var td = $('<td colspan="4" class="text-center">No Item in Cart</td>');

    tr.append(td);
    tbody.append(tr);
    $('#clearCart, #checkout').addClass('disabled');
}

function printCart(json) {
    var total = 0;
    var thead = $('<thead></thead>')
    var th = $('<th></th><th>Nome</th><th>Prezzo</th><th>Totale</th>');
    var tbody = $('<tbody></tbody>');

    thead.append(th);
    $('.table').append(thead);
    json.carrello.forEach(function (item) {
        total += parseFloat(item.price);
        var tr = $('<tr></tr>');
        var tdName = $('<td></td>');
        var tdDelete = $('<td><a id="deleteProduct" data-value="'+item.id+'" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a></td>');
        var tdPrice = $('<td id="price"></td>');

        tdName.text(item.name);
        tdPrice.text("€" + item.price);


        tr.append(tdDelete);
        tr.append(tdName);
        tr.append(tdPrice);
        tbody.append(tr);
        $('.table').append(tbody);

    });
    var trCol = $('<tr></tr>');
    tbody.append(trCol);

    var tdTotal = $('<td colspan="3" align="right"></td>')
    var tdTotalN = $('<td id="total"><b></b></td>');
    tdTotalN.text("€" + total.toFixed(2));
    trCol.append(tdTotal);
    trCol.append(tdTotalN);
}
