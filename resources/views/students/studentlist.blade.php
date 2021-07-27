<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SEU Enrolment System</title>
  </head>
  <body>
  <div class="container">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Student ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Middle Name</th>
            <th scope="col">Last Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($studentlist as $student)
            <tr>
                <td>{{ $student-> studentid }}</td>
                <td>{{ $student-> firstName }}</td>
                <td>{{ $student-> middleName }}</td>
                <td>{{ $student-> lastName }}</td>
                <td>
                    <button class="btn btn-sm btn-success" data-bs-target="editStudent">Edit 
                </button>
            </td>
            </tr>
            @endforeach
        </table>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
    </div>

    {{-- modal for editing student info --}}
    <div class="modal fade" tabindex="-1" aria-hidden="true" id="editStudent">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action={{ route('students.store') }}>
                {{-- immediately after form tag add csrf to secure data being submitted to the database --}}
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Student ID</label>
                    <input type="text" class="form-control" name="studentid" required id="editStudentid">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstName">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="middleName">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastName">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Update</button>
        </div>
        </div>
    </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <script type="text/javascript">
        $(function(){
            // call function when clicking .edit-modal classname button
            $(document).on('click','.edit-modal',function(){
                // this means this page; .data('id') means data-id from data-id ="$student->id"
                var id = $(this).data('id');
                var studentid = $(this).data('studentid');
                var firstName = $(this).data('firstName');
                var middleName = $(this).data('middleName');
                var lastName = $(this).data('lastName');
                var address = $(this).data('address');
                $()
                console.log('studentid')

                // assigning values in form
                // '#editStudentid' another variable; form in modal
                $('#editStudentid').val(studentid);
                $('#editfirstName').val(firstName);
                $('#editmiddleName').val(middleName);
                $('#editlastName').val(lastName);
                $('#editaddress').val(address);


            });
        });
    </script>

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

