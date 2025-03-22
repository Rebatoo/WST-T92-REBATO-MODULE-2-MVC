<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title text-white" id="addStudentModalLabel">Add Student</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <style>
            .form-control {
                border: 2px solid #e0e0e0;
                border-radius: 8px;
                padding: 10px 15px;
                transition: border-color 0.3s ease;
            }
            
            .form-control:focus {
                border-color: #4CAF50;
                box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
            }
            
            .form-control.is-invalid {
                border-color: #dc3545;
            }
        </style>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" 
                       name="name" 
                       id="name"
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" 
                       name="email" 
                       id="email"
                       class="form-control @error('email') is-invalid @enderror" 
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" 
                       name="password" 
                       id="password"
                       class="form-control @error('password') is-invalid @enderror" 
                       required>
                <small class="form-text text-muted">Minimum 8 characters</small>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" 
                       name="password_confirmation" 
                       id="password_confirmation"
                       class="form-control" 
                       required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Student</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

