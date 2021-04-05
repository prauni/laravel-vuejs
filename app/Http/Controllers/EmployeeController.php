<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Employee::all(['id','title','photo','description']);
        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::create($request->post());
        return response()->json([
            'message'=>'Employee Created Successfully!!',
            'category'=>$employee
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return response()->json($employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
		// Validate (size is in KB)
		/*$request->validate([
			'photo' => 'required|file|image|size:1024|dimensions:max_width=500,max_height=500',
		]);*/

		//dd($_POST);
		// Read file contents...
		//$contents = file_get_contents($request->photo->path());

		// ...or just move it somewhere else (eg: local `storage` directory or S3)
		//$newPath = $request->photo->store('photos', 's3');
		
		
		$pdata = $request->post();
		
		if(!empty($request->file('file')))
		{
			$filepath = $request->file('file')->store('public/prod');	
			if($filepath != ''){
				$filename = substr($filepath,7);
				$pdata['photo'] = $filename;	
			}
		}
		
		//echo '<pre>';print_r($pdata);exit;
        $employee->fill($pdata)->save();
        return response()->json([
            'message'=>'Employee Updated Successfully!!',
            'category'=>$employee
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            'message'=>'Employee Deleted Successfully!!'
        ]);
    }
}
