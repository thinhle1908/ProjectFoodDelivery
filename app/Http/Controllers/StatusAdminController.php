<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusAdminController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statusAdmin')->with('statuses', $statuses);
    }
    public function getCreateStatus()
    {
        return view('createStatus');
    }
    public function postCreateStatus(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required',
        ]);
        try {
            Status::create([
                'name' => $request->status
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect(route('status.admin'))->withSuccess('Create Successfuly');
    }
    public function getEditStatus($id)
    {
        $status = Status::find($id);
        if(!$status){
            return redirect()->back()->withErrors(['msg'=>'The status does not exist']);
        }
        return view('editStatus')->with('status',$status);
    }
    public function postEditStatus(Request $request,$id)
    {
       
        $validated = $request->validate([
            'status' => 'required',
        ]);
        $status = Status::find($id);

        if(!$status){
            return redirect()->back()->withErrors(['msg'=>'The status does not exist']);
        }

        try {
            $status->update([
                'name' => $request->status
            ]);
        } catch (\Exception $ex) {
            return $ex;
        }
        return redirect(route('status.admin'))->withSuccess('Edit Successfuly');

    }
    public function deleteStatus($id)
    {
        $status = Status::find($id);
        if(!$status){
            return redirect()->back()->withErrors(['msg'=>'The status does not exist']);
        }
        try {
            $status->delete();
        } catch (\Exception $ex) {
           return $ex;
        }
        return redirect(route('status.admin'))->withSuccess('Delete Successfuly');

    }
}
