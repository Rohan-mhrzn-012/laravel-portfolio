<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sortOrder = $request->input('sort', 'asc'); // default ascending

        // Fetch users with sorting and pagination (10 per page)
        $users = User::orderBy('fullname', $sortOrder)->paginate(10);

        // Keep query parameters for pagination links
        $users->appends(['sort' => $sortOrder]);

        return view('users.user', compact('users', 'sortOrder'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("users.user_view", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit_user', compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validation = $request->validate(
            [
                'fullname' => 'required|string|max:255',
                'username' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'profile_picture' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            ]
        );

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            $path = $request->file('profile_picture')->store('User', "public");
            $validation['profile_picture'] = $path;
        }

        $user->update($validation);

        return redirect()->route('user')->with('success', 'User data updated successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $user = User::where('fullname', 'like', "%{$query}%")->orWhere('username', 'like', "%{$query}%")->get();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['success' => true]);
    }
}
