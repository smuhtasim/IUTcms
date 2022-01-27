@extends('Layouts.ReportsLayout')

@section('content')
@php ($i = 0)
@php ($result = 0)

@foreach ($sumOfLoads as $sumOfLoad)
{{$result = $result + $sumOfLoad->Loads}}
@endforeach
<table class="table table-hover">
  <thead class="p1">
    <tr>
      <th scope="col">Designation</th>
      <th scope="col">Offered Load</th>
      <th scope="col">Number of Available Teachers</th>
      <th scope="col">Total Load</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($teachers as $teacher)
<tr>
  <td>{{ $teacher->Designation }}</td>
  <td>{{ $teacher->Loads }}</td>

  @if($teacher->Designation === 'Professor')
  <td>{{ $Professor }}</td>
  <td>{{ $teacher->Loads*$Professor }}</td>
  {{$i = $i + $teacher->Loads*$Professor}}

  @elseif($teacher->Designation === 'Associate Professor')
  <td>{{ $AscProfessor }}</td>
  <td>{{  $teacher->Loads*$AscProfessor }}</td>
  {{$i = $i + $teacher->Loads*$AscProfessor}}

  @elseif($teacher->Designation === 'Assistant Professor')
  <td>{{ $AstProfessor }}</td>
  <td>{{  $teacher->Loads*$AstProfessor }}</td>
  {{$i = $i + $teacher->Loads*$AstProfessor}}

  @elseif($teacher->Designation === 'Lecturer')
  <td>{{ $Lecturer }}</td>
  <td>{{  $teacher->Loads*$Lecturer }}</td>
  {{$i = $i + $teacher->Loads*$Lecturer}}

@endif
</tr>
 @endforeach
 <tr>
    <td>Total Capacity</td>
    <td></td>
    <td></td>
    <td>{{$i}}</td>
 </tr>
 <tr>
    <td>Total Load for Internal Teachers</td>
    <td></td>
    <td></td>
    <td>{{ $result }}</td>
 </tr>
 <tr>
    <td>Deficit</td>
    <td></td>
    <td></td>
    <td>{{ $result - $i }}</td>
 </tr>
 </tbody>
 <thead class="p1">
    <tr>
      <th scope="col">Required Faculties</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <thead class="p1">
    <tr>
      <th scope="col">Designation</th>
      <th scope="col">Offered Load</th>
      <th scope="col">Number of Required Teachers</th>
      <th scope="col">Total Load</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <tr>
    <td>Lecturer</td>
    <td>{{ $teachers[3]->Loads }}</td>
    @if ( $result - $i < 0 ) then
        <td>0</td>
        <td>0</td>
    @else
        <td>{{ ceil(($result - $i)/$teachers[3]->Loads) }}</td>
        <td>{{ $teachers[3]->Loads*ceil(($result - $i)/$teachers[3]->Loads) }}</td>
    @endif
 </tr>
 <tr>
    <td>Total Capacity</td>
    <td></td>
    <td></td>
    @if ( $result - $i < 0 ) then
        <td>0</td>
    @else
        <td>{{ $teachers[3]->Loads*ceil(($result - $i)/$teachers[3]->Loads) }}</td>
    @endif
 </tr>
 <tr>
    <td>Deficit After Recruitment</td>
    <td></td>
    <td></td>
    @if ( $result - $i < 0 ) then
        <td>0</td>
    @else
        <td>{{ ($result - $i) - ($teachers[3]->Loads*ceil(($result - $i)/$teachers[3]->Loads)) }}</td>
    @endif
 </tr>
  </tbody>
</table>

@endsection
