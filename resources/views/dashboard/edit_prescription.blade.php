@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Prescription</h1>
                <form action="{{ route('prescriptions.update', $prescription->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="status">Prescription Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $prescription->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $prescription->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $prescription->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection
