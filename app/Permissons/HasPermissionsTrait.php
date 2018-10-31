<?php
namespace App\Permissions;

use App\Permission;
use App\Role;

trait HasPermissionsTrait {
    public function roles() {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'users_permissions');
    }
    /***
     *  we’re iterating through the roles and checking by the slug field, 
     *  if that specific role exists.
     *  Check with:
     *      $user = $request->user(); //getting the current logged in user
     *      dd($user->hasRole('admin','editor')); // and so on
     * */
    public function hasRole( ... $roles ) {
        foreach ($roles as $role) {
           if ($this->roles->contains('slug', $role)) {
              return true;
           }
        }
        return false;
    }
    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }
    /**
     * - We’ll be utilizing the Laravel’s "can" directive to check if the User have Permission.
     *    and instead of using $user->hasPermissionTo(), we’ll use $user->can()
     * - we need to create a new PermissionsServiceProvider for authorization
     *  Test with:
     *      dd($user->can('permission-slug'));
     */
    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('slug', $permission->slug)->count();
    }

    protected function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role){
           if($this->roles->contains($role)) {
              return true;
           }
        }
        return false;
    }
    /**
     * we want to give a set of permissions to a logged in user, here’s how we can achieve this
     * 
     */
    public function givePermissionsTo(... $permissions) {
        $permissions = $this->getAllPermissions($permissions);
        // dd($permissions);
        if($permissions === null) {
           return $this;
        }
        $this->permissions()->saveMany($permissions);
        return $this;
    }
    
    /* public function deletePermissions( ... $permissions ) {
        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;
    } */

    public function withdrawPermissionsTo( ... $permissions ) {
		$permissions = $this->getAllPermissions($permissions);
		$this->permissions()->detach($permissions);
		return $this;
	}
    
    public function refreshPermissions( ... $permissions ) {
		$this->permissions()->detach();
		return $this->givePermissionsTo($permissions);
    }
    
    protected function getAllPermissions(array $permissions) {
		return Permission::whereIn('slug', $permissions)->get();
	}
}