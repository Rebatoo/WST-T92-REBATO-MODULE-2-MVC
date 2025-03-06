@foreach ($subjects as $subject)
<!-- Edit Subject Modal -->
<div class="modal fade" id="editSubjectModal{{ $subject->id }}" tabindex="-1" aria-labelledby="editSubjectModalLabel{{ $subject->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content border-0">
      <div class="modal-header bg-gradient-dark">
        <h5 class="modal-title text-white" id="editSubjectModalLabel{{ $subject->id }}">Edit Subject</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4">
        <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="subject_id" value="{{ $subject->id }}">
 
            <div class="mb-3">
                <label for="code" class="form-label fw-bold">Subject Code:</label>
                <input type="text" name="code" class="form-control border-2" value="{{ old('code', $subject->code) }}" required>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Subject Name:</label>
                <input type="text" name="name" class="form-control border-2" value="{{ old('name', $subject->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="units" class="form-label fw-bold">Units:</label>
                <input type="number" name="units" class="form-control border-2" value="{{ old('units', $subject->units) }}" required>
            </div>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach
