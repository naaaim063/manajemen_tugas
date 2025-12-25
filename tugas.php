<?php
include "db.php";
$data = mysqli_query($conn,"SELECT * FROM tugas");
$no=1;
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Tugas</title>
<link rel="stylesheet" href="assets/style.css">
<style>
.search-box{
    margin:15px 0;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
}

.search-box input{
    flex:1;
    padding:12px 15px;
    border-radius:10px;
    border:none;
    font-size:14px;
    outline:none;
    background:rgba(255,255,255,0.9);
}

.search-box span{
    color:#ddd;
    font-size:14px;
}
</style>
</head>

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

<div class="search-box">
    <a href="tambah.php" class="btn">+ Tambah Tugas</a>
    <input type="text" id="searchInput" placeholder="Cari judul, deskripsi, status...">
</div>

<div class="table-box">
<table class="table" id="taskTable">
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
            <a href="hapus.php?id=<?= $r['id'] ?>" class="deleteBtn">Hapus</a>
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

document.getElementById("searchInput").addEventListener("keyup", function(){
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll("#taskTable tr");

    rows.forEach((row, index)=>{
        if(index===0) return;
        let text = row.innerText.toLowerCase();
        row.style.display = text.includes(filter) ? "" : "none";
    });
});

document.querySelectorAll(".deleteBtn").forEach(btn=>{
    btn.addEventListener("click",function(e){
        if(!confirm("Yakin hapus data ini?")){
            e.preventDefault();
        }
    });
});
</script>

</body>
</html>
