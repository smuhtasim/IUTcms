@extends('Layouts.ReportsLayout')

@section('content')
    <div class="col-md-11" align="right">
        <a href="{{url('/offeredpdf')}}" class="btn btn-danger">Get PDF report</a>
    </div>

<table class="table table-hover">
  <thead class="p1">
    <tr><th></th> <th></th>
    <th scope="col">Course Code</th>
      <th scope="col">Course Title</th>
      <th scope="col">Semester</th>
      <th scope="col">Offer Course?</th>
      <th scope="col">Credit</th>
      <th scope="col">Number of Sections</th>
      <th scope="col">Number of Teachers</th>
      <th scope="col">Loads</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($courses as $course)
<tr><td></td> <td></td>
  <td>{{ $course->CourseCode }}</td>
  <td>{{ $course->CourseTitle }}</td>
  <td>{{ $course->Sem }}</td>
  <td>{{ $course->IsOffered }}</td>
  <td>{{ $course->Credit }}</td>
  <td>{{ $course->No_of_Sec }}</td>
  <td>{{ $course->No_of_Teachers }}</td>
  <td>{{ $course->Loads }}</td>
</tr>
 @endforeach

 </tbody>
</table>

@endsection
