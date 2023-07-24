$(document).ready(function () {

    var validacija = false;

    function validacijaKorime() {
        /*
         * 
         Username consists of alphanumeric characters (a-zA-Z0-9), lowercase, or uppercase.
         Username allowed of the dot (.), underscore (_), and hyphen (-).
         The dot (.), underscore (_), or hyphen (-) must not be the first or last character.
         The dot (.), underscore (_), or hyphen (-) does not appear consecutively, e.g., java..regex
         The number of characters must be between 5 to 20.
         
         */

        var regex = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){2,18}[a-zA-Z0-9]$/;
        var vrijednost = $("#korisnickoIme").val();
        if (regex.test(vrijednost)) {
            console.log(vrijednost);
            $.ajax({
                type: "get",
                url: "skripta_provjeri_korime.php?korime=" + vrijednost,
                dataType: "json",
                success: function (response) {
                    console.log(response);

                    if (response === "ok") {
                        document.getElementById("korisnickoIme").style = "border: 3px solid green";
                        console.log(response);
                        return true;
                    } else if (response === "no") {
                        document.getElementById("korisnickoIme").style = "border: 3px solid red";
                        console.log(response);
                        return false;
                    }
                }
            });
        } else {
            document.getElementById("korisnickoIme").style = "border: 3px solid red";
            return false;
        }
    }

    $("#korisnickoIme").keyup(function () {

        validacijaKorime();

    });
    function validacijaLozinka() {
        var regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,20}$/;
        var vrijednost = $("#lozinka").val();
        if (regex.test(vrijednost)) {
            document.getElementById("lozinka").style = "border: 3px solid green";
            return true;
        } else {
            document.getElementById("lozinka").style = "border: 3px solid red";
            return false;
        }
    }
    $("#lozinka").keyup(function () {
        validacijaLozinka();
    });

    function validacijaLozinkaPonovljena() {
        var lozinka1 = $("#lozinka").val();
        var lozinka2 = $("#lozinkaPonovljena").val();
        if (lozinka1 === lozinka2) {
            document.getElementById("lozinkaPonovljena").style = "border: 3px solid green";
            return true;
        } else {
            document.getElementById("lozinkaPonovljena").style = "border: 3px solid red";
            return false;
        }
    }
    $("#lozinkaPonovljena").keyup(function () {
        validacijaLozinkaPonovljena();
    });

    function validacijaEmail() {
        var regex = /^\w+@\w+.\w{1,10}$/;
        var vrijednost = $("#email").val();
        if (regex.test(vrijednost)) {
            document.getElementById("email").style = "border: 3px solid green";
            return true;
        } else {
            document.getElementById("email").style = "border: 3px solid red";
            return false;

        }
    }
    $("#email").keyup(function () {
        validacijaEmail();
    });

    function validacijaIme() {
        var regex1 = /^\w+@\w+.\w{2,20}$/;
        var regex = /^[a-zA-Z0-9]([._-](?![._-])|[a-zA-Z0-9]){0,20}[a-zA-Z0-9]$/;
        var vrijednost = $("#ime").val();
        if (!regex1.test(vrijednost) && regex.test(vrijednost) && vrijednost != "Boris") {
            document.getElementById("ime").style = "border: 3px solid green";
            return true;
        } else {
            document.getElementById("ime").style = "border: 3px solid red";
            return false;
        }
    }

    $("#ime").keyup(function () {
        validacijaIme();
    });

    function validacijaPrezime() {
        var regex = /^[a-z ,.'-]+$/i;
        var vrijednost = $("#prezime").val();
        var ime = $("#ime").val();
        if (regex.test(vrijednost) && vrijednost != ime) {
            document.getElementById("prezime").style = "border: 3px solid green";
            return true;
        } else {
            document.getElementById("prezime").style = "border: 3px solid red";
            return false;
        }
    }

    $("#prezime").keyup(function () {
        validacijaPrezime();
    });

    $("#registracija").hover(function () {
        if (validacijaKorime() && validacijaEmail() && validacijaIme() & validacijaPrezime() && validacijaLozinka() && validacijaLozinkaPonovljena()){
            onemoguciReg()();
        }else{
            omoguciReg();
        }
    });
    function onemoguciReg() {
        document.getElementById("registracija").disabled = true;
    }
    function omoguciReg() {
        document.getElementById("registracija").disabled = false;
        ;
    }





});