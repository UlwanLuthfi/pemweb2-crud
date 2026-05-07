<?php
session_start(); //memulai session
//hapus session
// session_destroy();
unset($_SESSION['MEMBER']);
// arahkan ke landing page
header('Location: index.php?hal=home');
