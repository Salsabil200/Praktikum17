@extends('layouts.app')

@section('content')
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="first_name" value="{{ $employee->firstname }}" placeholder="First Name">
        <button type="submit">Update</button>
    </form>
@endsection
