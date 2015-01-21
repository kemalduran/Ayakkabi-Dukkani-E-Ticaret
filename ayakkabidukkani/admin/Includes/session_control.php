<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
            
if(!isset($_SESSION['login_admin']))
{
     header("Location: ../giris.php");
}