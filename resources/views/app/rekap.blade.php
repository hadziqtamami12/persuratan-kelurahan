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
                    <div class="intro-y flex items-center h-10">
                        <a href="{{ route('rekapcetak') }}" class="btn btn-success ml-auto flex items-center">
                            <i data-feather="printer" class="w-4 h-4 mr-3"></i> Cetak
                        </a>
                    </div>
                    
                    @if (Auth::user()->role == 'su')
                    <div class="intro-y overflow-auto  mt-8 sm:mt-0">
                  
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="text-center whitespace-nowrap">No</th>
                                    <th class="text-center whitespace-nowrap">Nama</th>
                                    @foreach ($bulan as $item)
                                    <th class="text-center whitespace-nowrap">{{ $item }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 0?>
                                @foreach ($surat as $key => $item)
                                    <tr class="intro-x">
                                    <td class="text-center">
                                            {{ ++ $key }}
                                        </td>
                                        <td class="text-center">
                                            {{ $item }}
                                        </td>
                                        @foreach ($bulan as $bulans)
                                            <td class="text-center">
                                                <p class="{{ $key . '_' . $bulans}}"></p>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
            </div>
        </div>

    </div>

    <script type="text/javascript">
            $(document).ready(function() {
                
                <?php foreach ($bulan as $key => $item): ?>
                    filter_bulan = {{ $key+1 }};
                
                    $.ajax({
                        url : "{{route('filterdashboard')}}?filter_bulan="+filter_bulan,
                        type: "GET",
                        dataType: "JSON",
                        success: function(data)
                        {
                            <?php foreach ($surat as $s => $surats): ?>
                                $('.{{$s+1}}_{{$item}}').text(data[{{ $s }}]);
                            <?php endforeach; ?>

                        }
                    });
                <?php endforeach; ?>
            });
        </script>


    
@endsection
