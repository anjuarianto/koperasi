function tampilDataTable(data, baseUrl) {
    var id = $(data).data("id");
    var info = $(data).data("info");
    if(info == "detail_penjualan") {
        modalDetailPenjualan(id, baseUrl);
    } else if(info == "penjualan") {
        window.location.href = baseUrl+'kasir/detail_penjualan/'+id;
    } else if(info == "kode_voucher") {
        detailVoucher(id, baseUrl);
    }
}

function detailVoucher(data) {
    var id = $(data).data("id");
    var baseUrl = $(data).data("info");
    $.ajax({
        type: "POST",
        url: baseUrl+"kasir/voucher_id/"+id,
        dataType : "JSON",
        success: function(response) {
            if(response.status == 0)
            $('#id_voucher').val(response.id_voucher);
            $('#nama_anggota').val(response.nama);
            $('#bulan').val(response.bulan);
            $('#tahun').val(response.tahun);
            $('#status').val(response.status == 0 ? 'Aktif' : 'Hangus');

            $("#modalDetailVoucher .form-control").prop('disabled', true);
            $('#modalDetailVoucher').modal('show');
        }
    });
}

function enableForm(data) {
    var info = $(data).data("info");
    if(info == "detail-penjualan") {
        $(".modal-body .form-control:not(#kode_barang, #nama_barang, #nama_supplier)").prop('disabled', false);
    } else if(info == "penjualan") {
        $(".modal-body .form-control:not(#no_struk)").prop('disabled', false);
        $("#btn-edit-penjualan").prop('disabled', true);
        $("#btn-submit-penjualan").prop('disabled', false);
    }
    
    $("#btn-edit").prop('disabled', true);
    $("#btn-submit").prop('disabled', false);
}


function returnBarang(data) {
console.log(data)
}

function modalEditPenjualan(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"kasir/penjualan_id/"+id,
        dataType : "JSON",
        success: function(response) {
            $('#no_struk').val(response.id_penjualan);
            $('#tgl_penjualan').val(response.tgl_penjualan);
            $('#kode_voucher').val(response.kode_voucher);
            $('#jenis_pembayaran').val(response.jenis_pembayaran);
            $('#nominal_uang').val(response.nominal_uang);
            // $('#form-edit-penjualan').attr("action", baseUrl+'kasir/update_penjualan/'+id)
            $("#modalEditPenjualan .form-control").prop('disabled', true);

            $("#btn-edit-penjualan").attr('data-info', 'penjualan');
            $("#btn-edit-penjualan").prop('disabled', false);
            $("#btn-submit-penjualan").prop('disabled', true);
        }
    });
}

function modalDetailPenjualan(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"kasir/detail_penjualan_id/"+id,
        dataType : "JSON",
        success: function(response) {
            console.log(response)
            
            $('#nama_barang').val(response.nama_barang);
            $('#kode_barang').val(response.kode_barang);
            $('#nama_supplier').val(response.nama_supplier);
            $('#jumlah_barang').val(response.jumlah_barang);
            
            $('#form-edit').attr("action", baseUrl+'kasir/update_detail_penjualan/'+id)
            $("#modalEdit .form-control").prop('disabled', true);
            $('#modalEdit').modal('show');

            $("#btn-edit").attr('data-info', 'detail-penjualan');
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}