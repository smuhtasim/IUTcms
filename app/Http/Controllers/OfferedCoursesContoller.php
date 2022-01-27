<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OfferedCourses;
use \PDF;

class OfferedCoursesContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offeredcourses = DB::select('select * from added_courses, offered_course where added_courses.id = offered_course.OfferedCourseId and offered_course.IsOffered = "Offered"');
        //return view('Phase2.OfferedCourses',['offeredcourses'=>$offeredcourses]);

        $courses = DB::select('select * from added_courses, offered_course where added_courses.id = offered_course.OfferedCourseId and offered_course.IsOffered = "No"');
        //return view('Phase2.OfferedCourses',['courses'=>$courses]);

        return view('Phase2.OfferedCourses')->with(array('offeredcourses'=>$offeredcourses,'courses'=>$courses));
    }

    public function downloadPDF()
    {
        $courses = DB::select('select * from added_courses, offered_course where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId');

        $pdf = PDF::loadView('Phase2.OfferedCoursesPDF',['courses'=>$courses]);

        return $pdf->download('OfferedCourse.pdf');
    }

    public function downloadcourseloadPDF()
    {
        $courses2 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 2');

        $courses4 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 4');

        $courses6 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 6');

        $courses8 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 8');

        $vars = array('courses2'=>$courses2,'courses4'=>$courses4,'courses6'=>$courses6,'courses8'=>$courses8);

        $pdf = PDF::loadView('Phase2.SummaryCourseLoadPDF',['var'=>$vars]);

        return $pdf->download('Course Load.pdf');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = DB::select('select * from added_courses, offered_course where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId');
        return view('Phase2.OfferedCourseList',['courses'=>$courses]);
    }
    public function summaryOfCourseLoad()
    {
        $courses2 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 2');

        $courses4 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 4');

        $courses6 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 6');

        $courses8 = DB::select('select * from added_courses, offered_course
        where offered_course.IsOffered = "Offered" and added_courses.id = offered_course.OfferedCourseId and sem = 8');

        return view('Phase2.SummaryCourseLoad')->with(array('courses2'=>$courses2,'courses4'=>$courses4,'courses6'=>$courses6,'courses8'=>$courses8));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = DB::select('SELECT *
                                FROM added_courses, offered_course
                                WHERE added_courses.id = offered_course.OfferedCourseId
                                AND added_courses.id = ?',[$id]);

        return view('Phase2.OfferingCourse',['courses'=>$courses]);
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
        $IsOffered = $request->input('IsOffered');
        $No_of_Sec = $request->input('No_of_Sec');
        $No_of_Teachers = $request->input('No_of_Teachers');
        $Load = $request->input('Loads');

        DB::update('UPDATE offered_course
        SET IsOffered = ?, No_of_Sec=?, No_of_Teachers=?, Loads=?
        WHERE id = ?',[$IsOffered, $No_of_Sec, $No_of_Teachers, $Load, $id]);
        return  redirect('/offeredcourses') -> with('success', 'Course Updated Successfully');
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
