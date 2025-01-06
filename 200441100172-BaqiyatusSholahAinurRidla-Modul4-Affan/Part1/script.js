const nama = ["Endang", "Slamet", "Asep", "Ade", "Muhamad", "Dewi", "Haji", "Mohamad", "Abdul", "Agus", "Ahmad", "Nur", "Andi", "Sri", "Siti"];
const nim = ["100-01", "100-02","100-03", "100-04", "100-05", "100-06", "100-07", "100-08","100-09", "100-10", "100-11", "100-12", "100-13", "100-14", "100-15"];
var nilai = [];

var Mahasiswa = [];

for (let index = 0; index < nama.length; index++) {
    nilai[index] = Math.floor((Math.random() * 100) + 1);
    var simpan = {Nama : nama[index], NIM : nim[index], Nilai : nilai[index]};
    Mahasiswa.push(simpan);
}

console.log(Mahasiswa);

function Ratarata(TotalMahasiswa) {
    var TotalNilai = 0;
    for (let index = 0; index < TotalMahasiswa; index++) {
        TotalNilai += nilai[index];
    }
    return TotalNilai/TotalMahasiswa;
}

console.log("Nilai Rata -rata \t:" + Ratarata(nama.length));

function Balikin(Katakata) {
    const strRev =  Array.from(Katakata).reverse().join("");
    console.log(strRev);
}

Balikin("Halo");
Balikin("Sam");
Balikin("Yuk");

for (let index = 0; index < nilai.length; index++) {
    console.log(Mahasiswa[index].Nama + "\t: " + Mahasiswa[index].Nilai);
}

var indeksHuruf = [];

for (let index = 0; index < nilai.length; index++) {
    if (Mahasiswa[index].Nilai >= 80) {
        var huruf = 'A';
    } else if (Mahasiswa[index].Nilai >=70) {
        huruf = 'B'
    }else if (Mahasiswa[index].Nilai >= 60) {
        huruf = 'C'        
    } else if (Mahasiswa[index].Nilai >= 50) {
        huruf = 'D'
    } else {
        huruf = 'E'
    }

    indeksHuruf[index] = huruf;
    console.log(Mahasiswa[index].Nama + "\t: " + indeksHuruf[index]);
}
