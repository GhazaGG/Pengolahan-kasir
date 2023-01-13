<?php

session_start();

$koneksi = mysqli_connect('sql206.epizy.com', 'epiz_33246558', 'ZaxrYDNB2Vck', 'epiz_33246558_kasirdb');

if(isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($koneksi, "SELECT * FROM user WHERE username ='$username' and password ='$password' ");
    $hitung = mysqli_num_rows($check);

    if($hitung>0){
        $_SESSION['login'] = 'True';
        header("location:index.php");
    } else{
        echo '<script>alert("username atau password salah");
        window.location.href="login.php"
        </script>';
    }
}

if(isset($_POST['tambahbarang'])){
    $namaproduk = $_POST['namaproduk'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stock = $_POST['stock'];

    $insert = mysqli_query($koneksi, "INSERT into produk (namaproduk,deskripsi,harga,stock) value('$namaproduk','$deskripsi','$harga','$stock')");  

    if($insert){
        header('location:stock.php');
    }else{
        echo '<script>alert("Gagal Menambah");
        window.location.href="login.php"
        </script>';
    }
};

if(isset($_POST['tambahpelanggan'])){
    $namapelanggan = $_POST['namapelanggan'];
    $nomerhp = $_POST['nomerhp'];
    $alamat = $_POST['alamat'];

    $insert = mysqli_query($koneksi, "INSERT into pelanggan (namapelanggan,nomerhp,alamat) value('$namapelanggan','$nomerhp','$alamat')");  

    if($insert){
        header('location:pelanggan.php');
    }else{
        echo '<script>alert("Gagal Menambah");
        window.location.href="pelanggan.php"
        </script>';
    }
}
if(isset($_POST['tambahpesanan'])){
    $pesanan = $_POST['pesanan'];
    $jumlahpesanan = $_POST['jumlahpesanan'];

    $insert = mysqli_query($koneksi, "INSERT into pesanan (pesanan,jumlahpesanan) value('$pesanan','$jumlahpesanan')");  

    if($insert){
        header('location:index.php');
    }else{
        echo '<script>alert("Gagal Menambah");
        window.location.href="index.php"
        </script>';
    }
}
if(isset($_POST['barangmasuk'])){
    $namabarang = $_POST['namabarang'];
    $qtty = $_POST['qtty'];

    $insert = mysqli_query($koneksi, "INSERT into masuk (namabarang,qtty) value('$namabarang','$qtty')");  

    if($insert){
        header('location:masuk.php');
    }else{
        echo '<script>alert("Gagal Menambah");
        window.location.href="masuk.php"
        </script>';
    }
}


?>