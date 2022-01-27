@extends('Phase1.Phase1Layout')

@section('content')

@if (\Session:: has('success'))
<div class="alert alert-success">
  <p>{{\Session::get('success')}}</p>
</div>
@endif
@if(Session::has('message'))
  <div class="alert alert-success" id="res_message">
  <p>{{ \Session::get('message') }}</p>
  </div>
@endif
<form action = "/createteacher" method = "post">
@csrf
<table class="table table-hover">
  <thead class="p1">
    <tr><th></th><th></th>
      <th scope="col">Full Name</th>
      <th scope="col">Initials</th>
      <th scope="col">Designation</th>
      <th scope="col">Is Active?</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($teachers as $teacher)
<tr><td></td><th></th>
  <td>{{ $teacher->Name }}</td>
  <td>{{ $teacher->Initials }}</td>
  <td>{{ $teacher->Designations }}</td>
  <td>{{ $teacher->IsActive }}</td>
  <td><div class="form-group">
    <a class="btn btn-primary btn-edit" id="edit" href ='editTeacher/{{ $teacher->Initials }}'> Edit </a></div></td>
</tr>
 @endforeach
    <tr id="row1"><th></th><th></th>
      <td><div class="form-group"><input type="text" class="form-control" id="inputDefault" name="Name" required></div></td>
      <td><div class="form-group"><input type="text" class="form-control" id="inputDefault" name="Initials" required></div</td>
      <td><div class="form-group">
        <select class="form-control" id="sel1" name="Designations" required>
        <option>Professor</option>
        <option>Associate Professor</option>
        <option>Assistant Professor</option>
        <option>Lecturer</option>
        </select></div>
      <td><div class="form-group c-box"><input type="checkbox" class= "teacher-checkbox" id="IsActive" name="IsActive" value="Yes"> Yes </div>
      <div class="form-group c-box"><input type="checkbox" class= "teacher-checkbox" id="IsActive" name="IsActive" value="No"> No </div>
      </td>
      <td><div class="form-group">
      <button class="btn btn-primary btn-edit" id="edit"> Submit </button>
      <button class="btn btn-primary btn-edit" style= "display:none" onclick = "Submit()" id="submit1"> Submit </button>
      <button class="btn btn-primary btn-edit" style= "display:none" onclick = "DeleteRow()" id="delete"> Delete </button>
      </div></td>
    </tr>
  </tbody>
</table>
</form>

@endsection
