<!-- Edit Grade Modal -->
<div class="modal fade" id="editGradeModal" tabindex="-1" aria-labelledby="editGradeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content border-0">
      <div class="modal-header bg-gradient-dark text-white">
        <h5 class="modal-title" id="editGradeModalLabel">Edit Grade</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body px-4">
        <form id="editGradeForm" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="grade_id" id="edit_grade_id">
 
            <div class="mb-3">
                <label for="student_name" class="form-label fw-bold">Student</label>
                <input type="text" id="student_name" class="form-control border-2" readonly>
            </div>
 
            <div class="mb-3">
                <label for="subject_name" class="form-label fw-bold">Subject</label>
                <input type="text" id="subject_name" class="form-control border-2" readonly>
            </div>
 
            <div class="mb-3">
                <label for="edit_grade" class="form-label fw-bold">Grade</label>
                <input type="number" name="grade" id="edit_grade" class="form-control border-2" 
                       min="1.00" max="5.00" step="0.01" required>
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
