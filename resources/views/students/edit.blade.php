<div class="modal fade" id="editStudentModal{{ $student->id }}" tabindex="-1"
  aria-labelledby="editStudentModalLabel{{ $student->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gradient-dark">
        <h5 class="modal-title text-white" id="editStudentModalLabel{{ $student->id }}">
          Edit Student
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('students.update', $student->id) }}" method="POST">
          @csrf
          @method('PUT')

          <!-- Hidden input for student_id -->
          <input type="hidden" name="student_id" value="{{ $student->id }}">
          
          <div class="mb-3">
            <label for="name{{ $student->id }}" class="form-label">Name:</label>
            <input type="text" id="name{{ $student->id }}" name="name" class="form-control"
              value="{{ old('name', $student->name) }}" required>
          </div>

          <div class="mb-3">
            <label for="email{{ $student->id }}" class="form-label">Email:</label>
            <input type="email" id="email{{ $student->id }}" name="email" class="form-control"
              value="{{ old('email', $student->email) }}" required>
          </div>

          <div class="mb-3">
            <label for="password{{ $student->id }}" class="form-label">New Password:</label>
            <input type="password" id="password{{ $student->id }}" name="password" class="form-control">
            <small class="form-text text-muted">Leave blank to keep current password</small>
          </div>

          <div class="mb-3">
            <label for="password_confirmation{{ $student->id }}" class="form-label">Confirm New Password:</label>
            <input type="password" id="password_confirmation{{ $student->id }}" name="password_confirmation" class="form-control">
          </div>

          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Update Student</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
