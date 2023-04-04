<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $doctors = Doctor::all();
        return view('doctor.index')->with(compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $doctor = $request->except(['_token']);
        Doctor::create($doctor);
        return redirect()->route('doctor.index')->with('success', 'Doctor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctor.show')->with(compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $doctor = Doctor::find($id);
        return view('doctor.edit')->with(compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $doctor = $request->except(['_token']);
        Doctor::find($request->id)
            ->update($doctor);
        return redirect()->route('doctor.index')->with('success', 'Doctor updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('success', 'Doctor deleted successfully.');
    }
}
