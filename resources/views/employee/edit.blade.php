@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-6">
            <div class="mb-3 text-center">
                <i class="bi-person-circle fs-1"></i>
                <h4>Edit Employee</h4>
            </div>
            <hr>
            <form action="{{ route('employees.update', ['employee' => $employee->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input class="form-control @error('firstName') is-invalid @enderror" type="text" name="firstName"
                            id="firstName" value="{{ $errors->any() ? old('firstName') : $employee->firstname }}"
                            placeholder="Enter First Name">
                        @error('firstName')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input class="form-control @error('lastName') is-invalid @enderror" type="text" name="lastName"
                            id="lastName" value="{{ $errors->any() ? old('lastName') : $employee->lastname }}"
                            placeholder="Enter Last Name">
                        @error('lastName')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" value="{{ old('email', $employee->email) }}" placeholder="Enter Email" required>
                        @error('email')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Age -->
                    <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input class="form-control @error('age') is-invalid @enderror" type="number" name="age"
                            id="age" value="{{ old('age', $employee->age) }}" placeholder="Enter Age" required>
                        @error('age')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div class="col-md-12 mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select name="position" id="position" class="form-select">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}"
                                    {{ old('position', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                    {{ $position->code . ' - ' . $position->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('position')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <!-- CV Section -->
                    <div class="col-md-12 mb-3">
                        <label for="cv" class="form-label">Curriculum Vitae (CV)</label>
                        @if ($employee->encrypted_filename)
                            <div class="mb-2">
                                <p>{{ $employee->original_filename }}</p>
                                <a href="{{ route('employees.download', $employee->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-download"></i> Download
                                </a>
                            </div>
                        @else
                            <p class="text-muted">No CV uploaded</p>
                        @endif
                        <input type="file" class="form-control @error('cv') is-invalid @enderror" name="cv"
                            accept=".pdf,.doc,.docx">
                        @error('cv')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                </div>

                <hr>
                <div class="row">
                    <!-- Cancel Button -->
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3">
                            <i class="bi-arrow-left-circle me-2"></i> Cancel
                        </a>
                    </div>

                    <!-- Update Button -->
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-dark btn-lg mt-3">
                            <i class="bi-check-circle me-2"></i> Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
