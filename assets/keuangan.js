function tampilDataTable(data, baseUrl) {
    var id = $(data).data("id");
    var info = $(data).data("info");
    if(info == "pinjam") {
        window.location.href = baseUrl+'keuangan/history_pinjam/'+id;
    } else if(info == "pemasukan") {
        modalPemasukan(id, baseUrl);
    } else if (info == "simpan") {
        window.location.href = baseUrl+'keuangan/history_simpan/'+id;
    } else if(info == "history_pinjam") {
        modalHistoryPinjam(id, baseUrl);
    } else if (info == "history_simpan") {
        modalHistorySimpan(id, baseUrl);
    }
    
}

function enableForm(data) {
    var info = $(data).data("info");
    
    if(info == "history_simpan") {
        $(".modal-body .form-control:not(#kode_anggota)").prop('disabled', false);
    } else if(info == "history_pinjam") {
        $(".modal-body .form-control:not(#kode_anggota)").prop('disabled', false);
    }
    
    $("#btn-edit").prop('disabled', true);
    $("#btn-submit").prop('disabled', false);
}


function modalPemasukan(id, baseUrl) {
    
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

function modalHistoryPinjam(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"keuangan/history_pinjam_id/"+id,
        dataType : "JSON",
        success: function(response) {
            // get data
            $('#bunga').val(response.bunga);
            $('#angsuran').val(response.angsuran);
            $('#tanggal_pinjam').val(response.tanggal_history_pinjam);
            $('#modalEdit').modal('show');

            // utility
            $('#form-edit').attr("action", baseUrl+'keuangan/update_history_pinjam/'+id);
            $("#btn-edit").attr('data-info', 'history_pinjam');
            $("#modalEdit .form-control").prop('disabled', true);
            
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}

function modalHistorySimpan(id, baseUrl) {
    $.ajax({
        type: "POST",
        url: baseUrl+"keuangan/history_simpan_id/"+id,
        dataType : "JSON",
        success: function(response) {
            // get data
            $('#wajib').val(response.wajib);
            $('#sukarela').val(response.sukarela);
            $('#tanggal').val(response.tanggal);
            $('#kode_anggota').val(response.kode_anggota)
            $('#modalEdit').modal('show');

            // utility
            $('#form-edit').attr("action", baseUrl+'keuangan/update_history_simpan/'+id);
            
            $("#modalEdit .form-control").prop('disabled', true);
            $("#btn-edit").attr('data-info', 'history_simpan');
            $("#btn-edit").prop('disabled', false);
            $("#btn-submit").prop('disabled', true);
        }
    });
}
