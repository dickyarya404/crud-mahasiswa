<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <title>Mahasiswa</title>

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>


</head>

<body>

   <br />

   <div class="container shadow">

      <center>
         <h2>Data Mahasiswa</h2>
      </center>

      <table class="table table-striped">
         <tr>
            <td align="center">No</td>
            <td align="center">ID</td>
            <td align="center">Nama Lengkap</td>
            <td align="center">Nim</td>
            <td align="center">Email</td>
            <td align="center">Jurusan</td>
            <td align="center">Universitas</td>
            <td align="center">Aksi</td>
         </tr>


         <?php

         $no = 0;

         $conn = mysqli_connect("localhost", "root", "", "dbmhs");

         $tampil = mysqli_query($conn, "select * from tabelmhs");

         while ($data = mysqli_fetch_array($tampil)) {
            $no++;


            print "

<tr>
<td>$no</td>
<td>MHS-$data[id]</td>
<td>$data[nama]</td>
<td>$data[nim]</td>
<td>$data[email]</td>
<td>$data[jurusan]</td>
<td>$data[universitas]</td>
<td><a href='#' class='btn btn-danger' data-toggle='modal' data-target='#konfirmasi_$data[id]'>hapus</a>

<a href='#' class='btn btn-info' data-toggle='modal' data-target='#formedit_$data[id]'>edit</a>

</tr>

";

         ?>



            <!-- Modal -->
            <div class="modal fade" id="formedit_<?php print "$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form tambah mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">


                        <form method="post" action="edit.php">


                           <input type="hidden" name="id" value="<?php print "$data[id]"; ?>" />

                           <div class="form-group">
                              <label>Nama Lengkap</label>
                              <input type="text" class="form-control" name="nama" value="<?php print "$data[nama]"; ?>">
                           </div>

                           <div class="form-group">
                              <label>Nim</label>
                              <input type="text" class="form-control" name="nim" value="<?php print "$data[nim]"; ?>">
                           </div>

                           <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="email" value="<?php print "$data[email]"; ?>">
                           </div>

                           <div class="form-group">
                              <label>Jurusan</label>
                              <input type="text" class="form-control" name="jurusan" value="<?php print "$data[jurusan]"; ?>">
                           </div>

                           <div class="form-group">
                              <label>Universitas</label>
                              <input type="text" class="form-control" name="universitas" value="<?php print "$data[universitas]"; ?>">
                           </div>

                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="simpan" value="Update">

                        </form>

                     </div>
                  </div>
               </div>
            </div>
            <!--------modal konfirmasi------>

            <!-- Modal -->
            <div class="modal fade" id="konfirmasi_<?php print "$data[id]"; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi hapus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">

                        <h5>Apakah anda yakin data ini dihapus ?</h5>

                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <?php print "<a href='hapus.php?id=$data[id]' class='btn btn-danger'>hapus sekarang</a>"; ?>

                     </div>
                  </div>
               </div>
            </div>

         <?php
         }
         ?>

      </table>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#formulirok">Tambah Mahasiswa</a>
      <br />
      <br />

   </div>

   <!-- Modal -->
   <div class="modal fade" id="formulirok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Form tambah mahasiswa</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">


               <form method="post" action="input.php">

                  <div class="form-group">
                     <label>Nama Lengkap</label>
                     <input type="text" class="form-control" name="nama">
                  </div>

                  <div class="form-group">
                     <label>Nim</label>
                     <input type="text" class="form-control" name="nim">
                  </div>

                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" class="form-control" name="email">
                  </div>

                  <div class="form-group">
                     <label>Jurusan</label>
                     <input type="text" class="form-control" name="jurusan">
                  </div>

                  <div class="form-group">
                     <label>Universitas</label>
                     <input type="text" class="form-control" name="universitas">
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <input type="submit" class="btn btn-success" name="simpan" value="Simpan">

               </form>

            </div>
         </div>
      </div>
   </div>

</body>

</html>