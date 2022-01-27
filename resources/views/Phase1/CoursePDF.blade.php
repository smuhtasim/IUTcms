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
<h1 style="text-align: center">Course List</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <td><b>Course Code</b></td>
        <td><b>Course Title</b></td>
        <td><b>Department</b></td>
        <td><b>Semester</b></td>
        <td><b>Course Type</b></td>
        <td><b>Credit</b></td>
        <td><b>Contact Hour</b></td>
    </tr>
    </thead>
    <tbody>
    @foreach ($courses as $course)
    <tr>
        <td>
            {{$course->CourseCode}}
        </td>
        <td>
            {{$course->CourseTitle}}
        </td>
        <td>
            {{$course->Dept}}
        </td>
        <td>
            {{$course->Sem}}
        </td>
        <td>
            {{$course->CourseType}}
        </td>
        <td>
            {{$course->Credit}}
        </td>
        <td>
            {{$course->ContactHour}}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
