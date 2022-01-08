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
                    
                    <h3 class="text-center UC text-line">SURAT KELAHIRAN</h3>
                    <h3 class="text-center line-height-0">Nomor :</h3>
                    
                    <p class="mt-20">Yang bertanda tangan dibawah ini, Lurah Penataban Kecamatan Giri Kabupaten Banyuwangi Menerangkan bahwa :</p>
                    <ul>
                        <li>
                            <div class="box">
                                <div class="box-left w-100">
                                    <?php $no = 1; ?>
                                    <table>
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
                                            <td>Tempat dan tanggal lahir</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Telah lahir seorang anak</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Anak Ke</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Dari seorang ibu bernama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Istri dari </td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td><b>Bidan Penolong</b></td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Demikian Surat Keterangan Kelahiran ini dibuat atas dasar yang sebenarnya</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Yang Melapor</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Hubungan Yang Melapor</td>
                                            <td>:</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="box-right w-50 ml-auto">
                                    <table>
                                        <tr>
                                            <td> {{ hari(date('l', strtotime($kelahiran->tanggal_lahir))) ? hari(date('l', strtotime($kelahiran->tanggal_lahir))) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ date('d-m-Y', strtotime($kelahiran->tanggal_lahir)) ? date('d-m-Y', strtotime($kelahiran->tanggal_lahir)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->tempat_lahir ? $kelahiran->tempat_lahir : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->tempat_lahir . ', ' . $kelahiran->tanggal_lahir ? $kelahiran->tempat_lahir . ', ' . $kelahiran->tanggal_lahir : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->jenkel ? ucwords($kelahiran->jenkel) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->anak_ke ? $kelahiran->anak_ke : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_ibu->nama ? $data_ibu->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $pasangan->alamat ? $pasangan->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_bapak->nama ? $data_bapak->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->nama_penyalin ? $kelahiran->nama_penyalin : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->nama_pelapor ? $kelahiran->nama_pelapor : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->hubungan_pelapor ? $kelahiran->hubungan_pelapor : 'belum diisi' }}</td>
                                        </tr>
                                    </table>
                                    
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="box-100 mt-40">

                        <div class="box">
                            
                            <div class="w-40 ml-auto line-height-0">
                                <p>
                                    {{ 'Banyuwangi, '.date('d F Y', strtotime($kelahiran->created_at)) }}
                                </p>
                                <p>
                                    Kepala Desa/Lurah
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
                    
                    <h3 class="text-center UC text-line">SURAT KELAHIRAN</h3>
                    <h3 class="text-center line-height-0">Nomor :</h3>
                    
                    <h3 class="text-center UC text-line mt-20">Bayi</h3>
                    <ul>
                        <li>
                            <div class="box">
                                <div class="box-left w-100">
                                    <?php $no = 1; ?>
                                    <table>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Dilahirkan di</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Kelahiran</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Jika kembar, anak ini lahir yang ke-</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Tempat Kelahiran</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Penolong Kelahiran</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="mt-10 UC text-line text-right">Bapak</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Dilahirkan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Kewarganegaraan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="mt-10 UC text-line text-right">Ibu</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Dilahirkan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>Kewarganegaraan</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>No. KK</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <!-- <td class="w-1">{{ $no++ . ". " }}</td> -->
                                            <td>KTP</td>
                                            <td>:</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                                <div class="box-right w-50 ml-auto">
                                    <table>
                                        <tr>
                                            <td> {{ $kelahiran->nama ? $kelahiran->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->jenkel ? $kelahiran->jenkel : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>{{ $kelahiran->tempat_lahir . ', ' . $kelahiran->tanggal_lahir ? $kelahiran->tempat_lahir . ', ' . $kelahiran->tanggal_lahir : 'belum diisi' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td> {{ 'Tunggal' }}</td>
                                            <td> {{ 'Kembar' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->anak_ke ? $kelahiran->anak_ke : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->tempat_lahir ? $kelahiran->tempat_lahir : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->status_penyalin ? ucwords($kelahiran->status_penyalin) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="mt-10 UC text-line text-center">&nbsp;</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_bapak->nama ? $data_bapak->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_bapak->alamat ? $data_bapak->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>{{ $data_bapak->tempat_lahir . ', ' . $data_bapak->tanggal_lahir ? $data_bapak->tempat_lahir . ', ' . $data_bapak->tanggal_lahir : 'belum diisi' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_bapak->kewarganegaraan ? $data_bapak->kewarganegaraan : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <h4 class="mt-10 UC text-line text-center">&nbsp;</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_ibu->nama ? $data_ibu->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_ibu->alamat ? $data_ibu->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> <b>{{ $data_ibu->tempat_lahir . ', ' . $data_ibu->tanggal_lahir ? $data_ibu->tempat_lahir . ', ' . $data_ibu->tanggal_lahir : 'belum diisi' }}</b></td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_ibu->kewarganegaraan ? $data_ibu->kewarganegaraan : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->no_kk ? $kelahiran->no_kk : 'belum diisi' }}</td>
                                        </tr>

                                        <tr>
                                            <td> {{ $data_ibu->nik ? $data_ibu->nik : 'belum diisi' }}</td>
                                        </tr>
                                        
                                    </table>
                                    
                                </div>
                            </div>
                        </li>
                    </ul>


                    <div class="box-100 mt-150">

                        <div class="box">
                            
                            <div class="w-40 ml-auto line-height-0">
                                <p>
                                    {{ 'Banyuwangi, '.date('d F Y', strtotime($kelahiran->created_at)) }}
                                </p>
                                <p>
                                    Kepala Desa/Lurah
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
                    <h3 class="text-center UC text-line">UNTUK ARSIP DESA/KELURAHAN</h3>
                    
                    <h3 class="text-center UC text-line">SURAT KELAHIRAN</h3>
                    <h3 class="text-center line-height-0">Nomor :</h3>
                    
                    <p class="mt-20">Yang bertanda tangan dibawah ini, Lurah Penataban Kecamatan Giri Kabupaten Banyuwangi Menerangkan bahwa :</p>
                    <ul>
                        <li>
                            <div class="box">
                                <div class="box-left w-100">
                                    <?php $no = 1; ?>
                                    <table>
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
                                            <td>Tempat dan tanggal lahir</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Telah lahir seorang anak</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Anak Ke</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Dari seorang ibu bernama</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Istri dari </td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td><b>Bidan Penolong</b></td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">Demikian Surat Keterangan Kelahiran ini dibuat atas dasar yang sebenarnya</td>
                                        </tr>
                                        <!-- <tr>
                                            <td>Nama Yang Melapor</td>
                                            <td>:</td>
                                        </tr>
                                        <tr>
                                            <td>Hubungan Yang Melapor</td>
                                            <td>:</td>
                                        </tr> -->
                                    </table>
                                </div>
                                <div class="box-right w-50 ml-auto">
                                    <table>
                                        <tr>
                                            <td> {{ hari(date('l', strtotime($kelahiran->tanggal_lahir))) ? hari(date('l', strtotime($kelahiran->tanggal_lahir))) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ date('d-m-Y', strtotime($kelahiran->tanggal_lahir)) ? date('d-m-Y', strtotime($kelahiran->tanggal_lahir)) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->tempat_lahir ? $kelahiran->tempat_lahir : 'belum diisi' }} </td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->tempat_lahir . ', ' . $kelahiran->tanggal_lahir ? $kelahiran->tempat_lahir . ', ' . $kelahiran->tanggal_lahir : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->jenkel ? ucwords($kelahiran->jenkel) : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->anak_ke ? $kelahiran->anak_ke : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_ibu->nama ? $data_ibu->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $pasangan->alamat ? $pasangan->alamat : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $data_bapak->nama ? $data_bapak->nama : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->nama_penyalin ? $kelahiran->nama_penyalin : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <!-- <tr>
                                            <td> {{ $kelahiran->nama_pelapor ? $kelahiran->nama_pelapor : 'belum diisi' }}</td>
                                        </tr>
                                        <tr>
                                            <td> {{ $kelahiran->hubungan_pelapor ? $kelahiran->hubungan_pelapor : 'belum diisi' }}</td>
                                        </tr> -->
                                    </table>
                                    
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="box-100 mt-40">

                        <div class="box">
                            
                            <div class="w-40 ml-auto line-height-0">
                                <p>
                                    {{ 'Banyuwangi, '.date('d F Y', strtotime($kelahiran->created_at)) }}
                                </p>
                                <p>
                                    Kepala Desa/Lurah
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