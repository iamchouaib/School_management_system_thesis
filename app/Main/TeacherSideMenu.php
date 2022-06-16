<?php

namespace App\Main;

class TeacherSideMenu
{

    public static function menu()
    {
        return [

            'today' => [
                'icon' => 'sun' ,
                'title' => 'Today',
                'route_name' => 'team.teacher.today',
                'params' => [
                    'layout' => 'side-menu',
                ]
            ],



            'works' => [
                'icon' => 'library',
                'title' => 'Works',
                'sub_menu' => [
                    'modules' => [
                        'icon' => 'book',
                        'route_name' => 'team.teacher.modules',
                        'params' => [
                            'layout' => 'side-menu'
                        ],
                        'title' => 'Modules'
                    ],
                ]
            ],


            'schedule' => [
                'icon' => 'calendar',
                'title' => 'Schedule',
                'route_name' => 'team.teacher.schedule',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],

            'grd' => [
                'icon' => 'calendar',
                'title' => 'Grades Students',
                'route_name' => 'team.teacher.grade-students',
                'params' => [
                    'layout' => 'side-menu'
                ],
            ],




        ];
    }
}
