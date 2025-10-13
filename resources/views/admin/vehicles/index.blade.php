@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3>All Vehicles</h3>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">+ Add New Vehicle</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Number Plate</th>
                <th>Seats</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $v)
            <tr>
                <td>{{ $v->id }}</td>
                <td>{{ $v->name }}</td>
                <td>{{ $v->type }}</td>
                <td>{{ $v->number_plate }}</td>
                <td>{{ $v->seats }}</td>
                <td>
                    @if($v->image)
                        <img src="{{ asset('storage/'.$v->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('vehicles.edit', $v->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('vehicles.destroy', $v->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this vehicle?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
