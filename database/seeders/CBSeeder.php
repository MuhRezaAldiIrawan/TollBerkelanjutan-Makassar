<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
//
class CBSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Please wait updating the data...');
        # User
        if (DB::table('cms_users')->count() == 0) {
            $password = Hash::make('123456');
            $cms_users = DB::table('cms_users')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'Super Admin',
                'email' => 'admin@crudbooster.com',
                'password' => $password,
                'id_cms_privileges' => 1,
                'status' => 'Active',
            ]);
        }
        $this->command->info("Create users completed");
        # User End

        # Email Templates
        DB::table('cms_email_templates')->insert([
            'created_at' => date('Y-m-d H:i:s'),
            'name' => 'Email Template Forgot Password Backend',
            'slug' => 'forgot_password_backend',
            'content' => '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>',
            'description' => '[password]',
            'from_name' => 'System',
            'from_email' => 'system@crudbooster.com',
            'cc_email' => null,
        ]);
        $this->command->info("Create email templates completed");

        # CB Modules
        $data = [
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Notifications'),
                'icon' => 'fa fa-cog',
                'path' => 'notifications',
                'table_name' => 'cms_notifications',
                'controller' => 'NotificationsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Privileges'),
                'icon' => 'fa fa-cog',
                'path' => 'privileges',
                'table_name' => 'cms_privileges',
                'controller' => 'PrivilegesController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Privileges_Roles'),
                'icon' => 'fa fa-cog',
                'path' => 'privileges_roles',
                'table_name' => 'cms_privileges_roles',
                'controller' => 'PrivilegesRolesController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Users_Management'),
                'icon' => 'fa fa-users',
                'path' => 'users',
                'table_name' => 'cms_users',
                'controller' => 'AdminCmsUsersController',
                'is_protected' => 0,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('settings'),
                'icon' => 'fa fa-cog',
                'path' => 'settings',
                'table_name' => 'cms_settings',
                'controller' => 'SettingsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Module_Generator'),
                'icon' => 'fa fa-database',
                'path' => 'module_generator',
                'table_name' => 'cms_moduls',
                'controller' => 'ModulsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Menu_Management'),
                'icon' => 'fa fa-bars',
                'path' => 'menu_management',
                'table_name' => 'cms_menus',
                'controller' => 'MenusController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Email_Templates'),
                'icon' => 'fa fa-envelope-o',
                'path' => 'email_templates',
                'table_name' => 'cms_email_templates',
                'controller' => 'EmailTemplatesController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Statistic_Builder'),
                'icon' => 'fa fa-dashboard',
                'path' => 'statistic_builder',
                'table_name' => 'cms_statistics',
                'controller' => 'StatisticBuilderController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('API_Generator'),
                'icon' => 'fa fa-cloud-download',
                'path' => 'api_generator',
                'table_name' => '',
                'controller' => 'ApiCustomController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => cbLang('Log_User_Access'),
                'icon' => 'fa fa-flag-o',
                'path' => 'logs',
                'table_name' => 'cms_logs',
                'controller' => 'LogsController',
                'is_protected' => 1,
                'is_active' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('User Access'),
                'icon' => 'fa fa-user',
                'path' => 'useraccess',
                'table_name' => 'guests',
                'controller' => 'AdminUseraccessController',
                'is_protected' => 0,
                'is_active' => 0,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('List Users'),
                'icon' => 'fa fa-users',
                'path' => 'listusers',
                'table_name' => 'users',
                'controller' => 'AdminListusersController',
                'is_protected' => 0,
                'is_active' => 0,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Delayed Payments'),
                'icon' => 'fa fa-money',
                'path' => 'delayedpayments',
                'table_name' => 'info_traffics',
                'controller' => 'AdminDelayedpaymentsController',
                'is_protected' => 0,
                'is_active' => 0,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Description MMN'),
                'icon' => 'fa fa-edit',
                'path' => 'postsMmn',
                'table_name' => 'postsmmn',
                'controller' => 'AdminPostsMmnController',
                'is_protected' => 0,
                'is_active' => 0,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Description JTSE'),
                'icon' => 'fa fa-edit',
                'path' => 'postsJtse',
                'table_name' => 'postsjtse',
                'controller' => 'AdminPostsJtseController',
                'is_protected' => 0,
                'is_active' => 0,
            ],
            
        ];

        foreach ($data as $k => $d) {
            if (DB::table('cms_moduls')->where('name', $d['name'])->count()) {
                unset($data[$k]);
            }
        }

        DB::table('cms_moduls')->insert($data);
        $this->command->info("Create default cb modules completed");
        # CB Modules End

        # CB Menus
        $data = [
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('User Access'),
                'type' => 'Route',
                'path' => 'AdminUseraccessControllerGetIndex',
                'icon' => 'fa fa-user',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 2,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('List Users'),
                'type' => 'Route',
                'path' => 'AdminListusersControllerGetIndex',
                'icon' => 'fa fa-users',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 1,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Delayed Payments'),
                'type' => 'Route',
                'path' => 'AdminDelayedpaymentsControllerGetIndex',
                'icon' => 'fa fa-money',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 3,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Description MMN'),
                'type' => 'Route',
                'path' => 'AdminPostsMmnControllerGetIndex',
                'icon' => 'fa fa-edit',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 4,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Description JTSE'),
                'type' => 'Route',
                'path' => 'AdminPostsJtseControllerGetIndex',
                'icon' => 'fa fa-edit',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 0,
                'id_cms_privileges' => 1,
                'sorting' => 5,
            ],
            [

                'created_at' => date('Y-m-d H:i:s'),
                'name' => ('Dashboard'),
                'type' => 'Statistic',
                'path' => 'statistic_builder/show/dashboardbuilder',
                'icon' => 'fa fa-dashboard',
                'parent_id' => 0,
                'is_active' => 1,
                'is_dashboard' => 1,
                'id_cms_privileges' => 1,
                'sorting' => null,
            ],
            
        ];

        foreach ($data as $a => $b) {
            if (DB::table('cms_menus')->where('name', $b['name'])->count()) {
                unset($data[$a]);
            }
        }

        DB::table('cms_menus')->insert($data);
        $this->command->info("Create default cb menus completed");
        # CB Menus End

        # CB Menus Privileges
        $data = [
            [

                'id_cms_menus' => 1,
                'id_cms_privileges' => 1,
            ],
            [

                'id_cms_menus' => 2,
                'id_cms_privileges' => 1,
            ],
            [

                'id_cms_menus' => 3,
                'id_cms_privileges' => 1,
            ],
            [

                'id_cms_menus' => 4,
                'id_cms_privileges' => 1,
            ],
            [

                'id_cms_menus' => 5,
                'id_cms_privileges' => 1,
            ],
            [

                'id_cms_menus' => 6,
                'id_cms_privileges' => 1,
            ],
        ];

        foreach ($data as $c => $d) {
            if (DB::table('cms_menus_privileges')->where('id_cms_menus', $d['id_cms_menus'])->count()) {
                unset($data[$c]);
            }
        }

        DB::table('cms_menus_privileges')->insert($data);
        $this->command->info("Create default cb menus privileges completed");
        # CB Menus Previleges End

        # CB Statistic Components
        $tundaBayar='{"name":"Jumlah Tunda Bayar","icon":"ion-pricetag","color":"bg-red","link":"#","sql":"SELECT count(*) FROM info_traffics WHERE source = \'tunda bayar\'"}';
        $data = [
            [

                'id_cms_statistics' => 1,
                'componentID' => '12840d971ef7c9c3cb49c9d510e78a5f',
                'component_name' => 'smallbox',
                'area_name' => 'area2',
                'sorting' => '0',
                'config' => '{"name":"Users","icon":"ion-person","color":"bg-green","link":"#","sql":"SELECT count(*) from users"}',
            ],
            [

                'id_cms_statistics' => 1,
                'componentID' => '2dfaf1a62efe3633e59b000a1b495149',
                'component_name' => 'smallbox',
                'area_name' => 'area1',
                'sorting' => '0',
                'config' => '{"name":"Users Access","icon":"ion-checkmark","color":"bg-aqua","link":"#","sql":"SELECT count(*) from guests"}',
            ],
            [

                'id_cms_statistics' => 1,
                'componentID' => '8fd58772f8c42f29550b1c4013cfd14c',
                'component_name' => 'smallbox',
                'area_name' => 'area3',
                'sorting' => '0',
                'config' => $tundaBayar,
            ],
            [

                'id_cms_statistics' => 1,
                'componentID' => 'f90293962e27e33f88b88f3596925669',
                'component_name' => 'smallbox',
                'area_name' => 'area4',
                'sorting' => '0',
                'config' => '{"name":"Jumlah Semua Traffic","icon":"ion-podium","color":"bg-yellow","link":"#","sql":"SELECT count(*) FROM info_traffics"}',
            ],
            [

                'id_cms_statistics' => 1,
                'componentID' => '95b305bedf6013edfae76629481615b6',
                'component_name' => 'table',
                'area_name' => 'area5',
                'sorting' => '0',
                'config' => '{"SELECT date,company,date,class,traffic,source FROM info_traffics ORDER BY date DESC LIMIT 100"}',
            ],
        ];

        // foreach ($data as $e => $f) {
        //     if (DB::table('cms_statistics_components')->where('id_cms_menus', $f['id_cms_menus'])->count()) {
        //         unset($data[$e]);
        //     }
        // }

        DB::table('cms_statistic_components')->insert($data);
        $this->command->info("Create default cb statistic components completed");
        # CB Statistic Components End

        # CB Statistic 
        $data = [
            [

                'name' => 'Dashboard Traffic Toll Makassar',
                'slug' => 'dashboardbuilder',
            ],
        ];

        // foreach ($data as $e => $f) {
        //     if (DB::table('cms_statistics_components')->where('id_cms_menus', $f['id_cms_menus'])->count()) {
        //         unset($data[$e]);
        //     }
        // }

        DB::table('cms_statistics')->insert($data);
        $this->command->info("Create default cb statistics completed");
        # CB Statistics End

        # CB Setting
        $data = [

            //LOGIN REGISTER STYLE
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'login_background_color',
                'label' => 'Login Background Color',
                'content' => null,
                'content_input_type' => 'text',
                'group_setting' => cbLang('login_register_style'),
                'dataenum' => null,
                'helper' => 'Input hexacode',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'login_font_color',
                'label' => 'Login Font Color',
                'content' => null,
                'content_input_type' => 'text',
                'group_setting' => cbLang('login_register_style'),
                'dataenum' => null,
                'helper' => 'Input hexacode',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'login_background_image',
                'label' => 'Login Background Image',
                'content' => 'uploads/2022-06/toll_road_bmn4.jpg',
                'content_input_type' => 'upload_image',
                'group_setting' => cbLang('login_register_style'),
                'dataenum' => null,
                'helper' => null,
            ],

            //EMAIL SETTING
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'email_sender',
                'label' => 'Email Sender',
                'content' => 'support@crudbooster.com',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_driver',
                'label' => 'Mail Driver',
                'content' => 'mail',
                'content_input_type' => 'select',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => 'smtp,mail,sendmail',
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_host',
                'label' => 'SMTP Host',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_port',
                'label' => 'SMTP Port',
                'content' => '25',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => 'default 25',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_username',
                'label' => 'SMTP Username',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'smtp_password',
                'label' => 'SMTP Password',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('email_setting'),
                'dataenum' => null,
                'helper' => null,
            ],

            //APPLICATION SETTING
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'appname',
                'content' => 'Admin Traffic Tol Makassar',
                'label' => 'Application Name',
                'group_setting' => cbLang('application_setting'),
                'content' => 'Admin Traffic Tol Makassar',
                'content_input_type' => 'text',
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'default_paper_size',
                'label' => 'Default Paper Print Size',
                'group_setting' => cbLang('application_setting'),
                'content' => 'Legal',
                'content_input_type' => 'text',
                'dataenum' => null,
                'helper' => 'Paper size, ex : A4, Legal, etc',
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'logo',
                'label' => 'Logo',
                'content' => '',
                'content_input_type' => 'upload_image',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'favicon',
                'label' => 'Favicon',
                'content' => '',
                'content_input_type' => 'upload_image',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'api_debug_mode',
                'label' => 'API Debug Mode',
                'content' => 'true',
                'content_input_type' => 'select',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => 'true,false',
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'google_api_key',
                'label' => 'Google API Key',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
            [
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'google_fcm_key',
                'label' => 'Google FCM Key',
                'content' => '',
                'content_input_type' => 'text',
                'group_setting' => cbLang('application_setting'),
                'dataenum' => null,
                'helper' => null,
            ],
        ];

        foreach ($data as $row) {
            $count = DB::table('cms_settings')->where('name', $row['name'])->count();
            if ($count) {
                if ($count > 1) {
                    $newsId = DB::table('cms_settings')->where('name', $row['name'])->orderby('id', 'asc')->take(1)->first();
                    DB::table('cms_settings')->where('name', $row['name'])->where('id', '!=', $newsId->id)->delete();
                }
                continue;
            }
            DB::table('cms_settings')->insert($row);
        }
        $this->command->info("Create cb settings completed");
        # CB Setting End

        # CB Privilege
        if (DB::table('cms_privileges')->where('name', 'Super Administrator')->count() == 0) {
            DB::table('cms_privileges')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'name' => 'Super Administrator',
                'is_superadmin' => 1,
                'theme_color' => 'skin-red',
            ]);
        }
        if (DB::table('cms_privileges_roles')->count() == 0) {
            $modules = DB::table('cms_moduls')->get();
            $i = 1;
            foreach ($modules as $module) {

                $is_visible = 1;
                $is_create = 1;
                $is_read = 1;
                $is_edit = 1;
                $is_delete = 1;

                switch ($module->table_name) {
                    case 'cms_logs':
                        $is_create = 0;
                        $is_edit = 0;
                        break;
                    case 'cms_privileges_roles':
                        $is_visible = 0;
                        break;
                    case 'cms_apicustom':
                        $is_visible = 0;
                        break;
                    case 'cms_notifications':
                        $is_create = $is_read = $is_edit = $is_delete = 0;
                        break;
                }

                DB::table('cms_privileges_roles')->insert([
                    'created_at' => date('Y-m-d H:i:s'),
                    'is_visible' => $is_visible,
                    'is_create' => $is_create,
                    'is_edit' => $is_edit,
                    'is_delete' => $is_delete,
                    'is_read' => $is_read,
                    'id_cms_privileges' => 1,
                    'id_cms_moduls' => $module->id,
                ]);
                $i++;
            }
        }
        $this->command->info("Create roles completed");
        # CB Privilege End

        $this->command->info('All cb seeders completed !');
    }
}
