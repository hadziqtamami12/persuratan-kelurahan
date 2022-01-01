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
                        <h2 class="text-lg font-medium truncate mr-5">Data Anggota Keluarga</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#tambah-data-anggota"
                        class="btn btn-primary shadow-md mr-2">Tambah Data Anggota Keluarga</a>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <!-- <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                            </button>
                            <button class="ml-3 btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                            </button> -->
                        </div>
                    </div>
                    <!-- <div class="text-3xl font-bold leading-8">Data Anggota Keluarga</div> -->
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    <th class="text-center whitespace-nowrap">Jenis Kelamin</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                    <th class="text-center whitespace-nowrap">Tempat Lahir</th>
                                    <th class="text-center whitespace-nowrap">Tanggal Lahir</th>
                                    <th class="text-center whitespace-nowrap">Kewarganegaraan</th>
                                    <th class="text-center whitespace-nowrap">Agama</th>
                                    <th class="text-center whitespace-nowrap">Pekerjaan</th>
                                    <th class="text-center whitespace-nowrap">Alamat</th>
                                    <th class="text-center whitespace-nowrap">Status Nikah</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($keluarga as $item)
                                    <tr class="intro-x">
                                        <!-- @if (request()->input('page') < 2)
                                        <td class="w-40">{{ ++ $no }}</td>
                                        @else 
                                        @endif -->
                                        <td class="w-40">{{ ++ $i }}</td>
                                        <td class="text-center">{{ $item->nama ? $item->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->jenkel ? $item->jenkel : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->nik ? $item->nik : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tempat_lahir ? $item->tempat_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tanggal_lahir ? $item->tanggal_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->kewarganegaraan ? $item->kewarganegaraan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->agama ? $item->agama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->pekerjaan ? $item->pekerjaan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->alamat ? $item->alamat : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->status_nikah ? $item->status_nikah : 'belum diisi' }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 keluargaedit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#keluarga-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/keluargadelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                    <div class="pagination">
                        @if ($keluarga != null)
                            {{ $keluarga->appends($data_request)->links() }}
                        @endif
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

        <!-- BEGIN: Modal add Content -->
        <div id="tambah-data-anggota" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Data Anggota Keluarga</h2>
                        <div class="dropdown sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-400 dark:text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a href="javascript:;"
                                        class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{ route('keluargaadd') }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        @if ( Auth::user()->role == 'su' )
                            <div class="col-span-12 sm:col-span-12">
                                <label for="modal-form-13" class="form-label">Pilih User</label>
                                <select id="modal-form-13" class="form-select" name="user_id">
                                    @foreach ($user->skip(1) as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Nama</label>
                            <input id="modal-form-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-2" class="form-label">Jenis Kelamin</label>
                            <select id="modal-form-2" class="form-select" name="jenkel">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">NIK</label>
                            <input id="modal-form-3" name="nik" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-4" class="form-label">Tempat Lahir</label>
                            <input id="modal-form-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Tanggal Lahir</label>
                            <input id="modal-form-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-6" class="form-label">Kewarganegaraan</label>
                            <!-- <input id="modal-form-6" name="kewarganegaraan" type="text" class="form-control" placeholder=""> -->
                            <select id="modal-form-6" class="form-select" name="kewarganegaraan">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-7" class="form-label">Agama</label>
                            <select id="modal-form-7" class="form-select" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-8" class="form-label">Pekerjaan</label>
                            <input id="modal-form-8" name="pekerjaan" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-9" class="form-label">Alamat</label>
                            <textarea name="alamat" id="modal-form-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-10" class="form-label">Status Nikah</label>
                            <select id="modal-form-10" class="form-select" name="status_nikah">
                                <option value="duda">Duda</option>
                                <option value="jejaka">Jejaka</option>
                                <option value="janda">Janda</option>
                                <option value="perawan">Perawan</option>
                            </select>
                        </div>
                        
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                    </form>
                    <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
        <!-- END: Modal add Content -->

        <!-- BEGIN: Modal edit Content -->
        <div id="keluarga-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update keluarga</h2>
                        <div class="dropdown sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false">
                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-600 dark:text-gray-600"></i>
                            </a>
                            <div class="dropdown-menu w-40">
                                <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                    <a href="javascript:;"
                                        class="flex items-center p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                        <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form method="POST" action="{{ route('keluargaupdate') }}">
                    <input type="hidden" name="id" id="keluarga-update-id">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-1" class="form-label">Nama</label>
                            <input id="keluarga-edit-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-2" class="form-label">Jenis Kelamin</label>
                            <select id="keluarga-edit-2" class="form-select" name="jenkel">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-3" class="form-label">NIK</label>
                            <input id="keluarga-edit-3" name="nik" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-4" class="form-label">Tempat Lahir</label>
                            <input id="keluarga-edit-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-5" class="form-label">Tanggal Lahir</label>
                            <input id="keluarga-edit-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-6" class="form-label">Kewarganegaraan</label>
                            <!-- <input id="keluarga-edit-6" name="kewarganegaraan" type="text" class="form-control" placeholder=""> -->
                            <select id="keluarga-edit-6" class="form-select" name="kewarganegaraan">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-7" class="form-label">Agama</label>
                            <select id="keluarga-edit-7" class="form-select" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-8" class="form-label">Pekerjaan</label>
                            <input id="keluarga-edit-8" name="pekerjaan" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-9" class="form-label">Alamat</label>
                            <textarea name="alamat" id="keluarga-edit-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="keluarga-edit-10" class="form-label">Status Nikah</label>
                            <select id="keluarga-edit-10" class="form-select" name="status_nikah">
                                <option value="duda">Duda</option>
                                <option value="jejaka">Jejaka</option>
                                <option value="janda">Janda</option>
                                <option value="perawan">Perawan</option>
                            </select>
                        </div>
                        
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer text-right">
                        <button type="button" data-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Send</button>
                    </div>
                    </form>
                    <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
        <!-- END: Modal edit Content -->
        <script type="text/javascript">
            $(document).ready(function() {
                //edit data
                
                $('.keluargaedit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('keluargaedit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            // console.log(data);
                            $('#keluarga-update-id').val(data.id);
                            $('#keluarga-edit-1').val(data.nama);
                            $('#keluarga-edit-2').val(data.jenkel);
                            $('#keluarga-edit-3').val(data.nik);
                            $('#keluarga-edit-4').val(data.tempat_lahir);
                            $('#keluarga-edit-5').val(data.tanggal_lahir);
                            $('#keluarga-edit-6').val(data.kewarganegaraan);
                            $('#keluarga-edit-7').val(data.agama);
                            $('#keluarga-edit-8').val(data.pekerjaan);
                            $('#keluarga-edit-9').val(data.alamat);
                            $('#keluarga-edit-10').val(data.status_nikah);
                        }
                    });
                });
            });
        </script>


    </div>

    
@endsection
