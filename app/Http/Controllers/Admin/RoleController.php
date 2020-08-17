<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\TagTranslationController;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Models\Admin\Permission;
use App\Repositories\Admin\RoleRepository;
use App\User;
use Auth;
use Flash;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    private function getTags(){
        return $tags = TagTranslationController::getTagsValues(\App::getLocale());
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     * @return Response
     */
    public function index($tab=null,$formtab=null)
    {
        $rols = $this->roleRepository->pluck('name','slug');
        $permissions = Permission::all();
        $tab = $tab==null ? '1' : $tab;

        return view('admin.users.rols.index')
            ->with('module', "")
            ->with('tab', $tab)
            ->with('formtab', $formtab)
            ->with('roles', $rols)
            ->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        $input = $request->all();

        $role = $this->roleRepository->create($input);

        Flash::success('Role saved successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        return view('admin.roles.edit')->with('role', $role);
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $role = $this->roleRepository->update($request->all(), $id);

        Flash::success('Role updated successfully.');

        return redirect(route('admin.roles.index'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('admin.roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('admin.roles.index'));
    }

/************************************************************************/
    /**
     * Search a user.
     *
     * @param Request $request
     * @return Response
     */
    public function searchUser(Request $request)
    {
        $roles = $this->roleRepository->pluck('name','slug');
        $permissions = Permission::all();
        $user = User::where('email',$request->email)->first();
        
        if($request->tab==3){
            $view = 'permissionstouser';
        }elseif($request->tab==4){
            $view = 'rolestouser';
        }

        return view('admin.users.rols.tabs.'.$view)
            ->with('module', "")
            ->with('tab', $request->tab)
            ->with('roles', $roles)
            ->with('user', $user)
            ->with('permissions', $permissions);
    }

    /**
     * Search the permissions of a role.
     *
     * @param Request $request
     * @return Response
     */
    public function lookUpPermissionsOfRole($role)
    {

        try{
            $rol = $this->roleRepository->findByField('slug',$role)->first();
            foreach ($rol->permissionRoles as $role) {            
                $permissionSlug=Permission::find($role->permission_id);
                $rolePermissions[]=$permissionSlug->slug;
            }
            if(!isset($rolePermissions)  ){
                $rolePermissions="null";
            }
            return response()->json($rolePermissions);
        }catch(Exeception $e){
            return response()->json($e->Message());
        }
    }

    /**
     * Render the view of adding permissions to a role.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPermissionsToRole(Request $request)
    {
        try{         
            return $this->index($tab=1,null);
        }catch(Exeception $e){
            return $e->Message();
        }
    }

    /**
     * Obtaining the request to add permissions to a role.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissionsToRole(Request $request)
    {
        try{
            if(Auth::user()->isRole('admin')){
                $role = $this->roleRepository->findByField('slug',$request->role_slug)->first();
                // Verify if it is an array of permissions.
                if(count($request->permission_slug) == 1){
                    // Verify if you already have that permission.
                    $resp = $this->verifyPermissionToRole($role, $request->permission_slug[0]);
                }else{
                    // Synchronize all the permission.
                    $resp = $this->syncPermissions($role, $request->permission_slug);
                }

                if($resp == "OK")
                    $request->session()->flash('status', $this->getTags()['back_message_success']);
                else
                    $request->session()->flash('status', $this->getTags()['back_message_has_permission']);
                
                return back();
            }else{
                $request->session()->flash('status', $this->getTags()['back_message_not_have_permission']);
                return back();
            }
        }catch(Exeception $e){
            return $e->Message();
        }
    }

    /**
     * Render the view of adding permissions to a role.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewPermissionsToUser(Request $request)
    {
        try{                
            return $this->index($tab=2,$formtab=3);
        }catch(Exeception $e){
            return $e->Message();
        }
    }

    /**
     * Obtaining the request to add permissions to a role.
     *
     * @return \Illuminate\Http\Response
     */
    public function permissionsToUser(Request $request)
    {
        try{
            if(Auth::user()->isRole('admin')){
                $user = User::find($request->user_id);

                // Verify if it is an array of permissions.
                if(count($request->permission_slug) == 1){
                    // Verify if you already have that permission.
                    $resp = $this->verifyPermissionToUser($user, $request->permission_slug[0]);
                }else{
                    // Synchronize all the permission.
                    $resp = $this->syncPermissions($user, $request->permission_slug);
                }

                if($resp == "OK")
                    $request->session()->flash('status', $this->getTags()['back_message_success']);
                else
                    $request->session()->flash('status', $this->getTags()['back_message_has_permission']);
                
                return back();
            }else{
                $request->session()->flash('status', $this->getTags()['back_message_not_have_permission']);
                return back();
            }
        }catch(Exeception $e){
            return $e->Message();
        }
    }

    /**
     * Render the view of adding roles to a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewRolestouser(Request $request)
    {
        try{                
            return $this->index($tab=2,$formtab=4);
        }catch(Exeception $e){
            return $e->Message();
        }
    }

    /**
     * Obtaining the request to add roles to a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function rolestouser(Request $request)
    {
        try{
            if(Auth::user()->isRole('admin')){
                $user = User::find($request->user_id);

                // Verify if it is an array of permissions.
                if(count($request->role_slug) == 1){
                    // Verify if you already have that role.
                    $resp = $this->verifyRoleToUser($user, $request->role_slug[0]);
                }else{
                    // Synchronize all the permission.
                    $resp = $this->syncRoles($user, $request->role_slug);
                }

                if($resp == "OK")
                    $request->session()->flash('status', $this->getTags()['back_message_success']);
                else
                    $request->session()->flash('status', $this->getTags()['back_message_has_permission']);
                
                return back();
            }else{
                $request->session()->flash('status', $this->getTags()['back_message_not_have_permission']);
                return back();
            }
        }catch(Exeception $e){
            return $e->Message();
        }
    }

    /**
     * Verify permissions to a role.
     *
     * @return $message
     */
    private function verifyPermissionToRole($role, $permission)
    {
        try{
            foreach ($role->permissionRoles as $perRole) {
                if(Permission::find($perRole->id)){
                    return $message = 'ERROR';
                }
            }
            return $this->assignPermission($role, $permission);
        }catch(\Exeception $e){
            return $message = $e->getMessage();
        }
    }

    /**
     * Verify permissions to a user.
     *
     * @return $message
     */
    private function verifyPermissionToUser($user, $permission)
    {
        try{
            if($user->can($permission)){
                return $message = 'ERROR';
            }
            
            return $this->assignPermission($user, $permission);
        }catch(\Exeception $e){
            return $message = $e->getMessage();
        }
    }

    /**
     * Verify roles to a user.
     *
     * @return $message
     */
    private function verifyRoleToUser($user, $role)
    {
        try{
            if($user->isRole($role)){
                return $message = 'ERROR';
            }
            return $this->assignRole($user, $role);
        }catch(\Exeception $e){
            return $message = $e->getMessage();
        }
    }

    /**
     * Assign a permission to a data.
     *
     * @return $message
     */
    private function assignPermission($data, $permission)
    {
        try{
            $data->assignPermission($permission);
            return $message = "OK";
        }catch(\Exeception $e){
            return $message = $e->getMessage();
        }
    }

    /**
     * Synchronize all the permissions of a data.
     *
     * @return $message
     */
    private function syncPermissions($data, $permissions)
    {
        try{
            $syncPermissions=$this->getIdOfSlug($permissions);
            $data->syncPermissions($syncPermissions);
            $message = "OK";
        }catch(\Exeception $e){
            $message = $e->getMessage();
        }
        return $message;
    }

    /**
     * Assign a role to a user.
     *
     * @return $message
     */
    private function assignRole($data, $role)
    {
        try{
            $data->assignRole($role);
            return $message = "OK";
        }catch(\Exeception $e){
            return $message = $e->getMessage();
        }
    }

    /**
     * Synchronize all the role of a data.
     *
     * @return $message
     */
    private function syncRoles($data, $roles)
    {
        try{
            $syncRoles=$this->getRolesIdOfSlug($roles);
            $data->syncRoles($syncRoles);
            return $message = "OK";
        }catch(\Exeception $e){
            return $message = $e->getMessage();
        }
    }

    /**
     * Get id of a slug.
     *
     * @return $array
     */
    private function getIdOfSlug($permissions){
        foreach ($permissions as $permission) {
            $exist = Permission::where('slug',$permission)->first();
            $array[]=$exist->id;
        }
        return $array;
    }

    /**
     * Get id of a slug.
     *
     * @return $array
     */
    private function getRolesIdOfSlug($roles){
        foreach ($roles as $role) {
            $exist = $this->roleRepository->findByField('slug',$role)->first();
            $array[]=$exist->id;
        }
        return $array;
    }
}
