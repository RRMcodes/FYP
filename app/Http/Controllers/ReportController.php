<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Report;
use App\Models\ReportLog;
use App\Models\Patient;
use App\Models\Service;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $reports = Report::join('patient', 'report.patient_id', '=', 'patient.id')
            ->join('services', 'report.test', '=', 'services.id')
            ->select('report.*', 'patient.f_name as f_name', 'patient.l_name as l_name', 'services.name as test_name', 'services.abbreviation as abbreviation')
            ->get();
        return view('report.index')->with(compact('reports'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $patients = Patient::all();
        $services = Service::all();
        return view('report.create')->with(compact('patients', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $patient = Patient::findOrFail($request->patient_id);
        $test = Service::findOrFail($request->test);
        $report = $request->except(['_token']);
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $fileName = time().'-'.$patient->getFullName().' '.$test->abbreviation.'.' . $file->extension();
            $file->move(public_path('reports'), $fileName);
        }
        $report['file'] = $fileName;
        $report['status'] = 'unsent';
        Report::create($report);
        return redirect()->route('report.index')->with('message', 'Report uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $report = Report::find($id);
        return view('report.show')->with(compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        $report->delete();

        return redirect()->route('report.index')->with('message', 'Report deleted successfully.');
    }

    public function sendMail($id){
        $report = Report::findOrFail($id);
        $patient = Patient::findOrFail($report->patient_id);
        $test = Service::findOrFail($report->test);

        Mail::to($patient->email)->send(new ReportMail($report,$patient,$test));

        $report->status = 'sent';
        $report->save();
        return redirect()->route('report.index')->with('message', 'Email sent successfully');
    }

}
