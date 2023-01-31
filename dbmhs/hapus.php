<?php
$conn = mysqli_connect("localhost", "root", "", "dbmhs");

$id = $_GET['id'];

$hapus = mysqli_query($conn, "delete from tabelmhs where id='$id'");

if ($hapus) {
   print "<script>window.location='index.php'</script>";
} else {
   print "gagal";
}
