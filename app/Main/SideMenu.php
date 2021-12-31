<?php

namespace App\Main;

use Auth;


class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {

        
        return [
            'Dashboard' => [
                'icon' => 'box',
                'route_name' => 'dashboard',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Dashboard'
            ],
            
            
            'Data Anggota Keluarga' => [
                'icon' => 'home',
                'title' => 'Data Anggota Keluarga',
                'sub_menu' => [
                    'Data Orang Tua' => [
                        'icon' => 'user-plus',
                        'route_name' => 'ortu',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Data Orang Tua'
                    ],
                    'Data Anak' => [
                        'icon' => 'user-plus',
                        'route_name' => 'keluarga',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Data Anak'
                    ],

                    'Data Pasangan' => [
                        'icon' => 'user-plus',
                        'route_name' => 'pasangan',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Data Pasangan'
                    ],
                ],
            ],

            'Data Pengantar' => [
                'icon' => 'users',
                'route_name' => 'pengantar',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Pengantar'
            ],

            'Data Permohonan' => [
                'icon' => 'users',
                'route_name' => 'permohonan',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Permohonan'
            ],

            'Data Persetujuan' => [
                'icon' => 'users',
                'route_name' => 'persetujuan',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Persetujuan'
            ],

            'Data Perizinan' => [
                'icon' => 'users',
                'route_name' => 'izin',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Perizinan'
            ],

            'Data Kematian Pasangan' => [
                'icon' => 'users',
                'route_name' => 'kematian_pasangan',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Kematian Pasangan'
            ],

            // 'Data Kelahiran' => [
            //     'icon' => 'users',
            //     'route_name' => 'kelahiran',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Data Kelahiran'
            // ],
            // 'Penjadwalan' => [
            //     'icon' => 'monitor',
            //     'title' => 'Penjadwalan',
            //     'sub_menu' => [
                    
            //         'Modul Pola Kerja' => [
            //             'icon' => 'refresh-cw',
            //             'route_name' => 'pola-kerja',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Modul Pola Kerja'
            //         ],

            //         'Modul Jadwal' => [
            //             'icon' => 'users',
            //             'route_name' => 'jadwal',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Modul Jadwal'
            //         ],

            //         // 'Modul Kalender Kerja' => [
            //         //     'icon' => 'calendar',
            //         //     'route_name' => 'kalender',
            //         //     'params' => [
            //         //         'layout' => 'side-menu'
            //         //     ],
            //         //     'title' => 'Modul Kalender Kerja'
            //         // ],

            //         'Jadwal Libur Pegawai' => [
            //             'icon' => 'activity',
            //             'route_name' => 'libur',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Jadwal Libur Pegawai'
            //         ],

            //     ],
            // ],

            // 'Kehadiran' => [
            //     'icon' => 'clock',
            //     'title' => 'Kehadiran',
            //     'sub_menu' => [
            //         'Kehadiran Harian' => [
            //             'icon' => 'bar-chart-2',
            //             'title' => 'Kehadiran Harian',
            //             'route_name' => 'kehadiran',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //         ],

            //         'Kehadiran Bulanan' => [
            //             'icon' => 'cloud-drizzle',
            //             'title' => 'Kehadiran Bulanan',
            //             'route_name' => 'kehadiran_bulanan',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //         ],

            //     ],
            // ],

            
            // 'Keuangan' => [
            //     'icon' => 'dollar-sign',
            //     'title' => 'Keuangan',
            //     'sub_menu' => [
            //         'Modul Bon-Kas' => [
            //             'icon' => 'trending-down',
            //             'route_name' => 'bon-kas',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Modul Bon-Kas'
            //         ],
            //         'Komponen Gaji' => [
            //             'icon' => 'list',
            //             'route_name' => 'komponen-gaji',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Komponen Gaji'
            //         ],
            //         'Penggajian' => [
            //             'icon' => 'dollar-sign',
            //             'route_name' => 'penggajian',
            //             'params' => [
            //                 'layout' => 'side-menu'
            //             ],
            //             'title' => 'Penggajian'
            //         ],
            //     ],
            // ],

            // 'Pengecualian' => [
            //     'icon' => 'user-check',
            //     'route_name' => 'pengecualian',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Pengecualian'
            // ],
            
            // 'devider',
            // 'users' => [
            //     'icon' => 'users',
            //     'route_name' => 'user',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            //     'title' => 'Users'
            // ],
            // 'Setting' => [
            //     'icon' => 'trello',
            //     'title' => 'Setting Perusahaan',
            //     // 'route_name' => 'profile-overview-1',
            //     'route_name' => 'setting-perusahaan',
            //     'params' => [
            //         'layout' => 'side-menu'
            //     ],
            // ],
                
            
        ];
    }
}
