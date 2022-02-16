<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Teacher;
use Illuminate\Http\Request;
use PHPUnit\Util\Exception;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::get();
        return view('vendor.voyager.teacher.browse',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        return view('vendor.voyager.teacher.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $teacher = new Teacher();
            $teacher->reg_id = $request->regId;
            $teacher->cnic = $request->cnic;
            $teacher->name = $request->name;
            $teacher->father_name = $request->fatherName;
            $teacher->father_name = $request->fatherName;
            $teacher->join_date = $request->joinDate;
            $teacher->date_in_service = $request->dateInService;
            $teacher->dob = $request->dob;
            $teacher->marital_status = $request->maritalStatus;
            $teacher->gender = $request->gender;
            $teacher->mobile_no = $request->mobileNo;
            $teacher->phone_no = $request->phoneNo;
            $teacher->email = $request->email;
            $teacher->last_qualification = $request->lastQualification;
            $teacher->address = $request->address;
            $teacher->department_id = $request->department;
            $teacher->designation_id = $request->designation;

            if ($request->hasFile('img')){
                $filename = time().'.'.$request->img->getClientOriginalExtension();
                $request->img->move(public_path('images/teacher'), $filename);
                $teacher->img = $filename;
            }


            $teacher->save();
            return response(['status'=>'success','message'=>'Data Insert Successfully']);

        }catch (\Exception $exception){
            return response(['status'=>'error','message'=>$exception->getMessage()]);
        }

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
