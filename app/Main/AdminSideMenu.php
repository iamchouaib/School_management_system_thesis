<?php

namespace App\Main;

class AdminSideMenu
{

    public static function menu()
    {
        return [

            'dashboard' => [
                'icon' => 'home',
                'title' => 'Dashboard',
                'route_name' => 'team.admin.index',
                'params' => [
                    'layout' => 'side-menu',
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
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Users List'
                    ],
                    'crud-form' => [
                        'icon' => 'graduation-cap',
                        'route_name' => 'test',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Students'
                    ]
                ]
            ],
            'post' => [
                'icon' => 'file-text',
                'route_name' => 'team.admin.announce',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Announces'
            ],
            'calendar' => [
                'icon' => 'calendar',
                'route_name' => 'team.admin.calendar',
                'params' => [
                    'layout' => 'side-menu'
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
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Grades'
                    ],
                    'modules' => [
                        'icon' => 'book',
                        'route_name' => 'team.modules.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Modules'
                    ]
                ]
            ],
            'devider',
            'parents' => [
                'icon' => 'user-plus',
                'title' => 'Patents',
                'sub_menu' => [
                    'accept-parent' => [
                        'icon' => 'user-check',
                        'route_name' => 'team.admin.accept.guardian',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Accept Parents'
                    ],
                    'consulter-parent' => [
                        'icon' => 'view',
                        'route_name' => 'team.admin.parents.index',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Parents vue'
                    ]
                ]
            ],

            'resources' => [
                'icon' => 'building',
                'route_name' => 'team.admin.sales.index',
                'params' => [
                    'layout' => 'side-menu'
                ],

                'title' => 'Resources'
            ],

            'sign' => [
                'icon' => 'hand',
                'route_name' => 'signature-pad',
                'params' => [
                    'layout' => 'side-menu'
                ],

                'title' => 'signature'
            ],

            'sem' => [
                'icon' => 'plus',
                'route_name' => 'team.semester',
                'params' => [
                    'layout' => 'side-menu'
                ],

                'title' => 'Semester'
            ]


        ];
    }
}
