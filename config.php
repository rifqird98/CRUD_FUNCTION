<?php
$db = mysqli_connect("localhost", "root", "123", "crud");
$nama = "";
$nis = "";
$kelas = "";
$sukses="";
function read($table)
{
    global $db;
    $query = "SELECT * FROM " . $table;
    $rows = mysqli_query($db, $query);
    return $rows;
}

function create($data)
{
    global $db;
    global $sukses;

    $nama       = $data['nama'];
    $nis        = $data['nis'];
    $kelas      = $data['kelas'];

    $query = "INSERT INTO siswa (nama, nis, kelas ) VALUES ('$nama', '$nis', '$kelas')";
    $rows = mysqli_query($db, $query);

    $sukses = "Data save succesfully";
    return $rows;
}

function delete($data)
{
    global $db;
    global $sukses;

    $id         = $data['id'];
    $sql1       = "DELETE from siswa where id = '$id'";
    $q1         = mysqli_query($db,$sql1);
    $sukses = "Data Delete succesfully";
    return $q1;
}

function update($data)
{
    global $db;
    global $nis;
    global $nama;
    global $kelas;

    $id         = $data['id'];
    $query      = "SELECT * from siswa where id = '$id'";
    $rows       = mysqli_query($db, $query);
    $r1         = mysqli_fetch_array($rows);

    $nama        = $r1['nama'];
    $nis         = $r1['nis'];
    $kelas       = $r1['kelas'];

    return $r1;
}
function insertUpdate($data)
{
    global $db;
    global $sukses;

    $id         = $_GET['id'];
    $nama       = $data['nama'];
    $nis        = $data['nis'];
    $kelas      = $data['kelas'];

    $query = "UPDATE siswa set nama = '$nama', nis ='$nis', kelas = '$kelas' where id = '$id' ";
    $rows = mysqli_query($db, $query);

    $sukses = "Data update succesfully";
    return $rows;
}
