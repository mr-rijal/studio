<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Plan Permissions
    |--------------------------------------------------------------------------
    |
    | This file contains all available permissions that can be assigned to plans.
    | These permissions are used to control access to features in the application.
    |
    */

    'permissions' => [
        'users' => [
            'create_users' => 'Create Users',
            'edit_users' => 'Edit Users',
            'delete_users' => 'Delete Users',
            'view_users' => 'View Users',
        ],
        'companies' => [
            'create_companies' => 'Create Companies',
            'edit_companies' => 'Edit Companies',
            'delete_companies' => 'Delete Companies',
            'view_companies' => 'View Companies',
        ],
        'domains' => [
            'manage_domains' => 'Manage Domains',
            'verify_domains' => 'Verify Domains',
        ],
        'reports' => [
            'view_reports' => 'View Reports',
            'export_reports' => 'Export Reports',
        ],
        'settings' => [
            'manage_settings' => 'Manage Settings',
            'manage_billing' => 'Manage Billing',
        ],
        'integrations' => [
            'manage_integrations' => 'Manage Integrations',
            'api_access' => 'API Access',
        ],
    ],
];
