<?php

        $aktivacijski_kod = "asasasjhasjajsj";
        $link = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']) . "/skripta_aktivacija.php?kod=" . $aktivacijski_kod;
        $toEmail = "tjelavic@foi.hr";
        $subject = "Aktivacija racuna";
        $content = "Kliknite na link za aktivaciju:" . $link;
        $mailHeaders = "From: Admin\r\n";
        if (mail($toEmail, $subject, $content, $mailHeaders)) {
            $message = "You have registered and the activation mail is sent to your email. Click the activation link to activate you account.";
            $type = "success";
            echo $type;
        }
