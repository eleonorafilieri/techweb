$(function () {

    //Espressione regolare per l'email
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    //Funzione per aggiungere la classe valid/invalid al campo email
    function checkEmail(thisInput) {
        var check_email = thisInput.val();
        if (isEmail(check_email)) {
            thisInput.removeClass("is-invalid").addClass("is-valid");
        } else if (check_email == "") {
            thisInput.removeClass("is-invalid").removeClass("is-valid");
        } else {
            thisInput.addClass("is-invalid").removeClass("is-valid");
        }
    }

    //Funzione per controllare e aggiungere le varie classi per la sicurezza della password
    //lowercase, uppercase, number e lunghezza maggiore di 8
    function strengthPass(thisInput, idInput) {
        var check_password = thisInput.val();
        var lowerCaseLetters = /[a-z]/g;
        var upperCaseLetters = /[A-Z]/g;
        var numbers = /[0-9]/g;
        var check_match = [false, false, false, false];
        check_password.match(lowerCaseLetters) ? check_match[0] = true : false;
        check_password.match(upperCaseLetters) ? check_match[1] = true : false;
        check_password.match(numbers) ? check_match[2] = true : false;
        check_password.length >= 8 ? check_match[3] = true : false;

        var count_check_match = check_match.filter(Boolean).length;
        switch (count_check_match) {
            case 1:
                thisInput.removeClass().addClass("form-control password-veryweak");
                $(idInput).text("Very weak");
                break;
            case 2:
                thisInput.removeClass().addClass("form-control password-weak");
                $(idInput).text("Weak");
                break;
            case 3:
                thisInput.removeClass().addClass("form-control password-medium");
                $(idInput).text("Medium");
                break;
            case 4:
                thisInput.removeClass().addClass("form-control password-strong");
                $(idInput).text("Strong");
                break;
            default:
                thisInput.removeClass().addClass("form-control");
                $(idInput).text("");
        }
    }

    //alert
    function alertMessage(){
        alert("Le password non coincidono!")
    }

    //Check email
    $('#email').keyup(function () {
        checkEmail($(this));
    });

    //Strength password
    $('#password').keyup(function () {
        strengthPass($(this), "#password-strength");
    });

    $('#confirm-password').keyup(function () {
        strengthPass($(this), "#confirm-password-strength");
    });

    //Check se le password coincidono
    $("#signup").click(function (event) {
        if (($('#password').val() === $('#confirm-password').val())) {
            return;
        } else {
            alertMessage("Operazione fallita", "Le password non coincidono!");
            event.preventDefault();
        }
    });
    
    
    


});