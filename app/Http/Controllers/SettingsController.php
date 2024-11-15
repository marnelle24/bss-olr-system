<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SettingsController extends Controller
{
    // Settings Landing page
    public function index()
    {
        $allRoles = Role::all()->pluck('name', 'id');
        $allPermissions = Permission::all()->pluck('name', 'id');

        return view('admin.settings', [
            'allRoles' => $allRoles,
            'allPermissions' => $allPermissions
        ]);
    }
}
