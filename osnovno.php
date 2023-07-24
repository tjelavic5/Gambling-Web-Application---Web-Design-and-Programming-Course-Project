<?php
//session_start();

require 'dnevnik.class.php';
require 'baza.class.php';
include 'sesija.class.php';

include 'vanjske_biblioteke/FirePHPCore/fb.php';
ob_start('ob_gzhandler'); 
Sesija::kreirajSesiju();

$dnevnik = new Dnevnik();



include 'vanjske_biblioteke/smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('vanjske_biblioteke/smarty/templates_c/');
$smarty->setCacheDir('vanjske_biblioteke/smarty/cache/');
$smarty->setConfigDir('vanjske_biblioteke/smarty/configs/');

if (!isset($_COOKIE["uvjeti-koristenja"])) {
    echo
    "<script type='text/javascript'>
            function uvjetiKoristenjaKolacic() {
              if(confirm('Korištenje ove web aplikacije uključuje bilježenje podataka u kolačiće. Da li prihvaćate te uvjete korištenja?')) {
                var danas = new Date();
                var istice = new Date();
                istice.setTime(danas.getTime() + 86400*2);

                document.cookie = 'uvjeti-koristenja=prihvaceni; expires='+istice.toGMTString()+'; path=/';
              }
            }
            uvjetiKoristenjaKolacic();
          </script>";
    $tekst = "Ponuda kolacica";
    $radnja = "Ponuda kolacica";
    $upit = "-";
    $dnevnik->spremiDnevnik($tekst, $upit, $radnja, true);
}