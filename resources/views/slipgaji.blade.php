<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <br/>
<style type="text/css">
<!--
	p {margin: 0; padding: 0;}	.ft10{font-size:16px;font-family:Times;color:#000000;}
	.ft11{font-size:21px;font-family:Times;color:#000000;}
	.ft12{font-size:16px;font-family:Times;color:#000000;}
-->
</style>
</head>
<body bgcolor="#A0A0A0" vlink="blue" link="blue">
<div id="page1-div" style="position:relative;width:850px;height:637px;">
<img width="850" height="637" src="{{'image/target001.png'}}" alt="background image"/>
<p style="position:absolute;top:68px;left:64px;white-space:nowrap" class="ft10">&#160;</p>
<p style="position:absolute;top:68px;left:118px;white-space:nowrap" class="ft10">&#160;</p>
<p style="position:absolute;top:68px;left:172px;white-space:nowrap" class="ft10">&#160;</p>
<p style="position:absolute;top:104px;left:291px;white-space:nowrap" class="ft11"><b>SLIP&#160;GAJI KARYAWAN&#160;</b></p>
<p style="position:absolute;top:144px;left:64px;white-space:nowrap" class="ft12"><b>&#160;</b></p>
<p style="position:absolute;top:179px;left:510px;white-space:nowrap" class="ft12"><b>Tanggal Penggajian: {{DB::table('history_gaji')->where('id',$id_his)->value('tanggal_gaji')}}&#160;</b></p>
<p style="position:absolute;top:213px;left:64px;white-space:nowrap" class="ft12"><b>NIP&#160;</b></p>
<p style="position:absolute;top:213px;left:118px;white-space:nowrap" class="ft12"><b>&#160;</b></p>
<p style="position:absolute;top:213px;left:172px;white-space:nowrap" class="ft12"><b>:&#160;</b></p>
<p style="position:absolute;top:213px;left:226px;white-space:nowrap" class="ft12"><b>{{DB::table('users')->where('id',$datagaji->id_karyawan)->value('nip')}}&#160;</b></p>
<p style="position:absolute;top:248px;left:64px;white-space:nowrap" class="ft12"><b>Nama&#160;&#160;&#160;</b></p>
<p style="position:absolute;top:248px;left:172px;white-space:nowrap" class="ft12"><b>:&#160;</b></p>
<p style="position:absolute;top:248px;left:226px;white-space:nowrap" class="ft12"><b>{{DB::table('users')->where('id',$datagaji->id_karyawan)->value('nama_karyawan')}}&#160;</b></p>
<p style="position:absolute;top:282px;left:64px;white-space:nowrap" class="ft12"><b>Divisi&#160;&#160;&#160;</b></p>
<p style="position:absolute;top:282px;left:172px;white-space:nowrap" class="ft12"><b>:&#160;</b></p>
<p style="position:absolute;top:282px;left:226px;white-space:nowrap" class="ft12"><b>{{DB::table('divisi')->where('id',DB::table('users')->where('id',$datagaji->id_karyawan)->value('id_divisi'))->value('divisi')}}&#160;</b></p>
<p style="position:absolute;top:316px;left:64px;white-space:nowrap" class="ft12"><b>Jabatan&#160;</b></p>
<p style="position:absolute;top:316px;left:172px;white-space:nowrap" class="ft12"><b>:&#160;</b></p>
<p style="position:absolute;top:316px;left:226px;white-space:nowrap" class="ft12"><b>{{DB::table('jabatan')->where('id',DB::table('users')->where('id',$datagaji->id_karyawan)->value('id_jabatan'))->value('gol_jabatan')}}&#160;</b></p>
<p style="position:absolute;top:351px;left:64px;white-space:nowrap" class="ft12"><b>Lokasi Kerja&#160;&#160;:&#160;</b></p>
<p style="position:absolute;top:351px;left:226px;white-space:nowrap" class="ft12"><b>{{DB::table('lokasi_kerja')->where('id',DB::table('users')->where('id',$datagaji->id_karyawan)->value('id_lokasikerja'))->value('nama_lokasi')}}&#160;</b></p>
<p style="position:absolute;top:385px;left:64px;white-space:nowrap" class="ft12"><b>BPJS&#160;&#160;&#160;</b></p>
<p style="position:absolute;top:385px;left:172px;white-space:nowrap" class="ft12"><b>:&#160;</b></p>
<p style="position:absolute;top:385px;left:226px;white-space:nowrap" class="ft12"><b>{{$datagaji->bpjs}}&#160;</b></p>
<p style="position:absolute;top:419px;left:64px;white-space:nowrap" class="ft12"><b>Gaji Pokok&#160;&#160;:&#160;</b></p>
<p style="position:absolute;top:419px;left:226px;white-space:nowrap" class="ft12"><b>{{$datagaji->gaji_pokok}}&#160;</b></p>
</div>
</body>
</html>
