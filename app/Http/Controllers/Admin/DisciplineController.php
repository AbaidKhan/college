<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Discipline;
use App\Models\DisciplineSubject;
use App\Models\Shift;
use App\Models\Subject;
use Illuminate\Http\Request;

class DisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disciplines = Discipline::get();
        return view('vendor.voyager.discipline.browse',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shifts = Shift::all();
        $departments = Department::all();
        $subjects = Subject::all();
        return view('vendor.voyager.discipline.create',get_defined_vars());
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
            $discipline = new Discipline();
            $discipline->name = $request->name;
            $discipline->short_name = $request->shortName;
            $discipline->department_id = $request->department;
            $discipline->department_name = Department::find($request->department)->name;
            $discipline->affiliated_from = $request->affiliatedFrom;
            $discipline->shift_id = $request->shift;
            $discipline->is_active = $request->status;
            $discipline->save();

            foreach ($request->subjects as $subject){
                $disSubject = new DisciplineSubject();
                $disSubject->subject_id = $subject;
                $disSubject->subject_name = Subject::find($subject)->name;
                $disSubject->discipline_id = $discipline->id;
                $disSubject->discipline_name = $discipline->name;
                $disSubject->save();
            }

            return response(['status' => 'success', 'message' => 'Data Insert Successfully']);

        } catch (\Exception $exception) {
            return response(['status' => 'error', 'message' => $exception->getMessage()]);
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
