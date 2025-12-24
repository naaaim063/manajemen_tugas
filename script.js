document.querySelectorAll(".deleteBtn").forEach(btn=>{
    btn.addEventListener("click",function(e){
        if(!confirm("Yakin hapus data ini?")){
            e.preventDefault();
        }
    });
});
