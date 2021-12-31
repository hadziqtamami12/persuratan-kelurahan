<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar Kelurahan</title>
    <style>
        @page{
            page-break-inside: avoid
        }
        body{
            font-family : "Times New Roman", Times, serif;
            line-height: 1;
            font-size : 15px;
            margin : 50px;
            margin-top: 0;

        }
        table{
            border-collapse : collapse;
            /* border-spacing: 0; */
        }
        .box{
            display : flex;
            max-height: 700px;
        }
        .ml-auto{
            margin-left : auto;
        }
        .w-100{
            width : 100%;
        }
        .w-5{
            width : 5%;
        }
        .w-40{
            width : 40%;
        }
        .w-43{
            width : 43%;
        }
        .w-45{
            width : 45%;
        }
        .w-50{
            width : 50%;
        }
        .w-55{
            width : 55%;
        }
        .w-60{
            width : 60%;
        }
        .w-70{
            width : 70%;
        }
        .w-80{
            width : 80%;
        }
        .UC{
            text-transform : uppercase;
        }
        .fs-17{
            font-size : 17px;
        }
        .text-center{
            text-align: center;
        }
        .line-height-0{
            line-height : 0;
        }
        .line-height-2{
            line-height : 2;
        }
        .line-height-3{
            line-height : 3;
        }
        
        .text-right{
            text-align: right;
        }
        .text-left-5{
            margin-left: 5%;
        }
        .text-line{
            text-decoration: underline;
        }
        .mt-minus-10{
            margin-top: -10px;
        }
        .mt-minus-20{
            margin-top: -20px;
        }
        .mt-10{
            margin-top: 10px;
        }
        .mb-10{
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body>
    <div class="w-100 mt-minus-20">
        <h3 class="text-center UC">Formulir Pengantar Nikah</h3>
        <h3 class="text-right mt-minus-10">Model N1</h3>

        <div class="w-100 mt-minus-10">
            <table class="w-100">
                <tr>
                    <td class="w-43">KANTOR DESA/KELURAHAN</td>
                    <td>:</td>
                    <td class="w-50">TUKANGKAYU</td>
                </tr>
                <tr>
                    <td class="w-43">KECAMATAN</td>
                    <td>:</td>
                    <td class="w-50">TUKANGKAYU</td>
                </tr>
                <tr>
                    <td class="w-43">KABUPATEN/KOTA</td>
                    <td>:</td>
                    <td class="w-50">TUKANGKAYU</td>
                </tr>
            </table>
        </div> 

        <div class="box-100">
            <h3 class="text-line text-center">PENGANTAR NIKAH</h3>
            <h3 class="text-center line-height-0">Nomor :</h3>
            <p class="text-left-5 mt-10">Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa :</p>
            <div class="box">
                <div class="box-left w-100">
                    <?php $no = 1; ?>
                    <table>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Nama</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Nomor Induk Kependudukan (NIK)</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Tempat dan tanggal lahir</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Agama</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Pekerjaan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Alamat</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Status Perkawinan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td class="w-5">{{ $no++ }}</td>
                            <td>Nama istri / suami terdahulu</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr class="line-height-2">
                            <td colspan="3">Adalah benar anak dari perkawinan seorang pria :</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nama Lengkap dan alias</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nomor Induk Kependudukan (NIK)</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Jenis Kelamin</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Tempat dan tanggal lahir</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Kewarganegaraan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Agama</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Pekerjaan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Alamat</td>
                            <td>:</td>
                        </tr>
                        <tr class="line-height-2">
                            <td colspan="3">dengan seorang wanita :</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nama Lengkap dan alias</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nomor Induk Kependudukan (NIK)</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Jenis Kelamin</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Tempat dan tanggal lahir</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Kewarganegaraan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Agama</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Pekerjaan</td>
                            <td>:</td>
                        </tr>
                        <tr>
                            <td colspan="2">Alamat</td>
                            <td>:</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="mt-10">
                            <td colspan="5">Demikian, surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan
        sebagaimana mestinya.</td>
                        </tr>
                    </table>
                </div>
                <div class="box-right w-50 ml-auto">
                    <table>
                        <tr>
                            <td> {{ $keluarga->nama ? $keluarga->nama : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->nik ? $keluarga->nik : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->jenkel ? $keluarga->jenkel : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->tempat_lahir . ', ' . $keluarga->tanggal_lahir ? $keluarga->tempat_lahir . ', ' . $keluarga->tanggal_lahir : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->kewarganegaraan ? $keluarga->kewarganegaraan : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->agama ? $keluarga->agama : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->pekerjaan ? $keluarga->pekerjaan : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->alamat ? $keluarga->alamat : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $keluarga->status_nikah ?  $keluarga->status_nikah : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> &nbsp; </td>
                            <td> &nbsp; </td>
                            <td> &nbsp; </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr class="line-height-2">
                            <td> &nbsp; </td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->nama ? $ayah->nama : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->nik ? $ayah->nik : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->jenkel ? $ayah->jenkel : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->tempat_lahir . ', ' . $ayah->tanggal_lahir ? $ayah->tempat_lahir . ', ' . $ayah->tanggal_lahir : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->kewarganegaraan ? $ayah->kewarganegaraan : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->agama ? $ayah->agama : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->pekerjaan ? $ayah->pekerjaan : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ayah->alamat ? $ayah->alamat : 'belum diisi' }}</td>
                        </tr>
                        <tr class="line-height-2">
                            <td> &nbsp; </td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->nama ? $ibu->nama : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->nik ? $ibu->nik : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->jenkel ? $ibu->jenkel : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->tempat_lahir . ', ' . $ibu->tanggal_lahir ? $ibu->tempat_lahir . ', ' . $ibu->tanggal_lahir : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->kewarganegaraan ? $ibu->kewarganegaraan : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->agama ? $ibu->agama : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->pekerjaan ? $ibu->pekerjaan : 'belum diisi' }}</td>
                        </tr>
                        <tr>
                            <td> {{ $ibu->alamat ? $ibu->alamat : 'belum diisi' }}</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="5">Banyuwangi, {{ date('d F Y', strtotime($pengantar->created_at)) }}</td>
                        </tr>
                        <tr class="line-height-1">
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="5">Kepala Desa/Lurah</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr class="line-height-2">
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="5">..................................................</td>
                        </tr>
                        
                    </table>
                </div>

                        
            </div>

                   
        </div>
        
    </div>
    
</body>
</html>