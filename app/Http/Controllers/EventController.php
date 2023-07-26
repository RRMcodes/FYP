<?php

namespace App\Http\Controllers;


use App\Mail\AppointmentMail;
use App\Mail\EventMail;
use App\Models\Event;
use App\Models\EventLog;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $events = Event::all();
        return view('event.index')->with(compact('events'));
    }

    public function eventLog()
    {
        $eventLogs = EventLog::all();
        $event = Event::all();
        return view('event.log')->with(compact('eventLogs','event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $event = $request->except(['_token']);
        $event['start_time'] = Carbon::parse($event['start_time'])->format('h:i A');
        $event['end_time'] = Carbon::parse($event['end_time'])->format('h:i A');
        Event::create($event);
        return redirect()->route('event.index')->with('message', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('event.show')->with(compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $event = Event::find($id);
//        $time_in_12_hour_format  = date("g:i a", strtotime("13:30"));
        $event->start_time = date("H:i", strtotime($event->start_time));
        $event->end_time = date("H:i", strtotime($event->end_time));
        return view('event.edit')->with(compact('event'));
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
        $new_event = $request->except(['_token']);
        $new_event['start_time'] = Carbon::parse($new_event['start_time'])->format('h:i A');
        $new_event['end_time'] = Carbon::parse($new_event['end_time'])->format('h:i A');

        Event::find($request->id)->update($new_event);
        return redirect()->route('event.index')->with('message', 'Event updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('event.index')->with('message', 'Event deleted successfully.');
    }

    public function sendMail($id){
        $patients = Patient::all()->toArray();
        $event = Event::findOrFail($id);

        $emails = Arr::pluck($patients, 'email');
        Mail::to($emails)->send(new EventMail($event));

        EventLog::create([
            'event_id'  =>  $event->id,
            'event_name'  =>  $event->name,
            'date'  =>  date('Y-m-d H:i:s'),
            'start_date'  =>  $event->start_date,
            'end_date'  =>  $event->end_date,

        ]);
        return redirect()->route('event.index')->with('message','Mail send successfully');
    }

}
