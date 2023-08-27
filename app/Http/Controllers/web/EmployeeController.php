<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::paginate(10);
        return view('layouts.dashboard.employee.index',compact('employees'));
    }
    public function create(){
        $employees = Employee::all();
        return view('layouts.dashboard.employee.create',compact('employees'));
    }
    public function store(Request $request){
        $request->validate(
            [
                'nid'=>'required',
            ]
            );
            $image_path = null;
            if($request->hasFile('image')){
                $file = $request->file('image');
                $image_path = $file->storeAs('Employees',$file->getClientOriginalName(),'public');
            }
            $employee = Employee::create([
                'image'=>$image_path,
                'name'=>$request->name,
                'nid'=>$request->nid,
                'designation'=>$request->designation,
                'experience'=>$request->experience,
                'address'=>$request->address,
                'salary'=>$request->salary,
                'vacation'=>$request->vacation
            ]);
            session()->flash('create', 'Employee Created Successfully');
        return redirect()->route('employee.index');
    }
    public function singleView(Request $request, $id){
        $employee = Employee::findOrFail($id);
        return view('layouts.dashboard.employee.singleView',compact('employee'));
    }
    public function edit(Request $request, $id){
        $employee = Employee::findOrFail($id);
        return view('layouts.dashboard.employee.update',compact('employee'));
    }
    public function update(Request $request, $id){
        $employee = Employee::findOrFail($id);
        $employee->name = $request->input('name');
        $employee->nid = $request->input('nid');
        $employee->designation = $request->input('designation');
        $employee->experience = $request->input('experience');
        $employee->address = $request->input('address');
        $employee->salary = $request->input('salary');
        $employee->vacation = $request->input('vacation');

        if ($request->hasFile('image')) {
            if ($employee->image) {
                Storage::delete($employee->image);
            }
            $file = $request->file('image');
            $image_path = $file->storeAs('Updated Employee', $file->getClientOriginalName(), 'public');
            $employee->image = str_replace('public/', '', $image_path);
        }
        $employee->save();
        session()->flash('update', 'Employee Updated Successfully');
        return redirect()->route('employee.index');
    }
    public function destroy(Request $request, $id){
        $employee = Employee::findOrFail($id);
        $employee->delete();
        session()->flash('delete', 'Employee Deleted Successfully');
        return redirect()->route('employee.index');
    }
}
