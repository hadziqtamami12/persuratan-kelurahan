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
                        <h2 class="text-lg font-medium truncate mr-5">Data kematian</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#tambah-data-anggota"
                        class="btn btn-primary shadow-md mr-2">Tambah Data kematian</a>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <!-- <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                            </button>
                            <button class="ml-3 btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                            </button> -->
                        </div>
                    </div>
                    <!-- <div class="text-3xl font-bold leading-8">Data kematian</div> -->
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    @if ( Auth::user()->role == 'su' )
                                    <th class="text-center whitespace-nowrap">Keluarga</th>
                                    @endif
                                    <th class="text-center whitespace-nowrap">Tanggal</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    <th class="text-center whitespace-nowrap">Jenis Kelamin</th>
                                    <th class="text-center whitespace-nowrap">Tempat Kematian</th>
                                    <th class="text-center whitespace-nowrap">Penyebab Kematian</th>
                                    <th class="text-center whitespace-nowrap">Status Kawin</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($kematian as $item)
                                    <tr class="intro-x">
                                        <!-- @if (request()->input('page') < 2)
                                        <td class="w-40">{{ ++ $no }}</td>
                                        @else 
                                        @endif -->
                                        <td class="w-40">{{ ++ $i }}</td>
                                        @if ( Auth::user()->role == 'su' )
                                        <td class="text-center whitespace-nowrap">{{ $item->nama_ayah ? $item->nama_ayah : 'belum diisi' }}</td>
                                        @endif
                                        <td class="text-center whitespace-nowrap">{{ $item->tanggal ? $item->tanggal : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->nama ? $item->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->jenkel ? $item->jenkel : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tempat_kematian ? $item->tempat_kematian : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->penyebab_kematian ? $item->penyebab_kematian : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->status_kawin ? $item->status_kawin : 'belum diisi' }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 kematianedit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#kematian-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/kematiandelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                </a>
                                                <a class="flex items-center text-theme-11" href="{{ route('kematiancetak', $item->id) }}" >
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
                        @if ($kematian != null)
                            {{ $kematian->appends($data_request)->links() }}
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
                        <h2 class="font-medium text-base mr-auto">Tambah Data kematian</h2>
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
                    <form method="POST" action="{{ route('kematianadd') }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        @if ( Auth::user()->role == 'su' )
                            <div class="col-span-12 sm:col-span-12">
                                <label for="modal-form-14" class="form-label">Pilih User</label>
                                <select id="modal-form-14" class="form-select" name="user_id">
                                    @foreach ($user->skip(1) as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-13" class="form-label">Tanggal Kematian</label>
                            <input id="modal-form-13" name="tanggal" type="date" class="form-control" placeholder="">
                        </div>

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
                            <label for="modal-form-3" class="form-label">Tempat Lahir</label>
                            <input id="modal-form-3" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-4" class="form-label">Tanggal Lahir</label>
                            <input id="modal-form-4" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Agama</label>
                            <select id="modal-form-5" class="form-select" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-6" class="form-label">Alamat</label>
                            <textarea name="alamat" id="modal-form-6" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-7" class="form-label">Status Kawin</label>
                            <select id="modal-form-7" class="form-select" name="status_kawin">
                                <option value="duda">Duda</option>
                                <option value="janda">Janda</option>
                                <option value="belum kawin">Belum Kawin</option>
                                <option value="kawin">Kawin</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-8" class="form-label">Usia</label>
                            <input id="modal-form-8" name="usia" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-9" class="form-label">Tempat Kematian</label>
                            <input id="modal-form-9" name="tempat_kematian" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-10" class="form-label">Penyebab Kematian</label>
                            <input id="modal-form-10" name="penyebab_kematian" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-11" class="form-label">Nama Pelapor</label>
                            <input id="modal-form-11" name="nama_pelapor" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-12" class="form-label">Hubungan Pelapor</label>
                            <input id="modal-form-12" name="hubungan_pelapor" type="text" class="form-control" placeholder="">
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
        <div id="kematian-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update kematian</h2>
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
                    <form method="POST" action="{{ route('kematianupdate') }}">
                    <input type="hidden" name="id" id="kematian-update-id">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        @if ( Auth::user()->role == 'su' )
                            <div class="col-span-12 sm:col-span-12">
                                <label for="kematian-edit-14" class="form-label">Pilih User</label>
                                <select id="kematian-edit-14" class="form-select" name="user_id">
                                    @foreach ($user->skip(1) as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-13" class="form-label">Tanggal Kematian</label>
                            <input id="kematian-edit-13" name="tanggal" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-1" class="form-label">Nama</label>
                            <input id="kematian-edit-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-2" class="form-label">Jenis Kelamin</label>
                            <select id="kematian-edit-2" class="form-select" name="jenkel">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-3" class="form-label">Tempat Lahir</label>
                            <input id="kematian-edit-3" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-4" class="form-label">Tanggal Lahir</label>
                            <input id="kematian-edit-4" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-5" class="form-label">Agama</label>
                            <select id="kematian-edit-5" class="form-select" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-6" class="form-label">Alamat</label>
                            <textarea name="alamat" id="kematian-edit-6" class="form-control" cols="30" rows="10" placeholder=""></textarea>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-7" class="form-label">Status Kawin</label>
                            <select id="kematian-edit-7" class="form-select" name="status_kawin">
                                <option value="duda">Duda</option>
                                <option value="janda">Janda</option>
                                <option value="belum kawin">Belum Kawin</option>
                                <option value="kawin">Kawin</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-8" class="form-label">Usia</label>
                            <input id="kematian-edit-8" name="usia" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-9" class="form-label">Tempat Kematian</label>
                            <input id="kematian-edit-9" name="tempat_kematian" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-10" class="form-label">Penyebab Kematian</label>
                            <input id="kematian-edit-10" name="penyebab_kematian" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-11" class="form-label">Nama Pelapor</label>
                            <input id="kematian-edit-11" name="nama_pelapor" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="kematian-edit-12" class="form-label">Hubungan Pelapor</label>
                            <input id="kematian-edit-12" name="hubungan_pelapor" type="text" class="form-control" placeholder="">
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
                
                $('.kematianedit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('kematianedit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            // console.log(data);
                            $('#kematian-update-id').val(data.id);
                            $('#kematian-edit-1').val(data.nama);
                            $('#kematian-edit-2').val(data.jenkel);
                            $('#kematian-edit-3').val(data.tempat_lahir);
                            $('#kematian-edit-4').val(data.tanggal_lahir);
                            $('#kematian-edit-5').val(data.agama);
                            $('#kematian-edit-6').val(data.alamat);
                            $('#kematian-edit-7').val(data.status_kawin);
                            $('#kematian-edit-8').val(data.usia);
                            $('#kematian-edit-9').val(data.tempat_kematian);
                            $('#kematian-edit-10').val(data.penyebab_kematian);
                            $('#kematian-edit-11').val(data.nama_pelapor);
                            $('#kematian-edit-12').val(data.hubungan_pelapor);
                            $('#kematian-edit-13').val(data.tanggal);
                            $('#kematian-edit-14').val(data.user_id);


                        }
                    });
                });
            });
        </script>


    </div>

    
@endsection
