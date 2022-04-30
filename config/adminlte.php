<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => env('APP_NAME'),
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => "<b>SOCIAL</b><small>Mediaconnect</small>",
    'logo_img' => './img/cms_logo/welcome_logo_no_brand.png',
    'logo_img_class' => 'brand-image img-circle',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-white',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        
        [
            'text'  => 'Apps',
            'url'        => '/apps',
            'icon'       => 'fas fa-fw fa-bars',
            'icon_color' => 'primary',
            'classes'  => 'text-primary text-uppercase',
            'topnav_right' => true,
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Android',
                    'url'  => 'menu/child1',
                ],
                [
                    'text' => 'iOS',
                    'url'  => 'menu/child2',
                ],
            ],
        ],
        [
            'type'         => 'navbar-notification',
            'id'           => 'my-notification',      // An ID attribute (required).
            'icon'         => 'fas fa-bell',          // A font awesome icon (required).
            'icon_color'   => 'warning',              // The initial icon color (optional).
            'label'        => 0,                      // The initial label for the badge (optional).
            'label_color'  => 'danger',               // The initial badge color (optional).
            'url'          => 'notifications/show',   // The url to access all notifications/elements (required).
            'topnav_right' => true,                   // Or "topnav => true" to place on the left (required).
            'dropdown_mode'   => true,                // Enables the dropdown mode (optional).
            'dropdown_flabel' => 'All notifications', // The label for the dropdown footer link (optional).
            'update_cfg'   => [
                'url' => '/getNotifications',         // The url to periodically fetch new data (optional).
                'period' => 30,                       // The update period for get new data (in seconds, optional).
            ],
        ],
        

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
        [
            'text' => 'Settings',
            'url'  => '#',
            'can' => 'isAdmin',
            'icon' => 'fas fa-fw fa-cog',
            'submenu' => [
                [
                    'text' => 'Package Settings',
                    'url'  => '/package_config',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Services Settings',
                    'url'  => '/service_config',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Site Settings',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
            ],
        ],

        [
            'text' => 'Payment Gateway',
            'url'  => '#',
            'can' => 'isAdmin',
            'icon' => 'fas fa-fw fa-rupee-sign',
            'submenu' => [
                [
                    'text' => 'Setup Gateway',
                    'url'  => '/gateway_config',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Statements',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-plus',
                ],
               
            ],
        ],

        [
            'text' => 'Dashboard',
            'url'  => '/home',
            'icon' => 'fas fa-fw fa-laptop',
            'can' => 'isClient',
        ],


        [
            'text' => 'Groups',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-user-friends',
            'can' => 'isClient',                
            'submenu' => [
                [
                    'text' => 'Create Group',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Manage Group',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
            ],
        ],

        [
            'text' => 'Accounts',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-poll',
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Connect Account',
                    'url'  => '/connect',
                    'icon' => 'fas fa-fw fa-plug',
                ],
                [
                    'text' => 'Manage Account',
                    'url'  => '/manage',
                    'icon' => 'fas fa-fw fa-edit',
                ],
            ],
        ],

        [
            'text' => 'Posts',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-comments',
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Create Post',
                    'url'  => '/create_posts',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Manage Post',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
                [
                    'text' => 'Calendar',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-calendar',
                ],
                [
                    'text' => 'Bulk Sechdule',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-calendar-alt',
                ],
                [
                    'text' => 'Pending Approval',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-hourglass',
                ],
                [
                    'text' => 'Draft',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-code',
                ],
                [
                    'text' => 'URL Tool',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-link',
                ],
                [
                    'text' => 'Curated Content',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-bullseye',
                ],
                
            ],
        ],

        [
            'text' => 'Ads',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-bullhorn',
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Connect Ad Account',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-plug',
                ],
                [
                    'text' => 'Manage Ad Account',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
                [
                    'text' => 'Create Lead Ad',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-exclamation-triangle',
                ],
                [
                    'text' => 'Manage Ad',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
                [
                    'text' => 'Boost Posts',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-chart-line',
                ],
               
                
            ],
        ],
        [
            'text' => 'Analytics',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-dna',
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Twitter',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-twitter',
                ],
                [
                    'text' => 'Facebook',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-facebook',
                ],
                [
                    'text' => 'Instagram',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-instagram',
                ],
                [
                    'text' => 'LinkidIn',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-linkidin',
                ],
                [
                    'text' => 'Google My',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-google',
                ],
               
                
            ],
        ],
        
        [
            'text' => 'Inbox',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-envelope',
            'can' => 'isClient',
        ],
        [
            'text' => 'Team And Clients',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-user-plus',
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Add Member',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Manage Team',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
                [
                    'text' => 'Invite Client',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-pen',
                ],
                [
                    'text' => 'Manage Client',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
               
               
            ],
        ],
        [
            'text' => 'Content & Feeds',
            'url'  => '#',
            'icon' => 'fas fa-fw fa-rss',
            'can' => 'isClient',
            'submenu' => [
                [
                    'text' => 'Add Feed',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-plus',
                ],
                [
                    'text' => 'Manage Feed',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-edit',
                ],
                [
                    'text' => 'Feed',
                    'url'  => 'menu/child1',
                    'icon' => 'fas fa-fw fa-rss',
                ],
                [
                    'text' => 'curated',
                    'url'  => 'menu/child2',
                    'icon' => 'fas fa-fw fa-code',
                ],
              
               
                
            ],
        ],
        
        
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
        'BsCustomFileInput' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
                ],
            ],
        ],
        'Summernote' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.css',
                ],
            ],
        ],
        'BootstrapSelect' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
