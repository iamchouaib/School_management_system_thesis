<?php

namespace App\Http\View\Composers;

use App\Main\AdminSideMenu;
use App\Main\AdminTopMenu;
use App\Main\SecretarySideMenu;
use App\Main\TeacherSideMenu;
use App\Main\TeacherTopMenu;
use Illuminate\View\View;
use App\Main\TopMenu;
use App\Main\SideMenu;
use App\Main\SimpleMenu;

class MenuComposer
{
    public function roles()
    {
        return auth()->user()?->roles?->map(function ($role) {
            return $role->name;
        })->toArray();
    }


    public function compose(View $view)
    {
        if (!is_null(request()->route())) {
            $pageName = request()->route()->getName();
            $layout = $this->layout($view);
            $activeMenu = $this->activeMenu($pageName, $layout);



            if (in_array('admin', $this->roles() ?? [])) {
                $view->with('side_menu', AdminSideMenu::menu());
            } else if (in_array('teacher', $this->roles() ?? [])) {
                $view->with('side_menu', TeacherSideMenu::menu());
            } else if (in_array('secretary', $this->roles() ?? [])) {
                $view->with('side_menu', SecretarySideMenu::menu());
            } else {
                $view->with('side_menu', SideMenu::menu());
            }

            if (in_array('admin', $this->roles() ?? [])) {
                $view->with('top_menu', AdminTopMenu::menu());
            } else if (in_array('teacher', $this->roles() ?? [])) {
//
                $view->with('top_menu', TeacherTopMenu ::menu());

            } else {
                $view->with('top_menu', TopMenu::menu());
            }



            $view->with('simple_menu', SimpleMenu::menu());
            $view->with('first_level_active_index', $activeMenu['first_level_active_index']);
            $view->with('second_level_active_index', $activeMenu['second_level_active_index']);
            $view->with('third_level_active_index', $activeMenu['third_level_active_index']);
            $view->with('page_name', $pageName);
            $view->with('layout', $layout);
        }

    }

    public function layout($view)
    {
        if (isset($view->layout)) {
            return $view->layout;
        } else if (request()->has('layout')) {
            return request()->query('layout');
        }

        return 'side-menu';
    }

    public function activeMenu($pageName, $layout)
    {
        $firstLevelActiveIndex = '';
        $secondLevelActiveIndex = '';
        $thirdLevelActiveIndex = '';


        if ($layout == 'top-menu') {

            if (in_array('admin', $this->roles() ?? [])) {
                $menus = AdminTopMenu::menu();
            } else if (in_array('teacher', $this->roles() ?? [])) {
//                $menus = TeacheTopMenu::menu();
                $menus = TopMenu::menu();
            } else {
                $menus = TopMenu::menu();
            }


            foreach ($menus as $menuKey => $menu) {
                if (isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        }
        else if ($layout == 'simple-menu') {
 foreach (SimpleMenu::menu() as $menuKey => $menu) {
                if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }
        }
        else {


            if (in_array('admin', $this->roles() ?? [])) {
                $menus = AdminSideMenu::menu();
            } else if (in_array('teacher', $this->roles() ?? [])) {
                $menus = TeacherSideMenu::menu();
            } else {
                $menus = SideMenu::menu();
            }

            foreach ($menus as $menuKey => $menu) {
                if ($menu !== 'devider' && isset($menu['route_name']) && $menu['route_name'] == $pageName && empty($firstPageName)) {
                    $firstLevelActiveIndex = $menuKey;
                }

                if (isset($menu['sub_menu'])) {
                    foreach ($menu['sub_menu'] as $subMenuKey => $subMenu) {
                        if (isset($subMenu['route_name']) && $subMenu['route_name'] == $pageName && $menuKey != 'menu-layout' && empty($secondPageName)) {
                            $firstLevelActiveIndex = $menuKey;
                            $secondLevelActiveIndex = $subMenuKey;
                        }

                        if (isset($subMenu['sub_menu'])) {
                            foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu) {
                                if (isset($lastSubMenu['route_name']) && $lastSubMenu['route_name'] == $pageName) {
                                    $firstLevelActiveIndex = $menuKey;
                                    $secondLevelActiveIndex = $subMenuKey;
                                    $thirdLevelActiveIndex = $lastSubMenuKey;
                                }
                            }
                        }
                    }
                }
            }


        }

        return [
            'first_level_active_index' => $firstLevelActiveIndex,
            'second_level_active_index' => $secondLevelActiveIndex,
            'third_level_active_index' => $thirdLevelActiveIndex
        ];
    }
}
