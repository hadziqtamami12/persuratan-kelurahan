<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perizinan Nikah Kelurahan</title>
    <style>
        @page{
            page-break-inside: avoid
        }
        body{
            font-family : "Times New Roman", Times, serif;
            line-height: 1;
            font-size : 16px;
            margin : 50px;
            margin-top: 0;

        }
        table{
            border-collapse : collapse;
        }
        ul{
            list-style-type : none;
        }
        .box{
            display : flex;
            height : 150px;
            max-height : 700px;
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
        .mb-minus-1{
            margin-bottom: -1px;
        }
        .mb-minus-5{
            margin-bottom: -5px;
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
    <div class="w-100 mt-minus-20">
        <h3 class="text-right mt-minus-10">Model N5</h3>
        <h3 class="text-center UC text-line mb-30">SURAT IZIN ORANG TUA</h3>
        
        <p class="mt-20 mb-minus-10">Yang bertanda tangan di bawah ini:</p>
        <ol type="A">
            <li>
                <div class="box">
                    <div class="box-left w-100">
                        <?php $no = 1; ?>
                        <table>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nomor Induk Kependudukan (NIK)</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Tempat dan tanggal lahir</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Agama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Alamat</td>
                                <td>:</td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="box-right w-50 ml-auto">
                        <table>
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
                        </table>
                    </div>
                </div>
            </li>
            <li>
            <div class="box">
                    <div class="box-left w-100">
                        <?php $no = 1; ?>
                        <table>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nomor Induk Kependudukan (NIK)</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Tempat dan tanggal lahir</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Agama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Alamat</td>
                                <td>:</td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="box-right w-50 ml-auto">
                        <table>
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
                        </table>
                    </div>
                </div>
            </li>
        </ol>

        <ul>
            <p class="mt-minus-10 mb-minus-1">Adalah ayah dan Ibu kandung / wali / pengampu dari :</p>
            <li>
                <div class="box">
                    <div class="box-left w-100">
                        <?php $no = 1; ?>
                        <table>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nomor Induk Kependudukan (NIK)</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Tempat dan tanggal lahir</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Agama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Alamat</td>
                                <td>:</td>
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
                        </table>
                    </div>
                </div>
            </li>
            <li>
            <p class="mb-minus-1">Memberi ijin kepada anak kami untuk melakukan perkawinan dengan :</p>
            <div class="box">
                    <div class="box-left w-100">
                        <?php $no = 1; ?>
                        <table>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Nomor Induk Kependudukan (NIK)</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Tempat dan tanggal lahir</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Kewarganegaraan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Agama</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Pekerjaan</td>
                                <td>:</td>
                            </tr>
                            <tr>
                                <td class="w-5">{{ $no++ . ". " }}</td>
                                <td>Alamat</td>
                                <td>:</td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="box-right w-50 ml-auto">
                        <table>
                            <tr>
                                <td> {{ $pasangan->nama ? $pasangan->nama : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->nik ? $pasangan->nik : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->jenkel ? $pasangan->jenkel : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->tempat_lahir . ', ' . $pasangan->tanggal_lahir ? $pasangan->tempat_lahir . ', ' . $pasangan->tanggal_lahir : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->kewarganegaraan ? $pasangan->kewarganegaraan : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->agama ? $pasangan->agama : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->pekerjaan ? $pasangan->pekerjaan : 'belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td> {{ $pasangan->alamat ? $pasangan->alamat : 'belum diisi' }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </li>
        </ul>


        <div class="box-100">
            
            <p class="mt-30 text-right">
                {{ date('d F Y', strtotime($izin->created_at)) }}
            </p>

            <div class="box">
                <div class="w-60 line-height-0">
                    <p>
                        Ayah
                    </p>
                    <p class="line-height-6">
                        ...............................................
                    </p>
                </div>
                <div class="w-40 ml-auto line-height-0">
                    <p>
                        Ibu
                    </p>
                    <p class="line-height-6">
                        ...............................................
                    </p>
                </div>
            </div>

        </div>
        
    </div>
    
</body>
</html>