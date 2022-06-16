<?php

namespace App\Main;

class SecretarySideMenu
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
            'students' => [
                'icon' => 'users',
                'title' => 'Manage students',
                'sub_menu' => [
                    'crud-data-list' => [
                        'icon' => 'list-ordered',
                        'route_name' => 'team.secretary.students.inscription',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'inscriptions'
                    ],
                    'crud-form' => [
                        'icon' => 'graduation-cap',
                        'route_name' => 'team.secretary.students-information',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'student information'
                    ],
                    'school-certificates' => [
                        'icon' => 'paperclip',
                        'route_name' => 'test',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'School certificates'
                    ]
                ]
            ],
            'announce' => [
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
            'grades' => [
                'icon' => 'file-input',
                'route_name' => 'team.grades.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'textbooks'
            ],


            'devider',

            'absents' => [
                'icon' => 'user-x',
                'route_name' => 'team.secretary.absences.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Manage Absences'
            ],
            'grade' => [
                'icon' => 'file-digit',
                'route_name' => 'team.secretary.notes.report',
                'title' => 'report cards',
                'params' => [
                    'layout' => 'side-menu'
                ]

            ],
            'resources' => [
                'icon' => 'building',
                'route_name' => 'team.admin.sales.index',
                'params' => [
                    'layout' => 'side-menu'
                ],

                'title' => 'Resources'
                ,

],
                'sign' => [
                    'icon' => 'hand',
                    'route_name' => 'signature-pad',
                    'params' => [
                        'layout' => 'side-menu'
                    ],

                    'title' => 'signature'
                ]


            ];
    }
}
