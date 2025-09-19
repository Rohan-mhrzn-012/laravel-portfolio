<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <div class="card shadow-lg rounded-3">
      <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Student Details</h4>
      </div>
      <div class="row mb-3">
          <div class="col-md-3 fw-bold">Profile Picture:</div>
          <div class="col-md-9">
            <img src="{{asset('Storage/' . $student->profile_picture)}}" class="rounded" alt="Profile" width="100" >
          </div>
      <div class="card-body">
        <div class="row mb-3">
          <div class="col-md-3 fw-bold">Full Name:</div>
          <div class="col-md-9">{{$student->fullname}}</div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3 fw-bold">Phone:</div>
          <div class="col-md-9">{{$student->phone}}</div>
        </div>
        <div class="row mb-3">
          <div class="col-md-3 fw-bold">Age:</div>
          <div class="col-md-9">{{$student->age}}</div>
        </div>
        
        </div>
      </div>
      <div class="card-footer text-end">
        <a href="{{route('student.edit' , $student)}}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{route('student.index')}}" class="btn btn-secondary btn-sm">Back</a>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
