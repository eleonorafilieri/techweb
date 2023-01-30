
    //funzione che permette l'apertura delle voci di menu
$(function () {
    $('#home').click(function () {
        $(window.location).attr('href', 'homepage.php');
    });

    $('#about').click(function () {
        console.log("ok");
        $(window.location).attr('href', 'about.php');
    });
    $('#logout').click(function () {
        $(window.location).attr('href', '../dataManagement/logout.php');
    });

     //FAR CHIUDERE LA NAVBAR QUANDO È COLLAPSE
     $('.navbar-collapse a:not(#navbarDropdownMenuLink)').click(function () {
        $(".navbar-collapse").collapse('hide');
    });
});

$(function () {
    //questa funzione si trova in basso a riga 87
    reloadCart();

    //svuota il carrrello-->al click sul button presente nella pagina carrello.php viene richiamato il
    //file clearCart.php, il quale distrugge la variabile cart con la funzione unset. a questo file viene
    //passato anche il messaggio che verrà poi visualizzato nel carrello.
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
                $(".badge").addClass("svuota_carrello");
            }
        });
    });

    //elimina un prodotto-->al click sul button presente nella pagina carrello.php viene richiamato il
    //file deleteProduct.php, il quale rimuove il prodotto nela variabile di sessione cart. a questo file
    //viene passato sia il messaggio che verrà poi visualizzato nel carrello, sia l'id del
    //prodotto da eliminare
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

    //compra quello che c'è nel carrello-->viene richiamato il file checkout.php che semplicemente distrugge
    //la variabile di sessione cart. In questo caso la funzione mostra semplicemente un messaggio di avvenuto
    //acquisto all'utente
    $("#checkout").click(function(){
        $(this).html("<div class='loader'></div>");
        setTimeout(() =>{
            $(this).html("Acquisto completato! <i class='fa fa-check'></i>");
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
//questa funzione si attiva subito all'apertura della pagina del carrello;
//infatti viene richiamata all'inizio di questo file. Semplicemente invia una richiesta ajax al file
//getProductCart.php per ottenere le informazioni dei prodotti da mostrare.
function reloadCart(){
    $.ajax({
        url: '../dataManagement/getProductCart.php',
        type: 'GET',
        datatype: 'json',
        success: printCart,
        error: printEmptyCart
    });
}

//stampa dei prodotti nel carrello qualora questo sia vuoto
function printEmptyCart() {
    var thead = $('<thead></thead>')
    var th = $('<th></th><th>Nome</th><th>Prezzo</th><th>Totale</th>');
    var tbody = $('<tbody></tbody>');

    thead.append(th);
    $('.table').append(thead);
    $('.table').append(tbody);
    var tr = $('<tr></tr>');
    var td = $('<td colspan="4" class="text-center">Carrello Vuoto!</td>');

    tr.append(td);
    tbody.append(tr);
    $('#clearCart, #checkout').addClass('disabled');
}
//stampa dei prodotti nel carrello qualora questo sia pieno-->i dati che vengono passati a questa funzione
//sono di tipo json e vengono recuperati dalla funzione reloadCart a riga 96,
//che a sua volta lo recupera dal file getProductCart.php
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
