function tampilDataTable(data, baseUrl) {
    var id = $(data).data("id");
    var info = $(data).data("info");
    if(info == "pinjam") {
        window.location.href = baseUrl+'anggota/detail_pinjam/'+id;
    } else if (info == "transaksi") {
        window.location.href = baseUrl+'anggota/detail_transaksi/'+id;
    }
}