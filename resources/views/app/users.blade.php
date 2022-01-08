@extends('../layout/' . $layout)

@section('subhead')
    <title>Management Users</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Users Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="btn btn-primary shadow-md mr-2">Add New User</a>
            <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
            </div>
            <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @foreach ($users as $item)
            <div class="intro-y col-span-12 md:col-span-6">
                <div class="box">
                    <div class="flex flex-col lg:flex-row items-center p-5">
                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                            <img alt="Gambar rusak" class="rounded-full" src="{{ asset('storage/'.$item->photo) }}">
                        </div>
                        <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium">{{ $item->name }}</a>
                            <div class="text-gray-600 text-xs mt-0.5">{{ $item->role }}</div>
                        </div>
                        <div class="flex mt-4 lg:mt-0">
                            <div class="dropdown">
                                <button class="dropdown-toggle btn btn-primary py-1 px-2 mr-2">Manage</button>
                                <div class="dropdown-menu w-40">
                                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                                        <a href="javascript:void(0)" data-toggle="modal" 
                                                id="{{ $item->id }}" data-target="#header-footer-modal-preview-edit" data-id="{{ $item->id }}" 
                                                class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md user-edit">
                                            <i data-feather="edit" class="w-4 h-4 mr-2"></i> Edit User
                                        </a>
                                        <a href="{{ route('userdelete', $item->id)}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-2"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-outline-secondary py-1 px-2">Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- BEGIN: Users Layout -->
    </div>

    <!-- BEGIN: Modal Content -->
    <div id="header-footer-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Tambah User</h2>
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('useradd') }}">
                    @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-1" class="form-label">Username</label>
                        <input id="modal-form-1" name="name" type="text" class="form-control" placeholder="Nama Atau Username">
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-2-edit" class="form-label">Nomor HP</label>
                        <input id="modal-form-2-edit" name="no_hp" type="number" class="form-control" placeholder="Nomor HP Aktif">
                    </div>
                     <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-3" class="form-label">Gender</label>
                        <select class="form-select" name="gender" aria-label="Default select example">
                            <option value="" selected disabled>--- Pilih Salah satu ---</option>
                            <option value="laki-laki">Laki - Laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-4" class="form-label">Role User</label>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option value="" selected disabled>--- Pilih Salah satu ---</option>
                            <option value="user">User</option>
                            <option value="su">Pemilik / Super User</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-5" class="form-label">Photo Profile</label>
                        <input id="modal-form-5" name="photo" type="file" class="form-control" placeholder="">
                    </div>
                     <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-6" class="form-label">Password</label>
                        <input id="modal-form-6" name="password" type="password" class="form-control" placeholder="">
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
    <!-- END: Modal Content -->

     <!-- BEGIN: Modal Content -->
    <div id="header-footer-modal-preview-edit" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Ubah User</h2>
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
                <form method="POST" action="{{ route('userupdate') }}">
                <input type="hidden" name="id" id="modal-update-id">
                    @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-1-edit" class="form-label">Username</label>
                        <input id="modal-form-1-edit" name="name" type="text" class="form-control" placeholder="Nama Atau Username">
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-2-edit" class="form-label">Nomor HP</label>
                        <input id="modal-form-2-edit" name="no_hp" type="number" class="form-control" placeholder="Nomor HP Aktif">
                    </div>
                     <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-3-edit" class="form-label">Gender</label>
                         <select id="modal-form-3-edit" class="form-select" name="gender" aria-label="Default select example">
                            <option value="" selected disabled>--- Pilih Salah satu ---</option>
                            <option value="laki-laki" > laki-laki </option>
                            <option value="perempuan" > perempuan </option>
                        </select> 
                        <!-- <input type="text" name="gender" id="modal-form-3-edit" class="form-control"> -->
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="modal-form-4-edit" class="form-label">Role User</label>
                        <select id="modal-form-4-edit" class="form-select" name="role" aria-label="Default select example">
                            <option value="" selected disabled>--- Pilih Salah satu ---</option>
                            <option value="user">User</option>
                            <option value="su">Pemilik / Super User</option>
                        </select> 
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-5-edit" class="form-label">Photo Profile</label>
                        <img src="" id="modal-form-5-edit" alt="file" width="100" height="100">
                        <input id="modal-form-5-edit" name="photo" type="file" class="form-control" placeholder="sertakan photo baru">
                    </div>
                     <div class="col-span-12 sm:col-span-12">
                        <label for="modal-form-6-edit" class="form-label">Password</label>
                        <input id="modal-form-6-edit" name="password" type="password" class="form-control" placeholder="">
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
    <!-- END: Modal Content -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //edit data
                
                $('.user-edit').on('click',function() {
                    var id = $(this).attr('data-id');

                    $.ajax({
                        url : "{{route('useredit')}}?id="+id,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            $('#modal-update-id').val(data.id);
                            $('#modal-form-1-edit').val(data.name);
                            $('#modal-form-2-edit').val(data.no_hp);
                            // $('#modal-form-3-edit').val(data.gender);
                            // $('#modal-form-4-edit').val(data.role);
                            $('#modal-form-5-edit').attr('src', 'storage/'+data.photo);
                            $('#modal-form-6-edit').val(data.password);
                            $('#modal-form-3-edit option[value="' + data.gender +'"]').prop("selected", true);
                            $('#modal-form-4-edit option[value="' + data.role +'"]').prop("selected", true);
                        }
                    });

                });
            });
        </script>
@endsection

