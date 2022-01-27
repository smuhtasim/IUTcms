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
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Course Code</th>
        <th scope="col">Course Title</th>
        <th scope="col">Semester</th>
        <th scope="col">Offer Course?</th>
        <th scope="col">Credit</th>
        <th scope="col">Number of Sections</th>
        <th scope="col">Number of Teachers</th>
        <th scope="col">Loads</th>
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
                {{$course->Sem}}
            </td>
            <td>
                {{$course->IsOffered}}
            </td>
            <td>
                {{$course->Credit}}
            </td>
            <td>
                {{$course->No_of_Sec}}
            </td>
            <td>
                {{$course->No_of_Teachers}}
            </td>
            <td>
                {{$course->Loads}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
