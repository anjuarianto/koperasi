function cariAnggota() {
    const kodeAnggota = document.getElementById('kode_anggota').value;
    const anggota = arrayAnggota.find(data => data.kode_anggota == kodeAnggota);
    const formBody = document.getElementById("form-body-detail");
    const input = document.createElement('INPUT');
  

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'kode_anggota');
    input.setAttribute('value', anggota.kode_anggota);
    formBody.appendChild(input);
    document.getElementById('detail-kode-anggota').innerHTML = anggota.kode_anggota;
    document.getElementById('detail-nama-anggota').innerHTML = anggota.nama;
}



function functionTambahBarang() {
    const kodeBarang = document.getElementById("kode_barang").value;
    const resBarang = arrayBarang.find(data => data.kode_barang == kodeBarang);
    const formatter = new Intl.NumberFormat(['ban', 'id']);


    addHiddenInput(resBarang.id_barang);

    const tbodyEl = document.getElementById('detail-barang');
    const trEl = document.createElement("TR");
    trEl.setAttribute('data-id-barang', resBarang.id_barang);
    tbodyEl.appendChild(trEl);
    for(i=0;i<4;i++) {
        if(i==0) {
            var td = document.createElement("TD");
            td.innerHTML = resBarang.nama_barang;
            trEl.appendChild(td);
            
        } else if (i==1) {
            var td = document.createElement("TD");
            td.innerHTML = 'Rp. ' + formatter.format(resBarang.harga_jual);
            trEl.appendChild(td);
        } else if (i==2) {
            var td = document.createElement("TD");
            td.innerHTML = '<input type="number" class="form-control form-control-sm" name="jumlah_barang[]" onchange="ubahJumlah(this)" onkeyup="ubahJumlah(this)" value="1">';
            trEl.appendChild(td);
        } else if(i==3) {
            var td = document.createElement("TD");
            td.innerHTML = 'Rp. ' + formatter.format(resBarang.harga_jual);
            trEl.appendChild(td);
        }
    }
    printHargaGlobal();
}

function ubahJumlah(value) {
    const formatter = new Intl.NumberFormat(['ban', 'id']);
    const row = value.parentElement.parentElement;
    const valQty = row.cells[2].children[0].value;
    const idBarang = row.getAttribute("data-id-barang");
    const resBarang = arrayBarang.find(data => data.id_barang == idBarang);
    const hargaBarang = resBarang.harga_jual;
    row.cells[3].innerHTML = 'Rp. ' + formatter.format(hargaBarang*valQty);
    printHargaGlobal();

}


function printHargaGlobal() {
    const formatter = new Intl.NumberFormat(['ban', 'id']);
    const hargaTotalBarang = document.getElementById('harga-total-barang');
    var resHargaTotal = 0;
    const tRow = document.getElementById('detail-barang').children;
    for(i=0;i<tRow.length;i++) {
        var totalHarga = tRow[i].children[3].innerText;
        var res = parseInt(totalHarga.replace(/\D/g, ""));
        resHargaTotal += res;
    }

    hargaTotalBarang.innerHTML = 'Rp. ' + formatter.format(resHargaTotal);
}

function addHiddenInput(idBarang) {
    const formBody = document.getElementById("form-body-detail");
    const input = document.createElement('INPUT');
    const nameInput = 'contoh input';
    const valueInput = 'value input';

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'id_barang[]');
    input.setAttribute('value', idBarang);
    formBody.appendChild(input);
}