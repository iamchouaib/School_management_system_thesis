<?php

namespace App\Main;

class AdminTopMenu
{

           public static function menu()
    {
        return [

            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'team.admin.index',
                'params' => [
                    'layout' => 'top-menu',
                ],
            ],
            'users' => [
                'icon' => 'users',
                'title' => 'Users',
                'sub_menu' => [
                    'crud-data-list' => [
                        'icon' => 'list-ordered',
                        'route_name' => 'team.admin.users',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Users List'
                    ],
                    'crud-form' => [
                        'icon' => 'graduation-cap',
                        'route_name' => 'test',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Students'
                    ]
                ]
            ],
            'post' => [
                'icon' => 'file-text',
                'route_name' => 'team.admin.announce',
                'params' => [
                    'layout' => 'top-menu'
                ],
                'title' => 'Announces'
            ],
            'calendar' => [
                'icon' => 'calendar',
                'route_name' => 'team.admin.calendar',
                'params' => [
                    'layout' => 'top-menu'
                ],
                'title' => 'Calendar'
            ],
            'School Management' => [
                'icon' => 'building',
                'title' => 'School management',
                'sub_menu' => [
                    'grades' => [
                        'icon' => 'graduation-cap',
                        'route_name' => 'team.grades.index',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Grades'
                    ],
                    'modules' => [
                        'icon' => 'book',
                        'route_name' => 'team.modules.index',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Modules'
                    ]
                ]
            ],
            'parents' => [
                'icon' => 'user-plus',
                'title' => 'Patents',
                'sub_menu' => [
                    'accept-parent' => [
                        'icon' => 'user-check',
                        'route_name' => 'team.admin.accept.guardian',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Accept Parents'
                    ],
                    'consulter-parent' => [
                        'icon' => 'view',
                        'route_name' => 'team.admin.parents.index',
                        'params' => [
                            'layout' => 'top-menu'
                        ],
                        'title' => 'Parents vue'
                    ]
                ]
            ],

            'resources' => [
                'icon' => 'building',
                'route_name' => 'team.admin.sales.index',
                'params' => [
                    'layout' => 'top-menu'
                ],

                'title' => 'Resources'
            ],
            'sign' => [
                'icon' => 'hand',
                'route_name' => 'signature-pad',
                'params' => [
                    'layout' => 'top-menu'
                ],

                'title' => 'signature'
            ],

            'sem' => [
                'icon' => 'plus',
                'route_name' => 'team.semester',
                'params' => [
                    'layout' => 'top-menu'
                ],

                'title' => 'Semester'
            ]



        ];
    }


}
