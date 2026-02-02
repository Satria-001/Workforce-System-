<?php

namespace App\Helpers;

class MenuHelper
{
    protected static function basePath(): string
    {
        if (auth()->check() && method_exists(auth()->user(), 'isTechnician') && auth()->user()->isTechnician()) {
            return '/app';
        }

        return '/admin';
    }

    public static function getMainNavItems()
    {
        $base = self::basePath();
        
        // Admin menu items
        if ($base === '/admin') {
            return [
                [
                    'icon' => 'ti ti-layout-dashboard',
                    'name' => 'Dashboard',
                    'path' => '/admin/dashboard',
                ],
                [
                    'icon' => 'ti ti-users',
                    'name' => 'Karyawan',
                    'path' => '/admin/karyawan',
                ],
                [
                    'icon' => 'ti ti-calendar-check',
                    'name' => 'Absensi',
                    'path' => '/admin/absensi',
                ],
                [
                    'icon' => 'ti ti-ticket',
                    'name' => 'Tiket',
                    'path' => '/admin/tiket',
                ],
                [
                    'icon' => 'ti ti-chart-bar',
                    'name' => 'Reports',
                    'path' => '/admin/reports',
                ],
                [
                    'icon' => 'ti ti-gift',
                    'name' => 'Incentives',
                    'path' => '/admin/incentives',
                ],
                [
                    'icon' => 'ti ti-activity',
                    'name' => 'Activity Logs',
                    'path' => '/admin/activity-logs',
                ],
                [
                    'icon' => 'ti ti-settings',
                    'name' => 'Settings',
                    'path' => '/admin/settings',
                ],
            ];
        }
        
        // Technician menu items
        return [
            [
                'icon' => 'ti ti-layout-dashboard',
                'name' => 'Dashboard',
                'path' => $base . '/dashboard',
            ],
            [
                'icon' => 'ti ti-calendar',
                'name' => 'Calendar',
                'path' => $base . '/calendar',
            ],
            [
                'icon' => 'ti ti-user-circle',
                'name' => 'User Profile',
                'path' => $base . '/profile',
            ],
            [
                'name' => 'Forms',
                'icon' => 'ti ti-forms',
                'subItems' => [
                    ['name' => 'Form Elements', 'path' => $base . '/form-elements', 'pro' => false],
                ],
            ],
            [
                'name' => 'Tables',
                'icon' => 'ti ti-table',
                'subItems' => [
                    ['name' => 'Basic Tables', 'path' => $base . '/basic-tables', 'pro' => false]
                ],
            ],
            [
                'name' => 'Pages',
                'icon' => 'ti ti-files',
                'subItems' => [
                    ['name' => 'Blank Page', 'path' => $base . '/blank', 'pro' => false],
                    ['name' => '404 Error', 'path' => '/error-404', 'pro' => false]
                ],
            ],
        ];
    }

    public static function getOthersItems()
    {
        $base = self::basePath();
        
        // Admin tidak perlu Others items
        if ($base === '/admin') {
            return [];
        }
        
        // Technician juga tidak perlu Others items
        return [];
    }

    public static function getMenuGroups()
    {
        return [
            [
                'title' => 'Menu',
                'items' => self::getMainNavItems()
            ]
        ];
    }

    public static function isActive($path)
    {
        return request()->is(ltrim($path, '/'));
    }
}
