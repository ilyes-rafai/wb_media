<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserAvatarRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        $users  = User::orderby('created_at', 'DESC')
            ->withCount('topics')
            ->withCount('projects')
            ->with('roles')
            ->get();
        return Inertia::render('Partials/User/Index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        $roles = Role::all();
        return Inertia::render('Partials/User/Create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        try {
            $validatedData = $request->validated();

            $user = User::create([
                'fullname' => $validatedData['fullname'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'gender' => $validatedData['gender'],
                'password' => bcrypt($validatedData['password']),
            ]);

            $user->roles()->sync($validatedData['roles']);


            // Redirect to the users index with a success message
            return redirect()
                ->route('users.index')
                ->with('success', 'The user has been successfully created.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('users.index')
                // ->with('error', 'An error occurred while creating the user. Please try again.');
                ->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Load the roles relationship
        $user->load('roles');

        // Fetch all available roles
        $roles = Role::all();

        // Render the Edit component with user and roles
        return Inertia::render('Partials/User/Edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function edit_password(User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Render the Edit component with user and roles
        return Inertia::render('Partials/User/EditPassword', [
            'user' => $user,
        ]);
    }

    public function edit_avatar(User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        // Render the Edit component with user and roles
        return Inertia::render('Partials/User/EditAvatar', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        try {
            // Extract validated data from the request
            $validatedData = $request->validated();

            // Update user fields except roles and password
            $user->update([
                'fullname' => $validatedData['fullname'],
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'gender' => $validatedData['gender'],
            ]);

            // Sync roles
            if (!empty($validatedData['roles'])) {
                $user->roles()->sync($validatedData['roles']);
            }

            // Redirect to the users index with a success message
            return redirect()
                ->route('users.index')
                ->with('success', 'The user has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('users.index')
                ->with('error', 'An error occurred while updating the user. Please try again.');
        }
    }

    public function update_avatar(UpdateUserAvatarRequest $request, User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Retrieve validated data
            $validated = $request->validated();

            $uploadedFile = null;

            // Handle Avatar Upload
            if ($request->hasFile('avatar')) {
                $file = $validated['avatar'];
                $newName = uniqid('avatar_', true) . '.' . $file->getClientOriginalExtension();
                $uploadPath = public_path('img/users/' . $user->username . '-' . $user->id);

                // Ensure directory exists
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Delete old avatar if it exists
                if ($user->avatar && File::exists(public_path($user->avatar))) {
                    File::delete(public_path($user->avatar));
                }

                // Move the uploaded file
                $file->move($uploadPath, $newName);
                $uploadedFile = 'img/users/' . $user->username . '-' . $user->id . '/' . $newName;
            }

            // Update user's avatar in the database
            $user->update([
                'avatar' => $uploadedFile,
            ]);

            return redirect()
                ->route('users.index')
                ->with('success', 'The password has been successfully updated.');
        } catch (\Exception $e) {
            return redirect()
                ->route('users.index')
                ->with('error', 'An error occurred while updating the password. Please try again.');
        }
    }


    public function update_password(UpdateUserPasswordRequest $request, User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }

        try {

            $validatedData = $request->validated();

            // Update user fields except roles and password
            $user->update([
                'password' => $validatedData['password'],
            ]);

            // Redirect to the users index with a success message
            return redirect()
                ->route('users.index')
                ->with('success', 'The password has been successfully updated.');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->route('users.index')
                ->with('error', 'An error occurred while updating the password. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (Gate::denies('is_admin')) {
            abort(404);
        }
        try {
            $user->roles()->detach();

            if ($user->avatar) {
                File::delete($user->avatar); // Delete the file
            }

            $user->delete();

            return redirect()
                ->route('users.index')
                ->with('success', 'The user has been successfully deleted.');
        } catch (\Exception $e) {
            return redirect()
                ->route('users.index')
                ->with('error', 'An error occurred while trying to delete the user. Please try again.');
        }
    }
}
