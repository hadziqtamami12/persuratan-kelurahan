<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Permohonan Nikah Kelurahan</title>
    <style>
        @page{
            page-break-inside: avoid
        }
        body{
            font-family : "Times New Roman", Times, serif;
            line-height: 1;
            font-size : 17px;
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
        .mt-10{
            margin-top: 10px;
        }
        .mt-20{
            margin-top: 20px;
        }
        .mb-10{
            margin-bottom: 10px;
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
        <h3 class="text-center UC">Formulir Permohonan Nikah</h3>
        <h3 class="text-right mt-minus-10">Model N2</h3>

        <div class="w-100 box mt-20">
            <div class="w-70">
                <table>
                    <tr>
                        <td class="w-43">Perihal</td>
                        <td>:</td>
                        <td class="w-50">Permohonan kehendak pekawinan</td>
                    </tr>
                </table>
            </div>
            <div class="w-30 ml-auto">
                <table>
                    <tr>
                        <td class="w-50">{{ date('d F Y', strtotime($permohonan->created_at)) }}</td>
                    </tr>
                </table>
            </div>
        </div> 

        <div class="box-100">
            <p class="line-height-0" >Kepada Yth,</p>
            <p class="line-height-0">Kepala KBRI / KJRI / KUA Kecamatan ........................</p>
            <p class="line-height-0">di......................................................................................</p>
            <p>Dengan hormat, kami mengajukan permohonan kehendak perkawinan untuk atas nama kami calon suami: <b>{{ $keluarga->jenkel == 'laki-laki' ? $keluarga->nama : $pasangan->nama  }}</b>
               dengan calon istri <b>{{ $pasangan->jenkel == 'perempuan' ? $pasangan->nama : $keluarga->nama  }}</b>
               Pada hari {{ hari(date('l', strtotime($permohonan->tanggal))) }}  tanggal {{ date('d F Y', strtotime($permohonan->tanggal)) }}  bertempat di <b>{{ $permohonan->lokasi }}</b></p>
            

            <p class="mt-20">
                Bersama ini kami sampaikan surat – surat yang di perlukan untuk diperiksa sebagai berikut :
            </p>
            <ol type="1">
                <li>Surat pengantar perkawinan dari Desa / Kelurahan</li>
                <li>Persetujuan calon mempelai</li>
                <li>Fotokopi KTP</li>
                <li>Fotokopi Akta kelahiran</li>
                <li>Fotokopi kartu keluarga</li>
                <li>Paspoto 2x3 = 3lembar dan 4x6 berlatar belakang biru</li>
                <li>....................................................</li>
                <li>....................................................</li>
            </ol>
            
            <p class="mt-20">
                Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri dan dicatat sesuai dengan
                ketentuan peraturan perundang – undangan.
            </p>

            <div class="box">
                <div class="w-70 line-height-0">
                    <p>
                        Diterima tanggal ..........................................
                    </p>
                    <p>
                        Yang menerima
                    </p>
                    <p>
                        Kepala KUA / PPN Luar Negeri
                    </p>
                    <p class="line-height-6">
                        ............................................................
                    </p>
                </div>
                <div class="w-30 ml-auto line-height-0">
                    <p>
                        Wassalam,
                    </p>
                    <p>
                        Pemohon
                    </p>
                    <p class="line-height-7">
                        ...............................................
                    </p>
                </div>
            </div>

        </div>
        
    </div>
    
</body>
</html>