<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\If_;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
//        $appointments = Appointment::join('patient','patient.id','=','appointments.patient_id')
//            ->join('doctors','doctors.id','=','appointments.doctor_id')->get();
//        dd($appointments);

        $user = Auth::user(); // Get the ID of the currently logged-in user


        if ($user->role == 'staff'){
            $appointments = Appointment::orderBy('created_at','desc')->get();
        }
        elseif ($user->role == 'doctor'){
            $appointments = Appointment::where('doctor_id',$user->id)
                ->orderBy('created_at','desc')->get();

        }
        elseif ($user->role == 'patient'){
            $appointments = Appointment::where('patient_id',$user->id)
                ->orderBy('created_at','desc')->get();
        }

        $patients = Patient::all();
        $doctors = Doctor::all();
//        dd($appointments, $patients, $doctors);
        return view('appointment.index')->with(compact('appointments', 'patients', 'doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $patients = Patient::all();
        if (Auth::user()->role == 'patient'){
            $patients = Patient::findOrFail(Auth::user()->id) ;
        }
        $doctors = Doctor::all();
        return view('appointment.create')->with(compact('patients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function store(Request $request)
    {
        $patient = Patient::findOrFail($request->patient_id);
        $doctor = Doctor::findOrFail($request->doctor_id);

        $appointment_date = $request->date;
        $specialist = $request->specialist;
        $patientName = $patient->f_name;
        $doctorName = $doctor->getFullName();

        $date = new DateTime($appointment_date);
        $dayOfWeek = $date->format('l');

        $schedule = json_decode($doctor->schedule);

        foreach ($schedule as $key=>$value){
            if ($key == strtolower($dayOfWeek)){
                $from = Carbon::parse($value->from)->format('h:i A');
                $to = Carbon::parse($value->to)->format('h:i A');
            }
        }

//        dd($specialist,$doctorName,$dayOfWeek,$appointment_date, $from, $to);

        Mail::to($patient->email)->send(new AppointmentMail($patientName,$specialist,$doctorName,$dayOfWeek,$appointment_date, $from, $to));
        Appointment::create([
            'patient_id'    =>  $request->patient_id,
            'doctor_id'    =>  $request->doctor_id,
            'specialist'    =>  $request->specialist,
            'appointment_date'    =>  $request->date,
        ]);
        return redirect()->route('appointment.index')->with('message','The appointment has been booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
