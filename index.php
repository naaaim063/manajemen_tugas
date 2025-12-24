<?php
include "db.php";
$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tugas"));
$done  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tugas WHERE status='Selesai'"));
$todo  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tugas WHERE status='Pending'"));
?>
<!DOCTYPE html>
<html>
<head>
<title>Homepage</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<body class="home">

<div class="bg-dashboard">
<div class="overlay">

<div class="app">

<div class="sidebar">
    <a class="active" href="index.php">Dashboard</a>
    <a href="tugas.php">Data Tugas</a>
    <a href="profil.php">Profil</a>
</div>

<div class="main">

<h1>Kalender</h1>

<div class="calendar-big">
    <h2 id="bulan"></h2>
    <table id="kalender"></table>
</div>

<h2 style="margin-bottom:15px;">Ringkasan</h2>

<div class="cards">
    <div class="card blue">
        <span>Total Tugas</span>
        <b><?= $total ?></b>
    </div>
    <div class="card green">
        <span>Selesai</span>
        <b><?= $done ?></b>
    </div>
    <div class="card red">
        <span>Belum</span>
        <b><?= $todo ?></b>
    </div>
</div>

</div>
</div>

</div>
</div>

<script>
const bulan = document.getElementById("bulan");
const kalender = document.getElementById("kalender");

const now = new Date();
bulan.innerText = now.toLocaleString("id-ID",{month:"long",year:"numeric"});

const today = now.getDate();
const firstDay = new Date(now.getFullYear(),now.getMonth(),1).getDay();
const days = new Date(now.getFullYear(),now.getMonth()+1,0).getDate();

let html = "<tr>";
["Min","Sen","Sel","Rab","Kam","Jum","Sab"].forEach(d=>html+="<th>"+d+"</th>");
html+="</tr><tr>";

for(let i=0;i<firstDay;i++) html+="<td></td>";

for(let d=1; d<=days; d++){
    if(d === today){
        html += "<td><div class='today'>"+d+"</div></td>";
    }else{
        html += "<td>"+d+"</td>";
    }
    if((d+firstDay)%7==0) html+="</tr><tr>";
}

kalender.innerHTML = html;
</script>

</body>
</html>
