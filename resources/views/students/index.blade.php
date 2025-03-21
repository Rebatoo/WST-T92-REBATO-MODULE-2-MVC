@extends('layouts.dashlayout')

@section('content')
<div class="container-fluid py-2">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if(session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="bg-gradient-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
            <h6 class="text-white text-capitalize ps-3 mb-0">Students</h6>
            <button type="button" class="btn btn-success me-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">
              <i class="material-symbols-rounded">add</i> Add Student
            </button>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="table-responsive p-0" style="max-height: 550px; overflow-y: auto;">
            <table class="table align-items-center mb-0">
              <thead class="sticky-top bg-white">
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 10%">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 25%">Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 25%">Email</th>
                  <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 20%">Course</th> -->
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 20%">Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach($students as $student)
                        <tr>
                          <td>
                            <p class="text-xs font-weight-bold mb-0 px-3">{{ $student->id }}</p>
                          </td>
                          <td>
                            <div class="d-flex px-3 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $student->name }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs text-secondary mb-0">{{ $student->email }}</p>
                          </td>
                          <!-- <td>
                            <p class="text-xs font-weight-bold mb-0">{{ $student->course }}</p>
                          </td> -->
                          <td class="align-middle">
                            <button type="button" class="btn btn-link text-warning text-gradient px-3 mb-0"
                              data-bs-toggle="modal" data-bs-target="#editStudentModal{{ $student->id }}">
                              <i class="material-symbols-rounded">edit</i> Edit
                            </button>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0">
                                <i class="material-symbols-rounded">delete</i> Delete
                              </button>
                            </form>
                          </td>
                        </tr>

                        <!-- Include Edit Modal Inside the Loop -->
                        @include('students.edit', ['student' => $student])

                        @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Add Student Modal -->
@include('students.create')



<style>
/* Custom scrollbar styling */
.table-responsive::-webkit-scrollbar {
  width: 6px;
  height: 6px;
}

.table-responsive::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 3px;
}

.table-responsive::-webkit-scrollbar-thumb {
  background: #888;
  border-radius: 3px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
  background: #555;
}

/* Sticky header styles */
.sticky-top {
  top: 0;
  z-index: 1020;
}

.table thead.sticky-top {
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

/* Ensure consistent column widths */
.table th, .table td {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
</style>
@endsection
