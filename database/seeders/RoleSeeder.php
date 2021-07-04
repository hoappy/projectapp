<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Jefe']);
        $role3 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.cometido.autorizar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cometido.denegar'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cometido.solicitar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.cancelar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.asignar'])->assignRole($role1);
        Permission::create(['name' => 'admin.cometido.rechazar'])->assignRole($role1);

        Permission::create(['name' => 'admin.cometido.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.destroy'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.activar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.cometido.desactivar'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'admin.user.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.destroy'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.activar'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.desactivar'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.rolestore'])->assignRole($role1);
        Permission::create(['name' => 'admin.user.roleasig'])->assignRole($role1);
        

        Permission::create(['name' => 'admin.item_presupuestario.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.item_presupuestario.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.item_presupuestario.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.item_presupuestario.destroy'])->assignRole($role1);
        Permission::create(['name' => 'admin.item_presupuestario.activar'])->assignRole($role1);
        Permission::create(['name' => 'admin.item_presupuestario.desactivar'])->assignRole($role1);

        Permission::create(['name' => 'admin.dependencia.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.dependencia.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.dependencia.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.dependencia.destroy'])->assignRole($role1);
        Permission::create(['name' => 'admin.dependencia.activar'])->assignRole($role1);
        Permission::create(['name' => 'admin.dependencia.desactivar'])->assignRole($role1);

        Permission::create(['name' => 'admin.conductor.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.conductor.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.conductor.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.conductor.destroy'])->assignRole($role1);
        Permission::create(['name' => 'admin.conductor.activar'])->assignRole($role1);
        Permission::create(['name' => 'admin.conductor.desactivar'])->assignRole($role1);

        Permission::create(['name' => 'admin.automovil.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.automovil.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.automovil.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.automovil.destroy'])->assignRole($role1);
        Permission::create(['name' => 'admin.automovil.activar'])->assignRole($role1);
        Permission::create(['name' => 'admin.automovil.desactivar'])->assignRole($role1);


    }
}
