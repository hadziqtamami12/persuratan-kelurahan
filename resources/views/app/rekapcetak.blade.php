<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Surat Tahun {{ date('Y') }}</title>
    <style>
        @page{
            page-break-inside: avoid
        }
        body{
            font-family : "Times New Roman", Times, serif;
            line-height: 1;
            font-size : 15px;
            margin : 20px;
            margin-top: 0;

        }
        .table-data > tr{
            /* border-collapse : collapse; */
            /* border-spacing: 0; */
            margin-left: -20px;
            /* border-spacing: 2px; */
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
        .mt-20{
            margin-top: 20px;
        }
        .mt-30{
            margin-top: 30px;
        }
        .mt-40{
            margin-top: 40px;
        }
        .mb-10{
            margin-bottom: 10px;
        }
        
    </style>
</head>
<body>
    <div class="w-100 mt-minus-10">
        <h3 class="text-center UC">Rekap Surat Tahun {{ date('Y') }}</h3>
        <div class="w-100">
            <table class="w-100">
                <tr>
                    <td class="w-43">KANTOR DESA/KELURAHAN</td>
                    <td>:</td>
                    <td class="w-50">PENATABAN</td>
                </tr>
                <tr>
                    <td class="w-43">KECAMATAN</td>
                    <td>:</td>
                    <td class="w-50">GIRI</td>
                </tr>
                <tr>
                    <td class="w-43">KABUPATEN/KOTA</td>
                    <td>:</td>
                    <td class="w-50">BANYUWANGI</td>
                </tr>
            </table>
        </div> 

        <div class="box-100 mt-20">
            <div class="box">
                <div class="box-left w-100">
                    <?php $no = 1; ?>
                    <table class="table-data" border="1" cellspacing="0" cellpadding="10">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    @foreach ($bulan as $item)
                                    <th class="text-center whitespace-nowrap">{{ substr($item, 0, 3); }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($surat as $s => $surats)
                                    <tr class="intro-x">
                                    <td class="text-center">
                                            {{ ++ $no }}
                                        </td>
                                        <td class="text-center">
                                            {{ $surats }}
                                        </td>
                                        @foreach ($bulan as $b => $bulans)
                                            <td class="text-center">
                                                <p>
                                                    {{ $data[$b][$s] != '0' ? $data[$b][$s]  : '-'}}
                                                </p>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>

                        
            </div>

                   
        </div>
        
    </div>
    
</body>
</html>