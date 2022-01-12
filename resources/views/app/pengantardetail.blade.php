@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem Persuratan Kelurahan/Desa</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Detail Surat Pengantar</h2>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <a class="btn btn-success flex items-center">
                                <i data-feather="arrow-left" class="hidden sm:block w-4 h-4 mr-2"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <!-- <div class="text-3xl font-bold leading-8">Data Anggota pasangan</div> -->
                    <!-- <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive"> -->
                    <div class="intro-y overflow-auto  mt-0 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                    <th class="text-center whitespace-nowrap">Nama Pasangan</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                <tr class="intro-x">
                                    <td class="w-40">{{ ++ $no }}</td>
                                    <td class="text-center">{{ $keluarga->nama ? $keluarga->nama : 'belum diisi' }}</td>
                                    <td class="text-center">{{ $keluarga->nik ? $keluarga->nik : 'belum diisi' }}</td>
                                    <td class="text-center">{{ $pasangan->nama ? $pasangan->nama : 'belum diisi' }}</td>
                                    <td class="text-center">{{ $pasangan->nik ? $pasangan->nik : 'belum diisi' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                    <div class="pagination">
                       
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

      


    </div>

    
@endsection
