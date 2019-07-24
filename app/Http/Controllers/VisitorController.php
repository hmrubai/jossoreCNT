<?php

namespace App\Http\Controllers;

use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {}

    public function addVisitor(){
        return view('addVisitor');
    }

    public function create()
    {}

    public function store(Request $request)
    {
        $this->validate($request, [
            'visitor_name'  => 'required',
            'visitor_phone' => 'required',
        ]);

        $addVisitor = new Visitor();
        $addVisitor->name               = $request->visitor_name;
        $addVisitor->email              = $request->visitor_email;
        $addVisitor->phone              = $request->visitor_phone;
        $addVisitor->profession         = $request->visitor_profession;
        $addVisitor->designation        = $request->visitor_designation;
        $addVisitor->address            = $request->visitor_address;
        $addVisitor->driver_name        = $request->visitor_driver_name;
        $addVisitor->driver_phone_no    = $request->visitor_driver_no;
        $addVisitor->vehicle_no         = $request->visitor_vehicle_no;
        $addVisitor->visit_from         = $request->visitor_visit_from;
        $addVisitor->visit_to           = $request->visitor_visit_to;
        $addVisitor->purpose            = $request->visitor_visit_purpose;
        $addVisitor->log_date           = date("Y-m-d", strtotime($request->visitor_visit_date));
        $addVisitor->log_in_time        = $request->visitor_visit_in;
        $addVisitor->log_out_time       = $request->visitor_visit_out;
        
        if($request->picture){
            $profile  =  'profile_'.time().'.'.$request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('files/visitor/profile'), $profile);
        }else{ $profile  = ""; }

        $addVisitor->picture = $profile;

        if($request->fingure_print){
            $fingureprint  =  'fingureprint_'.time().'.'.$request->fingure_print->getClientOriginalExtension();
            $request->fingure_print->move(public_path('files/visitor/fingureprint'), $fingureprint);
        }else{ $fingureprint  = ""; }

        $addVisitor->fingure_print = $fingureprint;
        $addVisitor->save();

        return redirect()->action('VisitorController@addVisitor')->with('success', "The Visitor has been added successfully!");
    }

    public function show(Visitor $visitor)
    {
        $visitors = Visitor::orderBy('id', 'desc')->get();
        return view('visitorList', compact('visitors'));
    }

    public function updateLog(Request $request)
    {
        $log_update = Visitor::find($request->log_id);
        $log_update->log_out_time = $request->time;
        $log_update->save();

        echo $request->log_id;
    }

    public function edit(Visitor $visitor)
    {}

    public function update(Request $request, Visitor $visitor)
    {}

    public function destroy(Visitor $visitor)
    {}
}
