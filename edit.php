<?php
include "db.php";
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tugas WHERE id=$id"));

if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE tugas SET
        judul='$_POST[judul]',
        deskripsi='$_POST[deskripsi]',
        deadline='$_POST[deadline]',
        status='$_POST[status]'
        WHERE id=$id
    ");
    header("Location: tugas.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Tugas</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<body class="edit">
<div class="bg-dashboard">
<div class="overlay">

<div class="app">

<div class="sidebar">
    <a href="index.php">Dashboard</a>
    <a class="active" href="tugas.php">Data Tugas</a>
    <a href="profil.php">Profil</a>
</div>

<div class="main">
<h1>Edit Tugas</h1>

<div class="form-box">
<form method="post">

<label>Judul</label>
<input type="text" name="judul" value="<?= $data['judul'] ?>" required>

<label>Deskripsi</label>
<textarea name="deskripsi"><?= $data['deskripsi'] ?></textarea>

<label>Deadline</label>
<input type="date" name="deadline" value="<?= $data['deadline'] ?>" required>

<label>Status</label>
<select name="status">
    <option <?= $data['status']=="Pending"?"selected":"" ?>>Pending</option>
    <option <?= $data['status']=="Selesai"?"selected":"" ?>>Selesai</option>
</select>

<button type="submit" name="update">Update</button>

</form>
</div>

</div>
</div>

</div>
</div>

</body>
</html>
