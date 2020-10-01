<?php

namespace App\Http\Controllers\Employees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use PDF;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employees.staff.index')->with('employee', Employee::paginate(10)); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'position'=>'required',
            'phoneNo'=>'required',
            'address'=>'required',
            'workStart'=>'required'
        ]);

        $employee = new Employee([
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'gender' => $request->get('gender'),
            'dob' => $request->get('dob'),
            'email' => $request->get('email'),
            'position' => $request->get('position'),
            'phoneNo' => $request->get('phoneNo'),
            'address' => $request->get('address'),
            'workStart' => $request->get('workStart') 
        ]);
        $employee->save();
        return redirect()->route('employees.staff.index')->with('success','Employee has been stored.'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.staff.edit', compact('employee'));  
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
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'position'=>'required',
            'phoneNo'=>'required',
            'address'=>'required',
            'workStart'=>'required'
        ]);

        $employee = Employee::find($id);
        $employee->firstName =  $request->get('firstName');
        $employee->lastName = $request->get('lastName');
        $employee->gender = $request->get('gender');
        $employee->dob = $request->get('dob');
        $employee->email = $request->get('email');
        $employee->position = $request->get('position');
        $employee->phoneNo = $request->get('phoneNo');
        $employee->address = $request->get('address');
        $employee->workStart = $request->get('workStart');
        $employee->save();

        return redirect()->route('employees.staff.index')->with('success','Employee has been updated.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('employees.staff.index')->with('success','Employee has been deleted.'); 
    }

    function get_emp_data()
    {
        $emp_data = DB::table('employees')->limit(10)->get();

        return $emp_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper'); 
        $pdf->loadHTML($this->convert_emp_data_to_html());
        return $pdf->stream();
    }

    function convert_emp_data_to_html()
    {
        $emp_data = $this->get_emp_data(); 
        $output ='
            <h3 align="center">Employee Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            
            <tr>
                
                <th style="border: 1px solid; padding:12px;" >Name</th>
                <th style="border: 1px solid; padding:12px;" >Date of Birth</th>
                <th style="border: 1px solid; padding:12px;" >Gender</th>
                <th style="border: 1px solid; padding:12px;" >Email</th>
                <th style="border: 1px solid; padding:12px;" >Phone No.</th>
                <th style="border: 1px solid; padding:12px;" >Address</th>
                <th style="border: 1px solid; padding:12px;" >Position</th>
                <th style="border: 1px solid; padding:12px;" >Joined</th>
                
            </tr>
            
            ';  
            
            foreach($emp_data as $emp_data)
            {
            $output .= '   
            <tr>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->firstName.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->dob.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->gender.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->email.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->phoneNo.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->address.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->position.'</td>
                <td style="border: 1px solid; padding:12px;">'.$emp_data->workStart.'</td>
              
            </tr>
            ';
            }
    $output .= '</table>';
    return $output;
    }
}
