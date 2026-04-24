<?php
session_start(); //memulai session
include_once '../koneksi.php';
include_once '../models/Member.php';

//1. tangkap request form (dari name2 element form)
$email = $_POST['email'];
$password = $_POST['password'];
//2. simpan ke sebuah array
$data = [
  $email, // ? 1
  $password // ? 2
];
//3. eksekusi tombol
$obj_member = new Member();
$rs = $obj_member->cekLogin($data);

if (!empty($rs)) {
  //simpan session
  $_SESSION['MEMBER'] = $rs;
  // arahkan ke landing page
  header('Location:http://localhost/rwd/index.php?hal=produk_list');
} else { //-------gagal login----------
  echo '<script>alert("Email/Password Anda Salah!!!");history.go(-1);</script>';
}
