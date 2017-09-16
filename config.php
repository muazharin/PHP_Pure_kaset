<?php
//File PHP berikut berfungsi untuk mengkoneksikan halaman web dengan database mysql
  $host="localhost"; //Nama host. Secara default kita tulis saja "localhost" (karena pakai XAMPP)
  $user="root"; //Username. Secara default kita tulis saja "root" (karena pakai XAMPP)
  $password=""; //Password. Secara default kita kosongkan saja
  $database="db_kaset"; //Nama database yang akan kita gunakan
  mysql_connect($host,$user,$password); //script ini untuk membuat koneksi
  mysql_select_db($database); //script ini untuk memilih database yang dikoneksikan
?>
