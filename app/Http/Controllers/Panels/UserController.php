<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Http\Controllers\Traits\WithUserEmailStatus;
use App\Enums\{UserRole, UserType};
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    use WithUserEmailStatus;

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::query();
        $page_title = 'Users';
        $template = 'panel.pages.user.index';
        $btn_delete_message = 'Are you sure you want to delete this user?';

        if($search = $request->input('search')){
            $query->search($search);
        }

        switch ($request->input('type')) {
            case 'property-owners':
                $query->propertyOwners();
                $page_title = 'Property Owners';
                $btn_delete_message = 'Are you sure you want to delete Property Owner? This will permanently remove all this user\'s records including requests, progress sheets, payments, and properties.';
                break;

            case 'regular':
                $query->regular()->withCount(['payments', 'repair_requests']);
                $page_title = 'One-Time Users';
                $template = 'panel.pages.user.ru-index';
                $btn_delete_message = 'Are you sure you want to delete One time user? This will permanently remove all this user\'s records including requests, payments';
                break;

            case 'admin':
                $query->admins();
                $page_title = 'Admin Accounts';
                $btn_delete_message = 'Are you sure you want to delete Admin?';
                break;

            case 'super-admin':
                if( !auth()->user()->is_super_admin() ) abort(401);
                $query->superAdmins();
                $page_title = 'Super Admin Accounts';
                $btn_delete_message = 'Are you sure you want to delete Super Admin?';
                break;
        }

        return view($template, [
            'users' => $query->paginate(10)->appends($request->query()),
            'page_title' => $page_title,
            'btn_delete_message' => $btn_delete_message,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = [UserRole::ADMIN, UserRole::SUPER_ADMIN];
        return view('panel.pages.user.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'contact_number' => 'required'
        ];

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'contact_number' => $request->input('contact_number'),
            'unit_number' => 'N/A',
            'pin' => '$2y$10$92IXUNpkjO0rOQ5byMi',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi--',
        ];

        if ($request->input('role')) {
            $validation['role'] = [
                'required',
                Rule::in([UserRole::ADMIN, UserRole::SUPER_ADMIN])
            ];
        }

        $request->validate($validation);

        $user = User::create($data);

        if ($role = $request->input('role')) {
            $user->assignRoleAndPin($role);
        }

        if($file_ids = $request->input('avatar')){
            $user->updateMediaUploads($file_ids);
        }

        $user->markEmailAsVerified();

        session()->flash('alertSuccess', 'User successfully created.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user->is_property_owner()) {
            $user->loadCount('properties');
            $user->loadSum('properties', 'number_of_units');
        }

        if( auth()->user()->id === $user->id ) {
            $title = "My Account";
            $btn_text = "Edit Profile";
        } else {
            $title = "{$user->name} Details";
            $btn_text = "Edit User";
        }

        return view('panel.pages.user.show', compact('user', 'title', 'btn_text'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if( auth()->user()->id === $user->id ) {
            $title = "Edit Profile";
        } else {
            $title = "Edit User";
        }

        $roles = [UserRole::ADMIN, UserRole::SUPER_ADMIN];

        return view('panel.pages.user.form', compact('user', 'roles', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validation = [
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'contact_number' => 'required'
        ];

        $update = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'zip_code' => $request->input('zip_code'),
            'contact_number' => $request->input('contact_number')
        ];

        if ($user->is_tenant()) {
            $validation['unit_number'] = 'required';
            $update['unit_number'] = $request->input('unit_number');
        }

        if ($role = $request->input('role')) {
            $validation['role'] = [
                'required',
                Rule::in([UserRole::ADMIN, UserRole::SUPER_ADMIN])
            ];

            $role_key = UserRole::fromValue($role)->key;
            $update['pin'] = UserType::$role_key() . substr($user->pin, 2);
        }

        $request->validate($validation);

        $user->update($update);

        if ($role = $request->input('role')) {
            $user->syncRoles([$role]);
        }

        if($file_ids = $request->input('avatar')){
            $user->updateMediaUploads($file_ids);
        }

        session()->flash('alertSuccess', 'User successfully updated.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User  $user)
    {
        $user->delete();

        session()->flash('alertSuccess', 'User successfully deleted.');

        return redirect()->back();
    }
}
