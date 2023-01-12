var type;
$(function () {
    //PULISCE E AL SUCCESSO STAMPA IL DIV CONTENENTE I PRODOTTI
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


    //È UNA PAGINA DINAMICA QUINDI DELEGO LA FUNZIONE A CARD-SECTION
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

    $('#card-section').on('click', '#delete', function () {
        //var titolo = $(this).parents("div").closest().text();
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

    //TODO: NON FUNZIONAAAAAA AAAAAAAA
    $('#add').click(function () {
        $('#add-name').val('');
        $('#add-price').val('');
    });

    /*
    //CAMBIO COLORE DEL CARRELLO MOUSE-HOVER
    $('#carrello').on('mouseover', function () {
        $("#shoppingCart").attr("src", "../image/cartHover.png");
        $(".badge").css("color", "red");
    });
    $('#carrello').on('mouseout', function () {
        $("#shoppingCart").attr("src", "../image/cart.png");
        $(".badge").css("color", "white");
    });
    */

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
