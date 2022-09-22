<?php
include "config.php";


if (isset($_GET['op'])) {
  $op = $_GET['op'];
} else {
  $op = "";
}


// save data
if (isset($_POST['simpan'])) {

  if ($op == "edit") {
    insertUpdate($_POST);

  } else {
    create($_POST);
  }
}
//update
if ($op == 'edit') {

  update($_GET);
}

//delete
if ($op == 'delete') {
  delete($_GET);
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <div class="container p-5">
    <div class="card">
    <div class="card-header">
        Data Student
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Nis</th>
              <th scope="col">Kelas</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <?php
          $hasil = read('siswa');
          $urut = 1;

          while ($r2 = mysqli_fetch_assoc($hasil)) {

            $id = $r2['id'];

          ?>
            <tr>
              <th scope="row"><?php echo $urut++ ?></th>
              <td scope="row"><?php echo $r2['nama'] ?></td>
              <td scope="row"><?php echo $r2['nis'] ?></td>
              <td scope="row"><?php echo $r2['kelas'] ?></td>
              <td scope="row">
                <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                <a href="index.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
              </td>
            </tr>
          <?php
          }
          ?>

        </table>

      </div>
    </div>

    <!-- create -->

    <div class="card mt-5">
      <div class="card-header">
        Create / Edit Data
      </div>
      <div class="card-body">
        <?php
        if ($sukses) {
        ?>
          <div class="alert alert-success" role="alert">
            <?php echo $sukses ?>
          </div>
        <?php
          header("refresh:5;url=index.php");
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="tgl_lahir" required class="col-sm-2 col-form-label">Nis</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" id="tgl_lahir" name="nis" value="<?php echo $nis ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" id="nim" name="kelas" value="<?php echo $kelas ?>">
            </div>
          </div>
          <div class="col-12">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
          </div>

      </div>
    </div>

    </form>
  </div>
  </div>
  </div>

  </div>
  <script src="bootstrap/js/bootstrap.min.js" type="javascript"> </script>
  <script src="bootstrap/js/bootstrap.bundle.min.js" type="javascript"> </script>

</body>

</html>