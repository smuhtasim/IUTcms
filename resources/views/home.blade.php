@extends('layouts.app')

@section('content')
<div class="sidebar bar-block border-right" style="display:none" id="mySidebar1">
  <div class = "phase1-header"> 
    <button onclick="button3_close()" class="bar-item large phase1">Close</button>
    <h2 class="heading bar-item"> Reports </h2>
  </div>
  <br>
    <a href="CourseList" class="bar-item reports_button">Course List</a>
    <a href="TeacherList" class="bar-item reports_button">Teacher's List</a>
</div>

<div class="sidebar bar-block border-right" style="display:none" id="mySidebar2">
  <div class = "phase2-header"> 
    <button onclick="button5_close()" class="bar-item large phase2">Close</button>
    <h2 class="heading bar-item"> Reports </h2>
  </div>
  <br>
    <a href="OfferedCourseList" class="bar-item reports_button">Offered Courses</a>
    <a href="SummaryCourseLoad" class="bar-item reports_button">Summary of Course Loads</a>
    <a href="facultyRequirement" class="bar-item reports_button">Faculty Requirements Calculation</a>
</div>

<div class="sidebar bar-block border-right" style="display:none" id="mySidebar3">
  <div class = "phase3-header"> 
    <button onclick="button7_close()" class="bar-item large phase3">Close</button>
    <h2 class="heading bar-item"> Reports </h2>
  </div>
  <br>
    <a href="#" class="bar-item reports_button">Semester-Wise Course Load</a>
    <a href="#" class="bar-item reports_button">Teacher-Wise Course Load</a>
</div>

<div class= "main-part">
  <div class="p1-row">
    <span class="column Phase1">
      <div><button class="buttons1 button1" onclick="window.location.href='/addcourse';">Add Course</button></div>
      <div><button class="buttons1 button2" onclick="window.location.href='/addteacher';">Add Teacher</button></div>
      <div><button class="buttons1 button3" onclick = "button3_open()">Report for Lists</button></div>
    </span>

    <span class="column Phase2">
      <div><button class="buttons2 button4" onclick="window.location.href='/offeredcourses';">Offer Course</button></div>
      <div><button class="buttons2 button5" onclick = "button5_open()">Load Calculations</button></div>
    </span>

    <span class="column Phase3">
      <div><button class="buttons3 button6">Assign Teacher</button></div>
      <div><button class="buttons3 button7" onclick = "button7_open()">Course Load</button></div>
    </span>
  </div>
</div>
@endsection
