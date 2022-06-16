<?php

namespace App\Main;

class TeacherTopMenu
{

    public static function menu()
    {
        return [

            'today' => [
                'icon' => 'sun' ,
                'title' => 'Today',
                'route_name' => 'team.teacher.today',
                'params' => [
                    'layout' => 'top-menu',
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
                            'layout' => 'top-menu'
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
                    'layout' => 'top-menu'
                ],
            ],



        ];
    }
}
