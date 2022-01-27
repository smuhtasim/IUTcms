<?php

namespace App\Http\Controllers;

use App\Models\AddedCourses;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use \PDF;

class AddCoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = AddedCourses::all();
        return view('Phase1.CourseList', compact('courses'));
    }



    public function downloadPdf()
    {
        $courses = AddedCourses::all();
        $pdf = PDF::loadView('Phase1.CoursePDF',compact('courses'));
        return $pdf->stream('CourseList.pdf');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = DB::select('select * from added_courses');
        return view('Phase1.AddCourses',['courses'=>$courses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'CourseCode' => ['required', 'string', 'max:255'],
            'CourseTitle' => ['required', 'string', 'email', 'max:255', 'unique:added_courses'],
            'Dept' => ['required'],
            'Sem' => ['required'],
            'CourseType' => ['required'],
            'Comp_Mand' => ['required'],
            'Credit' => ['required'],
            'ContactHour' => ['required'],
            'E_ContactHour' => ['required'],
        ]);
    }*/

    public function store(Request $request)
    {
        /*$CourseCode = $request->input('CourseCode');
        $CourseTitle = $request->input('CourseTitle');
        $Dept = $request->input('Dept');
        $Sem = $request->input('Sem');
        $CourseType = $request->input('CourseType');
        $Comp_Mand = $request->input('Comp_Mand');
        $Credit = $request->input('Credit');
        $ContactHour = $request->input('ContactHour');
        $E_ContactHour = $request->input('E_ContactHour');*/

        $validatedData = $request->validate([
            'CourseCode' => 'required|max:255',
            'CourseTitle' => 'required|max:255',
            'Dept' => 'required|max:255',
            'Sem' => 'required|max:255',
            'CourseType' => 'required|max:255',
            'Comp_Mand' => 'required|max:255',
            'Credit' => 'required|max:255',
            'ContactHour' => 'required|max:255',
            'E_ContactHour' => 'required|max:255',
        ]);
        AddedCourses::create($validatedData);

        //DB::insert('insert into added_courses (CourseCode, CourseTitle, Dept, Sem, CourseType, Comp_Mand, Credit, ContactHour, E_ContactHour) values(?, ?, ?, ?, ?, ?, ?, ?, ?)',[$CourseCode, $CourseTitle, $Dept, $Sem, $CourseType, $Comp_Mand, $Credit, $ContactHour, $E_ContactHour]);

        return  redirect('/addcourse') -> with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = DB::select('SELECT * FROM added_courses WHERE id = ?',[$id]);
        return view('Phase1.UpdateCourse',['courses'=>$courses]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $CourseCode = $request->input('CourseCode');
        $CourseTitle = $request->input('CourseTitle');
        $Dept = $request->input('Dept');
        $Sem = $request->input('Sem');
        $CourseType = $request->input('CourseType');
        $Comp_Mand = $request->input('Comp_Mand');
        $Credit = $request->input('Credit');
        $ContactHour = $request->input('ContactHour');
        $E_ContactHour = $request->input('E_ContactHour');

        DB::update('UPDATE added_courses
            SET CourseCode = ?, CourseTitle=?, Dept=?, Sem=?, CourseType=?, Comp_Mand=?, Credit=?, ContactHour=?, E_ContactHour=?
            WHERE id = ?',[$CourseCode, $CourseTitle, $Dept, $Sem, $CourseType, $Comp_Mand, $Credit, $ContactHour, $E_ContactHour, $id]);
        return redirect('/addcourse')->with('message' ,'Record updated successfully.');
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
