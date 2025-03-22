<!-- Add Subject Modal -->
<div class="modal fade" id="addSubjectModal" tabindex="-1" aria-labelledby="addSubjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h5 class="modal-title text-white" id="addSubjectModalLabel">Add New Subject</h5>
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

        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="code" class="form-label">Subject Code:</label>
                <input type="text" 
                       name="code" 
                       id="code"
                       class="form-control @error('code') is-invalid @enderror" 
                       value="{{ old('code') }}" 
                       required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Subject Name:</label>
                <input type="text" 
                       name="name" 
                       id="name"
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name') }}" 
                       required>
            </div>

            <div class="mb-3">
                <label for="units" class="form-label">Units:</label>
                <input type="number" 
                       name="units" 
                       id="units"
                       class="form-control @error('units') is-invalid @enderror" 
                       value="{{ old('units') }}" 
                       required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Save Subject</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
