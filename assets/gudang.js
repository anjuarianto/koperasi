function tampilDataTable(data, baseUrl) {
    var id = $(data).data("id");
    var info = $(data).data("info");
    if(info == "supplier") {
        modalSupplier(id, baseUrl);
    } else if(info == "barang") {
        modalBarang(id, baseUrl);
    } else if(info == "stok"){
        modalStok(id, baseUrl);
    } else if(info == "beli") {
        window.location.href = baseUrl+'gudang/detail_pembelian/'+id;
    } else if(info == "detail_pembelian") {
        modalDetailPembelian(id, baseUrl);
    } else if(info == "rak") {
        modalRak(id, baseUrl);
    } else if(info == 'satuan') {
        modalSatuan(id, baseUrl);
    }
    
}

function enableForm(data) {
    var info = $(data).data("info");
    if(info == "supplier") {
        $(".modal-body .form-control").prop('disabled', false);
    } else if(info == "barang") {
        $(".modal-body .form-control:not(#nama_supplier,#kode_barang)").prop('disabled', false);
    } else if(info == "stok"){
        $(".modal-body .form-control:not(#tanggal_pembelian,#nama_barang)").prop('disabled', false);
    } else if(info == "detail_pembelian") {
        $(".modal-body .form-control:not(#kode_barang,#nama_barang,#nama_supplier)").prop('disabled', false);
    } else if(info == "pembelian") {
        $(".modal-body .form-control").prop('disabled', false);
        $("#btn-edit-pembelian").prop('disabled', true);
        $("#btn-submit-pembelian").prop('disabled', false);

    }
    
    $("#btn-edit").prop('disabled', true);
    $("#btn-submit").prop('disabled', false);
}

function modalEditPembelian(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/pembelian_id/"+id,
        dataType : "JSON",
        success: function(response) {
            console.log(response)
            $('#no_faktur').val(response.no_faktur);
            $('#tanggal_pembelian').val(response.tgl_pembelian);
            $('#ppn').val(response.ppn);
            $('#jenis_pembayaran').val(response.jenis_pembayaran);
            $('#form-edit-pembelian').attr("action", baseUrl+'gudang/update_pembelian/'+id)
            $("#modalEditPembelian .form-control").prop('disabled', true);

            $("#btn-edit-pembelian").attr('data-info', 'pembelian');
            $("#btn-edit-pembelian").prop('disabled', false);
            $("#btn-submit-pembelian").prop('disabled', true);
        }
    });
}
function modalDetailPembelian(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/detail_pembelian_id/"+id,
        dataType : "JSON",
        success: function(response) {
            console.log(response)
            $('#nama_supplier').val(response.nama_supplier);
            $('#kode_barang').val(response.kode_barang);
            $('#nama_barang').val(response.nama_barang);
            $('#discount').val(response.discount);
            $('#jumlah_barang').val(response.jumlah_barang);
            $('#form-edit').attr("action", baseUrl+'gudang/update_detail_pembelian/'+id)
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);

            $("#btn-edit").attr('data-info', 'detail_pembelian');
            $("#btn-return").attr('data-info', 'return-pembelian');
            $("#btn-return").data('id', response.id_detail_pembelian);
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}

function modalSupplier(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/supplier_id/"+id,
        dataType : "JSON",
        success: function(response) {
            $('#nama_supplier').val(response.nama_supplier);
            $('#alamat').val(response.alamat);
            $('#form-edit').attr("action", baseUrl+'gudang/update_supplier/'+id)
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);

            $("#btn-edit").attr('data-info', 'supplier');
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}

function modalRak(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/rak_id/"+id,
        dataType : "JSON",
        success: function(response) {
            $('#nama_rak').val(response.nama_rak);
            $('#form-edit').attr("action", baseUrl+'gudang/update_rak/'+id)
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);

            $("#btn-edit").attr('data-info', 'supplier');
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}

function modalSatuan(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/satuan_id/"+id,
        dataType : "JSON",
        success: function(response) {
            $('#nama_rak').val(response.nama_satuan);
            $('#form-edit').attr("action", baseUrl+'gudang/update_satuan/'+id)
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);

            $("#btn-edit").attr('data-info', 'supplier');
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}

function modalReturn(datas, baseUrl) {
    var id = $(datas).data('id');
    console.log(id)
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/return_pembelian_id/"+id,
        dataType : "JSON",
        success: function(response) {
            $('#no_faktur_return').val(response.no_faktur);
            $('#nama_barang_return').val(response.nama_barang);
            $('#harga_beli_return').val(response.harga_beli);
            $('#jumlah_barang_return').val(response.jumlah_barang);
            $("#no_faktur_return,#nama_barang_return, #harga_beli_return").prop('disabled', true);
            $('#form-return').attr("action", baseUrl+'gudang/aksi_return_pembelian/'+id)
            $('#modalEdit').modal('hide');
            $('#modalReturn').modal('show');
        }
    });
    
}


function modalBarang(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/barang_id/"+id,
        dataType : "JSON",
        success: function(response) {
            console.log(response)
            // get data
            $('#nama_barang').val(response.nama_barang);
            $('#kode_barang').val(response.kode_barang);
            $('#nama_supplier').val(response.nama_supplier);
            $('#harga_beli').val(response.harga_beli);
            $('#harga_jual').val(response.harga_jual);

            // utility
            $('#btn-cetak-harga').attr("href", baseUrl+'gudang/cetak_harga/'+id);
            $('#form-edit').attr("action", baseUrl+'gudang/update_barang/'+id);
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}


function modalStok(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/stok_id/"+id,
        dataType : "JSON",
        success: function(response) {
            // get data
            $('#tanggal_pembelian').val(response.tanggal_pembelian);
            $('#nama_barang').val(response.nama_barang);
            $('#stok_barang').val(response.stok_barang);
            if(tanggalExpired == "Invalid date") {
                tanggalExpired = null;
            }
          
            $('#tanggal_expired').val(response.tanggal_expired);
            $('#tanggal_return').val(response.tanggalReturn);
            // utility
            $('#form-edit').attr("action", baseUrl+'gudang/update_stok/'+id)
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}