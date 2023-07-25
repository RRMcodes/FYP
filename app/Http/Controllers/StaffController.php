<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index')->with(compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('staff.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $staff = $request->except(['_token']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'-'.$request->f_name.'.' . $image->extension();
            $image->move(public_path('images'), $imageName);

            // You can save the $imageName to your database or perform any other required actions.
        }
        $staff['image'] = $imageName;
        Staff::create($staff);
        return redirect()->route('staff.index')->with('success', 'Staff created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $staff = Staff::find($id);
        return view('staff.show2')->with(compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('staff.edit2')->with(compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $staff = $request->except(['_token']);
        Staff::find($request->id)
            ->update($staff);
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        $staff->delete();

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully.');
    }
}
