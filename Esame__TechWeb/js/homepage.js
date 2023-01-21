var type;
$(function () {
    //PULISCE E AL SUCCESSO STAMPA IL DIV CONTENENTE I PRODOTTI-->questa funzione si
    //attiva al click sul menu a tendina della sezione "Ambienti". In base al data-value ricavato
    //dlla voce html del menu,invia una richiesta di dati in json al fie getProductCart. Una volta ricevute
    //queste informazioni (success) passa alla funzione printObject a riga 112.

    $('.dropdown-menu a').click(function () {
        $('#card-section').empty();
        type = $(this).attr("data-value");

        $.ajax({
            url: '../dataManagement/getProduct.php',
            type: 'GET',
            datatype: 'json',
            success: printObject,
            complete: function () {

                var aTag = $("#scroolDown");
                $('html,body').animate({ scrollTop: aTag.offset().top}, 'fast');
            }
        });
    });


    //inserisce i prodotti nel carrello-->viene selezionato l'id #cart che a riga 136 viene
    //assegnato al bottone di aggiunta dei prodotti al carrello. In questa riga viene salvato anche il
    //valore dell'id del prodotto che viene aggiunto al carrello. In questo modo, si passa
    //questo valore a insertShoppingCart.php che recupera le informazioni del prodotto dal db.
    $('#card-section').on('click', '#cart', function () {
        //var titolo = $(this).parents("div").closest().text();
        id = $(this).attr("data-value");
        $.ajax({
            url: "../dataManagement/insertShoppingCart.php",
            type: "GET",
            data: { id: id },
            //datatype: 'json',
            success: function () {
                $(".badge").load(" .badge");
                $(".badge").addClass('bounce');
                setTimeout(function () {
                    $(".badge").removeClass('bounce');
                }, 2000);
            }
        });
    });
//controllo che al click sul button per eliminare un prodotto dal db richiama la funzione presente
//in deleteProductAdmin, passando come parametro l'id del record da eliminare
    $('#card-section').on('click', '#delete', function () {
        id = $(this).attr("data-value");

        $.ajax({
            url: "../dataManagement/deleteProductAdmin.php",
            type: "GET",
            data: { id: id },
            //datatype: 'json',
            success: reloadObject
        });
    });

    $('#addBtn').click(function () {
        var name = $('#add-name').val();
        var price = $('#add-price').val();
        var type = $('#inputGroupSelect01').val();

        $.ajax({
            url: "../dataManagement/addProductAdmin.php",
            type: "POST",
            data: { name: name, price: price, type: type },
            datatype: 'json',
            success: function () {
                $('#addProductModal').modal("hide");
                reloadObject();

            }
        });

    });
    //FAR CHIUDERE LA NAVBAR QUANDO È COLLAPSE
    $('.navbar-collapse a:not(#navbarDropdownMenuLink)').click(function () {
        $(".navbar-collapse").collapse('hide');
    });

    //HREF DEI LINK NELLA NAVBAR
    $('#home').click(function () {
        $(window.location).attr('href', 'homepage.php');
    });

    $('#logout').click(function () {
        $(window.location).attr('href', '../dataManagement/logout.php');
    });

    $('#carrello').click(function () {
        console.log("ok");
        $(window.location).attr('href', 'carrello.php');
    });
    $('#about').click(function () {
        console.log("ok");
        $(window.location).attr('href', 'about.php');
    });


});

function reloadObject() {
    $.ajax({
        url: '../dataManagement/getProduct.php',
        type: 'GET',
        datatype: 'json',
        success: printObject
    });
}

//STAMPA DEI PRODOTTI
function printObject(json) {

    $('#card-section').empty();
    json.mobili.forEach(function (item) {
        if (item.type == type || type == "manage") {
            var divCol = $('<div></div>');
            divCol.addClass('col-sm-12 col-md-4 col-lg-3');

            //DIV CARD
            var img = $('<img src="" class="card-img-top" alt="">');
            img.attr("src", "../image/" + item.name.toLowerCase().replace(/ /g, '') + ".jpg");
            var price = $('<a id="price" class="btn cart-btn"></a>');
            price.text("€" + item.price);
            var divCard = $('<div></div>');
            divCard.addClass('card');
            divCard.append(img, price);

            //DIV CARD BODY
            var h5 = $('<h5 class="card-title"></h5>');
            h5.text(item.name);
            var p = $('<p class="card-text"></p>');
            if (type == "manage") {
                var cart = $('<a id="delete"' + 'data-value="' + item.id + '" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>');
            } else {
                var cart = $('<a id="cart"' + 'data-value="' + item.id + '" class="btn btn-primary"><i class="fa fa-cart-plus"></i>Aggiungi al carrello</a>');
            }

            var divCardBody = $('<div></div>');
            divCardBody.addClass('card-body');

            divCardBody.append(h5, p, cart);

            divCard.append(divCardBody);
            divCol.append(divCard);

            $('#card-section').append(divCol);
        }

    });

    //CARD PER L'AGGIUNTA DI UN PRODOTTO
    if (type == "manage") {
        var divCol = $('<div></div>');
        divCol.addClass('col-sm-12 col-md-4 col-lg-3');

        //DIV CARD
        var img = $('<img src="" class="card-img-top" alt="">');
        img.attr("src", "../image/white.jpeg");
        var divCard = $('<div></div>');
        divCard.addClass('card');
        divCard.append(img);

        //DIV CARD BODY
        var p1 = $('<p></p>');
        var h5 = $('<h5 class="card-title"></h5>');
        h5.text("Add Product");
        var p = $('<p class="card-text"></p>');
        var cart = $('<a id="add" data-bs-toggle="modal" data-bs-target="#addProductModal" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>');

        var divCardBody = $('<div></div>');
        divCardBody.addClass('card-body');

        divCardBody.append(p1, h5, p, cart);

        divCard.append(divCardBody);
        divCol.append(divCard);

        $('#card-section').append(divCol);
    }


}
