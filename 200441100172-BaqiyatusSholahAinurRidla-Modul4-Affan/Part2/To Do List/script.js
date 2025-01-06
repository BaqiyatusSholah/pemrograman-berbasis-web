var kegiatan = document.getElementById("kegiatan");
var waktu = document.getElementById("waktu");
var atur = document.getElementById("tmb-atur")
var list = document.getElementById("daftar")

atur.addEventListener("click", (e) => {
    e.preventDefault()
    Validasi()
})

let Validasi = () => {
   if (kegiatan.value == "" || waktu.value == "") {
    alert("Jangan Dikosongin")
   }else {
    alert("Berhasil")
    SimpanData()
   }
};

let html = ""

let SimpanData = () => {
    html += "<tr align= 'center'>"
    html += "<td>" + kegiatan.value + "</td>"
    html += "<td>" + waktu.value + "</td>"
    html += "<td><button class= 'tmb-edit' onclick='Edit(this)'>EDIT</button><button class= 'tmb-hapus' onclick='Hapus(this)'>HAPUS</button></td>"
    html += "</tr>"
    TampilData()
}

let TampilData = () => {
    daftar.innerHTML += html

    kegiatan.value = ""
    waktu.value = ""
    html = ""
}

let Hapus = (e) => {
    e.parentElement.parentElement.remove()
}

let Edit = (e) => {
    kegiatan.value = e.parentElement.previousElementSibling.previousElementSibling.innerHTML
    waktu.value = e.parentElement.previousElementSibling.innerHTML
    e.parentElement.parentElement.remove()
}