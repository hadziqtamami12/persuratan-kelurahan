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
                        <h2 class="text-lg font-medium truncate mr-5">Data Dokumen Nikah</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#tambah-data-dokumen-nikah"
                        class="btn btn-primary shadow-md mr-2">Tambah Data Dokumen Nikah</a>
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
                                    <th class="text-center whitespace-nowrap">Pengantar</th>
                                    <th class="text-center whitespace-nowrap">KTP</th>
                                    <th class="text-center whitespace-nowrap">KK</th>
                                    <th class="text-center whitespace-nowrap">KK Calon</th>
                                    <th class="text-center whitespace-nowrap">Foto</th>
                                    <th class="text-center whitespace-nowrap">Foto Calon</th>
                                    <th class="text-center whitespace-nowrap">Ijazah</th>
                                    <th class="text-center whitespace-nowrap">Surat Pernyataan</th>
                                    <th class="text-center whitespace-nowrap">Bukti Pajak</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($dokumen as $item)
                                    <tr class="intro-x">
                                        <td class="w-40">{{ ++ $i }}</td>
                                        <td class="text-center">
                                            {{ $item->nama_keluarga ? $item->nama_keluarga : 'belum diisi' }}
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->pengantar): ?>
                                            <a href="{{ asset('storage/'.$item->pengantar) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->ktp): ?>
                                            <a href="{{ asset('storage/'.$item->ktp) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->kk): ?>
                                            <a href="{{ asset('storage/'.$item->kk) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->kk_calon): ?>
                                            <a href="{{ asset('storage/'.$item->kk_calon) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->foto): ?>
                                            <a href="{{ asset('storage/'.$item->foto) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->foto_calon): ?>
                                            <a href="{{ asset('storage/'.$item->foto_calon) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->ijazah): ?>
                                            <a href="{{ asset('storage/'.$item->ijazah) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->surat_pernyataan): ?>
                                            <a href="{{ asset('storage/'.$item->surat_pernyataan) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($item->bukti_pajak): ?>
                                            <a href="{{ asset('storage/'.$item->bukti_pajak) }}" class="font-medium whitespace-nowrap" target="blank">
                                                Lihat Dokumen
                                            </a>
                                            <?php else: echo 'belum diisi'; endif; ?>
                                        </td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 dokumen-nikahedit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#dokumen-nikah-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/dokumen_nikahdelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
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
                        @if ($dokumen != null)
                            {{ $dokumen->appends($data_request)->links() }}
                        @endif
                        </div>
                    </div>
                </div>
                <!-- END: Weekly Top Products -->
            </div>
        </div>

        <!-- BEGIN: Modal add Content -->
        <div id="tambah-data-dokumen-nikah" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Data</h2>
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
                    <form method="POST" enctype="multipart/form-data" action="{{ route('dokumen_nikahadd') }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Pilih Keluarga</label>
                            <select id="modal-form-1" class="form-select" name="keluarga_id">
                                @foreach ($keluarga as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-2" class="form-label">Dokumen Pengantar RT</label>
                            <img class="img-preview img-fluid" id="preview-pengantar" src="" alt="pengantar">
                            <input  name="pengantar"  id="input-pengantar" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Dokumen KTP</label>
                            <img class="img-preview img-fluid" id="preview-ktp" src="" alt="ktp">
                            <input  name="ktp"  id="input-ktp" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Dokumen KK</label>
                            <img class="img-preview img-fluid" id="preview-kk" src="" alt="kk">
                            <input  name="kk"  id="input-kk" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Dokumen KK Calon</label>
                            <img class="img-preview img-fluid" id="preview-kk_calon" src="" alt="kk_calon">
                            <input  name="kk_calon"  id="input-kk_calon" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Foto</label>
                            <img class="img-preview img-fluid" id="preview-foto" src="" alt="foto">
                            <input  name="foto"  id="input-foto" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Foto Calon</label>
                            <img class="img-preview img-fluid" id="preview-foto_calon" src="" alt="foto_calon">
                            <input  name="foto_calon"  id="input-foto_calon" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Ijazah</label>
                            <img class="img-preview img-fluid" id="preview-ijazah" src="" alt="ijazah">
                            <input  name="ijazah"  id="input-ijazah" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Surat Pernyataan</label>
                            <img class="img-preview img-fluid" id="preview-surat_pernyataan" src="" alt="surat_pernyataan">
                            <input  name="surat_pernyataan"  id="input-surat_pernyataan" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Bukti Pajak</label>
                            <img class="img-preview img-fluid" id="preview-bukti_pajak" src="" alt="bukti_pajak">
                            <input  name="bukti_pajak"  id="input-bukti_pajak" type="file" class="form-control" placeholder="">
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
        <div id="dokumen-nikah-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update Data</h2>
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
                    <form method="POST" action="{{ route('dokumen_nikahupdate') }}">
                    <input type="hidden" name="id" id="pasangan-update-id">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="dokumen-nikah-edit-10" class="form-label">Pilih Keluarga</label>
                            <select id="dokumen-nikah-edit-10" class="form-select" name="keluarga_id">
                                @foreach ($keluarga as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-2" class="form-label">Dokumen Pengantar RT</label>
                            <img class="img-preview img-fluid" id="preview-pengantar" src="" alt="pengantar">
                            <input  name="pengantar"  id="input-pengantar-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Dokumen KTP</label>
                            <img class="img-preview img-fluid" id="preview-ktp" src="" alt="ktp">
                            <input  name="ktp"  id="input-ktp-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Dokumen KK</label>
                            <img class="img-preview img-fluid" id="preview-kk" src="" alt="kk">
                            <input  name="kk"  id="input-kk-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Dokumen KK Calon</label>
                            <img class="img-preview img-fluid" id="preview-kk_calon" src="" alt="kk_calon">
                            <input  name="kk_calon"  id="input-kk_calon-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Foto</label>
                            <img class="img-preview img-fluid" id="preview-foto" src="" alt="foto">
                            <input  name="foto"  id="input-foto-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Foto Calon</label>
                            <img class="img-preview img-fluid" id="preview-foto_calon" src="" alt="foto_calon">
                            <input  name="foto_calon"  id="input-foto_calon-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Ijazah</label>
                            <img class="img-preview img-fluid" id="preview-ijazah" src="" alt="ijazah">
                            <input  name="ijazah"  id="input-ijazah-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Surat Pernyataan</label>
                            <img class="img-preview img-fluid" id="preview-surat_pernyataan" src="" alt="surat_pernyataan">
                            <input  name="surat_pernyataan"  id="input-surat_pernyataan-edit" type="file" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Bukti Pajak</label>
                            <img class="img-preview img-fluid" id="preview-bukti_pajak" src="" alt="bukti_pajak">
                            <input  name="bukti_pajak"  id="input-bukti_pajak-edit" type="file" class="form-control" placeholder="">
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

                $('#input-pengantar').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-pengantar')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-ktp').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-ktp')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-kk').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-kk')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-kk_calon').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-kk_calon')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-foto').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-foto')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-foto_calon').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-foto_calon')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-ijazah').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-ijazah')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-surat_pernyataan').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-surat_pernyataan')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });

                $('#input-bukti_pajak').on('change',function() {
                    const file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $('#preview-bukti_pajak')
                              .attr('src', event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });



                //edit data
                
                $('.dokumen-nikahedit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('dokumen_nikahedit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            console.log(data);
                            $('#pasangan-update-id').val(data.id);
                           
                            // $('#pasangan-edit-11').val(data.keluarga_id);
                            $('#dokumen-nikah-edit-10 option[value="' + data.keluarga_id +'"]').prop("selected", true);
                        }
                    });
                });
            });
        </script>


    </div>

    
@endsection
