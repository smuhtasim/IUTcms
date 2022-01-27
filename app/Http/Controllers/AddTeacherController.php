<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\AddTeachers;
use \PDF;

class AddTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = DB::select('select * from add_teachers');
        return view('Phase1.AddTeacher',['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = DB::select('select * from add_teachers');
        return view('Phase1.TeacherList',['teachers'=>$teachers]);
    }

    public function downloadPdf()
    {
        $teachers = DB::select('select * from add_teachers');

        $pdf = PDF::loadView('Phase1.TeacherListPDF',['teachers'=>$teachers]);

        return $pdf->download('Teacher List.pdf');
    }

    public function showCalculations()
    {
        $teachers = DB::select('select * from designation_loads order by Loads ASC');
        $Professor = AddTeachers::where([
            ['Designations', '=', 'Professor'], ['IsActive', '=', 'Yes'] ])->count();
        $AscProfessor = AddTeachers::where([
            ['Designations', '=', 'Associate Professor'], ['IsActive', '=', 'Yes'] ])->count();
        $AstProfessor = AddTeachers::where([
            ['Designations', '=', 'Assistant Professor'], ['IsActive', '=', 'Yes'] ])->count();
        $Lecturer = AddTeachers::where([
            ['Designations', '=', 'Lecturer'], ['IsActive', '=', 'Yes'] ])->count();

        $sumOfLoads = DB::select('select Loads from offered_course');
        //$sumOfLoads = DB::table('offered_course')
               // ->select(DB::raw('SUM(Loads) as Loads'))
                //->get();

        return view('Phase2.FacultyRequirement')->with(array('teachers'=>$teachers,'Professor'=>$Professor,'AscProfessor'=>$AscProfessor,'AstProfessor'=>$AstProfessor,'Lecturer'=>$Lecturer,'sumOfLoads'=>$sumOfLoads));
    }

    public function downloadfacultyPDF()
    {
        $teachers = DB::select('select * from designation_loads order by Loads ASC');
        $Professor = AddTeachers::where([
            ['Designations', '=', 'Professor'], ['IsActive', '=', 'Yes'] ])->count();
        $AscProfessor = AddTeachers::where([
            ['Designations', '=', 'Associate Professor'], ['IsActive', '=', 'Yes'] ])->count();
        $AstProfessor = AddTeachers::where([
            ['Designations', '=', 'Assistant Professor'], ['IsActive', '=', 'Yes'] ])->count();
        $Lecturer = AddTeachers::where([
            ['Designations', '=', 'Lecturer'], ['IsActive', '=', 'Yes'] ])->count();

        $sumOfLoads = DB::select('select Loads from offered_course');

        $pdf = PDF::loadView('Phase2.FacultyRequirement')->with(array('teachers'=>$teachers,'Professor'=>$Professor,'AscProfessor'=>$AscProfessor,'AstProfessor'=>$AstProfessor,'Lecturer'=>$Lecturer,'sumOfLoads'=>$sumOfLoads));

        return $pdf->download('Faculty Requirement.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Name = $request->input('Name');
        $Initials = $request->input('Initials');
        $Designations = $request->input('Designations');
        $IsActive = $request->input('IsActive');

        DB::insert('insert into add_teachers(Name, Initials, Designations, IsActive) values(?, ?, ?, ?)',[$Name, $Initials, $Designations, $IsActive]);

        return  redirect('/addteacher') -> with('success', 'Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teachers = DB::select('SELECT * FROM add_teachers WHERE id = ?',[$id]);
        return view('Phase1.UpdateTeacher',['teachers'=>$teachers]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $Name = $request->input('Name');
        $Initials = $request->input('Initials');
        $Designations = $request->input('Designations');
        $IsActive = $request->input('IsActive');

        DB::update('UPDATE add_teachers
            SET Name=?, Initials=?, Designations=?, IsActive=?
            WHERE Initials = ?',[$Name, $Initials, $Designations, $IsActive, $id]);
        return redirect('/addteacher')->with('message' ,'Record updated successfully.');
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
