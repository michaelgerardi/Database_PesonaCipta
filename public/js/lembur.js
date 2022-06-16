function lembur()
{
    // Date.getTime();
    // date_default_timezone_set('Asia/Jakarta');
    var jam_masuk =  Date(document.getTime("jam_masuk").value);
    var jam_keluar = Date(document.getTime("jam_keluar").value);
    document.getElementById("lembur").value = "jam";
}
