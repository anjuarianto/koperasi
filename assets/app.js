let inputPost = [];
let idDetail = 0;

function validasi() {
    const formBody = document.getElementById("form-body-detail");
    const kodeAnggota = document.getElementById('kode_anggota').value;
    const idAnggota = arrayAnggota.find(data => data.kode_anggota == kodeAnggota).id_anggota;
    const jenisPembayaran = document.getElementById('jenis_pembayaran').value;
    const nominalUang = document.getElementById('nominal_uang').value;
    
    
    let hargaGlobal = 0;
    inputPost.forEach(e => {
        formBody.innerHTML += `
        <input type="hidden" name="id_barang[]" value="${e.idBarang}" />
        <input type="hidden" name="jumlah_barang[]" value="${e.jumlahBarang}" />

    `;
    })
    inputPost.forEach(element => {
        hargaGlobal += element.totalHarga
    })
    const kembalian = nominalUang - hargaGlobal;
    formBody.innerHTML += `
        <input type="hidden" name="harga_total_barang" value="${hargaGlobal}"/>
        <input type="hidden" name="id_anggota" value="${idAnggota}"/>
        <input type="hidden" name="jenis_pembayaran" value="${jenisPembayaran}"/>
        <input type="hidden" name="nominal_uang" value="${nominalUang}"/>
        <input type="hidden" name="kembalian" value="${kembalian}"/>
    `;
}
function cariAnggota() {
    const kodeAnggota = document.getElementById('kode_anggota').value;
    const anggota = arrayAnggota.find(data => data.kode_anggota == kodeAnggota);

    document.getElementById('detail-kode-anggota').innerHTML = anggota.kode_anggota;
    document.getElementById('detail-nama-anggota').innerHTML = anggota.nama_anggota;
   
}

function functionTambahBarang() {
    const kodeBarang = document.getElementById("kode_barang").value;
    const jumlahBarang = document.getElementById("jumlah_barang").value;
    
    
    const resBarang = arrayBarang.find(data => data.kode_barang == kodeBarang);
    const totalHarga = jumlahBarang*resBarang.harga_beli;
    const formatter = new Intl.NumberFormat(['ban', 'id']);
    
    var objek = {idDetail:idDetail, idBarang:resBarang.id_barang, jumlahBarang:jumlahBarang, totalHarga:totalHarga};
    inputPost.push(objek)
    tbodyEl = document.getElementById('detail-barang')
    tbodyEl.innerHTML += `
        <tr>
            <td>${resBarang.nama_barang}</td>
            <td>Rp ${formatter.format(resBarang.harga_beli)}</td>
            <td>${jumlahBarang}</td>
            <td>Rp ${formatter.format(totalHarga)}</td>
        </tr>
    `;
    printHargaGlobal();
    
}


function printHargaGlobal() {
    const formatter = new Intl.NumberFormat(['ban', 'id']);
    let hargaGlobal = 0;
    inputPost.forEach(element => {
        hargaGlobal += element.totalHarga
    })
    
    document.getElementById("harga-total-barang").innerHTML = "Rp " + formatter.format(hargaGlobal);
}


// document.getElementById("btn-cari-anggota").addEventListener("click", function() {
//     cariAnggota();
    
// });
// document.getElementById("btn").addEventListener("click", function() {
//     cariAnggota();
    
// });
// document.getElementById("btn-tambah").addEventListener("click", function() {
//     functionTambahBarang();
    
// });
