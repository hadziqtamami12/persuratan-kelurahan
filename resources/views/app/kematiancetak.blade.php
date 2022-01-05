<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat UNTUK ARSIP DESA/KELURAHAN Kelurahan</title>
    <style>
        @page{
            page-break-inside: avoid
        }
        body{
            font-family : "Times New Roman", Times, serif;
            line-height: 1;
            font-size : 12px;
            /* margin : 50px; */
            margin-top: 0;
            /* color : red; */
            
        }
        table{
            border-collapse : collapse;
        }
        .box{
            display : flex;
            justify-content: space-around;
            height : 180px;
            max-height : 700px;
        }
        .box-30{
            /* width : 30%; */
            height: 550px;
            border: 1px solid black;
            padding : 3%;
            margin : 1%;

        }
        ul{
            list-style-type : none;
        }
        .text-bold{
            font-weight: bold;
        }
        .ml-auto{
            margin-left : auto;
        }
        .w-100{
            width : 100%;
        }
        .w-1{
            width : 1%;
        }
        .w-5{
            width : 5%;
        }
        .w-30{
            width : 30%;
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
        .line-height-5{
            line-height : 5;
        }
        .line-height-6{
            line-height : 6;
        }
        .line-height-7{
            line-height : 7;
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
        .mb-minus-10{
            margin-bottom: -10px;
        }
        .mb-minus-20{
            margin-bottom: -20px;
        }
        .mt-10{
            margin-top: 10px;
        }
        .mt-20{
            margin-top: 20px;
        }
        .mt-30{
            margin-top: 30px;
        }
        .mt-40{
            margin-top: 40px;
        }
        .mt-50{
            margin-top: 50px;
        }
        .mt-60{
            margin-top: 60px;
        }
        .mt-70{
            margin-top: 70px;
        }
        .mt-80{
            margin-top: 80px;
        }
        .mt-150{
            margin-top: 150px;
        }
        .mb-10{
            margin-bottom: 10px;
        }
        .mb-20{
            margin-bottom: 20px;
        }
        .mb-30{
            margin-bottom: 30px;
        }
        .d-none{
            text-decoration : none;
        }
        
    </style>
    <?php 
    function hari ($hari) {
        switch ($hari) {
            case 'Sunday':
            return 'Minggu';
            case 'Monday':
            return 'Senin';
            case 'Tuesday':
            return 'Selasa';
            case 'Wednesday':
            return 'Rabu';
            case 'Thursday':
            return 'Kamis';
            case 'Friday':
            return 'Jumat';
            case 'Saturday':
            return 'Sabtu';
            default:
            return 'hari tidak valid';
            }
        }

    ?>


</head>
<body>
    <table width="100%" >
        <tr>
            <td class="w-30">
                <div class="box-30 mt-minus-20">
                    <h3 class="text-center UC text-line">UNTUK ARSIP DESA/KELURAHAN</h3>
                    
                    <h3 class="text-center UC text-line">SURAT KEMATIAN</h3>
                    <h3 class="text-center line-height-0">Nomor :</h3>
                    
                    <p class="mt-20">Yang bertanda tangan dibawah ini, Lurah Penataban Kecamatan Giri Kabupaten Banyuwangi Menerangkan bahwa :</p>
                    <ul>
                        <li>
                            <div class="box">
                                <div class="box-left w-100">
                                    <?php $no = 1; ?>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat/Tgl/Lahir</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Status Perkawinan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Umur</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Telah Meninggal Dunia Pada :</td>
                                        </tr>
                                        <tr>
                                            <td>Hari</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Di</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Disebabkan Karena</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Demikian Surat Keterangan ini dibuat atas dasar yang sebenarnya.</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Yang Melapor</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Hub. Dengan yg Mati</td>
                                            <td>:</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-right w-50 ml-auto">
                                    <table>
                                        <tr>
                                            <td class="text-bold"> {{ $kematian->nama ? $kematian->nama : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->tempat_lahir . ', ' . date('d-m-Y', strtotime($kematian->tanggal_lahir)) ? $kematian->tempat_lahir . ', ' . date('d-m-Y', strtotime($kematian->tanggal_lahir)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->jenkel ? $kematian->jenkel : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->agama ? $kematian->agama : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->status_kawin ? $kematian->status_kawin : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->alamat ? $kematian->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->usia ? $kematian->usia : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td  class="text-bold">{{ hari(date('l', strtotime($kematian->tanggal))) ? hari(date('l', strtotime($kematian->tanggal))) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ date('d F Y', strtotime($kematian->tanggal)) ? date('d F Y', strtotime($kematian->tanggal)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $kematian->tempat_kematian ? $kematian->tempat_kematian : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td  class="text-bold">{{ $kematian->penyebab_kematian ? $kematian->penyebab_kematian : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->nama_pelapor ? $kematian->nama_pelapor : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->hubungan_pelapor ? $kematian->hubungan_pelapor : 'belum diisi' }}</td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="box-100 mt-80">

                        <div class="box">
                            
                            <div class="w-40 ml-auto line-height-0">
                                <p>
                                    {{ 'Banyuwangi, '.date('d F Y', strtotime($kematian->created_at)) }}
                                </p>
                                <p>
                                    LURAH PENATABAN
                                </p>
                                <p class="line-height-6">
                                    ...............................................
                                </p>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </td>

            <td class="w-30">
                <div class="box-30 mt-minus-20">
                    <h3 class="text-center UC text-line">UNTUK ARSIP KECAMATAN</h3>
                    
                    <h3 class="text-center UC text-line">SURAT KEMATIAN</h3>
                    <h3 class="text-center line-height-0">Nomor :</h3>
                    
                    <p class="mt-20">Yang bertanda tangan dibawah ini, Lurah Penataban Kecamatan Giri Kabupaten Banyuwangi Menerangkan bahwa :</p>
                    <ul>
                        <li>
                            <div class="box">
                                <div class="box-left w-100">
                                    <?php $no = 1; ?>
                                    <table>
                                        <tr>
                                            <td class="text-bold">Nama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat/Tgl/Lahir</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Status Perkawinan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Umur</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Telah Meninggal Dunia Pada :</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">Hari</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Di</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">Disebabkan Karena</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Demikian Surat Keterangan ini dibuat atas dasar yang sebenarnya.</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-right w-50 ml-auto">
                                    <table>
                                        <tr>
                                            <td> {{ $kematian->nama ? $kematian->nama : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->tempat_lahir . ', ' . date('d-m-Y', strtotime($kematian->tanggal_lahir)) ? $kematian->tempat_lahir . ', ' . date('d-m-Y', strtotime($kematian->tanggal_lahir)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->jenkel ? $kematian->jenkel : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->agama ? $kematian->agama : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->status_kawin ? $kematian->status_kawin : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->alamat ? $kematian->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->usia ? $kematian->usia : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>{{ hari(date('l', strtotime($kematian->tanggal))) ? hari(date('l', strtotime($kematian->tanggal))) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ date('d F Y', strtotime($kematian->tanggal)) ? date('d F Y', strtotime($kematian->tanggal)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $kematian->tempat_kematian ? $kematian->tempat_kematian : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $kematian->penyebab_kematian ? $kematian->penyebab_kematian : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="box-100 mt-80">

                        <div class="box">
                            
                            <div class="w-40 ml-auto line-height-0">
                                <p>
                                    {{ 'Banyuwangi, '.date('d F Y', strtotime($kematian->created_at)) }}
                                </p>
                                <p>
                                    LURAH PENATABAN
                                </p>
                                <p class="line-height-6">
                                    ...............................................
                                </p>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </td>

            <td class="w-30">
                <div class="box-30 mt-minus-20">
                    <h3 class="text-center UC text-line">UNTUK YANG BERSANGKUTAN</h3>
                    
                    <h3 class="text-center UC text-line">SURAT KEMATIAN</h3>
                    <h3 class="text-center line-height-0">Nomor :</h3>
                    
                    <p class="mt-20">Yang bertanda tangan dibawah ini, Lurah Penataban Kecamatan Giri Kabupaten Banyuwangi Menerangkan bahwa :</p>
                    <ul>
                        <li>
                            <div class="box">
                                <div class="box-left w-100">
                                    <?php $no = 1; ?>
                                    <table>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat/Tgl/Lahir</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Status Perkawinan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Umur</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Telah Meninggal Dunia Pada :</td>
                                        </tr>
                                        <tr>
                                            <td>Hari</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Di</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Disebabkan Karena</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Demikian Surat Keterangan ini dibuat atas dasar yang sebenarnya.</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-right w-50 ml-auto">
                                    <table>
                                        <tr>
                                            <td class="text-bold"> {{ $kematian->nama ? $kematian->nama : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->tempat_lahir . ', ' . date('d-m-Y', strtotime($kematian->tanggal_lahir)) ? $kematian->tempat_lahir . ', ' . date('d-m-Y', strtotime($kematian->tanggal_lahir)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->jenkel ? $kematian->jenkel : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->agama ? $kematian->agama : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->status_kawin ? $kematian->status_kawin : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->alamat ? $kematian->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kematian->usia ? $kematian->usia : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">{{ hari(date('l', strtotime($kematian->tanggal))) ? hari(date('l', strtotime($kematian->tanggal))) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">{{ date('d F Y', strtotime($kematian->tanggal)) ? date('d F Y', strtotime($kematian->tanggal)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">{{ $kematian->tempat_kematian ? $kematian->tempat_kematian : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold">{{ $kematian->penyebab_kematian ? $kematian->penyebab_kematian : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="box-100 mt-80">

                        <div class="box">
                            
                            <div class="w-40 ml-auto line-height-0">
                                <p>
                                    {{ 'Banyuwangi, '.date('d F Y', strtotime($kematian->created_at)) }}
                                </p>
                                <p>
                                    LURAH PENATABAN
                                </p>
                                <p class="line-height-6">
                                    ...............................................
                                </p>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </td>
            
        </tr>
    </table>
    
</body>
</html>