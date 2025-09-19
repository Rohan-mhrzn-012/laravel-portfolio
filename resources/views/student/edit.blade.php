<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4>Edit Student</h4>
            </div>
            <div class="card-body">

                <!-- Update form -->
                <form action="{{ route('student.update', $student) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="fullname" value="{{ old('fullname', $student->fullname) }}" class="form-control @error('fullname') is-invalid @enderror" required>
                        @error('fullname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" name="age" value="{{ old('age', $student->age) }}" class="form-control @error('age') is-invalid @enderror" required>
                        @error('age')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" class="form-control @error('phone') is-invalid @enderror" required>
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Current Profile Picture</label><br>
                        @if($student->profile_picture)
                        <img src="{{ asset('storage/' . $student->profile_picture) }}" width="100" class="rounded mb-2">
                        @else
                        <p>No profile picture</p>
                        @endif
                        <input type="file" name="profile_picture" class="form-control @error('profile_picture') is-invalid @enderror">
                        @error('profile_picture')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('student.index') }}" class="btn btn-secondary">Cancel</a>
                </form>


            </div>
        </div>
    </div>

</body>

</html>