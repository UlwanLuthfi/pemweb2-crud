<?php
session_start(); //memulai session
//hapus session
// session_destroy();
unset($_SESSION['MEMBER']);
// arahkan ke landing page
header('Location:http://localhost/rwd/index.php?hal=home');
