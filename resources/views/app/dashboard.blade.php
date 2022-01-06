@extends('../layout/' . $layout)

@section('subhead')
    <title>Sistem Persuratan Kelurahan/Desa</title>
@endsection

@section('subcontent')
<div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Data Persuratan Kelurahan</h2>
                        <a href="" class="ml-auto flex items-center text-theme-1 dark:text-theme-10">
                            <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                        </a>
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">

                            <!-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$ayah->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Data Ayah</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$ibu->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Data Ibu</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$keluarga->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Data Anak</div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$pengantar->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Surat Pengantar Nikah</div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$permohonan->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Surat Permohonan Nikah</div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$persetujuan->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Surat Persetujuan Nikah</div>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$izin->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Surat Izin Nikah</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$kematian_pasangan->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Surat Kematian Pasangan</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <div class="report-box zoom-in">
                                    <div class="box p-5">
                                        <div class="flex">
                                            <i data-feather="users" class="report-box__icon text-theme-10"></i>
                                        </div>
                                        <div class="text-3xl font-bold leading-8 mt-6">{{$kelahiran->count()}}</div>
                                        <div class="text-base text-gray-600 mt-1">Jumlah Surat Kelahiran</div>
                                    </div>
                                </div>
                            </div>
                </div> 
                <!-- END: General Report -->
            </div>
        </div>

    </div>

    
@endsection
