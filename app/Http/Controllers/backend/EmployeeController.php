<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //Pagination
      //$Employees = Employee::paginate(5);
      //return view('backend.employee.show', compact('Employees'))
      $Employees = Employee::all();
      //return view('backend.employee.show',compact('Employees'));
      return $Employees;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function ShowEmployee()
    {
      //Pagination
      $Employees = Employee::paginate(5);
      return view('frontend.employee.ShowEmployee', compact('Employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validated();
            $Employee = new Employee();                          
            $Employee->name = $request->name;
            $Employee->email = $request->email;
            $Employee->phone = $request->phone;
            $Employee->job = $request->job;
            $Employee->linkedin = $request->linkedin;
            $Employee->github = $request->github;
            $Employee->behance = $request->behance;
            $Employee->salary = $request->salary;
            $Employee->save();
            //return redirect()->route('employee.index');
            return redirect()->route('employee.index')
            ->with('success_message', 'Employee has been created successfully!');
        }
    
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {

            $validated = $request->validated();
            $Employee = Employee::findOrFail($request->id);
            $Employee->update([                                           
                $Employee->name = $request->name,
                $Employee->email = $request->email,
                $Employee->phone = $request->phone,
                $Employee->job = $request->job,
                $Employee->linkedin = $request->linkedin,
                $Employee->github = $request->github,
                $Employee->behance = $request->behance,
                $Employee->salary = $request->salary,
            ]);
            //return redirect()->route('employee.index');
            return redirect()->route('employee.index')
            ->with('success_message', 'Employee has been updated successfully!');
        }
        catch
        (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $Employee = Employee::findOrFail(request->id)->delete();
        //return redirect()->route('employee.index');
        return redirect()->route('employee.index')
        ->with('success_message', 'Employee has been deleted successfully!');
    }
}
