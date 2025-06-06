@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-white">Students List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-outline-info mb-3">Add Student</a>
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
            <a href="" class="btn btn-outline-warning">View</a>
            <a href="" class="btn btn-outline-info">Edit</a>
            <a href="" class="btn btn-outline-danger">Delete</a>
        </td>
    </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No Student Found!</td>
        </tr>
    @endforelse
        </tbody>
    </table>
</div>
@endsection
