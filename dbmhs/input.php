<?php

$conn = mysqli_connect("localhost", "root", "", "dbmhs");

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$universitas = $_POST['universitas'];


$input = mysqli_query($conn, "insert into tabelmhs(nama, nim, email, jurusan, universitas) values('$nama','$nim','$email','$jurusan','$universitas' )");


if ($input) {
   print "<script>window.location='index.php'</script>";
} else {
   print "gagal";
}
