$(document).ready(function () {

    ucitajKorisnike();
});
function ucitajKorisnike() {
    $.ajax({
        type: "get",
        url: "skripta_dohvati_korisnike.php",
        dataType: "json",
        success: function (response) {
            var tablicaHtml = "";


            $.each(response.podaci, function (key, val) {
                tablicaHtml +=
                        "<tr data-id=\"" + val.korisnik_id + "\" onclick=\"tablicaRedOnclick(this)\">"
                        + "<td>" + val.korisnicko_ime + "</td>"
                        + "<td>" + val.status + "</td>"
                        + "<td>" + val.tip + "</td>"
                        + "<td>" + val.email + "</td>"
                        + "</tr>";
            });
            $("#tbodyKorisnici").html(tablicaHtml);
        }
    });
}
function tablicaRedOnclick(x) {
    var mod = $('input[name="mod"]:checked').val();
    console.log(mod);
    $.ajax({
        type: "get",
        url: "skripta_dohvati_korisnike.php?id=" + $(x).data("id") + "&mod=" + mod,
        dataType: "json",
        success: function (response) {
            var tablicaHtml = "";


            $.each(response.podaci, function (key, val) {
                tablicaHtml +=
                        "<tr data-id=\"" + val.korisnik_id + "\" onclick=\"tablicaRedOnclick(this)\">"
                        + "<td>" + val.korisnicko_ime + "</td>"
                        + "<td>" + val.status + "</td>"
                        + "<td>" + val.tip + "</td>"
                        + "<td>" + val.email + "</td>"
                        + "</tr>";
            });
            $("#tbodyKorisnici").html(tablicaHtml);
        }
    });
    //window.location = './skripta_admin_korisnika.php?id=' + $(x).data("id");

}