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
                        <h2 class="text-lg font-medium truncate mr-5">Data Surat Pengantar</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#tambah-data-pengantar"
                        class="btn btn-primary shadow-md mr-2">Tambah Data Surat Pengantar</a>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                            <!-- <button class="btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                            </button>
                            <button class="ml-3 btn box flex items-center text-gray-700 dark:text-gray-300">
                                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                            </button> -->
                        </div>
                    </div>
                    <!-- <div class="text-3xl font-bold leading-8">Data Anggota pasangan</div> -->
                    <!-- <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive"> -->
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                    <th class="text-center whitespace-nowrap">Nama Pasangan</th>
                                    <th class="text-center whitespace-nowrap">NIK</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($pengantar as $item)
                                    <tr class="intro-x">
                                        <td class="w-40">{{ ++ $i }}</td>
                                        <td class="text-center">{{ $item->keluarga->nama ? $item->keluarga->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->keluarga->nik ? $item->keluarga->nik : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->pasangan->nama ? $item->pasangan->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->pasangan->nik ? $item->pasangan->nik : 'belum diisi' }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 pengantaredit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#pengantar-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/pengantardelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                                </a>
                                                <a class="flex items-center text-theme-11" href="{{ route('pengantarcetak', $item->id) }}" >
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
                        @if ($pengantar != null)
                            {{ $pengantar->appends($data_request)->links() }}
                        @endif
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

        <!-- BEGIN: Modal add Content -->
        <div id="tambah-data-pengantar" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Data Surat Pengantar</h2>
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
                    <form method="POST" action="{{ route('pengantaradd') }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-10" class="form-label">Pengantar Nikah</label>
                            <select id="modal-form-10" class="form-select" name="pasangan_id">
                                @foreach ($pasangan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pasangan . ' dan ' . $item->nama }}</option>
                                @endforeach
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
        <div id="pengantar-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update pasangan</h2>
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
                    <form method="POST" action="{{ route('pengantarupdate') }}">
                    <input type="hidden" name="id" id="pasangan-update-id">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="pengantar-edit-10" class="form-label">Pengantar Nikah</label>
                            <select id="pengantar-edit-10" class="form-select" name="pasangan_id">
                                @foreach ($pasangan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pasangan . ' dan ' . $item->nama }}</option>
                                @endforeach
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
                
                $('.pengantaredit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('pengantaredit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            console.log(data);
                            $('#pasangan-update-id').val(data.id);
                           
                            // $('#pasangan-edit-11').val(data.keluarga_id);
                            $('#pengantar-edit-10 option[value="' + data.pasangan_id +'"]').prop("selected", true);
                        }
                    });
                });
            });
        </script>


    </div>

    
@endsection
