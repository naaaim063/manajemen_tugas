<?php
include "db.php";
$data = mysqli_query($conn,"SELECT * FROM tugas");
$no=1;
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Tugas</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<body class="tugas">

<div class="bg-dashboard">
<div class="overlay">

<div class="app">

<div class="sidebar">
    <a href="index.php">Dashboard</a>
    <a class="active" href="tugas.php">Data Tugas</a>
    <a href="profil.php">Profil</a>
</div>

<div class="main">

<h1>Data Tugas</h1>
<a href="tambah.php" class="btn">+ Tambah Tugas</a>

<div class="table-box">
<table class="table">
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Deskripsi</th>
    <th>Deadline</th>
    <th>Status</th>
    <th></th>
</tr>

<?php while($r=mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $r['judul'] ?></td>
    <td><?= $r['deskripsi'] ?></td>
    <td><?= $r['deadline'] ?></td>
    <td><?= $r['status'] ?></td>
    <td style="position:relative;">
        <span class="dots" onclick="toggleMenu(<?= $r['id'] ?>)">⋮</span>
        <div class="menu" id="menu<?= $r['id'] ?>">
            <a href="edit.php?id=<?= $r['id'] ?>">Edit</a>
            <a href="hapus.php?id=<?= $r['id'] ?>" onclick="return confirm('Hapus tugas ini?')">Hapus</a>
        </div>
    </td>
</tr>
<?php } ?>

</table>
</div>

</div>
</div>

</div>
</div>

<script>
function toggleMenu(id){
    document.querySelectorAll(".menu").forEach(m=>m.style.display="none");
    const menu = document.getElementById("menu"+id);
    menu.style.display = (menu.style.display=="block") ? "none" : "block";
}
</script>

</body>
</html>
