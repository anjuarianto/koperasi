function tampilDataTable(data, baseUrl) {

    var id = $(data).data("id");
    var info = $(data).data("info");
    if(info == "supplier") {
        modalSupplier(id, baseUrl);
    } else if(info == "barang") {
        modalBarang(id, baseUrl);
    } else if(info == "stok"){
        modalStok(id, baseUrl);
    } else {
        window.location.href = baseUrl+'gudang/detail_pembelian/'+id;
    }
    
}

function enableForm(data) {
    var info = $(data).data("info");
    if(info == "supplier") {
        $(".modal-body .form-control").prop('disabled', false);
    } else if(info == "barang") {
        $(".modal-body .form-control:not(#nama_supplier,#kode_barang)").prop('disabled', false);
    } else {
        $(".modal-body .form-control:not(#tanggal_pembelian,#nama_barang)").prop('disabled', false);
    }
    
    $("#btn-edit").prop('disabled', true);
    $("#btn-submit").prop('disabled', false);
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
        }
    });
}


function modalStok(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"gudang/stok_id/"+id,
        dataType : "JSON",
        success: function(response) {
            console.log(response)
            // get data
            $('#tanggal_pembelian').val(response.tanggal_pembelian);
            $('#nama_barang').val(response.nama_barang);
            $('#stok_barang').val(response.stok_barang);
            $('#tanggal_expired').val(response.tanggal_expired);
            $('#tanggal_return').val(response.tanggal_return);
            // utility
            $('#form-edit').attr("action", baseUrl+'gudang/update_stok/'+id)
            $('#modalEdit').modal('show');
            $("#modalEdit .form-control").prop('disabled', true);
            $("#btn-edit").prop('disabled', false);
        }
    });
}