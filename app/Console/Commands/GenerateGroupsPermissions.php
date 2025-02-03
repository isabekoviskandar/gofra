<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Group;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Route;

class GenerateGroupsPermissions extends Command
{
    protected $signature = 'permissions:generate';
    protected $description = 'Generate groups and permissions based on route names';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Generating groups and permissions...');

        $routes = Route::getRoutes();
        $adminRole = Role::where('name', 'admin')->first();

        if (!$adminRole) {
            $this->error('Admin role not found! Make sure you have an admin role in the database.');
            return Command::FAILURE;
        }

        foreach ($routes as $route) {
            $key = $route->getName();

            if ($key && !str_starts_with($key, 'generated::') && $key !== 'storage.local') {
                $name = ucfirst(str_replace('.', '-', $key));
                $prefix = explode('.', $key)[0];

                $group = Group::firstOrCreate(['name' => $prefix]);

                $permission = Permission::firstOrCreate([
                    'key' => $key,
                ], [
                    'name' => $name,
                    'group_id' => $group->id,
                ]);

                RolePermission::firstOrCreate([
                    'role_id' => $adminRole->id,    
                    'permission_id' => $permission->id,
                ]);
            }
        }

        $this->info('Groups and permissions have been successfully generated and assigned to the admin role.');
        return Command::SUCCESS;
    }
}
