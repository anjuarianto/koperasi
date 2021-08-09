function tampilDataTable(data, baseUrl) {
    var id = $(data).data("id");
    var info = $(data).data("info");
    if(info == "user") {
        modalUser(id, baseUrl);
    }
    
}


function modalUser(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"admin/id_user/"+id,
        dataType : "JSON",
        success: function(response) {
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