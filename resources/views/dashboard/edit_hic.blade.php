@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit HIC</h1>
                <form action="{{ route('hics.update', $hIC->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="HIC_name">HIC Name</label>
                        <input type="text" name="HIC_name" value="{{ $hIC->HIC_name }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="HIC_email">Email</label>
                        <input type="email" name="HIC_email" value="{{ $hIC->HIC_email }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="HIC_mobile">Mobile</label>
                        <input type="text" name="HIC_mobile" value="{{ $hIC->HIC_mobile }}" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection

