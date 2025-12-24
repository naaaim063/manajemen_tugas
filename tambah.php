<?php
include "db.php";

if(isset($_POST['simpan'])){
    mysqli_query($conn,"INSERT INTO tugas (judul,deskripsi,deadline,status) VALUES (
        '$_POST[judul]',
        '$_POST[deskripsi]',
        '$_POST[deadline]',
        '$_POST[status]'
    )");
    header("Location: tugas.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Tugas</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    
<body class="tambah">


<div class="bg-dashboard">
<div class="overlay">

<div class="app">

<div class="sidebar">
    <a href="index.php">Dashboard</a>
    <a class="active" href="tugas.php">Data Tugas</a>
    <a href="profil.php">Profil</a>
</div>

<div class="main">
<h1>Tambah Tugas</h1>

<div class="form-box">
<form method="post">

<label>Judul</label>
<input type="text" name="judul" required>

<label>Deskripsi</label>
<textarea name="deskripsi" required></textarea>

<label>Deadline</label>
<input type="date" name="deadline" required>

<label>Status</label>
<select name="status">
    <option value="Pending">Pending</option>
    <option value="Selesai">Selesai</option>
</select>

<button type="submit" name="simpan">Simpan</button>

</form>
</div>

</div>
</div>

</div>
</div>

</body>
</html>
