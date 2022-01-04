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

            'Modul Persuratan' => [
                'icon' => 'home',
                'title' => 'Modul Persuratan',
                'sub_menu' => [

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

                ],
            ],

            'Data Kelahiran' => [
                'icon' => 'users',
                'route_name' => 'kelahiran',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Kelahiran'
            ],

            'Data Kematian' => [
                'icon' => 'users',
                'route_name' => 'kematian',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Data Kematian'
            ],
            

            'devider',
            'users' => [
                'icon' => 'users',
                'route_name' => 'user',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Users'
            ],
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
