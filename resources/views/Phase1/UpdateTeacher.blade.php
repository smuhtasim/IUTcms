@extends('Phase1.Phase1Layout')

@section('content')
<div class="container">
        <form action = "/editTeacher/<?php echo $teachers[0]->id; ?>" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <table  class="table table-hover">
                <tr>
                    <td>Name</td>
                    <td>
                    <input type = 'text' class="form-control input-sm" name ='Name' value = '<?php echo$teachers[0]->Name; ?>'/> </td>
                </tr>
                <tr>
                    <td>Initials</td>
                    <td>
                    <input type = 'text'class="form-control input-sm" name = 'Initials' value = '<?php echo$teachers[0]->Initials; ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td>
                    <select class="form-control" id="sel1" name = 'Designations' value = '<?php echo$teachers[0]->Designations; ?>'>
                        <option>Professor</option>
                        <option>Associate Professor</option>
                        <option>Assistant Professor</option>
                        <option>Lecturer</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Is Active?</td>
                    <td>
                    <div><input type="checkbox" class= "teacher-checkbox" id="IsActive" name="IsActive" value = 'Yes'/> Yes</div>
                    <div><input type="checkbox" class= "teacher-checkbox" id="IsActive" name="IsActive" value = 'No'/> No</div>
                    </td>
                </tr>
                    <br><br>
                    <td colspan = '2'>
                    <input type = 'submit'class="btn btn-primary btn-edit" value = "Update" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection