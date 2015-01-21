<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
if(!isset($_SESSION['login_uye']))
{
     header("Location: giris.php");
}