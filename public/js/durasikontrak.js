function durKontrak()
{
// Date.getTime();
var awal_kontrak = new Date(document.getElementById("awal_kontrak").value);
var akhir_kontrak = new Date(document.getElementById("akhir_kontrak").value);
 document.getElementById("durkon").value = (((akhir_kontrak-awal_kontrak)/3600)/24)/1000+ " Hari";
}
