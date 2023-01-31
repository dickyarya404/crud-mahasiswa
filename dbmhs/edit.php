<?php
$conn = mysqli_connect("localhost", "root", "", "dbmhs");

$id = $_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$universitas = $_POST['universitas'];




$edit = mysqli_query($conn, "update tabelmhs set nama='$nama', nim='$nim', email='$email', jurusan='$jurusan', universitas='$universitas' where id='$id'");


if ($edit) {
   print "<script>window.location='index.php'</script>";
} else {
   print "gagal";
}
