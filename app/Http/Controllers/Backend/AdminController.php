<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminStoreRequest;
use App\Http\Requests\Backend\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = 'List of admins';
        $admins = Admin::paginate(10);

        return view('backend.pages.admins.index', compact('admins','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'Edit admin';
        return view('backend.pages.admins.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminStoreRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/admins'), $imageName);
            $validated['image'] = $imageName;
        }

//        $validated['password'] = Hash::make($request->password);
        Admin::create($validated);

        return redirect()->back()->with('success', 'Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = 'Edit admin';
        $admin = Admin::find($id);
        return view('backend.pages.admins.edit', compact('admin', 'page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminUpdateRequest $request, $id)
    {
        $admin = Admin::find($id);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = rand(1, 1000) . time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('uploads/admins'), $imageName);
            $validated['image'] = $imageName;

            $old_img = $admin->image;
            if (File::exists(public_path('uploads/admins/' . $old_img))) {
                File::delete(public_path('uploads/admins/' . $old_img));
            }
        }

        if (!empty($request->password)) {

//            $validated['password'] = Hash::make($request->password);
            $admin->update($validated);
        } else {
            $validated['password'] = $admin->password;
            $admin->update($validated);
        }

        return redirect()->back()->with('success', 'Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        if ($admin->id!=1) {

            $old_img = $admin->image;
            $admin->delete();
            if (File::exists(public_path('uploads/admins/' . $old_img))) {
                File::delete(public_path('uploads/admins/' . $old_img));
            }
            return redirect()->route('admin.index')->with('success', 'Success');
        }

        return redirect()->route('admin.index')->with('warnind', 'Not deleted');
    }
}
