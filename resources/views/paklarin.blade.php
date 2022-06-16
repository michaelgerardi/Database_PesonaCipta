<html>

    <head>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8">
        <meta name=Generator content="Microsoft Word 15 (filtered)">
        <style>
        <!--
         /* Font Definitions */
         @font-face
            {font-family:"Cambria Math";
            panose-1:2 4 5 3 5 4 6 3 2 4;}
        @font-face
            {font-family:Calibri;
            panose-1:2 15 5 2 2 2 4 3 2 4;}
         /* Style Definitions */
         p.MsoNormal, li.MsoNormal, div.MsoNormal
            {margin-top:0in;
            margin-right:0in;
            margin-bottom:8.0pt;
            margin-left:0in;
            line-height:107%;
            font-size:11.0pt;
            font-family:"Calibri",sans-serif;}
        .MsoChpDefault
            {font-family:"Calibri",sans-serif;}
        .MsoPapDefault
            {margin-bottom:8.0pt;
            line-height:107%;}
        @page WordSection1
            {size:595.3pt 841.9pt;
            margin:170.1pt 1.0in 1.0in 1.0in;}
        div.WordSection1
            {page:WordSection1;}
        -->
        </style>

        </head>

<body lang=EN-US style='word-wrap:break-word'>

<div class=WordSection1>

<p class=MsoNormal align=center style='text-align:center'><b><u><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>SURAT
KETERANGAN KERJA</span></u></b></p>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>No.
104/HRPC/SKK/2022</span></b></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:12.0pt;
line-height:107%;font-family:"Times New Roman",serif'>Dengan ini Manajemen PT.
Pesona Cipta menerangkan, bahwa:</span></p>

<p class=MsoNormal style='margin-left:42.55pt;text-align:justify'><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>Nama                                    : {{$data->nama_karyawan}}
</span></p>

<p class=MsoNormal style='margin-left:42.55pt;text-align:justify'><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>Tempat/
Tanggal Lahir         : {{DB::table('users')->where('id',$data->id_karyawan)->value('tgl_lahir')}} </span></p>

<p class=MsoNormal style='margin-left:42.55pt;text-align:justify'><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>Alamat                                  : {{DB::table('users')->where('id',$data->id_karyawan)->value('alamat')}}</span></p>

<p class=MsoNormal style='margin-left:42.55pt;text-align:justify'><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal style='margin-left:42.55pt;text-align:justify'><span
style='font-size:12.0pt;line-height:107%;font-family:"Times New Roman",serif'>No.
KTP                               : {{DB::table('users')->where('id',$data->id_karyawan)->value('no_ktp')}}</span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:12.0pt;
line-height:107%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>Adalah
benar nama tersebut di atas telah bekerja di PT. Pesona Cipta, yang di tempatkan
di {{$loker->nama_lokasi}} terhitung sejak di {{$data->tanggal_awal_kerja}} sampai
dengan {{$data->tanggal_akhir_kerja}} dengan posisi terakhir sebagai {{DB::table('jabatan')->where('id',$user)->value('gol_jabatan')}}.
Untuk itu Manajemen PT. Pesona Cipta menyampaikan terima kasih yang
sebesar-besarnya atau kerjasamanya selama ini.</span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>Demikianlah
surat keterangan ini kami buat dengan sebenar-benarnya untuk dapat dipergunakan
sebagaimana mestinya.</span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>Yogyakarta,
<i>date</i></span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>PT.
Pesona Cipta</span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;line-height:150%'><span
style='font-size:12.0pt;line-height:150%;font-family:"Times New Roman",serif'>&nbsp;</span></p>

<p class=MsoNormal style='text-align:justify;line-height:normal'><u><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>Whulan Nawangsari,
S.Pd</span></u></p>

<p class=MsoNormal style='text-align:justify;line-height:normal'><span
style='font-size:12.0pt;font-family:"Times New Roman",serif'>HRD Manager</span></p>

</div>

</body>

</html>
