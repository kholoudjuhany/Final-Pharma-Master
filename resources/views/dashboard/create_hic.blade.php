@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">{{ isset($hIC) ? 'Edit' : 'Add New' }} HIC</h1>
                <form action="{{ isset($hIC) ? route('hics.update', $hIC->id) : route('hics.store') }}" method="POST">
                    @csrf
                    @if(isset($hIC))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="HIC_name">HIC Name</label>
                        <input type="text" name="HIC_name" value="{{ isset($hIC) ? $hIC->HIC_name : '' }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="HIC_disscount">HIC Discount</label>
                        <input type="number" step="0.01" name="HIC_disscount" value="{{ isset($hIC) ? $hIC->HIC_disscount : '' }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="HIC_email">Email</label>
                        <input type="email" name="HIC_email" value="{{ isset($hIC) ? $hIC->HIC_email : '' }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="HIC_mobile">Mobile</label>
                        <input type="text" name="HIC_mobile" value="{{ isset($hIC) ? $hIC->HIC_mobile : '' }}" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">{{ isset($hIC) ? 'Save Changes' : 'Add HIC' }}</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection

