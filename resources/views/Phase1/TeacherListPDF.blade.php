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
<h1 style="text-align: center">Teacher List</h1>
<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">Full Name</th>
        <th scope="col">Initials</th>
        <th scope="col">Designation</th>
        <th scope="col">IsActive?</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($teachers as $teacher)
        <tr>
            <td>
                {{$teacher->Name}}
            </td>
            <td>
                {{$teacher->Initials}}
            </td>
            <td>
                {{$teacher->Designations}}
            </td>
            <td>
                {{$teacher->IsActive}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
