<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><b>Course List</b></title>
</head>
<style>
    th,
    td{
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td{
        padding: 15px;
        text-align: center;
    }

    table{
        width:100%;
    }
</style>
<body>
<h1 style="text-align: center">Offered Course List</h1>
@php ($fulltime2 = 0)
@php ($ptime2 = 0)
@php ($otherDept2 = 0)
@php ($theory2 = 0)
@php ($lab2 = 0)

@php ($fulltime4 = 0)
@php ($ptime4 = 0)
@php ($otherDept4 = 0)
@php ($theory4 = 0)
@php ($lab4 = 0)

@php ($fulltime6 = 0)
@php ($ptime6 = 0)
@php ($otherDept6 = 0)
@php ($theory6 = 0)
@php ($lab6 = 0)

@php ($fulltime8 = 0)
@php ($ptime8 = 0)
@php ($otherDept8 = 0)
@php ($theory8 = 0)
@php ($lab8 = 0)

@foreach($vars as $var)

@foreach ($var[courses2] as $course2)
    @if($course2->Dept === 'CSE') then {{$fulltime2 = $fulltime2 + $course2->Loads}}
    @elseif($course2->Dept === 'CSE(Part-time)') then {{$ptime2 = $ptime2 + $course2->Loads }}
    @else {{$otherDept2 = $otherDept2 + $course2->Loads}}
    @endif

    @if ($course2->CourseType === 'Theory') then {{$theory2 = $theory2 + $course2->Loads}}
    @elseif ($course2->CourseType === 'Lab') then {{$lab2 = $lab2 + $course2->Loads}}
    @endif
@endforeach

@foreach ($var[courses4] as $course4)
    @if($course4->Dept === 'CSE') then {{$fulltime4 = $fulltime4 + $course4->Loads}}
    @elseif($course4->Dept === 'CSE(Part-time)') then {{$ptime4 = $ptime4 + $course4->Loads }}
    @else {{$otherDept4 = $otherDept4 + $course4->Loads}}
    @endif

    @if ($course4->CourseType === 'Theory') then {{$theory4 = $theory4 + $course4->Loads}}
    @elseif ($course4->CourseType === 'Lab') then {{$lab4 = $lab4 + $course4->Loads}}
    @endif
@endforeach

@foreach ($var[courses6] as $course6)
    @if($course6->Dept === 'CSE') then {{$fulltime6 = $fulltime6 + $course6->Loads}}
    @elseif($course6->Dept === 'CSE(Part-time)') then {{$ptime6 = $ptime6 + $course6->Loads }}
    @else {{$otherDept6 = $otherDept6 + $course6->Loads}}
    @endif

    @if ($course6->CourseType === 'Theory') then {{$theory6 = $theory6 + $course6->Loads}}
    @elseif ($course6->CourseType === 'Lab') then {{$lab6 = $lab6 + $course6->Loads}}
    @endif
@endforeach

@foreach ($var[courses8] as $course8)
    @if($course8->Dept === 'CSE') then {{$fulltime8 = $fulltime8 + $course8->Loads}}
    @elseif($course8->Dept === 'CSE(Part-time)') then {{$ptime8 = $ptime8 + $course8->Loads }}
    @else {{$otherDept8 = $otherDept8 + $course8->Loads}}
    @endif

    @if ($course8->CourseType === 'Theory') then {{$theory8 = $theory8 + $course8->Loads}}
    @elseif ($course8->CourseType === 'Lab') then {{$lab8 = $lab8 + $course8->Loads}}
    @endif
@endforeach
@endforeach
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Department</th>
        <th scope="col">Semester</th>
        <th scope="col">Other Department</th>
        <th scope="col">Part Time</th>
        <th scope="col">Full Time</th>
        <th scope="col">Theory</th>
        <th scope="col">Lab</th>
        <th scope="col">Total</th>
    </tr>
    </thead>
    <tbody>
    {{--@foreach($vars as $var)--}}
    <tr>
        <td>CSE</td>
        <td>2</td>
        <td>{{ $otherDept2 }}</td>
        <td>{{ $ptime2 }}</td>
        <td>{{ $fulltime2 }}</td>
        <td>{{ $theory2 }}</td>
        <td>{{ $lab2 }}</td>
        <td>{{ $ptime2 + $fulltime2 + $otherDept2 }}</td>
    </tr>
    <tr>
        <td></td>
        <td>4</td>
        <td>{{ $otherDept4 }}</td>
        <td>{{ $ptime4 }}</td>
        <td>{{ $fulltime4 }}</td>
        <td>{{ $theory4 }}</td>
        <td>{{ $lab4 }}</td>
        <td>{{ $ptime4 + $fulltime4 + $otherDept4 }}</td>
    </tr>
    <tr>
        <td></td>
        <td>6</td>
        <td>{{ $otherDept6 }}</td>
        <td>{{ $ptime6 }}</td>
        <td>{{ $fulltime6 }}</td>
        <td>{{ $theory6 }}</td>
        <td>{{ $lab6 }}</td>
        <td>{{ $ptime6 + $fulltime6 + $otherDept6 }}</td>
    </tr>
    <tr>
        <td></td>
        <td>8</td>
        <td>{{ $otherDept8 }}</td>
        <td>{{ $ptime8 }}</td>
        <td>{{ $fulltime8 }}</td>
        <td>{{ $theory8 }}</td>
        <td>{{ $lab8 }}</td>
        <td>{{ $ptime8 + $fulltime8 + $otherDept8 }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <th></th>
        <th>{{ $otherDept2 + $otherDept4 + $otherDept6 + $otherDept8 }}</th>
        <th>{{ $ptime2 + $ptime4 + $ptime6 + $ptime8 }}</th>
        <th>{{ $fulltime2 + $fulltime4 + $fulltime6 + $fulltime8 }}</th>
        <th>{{ $theory2 + $theory4 + $theory6 + $theory8 }}</th>
        <th>{{ $lab2 + $lab4 + $lab6 + $lab8 }}</th>
        <th>{{ $ptime2 + $fulltime2 + $otherDept2 + $ptime4 + $fulltime4 + $otherDept4 + $ptime6 + $fulltime6 + $otherDept6 + $ptime8 + $fulltime8 + $otherDept8 }}</th>
    </tr>
   {{-- @endforeach--}}
    </tbody>
</table>
</body>
</html>

