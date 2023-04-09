<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Item;
use App\Models\ItemLog;
use App\Models\Patient;
use App\Models\TicketType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $billings = Billing::all();
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('billing.index')->with(compact('billings', 'patients', 'doctors'));
    }


    public function getItem($id){
        $item = Item::findOrFail($id);
        return($item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $items = Item::all();
        return view('billing.create')->with(compact('patients', 'doctors','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $billing = Billing::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'transaction_amount' => $request->grand_total,

        ]);



//        create item log
        $item_collection = [];

        if (isset($request->itemId)) {
            foreach ($request->itemId as $key => $value) {
                $obj = [
                    'billing_id'  => $billing->id,
                    'item_id'     => $request->itemId[$key],
                    'quantity'  => $request->quantity[$key],
                    'status'    => 'deducted'
                ];

                $item = Item::find($request->itemId[$key]);
                $item->quantity = $item->quantity - $request->quantity[$key];
                $item->save();

                array_push($item_collection, $obj);
            }
        }

        ItemLog::insert($item_collection);

        return redirect()->route('billing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $items = Item::all();
        $billing = Billing::find($id);
        $patient = Patient::find($billing->patient_id);
        $doctor = Doctor::find($billing->doctor_id);
        $itemLogs = ItemLog::where('billing_id', $id)->get();
        return view('billing.show')->with(compact('itemLogs','items','billing', 'patient', 'doctor'));
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
     * @param  \Illuminate\Http\Request  $request
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
