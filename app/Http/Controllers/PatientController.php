<?php

namespace App\Http\Controllers;

use App\Mail\SignupMail;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\If_;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patient.index')->with(compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function store(Request $request)
//    {
//
//        $patient = $request->except(['_token']);
//        $user = Patient::create($patient);
//        User::create($patient);
//
//        return redirect()->route('patient.index')->with('message', 'Patient record created successfully.');
//    }
    public function store(Request $request)
    {
        // Create the patient record
        $patient = $request->except(['_token']);

        // Create the user record and associate it with the patient ID
        $user = User::create([
            'name'  =>  $patient['f_name'].' '.$patient['l_name'],
            'email' =>  $patient['email'],
            'password'  =>  Hash::make('password'),
            'role'  => 'patient'
        ]);

        $username = $user->name;
        $email = $user->email;

        Mail::to($email)->send(new SignupMail($username, $email));

        $patient['id'] = $user->id;
        Patient::create($patient);


        return redirect()->route('patient.index')->with('message', 'Patient record created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('patient.show')->with(compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        if (Auth::User()->id == $id){
            $patient = Patient::find($id);
            return view('patient.edit')->with(compact('patient'));
        }
        else
        {
            abort(403,"Unauthorized action");
        }
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
        $patient = $request->except(['_token']);

        User::find($request->id)->update([
            'name'  =>  $patient['f_name'].' '.$patient['l_name'],
            'email' =>  $patient['email'],
            'password'  =>  Hash::make('password'),
        ]);

        Patient::find($request->id)
            ->update($patient);

        return redirect()->route('patient.index')->with('message', 'Patient record updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();

        $user = User::find($id);
        $user->delete();

        return redirect()->route('patient.index')->with('message', 'Patient record deleted successfully.');
    }
}
