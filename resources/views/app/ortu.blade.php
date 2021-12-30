@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem Persuratan Kelurahan/Desa</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Weekly Top Products -->
                <!-- <div class="col-span-12 mt-6">
                    <div class="intro-y block sm:flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Daftar Ortu</h2>
                        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview"
                        class="btn btn-primary shadow-md mr-2">Tambah Data Ayah</a>
                        <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                         
                        </div>
                    </div>
                </div> -->
                <!-- END: Weekly Top Products -->
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    @if (Auth::user()->role != 'su')
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-3xl font-medium truncate mr-5">Data Orang Tua</h2>
                        <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                            <a href="javascript:;" id="button-tambah-ayah" data-toggle="modal" data-target="#tambah-data-ayah"
                            class="btn btn-primary shadow-md mr-2 mb-5">Tambah Data Ayah</a>
                            <a href="javascript:;" id="button-edit-ayah" data-toggle="modal" data-target="#ayah-edit" data-id=""
                            class="btn btn-primary shadow-md mr-2 mb-5 ayahedit invisible">Edit Data Ayah</a>
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-bold leading-8">Data Ayah</div>
                                    <div class="flex mt-3">
                                        <div class="grid grid-cols-12 gap-3">
                                            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                                <div class="text-sm text-gray-400">Nama Ayah</div>
                                                <div class="text-sm text-gray-400">NIK Ayah</div>
                                                <div class="text-sm text-gray-400">Bin Ayah</div>
                                                <div class="text-sm text-gray-400">Tempat Lahir Ayah</div>
                                                <div class="text-sm text-gray-400">Tanggal Lahir Ayah</div>
                                                <div class="text-sm text-gray-400">Kewarganegaraan Ayah</div>
                                                <div class="text-sm text-gray-400">Agama Ayah</div>
                                                <div class="text-sm text-gray-400">Pekerjaan Ayah</div>
                                                <div class="text-sm text-gray-400">Alamat Ayah</div>

                                            </div>
                                            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                                @foreach ($ayah as $item)
                                                    <b><div class="text-sm text-gray-400">{{ $item->nama ? $item->nama : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->nik ? $item->nik : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->bin ? $item->bin : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->tempat_lahir ? $item->tempat_lahir : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->tanggal_lahir ? $item->tanggal_lahir : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->kewarganegaraan ? $item->kewarganegaraan : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->agama ? $item->agama : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->pekerjaan ? $item->pekerjaan : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->alamat ? $item->alamat : 'belum diisi' }}</div></b>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end data ayah -->
                        <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                        <a href="javascript:;" id="button-tambah-ibu" data-toggle="modal" data-target="#tambah-data-ibu"
                        class="btn btn-primary shadow-md mr-2 mb-5">Tambah Data Ibu</a>
                        <a href="javascript:;" id="button-edit-ibu" data-toggle="modal" data-target="#ibu-edit" data-id=""
                        class="btn btn-primary shadow-md mr-2 mb-5 ibuedit invisible">Tambah Data Ibu</a>
                        <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="text-3xl font-bold leading-8">Data Ibu</div>
                                    <div class="flex mt-3">
                                        <div class="grid grid-cols-12 gap-3">
                                            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                                <div class="text-sm text-gray-400">Nama Ibu</div>
                                                <div class="text-sm text-gray-400">NIK Ibu</div>
                                                <div class="text-sm text-gray-400">Bin Ibu</div>
                                                <div class="text-sm text-gray-400">Tempat Lahir Ibu</div>
                                                <div class="text-sm text-gray-400">Tanggal Lahir Ibu</div>
                                                <div class="text-sm text-gray-400">Kewarganegaraan Ibu</div>
                                                <div class="text-sm text-gray-400">Agama Ibu</div>
                                                <div class="text-sm text-gray-400">Pekerjaan Ibu</div>
                                                <div class="text-sm text-gray-400">Alamat Ibu</div>

                                            </div>
                                            <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                                                @foreach ($ibu as $item)
                                                    <b><div class="text-sm text-gray-400">{{ $item->nama ? $item->nama : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->nik ? $item->nik : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->bin ? $item->bin : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->tempat_lahir ? $item->tempat_lahir : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->tanggal_lahir ? $item->tanggal_lahir : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->kewarganegaraan ? $item->kewarganegaraan : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->agama ? $item->agama : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->pekerjaan ? $item->pekerjaan : 'belum diisi' }}</div></b>
                                                    <b><div class="text-sm text-gray-400">{{ $item->alamat ? $item->alamat : 'belum diisi' }}</div></b>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end data ibu -->
                    </div>
                    @else
                    <div class="text-3xl font-bold leading-8">Data Ayah</div>
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama Ayah</th>
                                    <th class="text-center whitespace-nowrap">NIK Ayah</th>
                                    <th class="text-center whitespace-nowrap">Bin Ayah</th>
                                    <th class="text-center whitespace-nowrap">Tempat Lahir Ayah</th>
                                    <th class="text-center whitespace-nowrap">Tanggal Lahir Ayah</th>
                                    <th class="text-center whitespace-nowrap">Kewarganegaraan Ayah</th>
                                    <th class="text-center whitespace-nowrap">Agama Ayah</th>
                                    <th class="text-center whitespace-nowrap">Pekerjaan Ayah</th>
                                    <th class="text-center whitespace-nowrap">Alamat Ayah</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($ayah as $item)
                                    <tr class="intro-x">
                                        <!-- @if (request()->input('page') < 2)
                                        <td class="w-40">{{ ++ $no }}</td>
                                        @else 
                                        @endif -->
                                        <td class="w-40">{{ ++ $i }}</td>
                                        <td class="text-center">{{ $item->nama ? $item->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->nik ? $item->nik : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->bin ? $item->bin : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tempat_lahir ? $item->tempat_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tanggal_lahir ? $item->tanggal_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->kewarganegaraan ? $item->kewarganegaraan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->agama ? $item->agama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->pekerjaan ? $item->pekerjaan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->alamat ? $item->alamat : 'belum diisi' }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 ayahedit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#ayah-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/ayahdelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
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
                        @if ($ayah != null)
                            {{ $ayah->appends($data_request)->links() }}
                        @endif
                        </div>
                    </div>


                    <div class="text-3xl font-bold leading-8 mt-5">Data Ibu</div>
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0 table-responsive">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama Ibu</th>
                                    <th class="text-center whitespace-nowrap">NIK Ibu</th>
                                    <th class="text-center whitespace-nowrap">Bin Ibu</th>
                                    <th class="text-center whitespace-nowrap">Tempat Lahir Ibu</th>
                                    <th class="text-center whitespace-nowrap">Tanggal Lahir Ibu</th>
                                    <th class="text-center whitespace-nowrap">Kewarganegaraan Ibu</th>
                                    <th class="text-center whitespace-nowrap">Agama Ibu</th>
                                    <th class="text-center whitespace-nowrap">Pekerjaan Ibu</th>
                                    <th class="text-center whitespace-nowrap">Alamat Ibu</th>
                                    <th class="text-center whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0 ?>
                                @foreach ($ibu as $item)
                                    <tr class="intro-x">
                                        <!-- @if (request()->input('page') < 2)
                                        <td class="w-40">{{ ++ $no }}</td>
                                        @else 
                                        @endif -->
                                        <td class="w-40">{{ ++ $i }}</td>
                                        <td class="text-center">{{ $item->nama ? $item->nama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->nik ? $item->nik : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->bin ? $item->bin : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tempat_lahir ? $item->tempat_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->tanggal_lahir ? $item->tanggal_lahir : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->kewarganegaraan ? $item->kewarganegaraan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->agama ? $item->agama : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->pekerjaan ? $item->pekerjaan : 'belum diisi' }}</td>
                                        <td class="text-center">{{ $item->alamat ? $item->alamat : 'belum diisi' }}</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center mr-3 ibuedit" href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#ibu-edit" data-id="{{ $item->id }}">
                                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit 
                                                </a>
                                                <a class="flex items-center text-theme-6" href="/ibudelete/{{$item->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
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
                        @if ($ibu != null)
                            {{ $ibu->appends($data_request)->links() }}
                        @endif
                        </div>
                    </div>
                    @endif 
                    
                    
                </div> 
                <!-- END: General Report -->
            </div>
        </div>

        <!-- BEGIN: Modal add Content -->
        <div id="tambah-data-ayah" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Data Ayah</h2>
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
                    <form method="POST" action="{{ route('ayahadd') }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Nama Ayah</label>
                            <input id="modal-form-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-2" class="form-label">NIK Ayah</label>
                            <input id="modal-form-2" name="nik" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Bin Ayah</label>
                            <input id="modal-form-3" name="bin" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-4" class="form-label">Tempat Lahir Ayah</label>
                            <input id="modal-form-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Tanggal Lahir Ayah</label>
                            <input id="modal-form-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-6" class="form-label">Kewarganegaraan Ayah</label>
                            <!-- <input id="modal-form-6" name="kewarganegaraan" type="text" class="form-control" placeholder=""> -->
                            <select id="modal-form-6" class="form-select" name="kewarganegaraan">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-7" class="form-label">Agama Ayah</label>
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
                            <label for="modal-form-8" class="form-label">Pekerjaan Ayah</label>
                            <input id="modal-form-8" name="pekerjaan" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-9" class="form-label">Alamat Ayah</label>
                            <textarea name="alamat" id="modal-form-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
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

        <div id="tambah-data-ibu" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Tambah Data Ibu</h2>
                        <div class="dropdown sm:hidden">
                            <a class="dropdown-toggle w-9 h-5 block" href="javascript:;" aria-expanded="false">
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
                    <form method="POST" action="{{ route('ibuadd') }}">
                        @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-1" class="form-label">Nama Ibu</label>
                            <input id="modal-form-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-2" class="form-label">NIK Ibu</label>
                            <input id="modal-form-2" name="nik" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-3" class="form-label">Bin Ibu</label>
                            <input id="modal-form-3" name="bin" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-4" class="form-label">Tempat Lahir Ibu</label>
                            <input id="modal-form-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-5" class="form-label">Tanggal Lahir Ibu</label>
                            <input id="modal-form-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-6" class="form-label">Kewarganegaraan Ibu</label>
                            <!-- <input id="modal-form-6" name="kewarganegaraan" type="text" class="form-control" placeholder=""> -->
                            <select id="modal-form-6" class="form-select" name="kewarganegaraan">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-7" class="form-label">Agama Ibu</label>
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
                            <label for="modal-form-8" class="form-label">Pekerjaan Ibu</label>
                            <input id="modal-form-8" name="pekerjaan" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="modal-form-9" class="form-label">Alamat Ibu</label>
                            <textarea name="alamat" id="modal-form-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
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
        <div id="ayah-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update Ayah</h2>
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
                    <form method="POST" action="{{ route('ayahupdate') }}">
                    <input type="hidden" name="id" id="ayah-update-id">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-1" class="form-label">Nama Ayah</label>
                            <input id="ayah-edit-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-2" class="form-label">NIK Ayah</label>
                            <input id="ayah-edit-2" name="nik" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-3" class="form-label">Bin Ayah</label>
                            <input id="ayah-edit-3" name="bin" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-4" class="form-label">Tempat Lahir Ayah</label>
                            <input id="ayah-edit-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-5" class="form-label">Tanggal Lahir Ayah</label>
                            <input id="ayah-edit-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-6" class="form-label">Kewarganegaraan Ayah</label>
                            <!-- <input id="ayah-edit-6" name="kewarganegaraan" type="text" class="form-control" placeholder=""> -->
                            <select id="ayah-edit-6" class="form-select" name="kewarganegaraan">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-7" class="form-label">Agama Ayah</label>
                            <select id="ayah-edit-7" class="form-select" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-8" class="form-label">Pekerjaan Ayah</label>
                            <input id="ayah-edit-8" name="pekerjaan" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ayah-edit-9" class="form-label">Alamat Ayah</label>
                            <textarea name="alamat" id="ayah-edit-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
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

        <div id="ibu-edit" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Update Ibu</h2>
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
                    <form method="POST" action="{{ route('ibuupdate') }}">
                    <input type="hidden" name="id" id="ibu-update-id">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-1" class="form-label">Nama Ibu</label>
                            <input id="ibu-edit-1" name="nama" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-2" class="form-label">NIK Ibu</label>
                            <input id="ibu-edit-2" name="nik" type="number" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-3" class="form-label">Bin Ibu</label>
                            <input id="ibu-edit-3" name="bin" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-4" class="form-label">Tempat Lahir Ibu</label>
                            <input id="ibu-edit-4" name="tempat_lahir" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-5" class="form-label">Tanggal Lahir Ibu</label>
                            <input id="ibu-edit-5" name="tanggal_lahir" type="date" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-6" class="form-label">Kewarganegaraan Ibu</label>
                            <!-- <input id="ibu-edit-6" name="kewarganegaraan" type="text" class="form-control" placeholder=""> -->
                            <select id="ibu-edit-6" class="form-select" name="kewarganegaraan">
                                <option value="Indonesia">Indonesia</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-7" class="form-label">Agama Ibu</label>
                            <select id="ibu-edit-7" class="form-select" name="agama">
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katholik">Katholik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-8" class="form-label">Pekerjaan Ibu</label>
                            <input id="ibu-edit-8" name="pekerjaan" type="text" class="form-control" placeholder="">
                        </div>
                        <div class="col-span-12 sm:col-span-12">
                            <label for="ibu-edit-9" class="form-label">Alamat Ibu</label>
                            <textarea name="alamat" id="ibu-edit-9" class="form-control" cols="30" rows="10" placeholder=""></textarea>
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
                //check data ayah

                $.ajax({
                        url : "{{route('ayahget')}}?user_id="+"{{ Auth::user()->id }}",
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            $("#button-tambah-ayah").removeAttr('data-target');
                            $("#button-tambah-ayah").removeClass('btn-primary');
                            $("#button-tambah-ayah").addClass('btn-secondary');
                            $("#button-edit-ayah").removeClass('invisible');
                            $("#button-edit-ayah").addClass('visible');
                            $("#button-edit-ayah").attr("data-id", data.id);
                            
                        }
                    });

                //check data ibu
                $.ajax({
                        url : "{{route('ibuget')}}?user_id="+"{{ Auth::user()->id }}",
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            $("#button-tambah-ibu").removeAttr('data-target');
                            $("#button-tambah-ibu").removeClass('btn-primary');
                            $("#button-tambah-ibu").addClass('btn-secondary');
                            $("#button-edit-ibu").removeClass('invisible');
                            $("#button-edit-ibu").addClass('visible');
                            
                        }
                    });


                //edit data ayah
                $('.ayahedit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('ayahedit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            $('#ayah-update-id').val(data.id);
                            $('#ayah-edit-1').val(data.nama);
                            $('#ayah-edit-2').val(data.nik);
                            $('#ayah-edit-3').val(data.bin);
                            $('#ayah-edit-4').val(data.tempat_lahir);
                            $('#ayah-edit-5').val(data.tanggal_lahir);
                            $('#ayah-edit-6').val(data.kewarganegaraan);
                            $('#ayah-edit-7').val(data.agama);
                            $('#ayah-edit-8').val(data.pekerjaan);
                            $('#ayah-edit-9').val(data.alamat);

                        }
                    });
                });

                //edit data ibu
                $('.ibuedit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('ibuedit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            $('#ibu-update-id').val(data.id);
                            $('#ibu-edit-1').val(data.nama);
                            $('#ibu-edit-2').val(data.nik);
                            $('#ibu-edit-3').val(data.bin);
                            $('#ibu-edit-4').val(data.tempat_lahir);
                            $('#ibu-edit-5').val(data.tanggal_lahir);
                            $('#ibu-edit-6').val(data.kewarganegaraan);
                            $('#ibu-edit-7').val(data.agama);
                            $('#ibu-edit-8').val(data.pekerjaan);
                            $('#ibu-edit-9').val(data.alamat);

                        }
                    });
                });


            });
        </script>


    </div>

    
@endsection
