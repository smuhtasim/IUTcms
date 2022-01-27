@extends('Phase1.Phase1Layout')

@section('content')
<div class="container">
        <form action = "/edit/<?php echo $courses[0]->id; ?>" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <table  class="table table-hover">
                <tr>
                    <td>Course Code</td>
                    <td>
                    <input type = 'text' class="form-control input-sm" name ='CourseCode' value = '<?php echo$courses[0]->CourseCode; ?>'/> </td>
                </tr>
                <tr>
                    <td>Course Title</td>
                    <td>
                    <input type = 'text'class="form-control input-sm" name = 'CourseTitle' value = '<?php echo$courses[0]->CourseTitle; ?>'/>
                    </td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td>
                    <select class="form-control" id="sel1" name = 'Dept' value = '<?php echo$courses[0]->Dept; ?>'>
                        <option>CSE</option>
                        <option>EEE</option>
                        <option>MCE</option>
                        <option>CEE</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>
                    <select class="form-control" id="sel1" name = 'Sem' value = '<?php echo$courses[0]->Sem; ?>'>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Course Type</td>
                    <td>
                    <select class="form-control" id="sel1"  name ='CourseType' value = '<?php echo$courses[0]->CourseType; ?>'>
                        <option>Theory</option>
                        <option>Lab</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Compulsory/Optional</td>
                    <td>
                    <select class="form-control" id="sel1" name="Comp_Mand" value = '<?php echo$courses[0]->Comp_Mand; ?>'>
                        <option>C</option>
                        <option>O</option>
                    </select>
        
                    </td>
                </tr>
                <tr>
                    <td>Credit</td>
                    <td>
                    <input type = 'text' class="form-control input-sm" name ='Credit' value = '<?php echo$courses[0]->Credit; ?>'/> </td>
                </tr>
                <tr>
                    <td>Contact Hour</td>
                    <td>
                    <input type = 'text' class="form-control input-sm" name ='ContactHour' value = '<?php echo$courses[0]->ContactHour; ?>'/> </td>
                </tr>
                <tr>
                    <td>Effective Contact Hour</td>
                    <td>
                    <input type = 'text' class="form-control input-sm" name ='E_ContactHour' value = '<?php echo$courses[0]->E_ContactHour; ?>'/> </td>
                </tr>
                <tr>
                    <br><br>
                    <td></td>
                    <td>
                    <input type = 'submit'class="btn btn-primary btn-edit" value = "Update" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection