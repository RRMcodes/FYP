<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use App\Models\Doctor;
use App\Models\Item;
use App\Models\ItemLog;
use App\Models\Patient;
use App\Models\Service;
use App\Models\ServiceLog;
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
    public function itemCreate()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $items = Item::all();
        return view('billing.create')->with(compact('patients', 'doctors','items'));
    }

    public function testCreate()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        $services = Service::all();
        return view('billing.createTest')->with(compact('patients', 'doctors','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function itemStore(Request $request)
    {
        $billing = Billing::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'transaction_amount' => $request->grand_total,
            'transaction' => 'item'
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


    public function testStore(Request $request)
    {
        $billing = Billing::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'date' => $request->date,
            'transaction_amount' => $request->grand_total,
            'transaction' => 'test'
        ]);

//        create service log
        $service_collection = [];

        if (isset($request->serviceId)) {
            foreach ($request->serviceId as $key => $value) {
                $obj = [
                    'billing_id'  => $billing->id,
                    'service_id'     => $request->serviceId[$key],
                ];



                array_push($service_collection, $obj);
            }
        }
        ServiceLog::insert($service_collection);
        return redirect()->route('billing.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function itemShow($id)
    {
        $items = Item::all();
        $billing = Billing::find($id);
        $patient = Patient::find($billing->patient_id);
        $doctor = Doctor::find($billing->doctor_id);
        $itemLogs = ItemLog::where('billing_id', $id)->get();
        $services = Service::all();
        $serviceLogs = ServiceLog::where('billing_id', $id)->get();
        if ($billing->transaction == 'item') {
            return view('billing.show')->with(compact('itemLogs', 'items', 'billing', 'patient', 'doctor'));
        }
        elseif ($billing->transaction == 'test'){
            return view('billing.showTest')->with(compact('serviceLogs', 'services', 'billing', 'patient', 'doctor'));

        }
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
