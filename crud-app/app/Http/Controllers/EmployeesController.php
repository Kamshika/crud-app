<?php

namespace App\Http\Controllers;

use App\Models\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee =  DB::table('employees')
            ->select('employees.*', 'salaries.salary as salary', 'titles.title as title')
            ->leftjoin('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
            ->leftjoin('titles', 'titles.emp_no', '=', 'employees.emp_no')
            ->orderBy('employees.id', 'asc')
            ->paginate(20);

        return view('employee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = employees::all();
        return view('employeeadd', compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'emp_no' => 'emp_no',
            'birth_date' => 'required ',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'hire_date' => 'required',
        ]);

        $employee = new employees();
        $employee->emp_no = $request->input('emp_no');
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->birth_date = $request->input('birth_date');
        $employee->gender = $request->input('gender');
        $employee->hire_date = $request->input('hire_date');

        $employee->save();
        return redirect('/employee')->with('success', 'Employee successfully Added!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = DB::table('employees')
            ->select('employees.id', 'salaries.salary as salary', 'titles.title as title')
            ->leftjoin('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
            ->leftjoin('titles', 'titles.emp_no', '=', 'employees.emp_no')
            ->where('employees.id', '=', $id)
            ->get();

        return view('employeeview')
            ->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = DB::table('employees')
            ->select('employees.id', 'salaries.salary as salary', 'titles.title as title')
            ->leftjoin('salaries', 'salaries.emp_no', '=', 'employees.emp_no')
            ->leftjoin('titles', 'titles.emp_no', '=', 'employees.emp_no')
            ->where('employees.id', '=', $id)
            ->get();

        return view('employeeedit')->with('employee', $employee);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'emp_no' => 'emp_no',
            'birth_date' => 'required ',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'hire_date' => 'required',
        ]);

        $employee = employees::find($id);
        $employee->emp_no = $request->input('emp_no');
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->birth_date = $request->input('birth_date');
        $employee->gender = $request->input('gender');
        $employee->hire_date = $request->input('hire_date');

        $employee->save();
        return redirect('/employee-edit')->with('success', 'Employee successfully Edited!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\employees  $employees
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = employees::find($id);
        $employee->delete();
        return $employee;
    }
}
