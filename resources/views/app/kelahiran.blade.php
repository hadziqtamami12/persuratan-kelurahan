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
                        <h2 class="text-lg font-medium truncate mr-5">Data kelahiran</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#tambah-data-kelahiran"
                        class="btn btn-primary shadow-md mr-2">Tambah Data kelahiran</a>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <!-- <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                            </button>
                            <button class="ml-3 btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                            </button> -->
                        </div>
                    </div>
                    <!-- <div class="text-3xl font-bold leading-8">Data Anggota kelahiran</div> -->
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Anak dari</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    <th class="text-center whitespace-nowrap">Jenis Kelamin</th>
                                    <th class="text-center whitespace-nowrap">No KK</th>
                                    <th class="text-center whitespace-nowrap">Tempat Lahir</th>
                                    <th class="text-center whitespace-nowrap">Tanggal Lahir</th>
                                    <th class="text-center whitespace-nowrap">Anak ke-</th>
                                    <th class="text-center whitespace-nowrap">Alamat</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($kelahiran as $item)
                                    <tr class="intro-x">
                                        <!-- @if (request()->input('page') < 2)
                                        <td class="w-40">{{ ++ $no }}</td>
                                        @else 
                                        @endif -->
                                        <td class="w-40">{{ ++ $i }}</td>
                                        <td class="text-center">{{ $item->keluarga->nama ? $item->keluarga->nama : 'belum diisi' }} & {{ $item->nama_pasangan ? $item->nama_pasangan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->nama ? $item->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->jenkel ? $item->jenkel : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->no_kk ? $item->no_kk : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tempat_lahir ? $item->tempat_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tanggal_lahir ? $item->tanggal_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->anak_ke ? $item->anak_ke : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->alamat ? $item->alamat : 'belum diisi' }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 kelahiranedit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#kelahiran-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/kelahirandelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                </a>
                                                <a class="flex items-center text-theme-11" href="{{ route('kelahirancetak', $item->id) }}" >
                                                    <i data-feather="printer" class="w-4 h-4 ml-2 mr-1"></i> Cetak
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
                        @if ($kelahiran != null)
                            {{ $kelahiran->appends($data_request)->links() }}
                        @endif
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

        <!-- BEGIN: Modal add Content -->
        <div id="tambah-data-kelahiran" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Data Kelahiran</h2>
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
                    <form method="POST" action="{{ route('kelahiranadd') }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-10" class="form-label">kelahiran dari</label>
                            <select id="modal-form-10" class="form-select" name="keluarga_id">
                                @foreach ($keluarga as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Nama</label>
                            <input id="modal-form-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-11" class="form-label">Jenis Kelamin</label>
                            <select id="modal-form-11" class="form-select" name="jenkel">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
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
                            <label for="modal-form-2" class="form-label">No. KK</label>
                            <input id="modal-form-2" name="no_kk" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-9" class="form-label">Alamat</label>
                            <textarea name="alamat" id="modal-form-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-7" class="form-label">Anak ke-</label>
                            <select id="modal-form-7" class="form-select" name="anak_ke">
                                @for ($x = 1; $x <= 10; $x++)
                                <option value="{{ $x }}">{{ $x }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-12" class="form-label">Nama Pelapor</label>
                            <input id="modal-form-12" name="nama_pelapor" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-8" class="form-label">Hubungan Pelapor</label>
                            <input id="modal-form-8" name="hubungan_pelapor" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-12" class="form-label">Nama Penyalin</label>
                            <input id="modal-form-12" name="nama_penyalin" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-11" class="form-label">Jenis Kelamin Penyalin</label>
                            <select id="modal-form-11" class="form-select" name="jenkel_penyalin">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-11" class="form-label">Status Penyalin</label>
                            <select id="modal-form-11" class="form-select" name="status_penyalin">
                                <option value="bidan">Bidan</option>
                                <option value="dokter">Dokter</option>
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
        <div id="kelahiran-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update kelahiran</h2>
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
                    <form method="POST" action="{{ route('kelahiranupdate') }}">
                    <input type="hidden" name="id" id="kelahiran-update-id">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-1" class="form-label">kelahiran dari</label>
                            <select id="kelahiran-edit-1" class="form-select" name="keluarga_id">
                                @foreach ($keluarga as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-2" class="form-label">Nama</label>
                            <input id="kelahiran-edit-2" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-3" class="form-label">Jenis Kelamin</label>
                            <select id="kelahiran-edit-3" class="form-select" name="jenkel">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-4" class="form-label">Tempat Lahir</label>
                            <input id="kelahiran-edit-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-5" class="form-label">Tanggal Lahir</label>
                            <input id="kelahiran-edit-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-6" class="form-label">No. KK</label>
                            <input id="kelahiran-edit-6" name="no_kk" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-7" class="form-label">Alamat</label>
                            <textarea name="alamat" id="kelahiran-edit-7" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-8" class="form-label">Anak ke-</label>
                            <select id="kelahiran-edit-8" class="form-select" name="anak_ke">
                                @for ($x=1; $x<=10; $x++)
                                <option value="{{ $x }}">{{ $x }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-9" class="form-label">Nama Pelapor</label>
                            <input id="kelahiran-edit-9" name="nama_pelapor" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-10" class="form-label">Hubungan Pelapor</label>
                            <input id="kelahiran-edit-10" name="hubungan_pelapor" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-11" class="form-label">Nama Penyalin</label>
                            <input id="kelahiran-edit-11" name="nama_penyalin" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-12" class="form-label">Jenis Kelamin Penyalin</label>
                            <select id="kelahiran-edit-12" class="form-select" name="jenkel_penyalin">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kelahiran-edit-13" class="form-label">Status Penyalin</label>
                            <select id="kelahiran-edit-13" class="form-select" name="status_penyalin">
                                <option value="bidan">Bidan</option>
                                <option value="dokter">Dokter</option>
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
                
                $('.kelahiranedit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('kelahiranedit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            console.log(data);
                            $('#kelahiran-update-id').val(data.id);
                            $('#kelahiran-edit-1 option[value="' + data.keluarga_id +'"]').prop("selected", true);
                            $('#kelahiran-edit-2').val(data.nama);
                            $('#kelahiran-edit-3').val(data.jenkel);
                            $('#kelahiran-edit-4').val(data.tempat_lahir);
                            $('#kelahiran-edit-5').val(data.tanggal_lahir);
                            $('#kelahiran-edit-6').val(data.no_kk);
                            $('#kelahiran-edit-7').val(data.alamat);
                            $('#kelahiran-edit-8').val(data.anak_ke);
                            $('#kelahiran-edit-9').val(data.nama_pelapor);
                            $('#kelahiran-edit-10').val(data.hubungan_pelapor);
                            $('#kelahiran-edit-11').val(data.nama_penyalin);
                            $('#kelahiran-edit-12').val(data.jenkel_penyalin);
                            $('#kelahiran-edit-13').val(data.status_penyalin);
                        }
                    });
                });
            });
        </script>


    </div>

    
@endsection
