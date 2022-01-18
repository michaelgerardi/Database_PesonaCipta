function myFunction() {
 var gaji_pokok = parseInt(document.getElementById("gaji_pokok").value);
 var gaji_tunjangan = parseInt(document.getElementById("gaji_tunjangan").value);
 var thr = parseInt(document.getElementById("thr").value);
 var bpjs = parseInt(document.getElementById("bpjs").value);
  document.getElementById("valtot").value = gaji_pokok+gaji_tunjangan+thr-bpjs;
}