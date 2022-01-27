@extends('Phase2.Phase2Layout')

@section('content')
<div class="container">
        <form action = "/OfferingCourse/<?php echo $courses[0]->id; ?>" method = "post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <table  class="table table-hover">
                <tr>
                    <td>Course Code</td>
                    <td>{{ $courses[0]->CourseCode }}</td>
                </tr>
                <tr>
                    <td>Course Title</td>
                    <td>{{$courses[0]->CourseTitle}}</td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td>{{$courses[0]->Sem}}</td>
                </tr>
                <tr>
                    <td>Credit</td>
                    <td>{{$courses[0]->Credit}}</td>
                </tr>
                <tr>
                <td>Offer Course?</td>
                <td><div class="form-group c-box"><input type="checkbox" class= "teacher-checkbox" id="IsActive" name="IsOffered" value='Offered'> Offer </div>
                <div class="form-group c-box"><input type="checkbox" class= "teacher-checkbox" id="IsActive" name="IsOffered" value='No'> Don't Offer </div>
                </td>
                </tr>
                <tr>
                    <td>Number of Sections</td>    
                    <td><div class="form-group"><input type="text" class="form-control" id="inputDefault" name="No_of_Sec" value='<?php echo$courses[0]->No_of_Sec; ?>'></div></td>
                </tr>
                <tr>
                    <td>Number of Teachers</td>    
                    <td><div class="form-group"><input type="text" class="form-control" id="inputDefault" name="No_of_Teachers" value='<?php echo$courses[0]->No_of_Teachers; ?>'></div></td>
                </tr>

                <tr>
                    <td>Load</td>    
                    <td><div class="form-group"><input type="text" class="form-control" id="inputDefault" name="Loads" value='<?php echo$courses[0]->Loads; ?>'></div></td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                    <input type = 'submit'class="btn btn-primary btn-edit" value = "Offer?" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

@endsection