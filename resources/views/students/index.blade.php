@extends('layout.app')

@section('title', 'Students List')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-white">Students List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-outline-info mb-3">Add Student</a>
    @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> {{ $value }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label></button>
        </div>
    @endsession
    <table class="table table-bordered table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
        @forelse ($students as $student )
            
    <tr>
        <td>{{ $student->id}}</td>
        <td>{{ $student->name}}</td>
        <td>{{ $student->email}}</td>
        <td>{{ $student->phone}}</td>
        <td>
            <a href="{{ route('students.show', $student->id)}}" class="btn btn-outline-warning">View</a>
            <a href="{{ route('students.edit', $student->id)}}" class="btn btn-outline-info">Edit</a>


            {{-- <button type="button" class="btn btn-outline-danger delete-btn"
            data-bs-toggle="modal"
            data-bs-target="#deleteStudentModal"
            data-id="{{ $student->id }}"
            > Delete
            </button> --}}
            <button type="button" class="btn btn-outline-danger delete-btn"
            data-bs-toggle="modal"
            data-bs-target="#deleteStudentModal"
            data-route="{{ route('students.destroy', $student->id) }}"
            > Delete
            </button>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No Student Found!</td>
        </tr>
    @endforelse
        </tbody>
    </table>

    {{-- pagination --}}
    
    <div class="d-flex justify-content-end mt-3">
        {{ $students->links('vendor.pagination.bootstrap-5-dark') }}
    </div>
</div>



{{-- Delete modal --}}
<div class="modal fade" id="deleteStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header border-0">
                <h5 class="modal-title">Delete Student</h5>
                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <p>You're about to delete this data</p>
                <p>This action cannot be reversed.</p>
            </div>
            <div class="modal-footer border-0">
                <button
                    type="button"
                    class="btn btn-outline-light"
                    data-bs-dismiss="modal"
                >
                Cancel
            </button>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Delete Student
                </button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{-- <script>
    document.addEventListener('DOMContentLoaded',function(){
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button =>{
            button.addEventListener('click', function(){
            const studentID = this.dataset.id;
            deleteForm.action = `/students/${studentID}`;

            });
        });
    }); --}}
</script>
<script>
    document.addEventListener('DOMContentLoaded',function(){
        const deleteButtons = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById('deleteForm');

        deleteButtons.forEach(button =>{
            button.addEventListener('click', function(){
            const deleteUrl = this.dataset.route;
            deleteForm.action = deleteUrl;

            });
        });
    });
</script>
@endsection