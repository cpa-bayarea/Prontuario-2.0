<?php

namespace App\Http\Controllers;

use Route;
use App\Models\{Permission, Role};

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('permissions.index', compact('roles'));
    }

    public function updatePermissions()
    {
        try {
            foreach (Route::getRoutes() as $route) {
                if ($route->getName()) {
                    Permission::firstOrCreate([
                        'nome' => $route->getName()
                    ]);
                }
            }
            return ["success" => true];
        } catch (\Exception  $e) {
            return ["error" => $e->getMessage()];
        }
    }
}
