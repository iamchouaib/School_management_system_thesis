<?php

namespace App\Main;

class SideMenu
{

    public static function menu()
    {
        return [
            'students' => [
                'icon' => 'users',
                'route_name' => 'parent.students.index',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'My Students'
            ],
            'addStudent' => [
                'icon' => 'user-plus',
                'route_name' => 'parent.students.create',
                'params' => [
                    'layout' => 'side-menu'
                ],
                'title' => 'Add New Student'
            ],


                 'schedule' => [
        'icon' => 'calendar',
        'title' => 'Schedule',
        'route_name' => 'parent.schedule.index',
        'params' => [
            'layout' => 'side-menu'
        ],
    ],
        ];
    }
}
