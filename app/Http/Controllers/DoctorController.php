<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Mail\AppointmentRescheduleMail;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Stmt\If_;

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
        $days = $request->days;
        $from = $request->from;
        $to = $request->to;

        $schedule = [];

        foreach ($days as $day){
            if ($day == "sunday"){
                $schedule['sunday']['from'] = $from[0];
                $schedule['sunday']['to'] = $to[0];
            }elseif ($day == "monday"){
                $schedule['monday']['from'] = $from[1];
                $schedule['monday']['to'] = $to[1];
            }elseif ($day == "tuesday"){
                $schedule['tuesday']['from'] = $from[2];
                $schedule['tuesday']['to'] = $to[2];
            }elseif ($day == "wednesday"){
                $schedule['wednesday']['from'] = $from[3];
                $schedule['wednesday']['to'] = $to[3];
            }elseif ($day == "thursday"){
                $schedule['thursday']['from'] = $from[4];
                $schedule['thursday']['to'] = $to[4];
            }elseif ($day == "friday"){
                $schedule['friday']['from'] = $from[5];
                $schedule['friday']['to'] = $to[5];
            }elseif ($day == "saturday"){
                $schedule['saturday']['from'] = $from[6];
                $schedule['saturday']['to'] = $to[6];
            }
        }

        $request['schedule'] = json_encode($schedule);
        $doctor = $request->except(['_token', 'days', 'from', 'to']);

        $user = User::create([
            'name'  =>  $doctor['f_name'].' '.$doctor['l_name'],
            'email' =>  $doctor['email'],
            'password'  =>  Hash::make('password'),
            'role'  => 'doctor'
        ]);

        $doctor['id'] = $user->id;
        Doctor::create($doctor);
        return redirect()->route('doctor.index')->with('message', 'Record created successfully.');
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
    { if (Auth::User()->id == $id){
        $doctor = Doctor::find($id);
        return view('doctor.edit')->with(compact('doctor'));
    }
    else
    {
        abort(403,"Unauthorized action");
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $record = Doctor::findOrFail($request->id);
        $old_schedule = (json_decode($record->schedule,true));
        $currentDate = Carbon::today()->toDateString();
        $appointments = Appointment::join('patient', 'appointments.patient_id', '=', 'patient.id')
            ->where('doctor_id',$request->id)
            ->whereDate('appointment_date', '>=', $currentDate)->get()->toArray();

        $doctor = $request->except(['_token']);

        if (isset($request->days)) {
            $days = $request->days;
            $from = $request->from;
            $to = $request->to;

            foreach ($days as $index => $day) {
//dd($old_schedule[$day]['from'],$from[$index],$old_schedule[$day]['to'],$to[$index]);
                if (array_keys($old_schedule)[$index] == $day) {
                    if ($old_schedule[$day]['from'] != $from[$index] || $old_schedule[$day]['to'] != $to[$index]) {
                        $changed[$index] = $day;
                    }
                }
            }

            foreach ($changed as $index => $day) {
                $filtered_appointments = Arr::where($appointments, function ($key, $value) use ($day) {
                    $date = new DateTime($key['appointment_date']);
                    $dayOfWeek = $date->format('l');
                    if (strtolower($dayOfWeek) == $day) {
                        return $key;
                    }
                });

                if (count($filtered_appointments) > 0) {
                    foreach ($filtered_appointments as $filtered_appointment) {

                        $data = [
                            'patientName' => $filtered_appointment['f_name'],
                            'specialist' => $record->specialization,
                            'doctorName' => $record->getFullName(),
                            'day' => $days[$index],
                            'date' => $filtered_appointment['appointment_date'],
                            'from' => Carbon::parse($from[$index])->format('h:i A'),
                            'to' => Carbon::parse($to[$index])->format('h:i A')
                        ];
                        Mail::to($filtered_appointment['email'])->send(new AppointmentRescheduleMail($data));
                    }
                }
            }

            $schedule = [];
            foreach ($days as $index => $day) {
                if ($day == "sunday") {
                    $schedule['sunday']['from'] = $from[0];
                    $schedule['sunday']['to'] = $to[0];
                } elseif ($day == "monday") {
                    $schedule['monday']['from'] = $from[1];
                    $schedule['monday']['to'] = $to[1];
                } elseif ($day == "tuesday") {
                    $schedule['tuesday']['from'] = $from[2];
                    $schedule['tuesday']['to'] = $to[2];
                } elseif ($day == "wednesday") {
                    $schedule['wednesday']['from'] = $from[3];
                    $schedule['wednesday']['to'] = $to[3];
                } elseif ($day == "thursday") {
                    $schedule['thursday']['from'] = $from[4];
                    $schedule['thursday']['to'] = $to[4];
                } elseif ($day == "friday") {
                    $schedule['friday']['from'] = $from[5];
                    $schedule['friday']['to'] = $to[5];
                } elseif ($day == "saturday") {
                    $schedule['saturday']['from'] = $from[6];
                    $schedule['saturday']['to'] = $to[6];
                }
            }
            $doctor['schedule'] = json_encode($schedule);
        }
        if (isset($request->f_name)) {
            User::find($request->id)->update([
                'name' => $doctor['f_name'] . ' ' . $doctor['l_name'],
                'email' => $doctor['email'],
                'password' => Hash::make('password'),
            ]);
        }


        Doctor::find($request->id)
            ->update($doctor);
        return redirect()->route('doctor.index')->with('message', 'Record updated successfully.');

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

        $user = User::find($id);
        $user->delete();

        return redirect()->route('doctor.index')->with('message', 'Record deleted successfully.');
    }
}
