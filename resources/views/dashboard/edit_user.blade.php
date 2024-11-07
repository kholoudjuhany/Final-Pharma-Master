@extends('layouts.dashApp') 

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit User</h1>
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <div class="form-group">
                        <label for="Fname">First Name</label>
                        <input type="text" name="Fname" value="{{ $user->Fname }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="Lname">Last Name</label>
                        <input type="text" name="Lname" value="{{ $user->Lname }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="DoB">Date of Birth</label>
                        <input type="date" name="DoB" value="{{ $user->DoB }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="personal_id">Personal ID</label>
                        <input type="text" name="personal_id" value="{{ $user->personal_id }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                       <label for="email">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                       <label for="user_mobile">Mobile</label>
                        <input type="text" name="user_mobile" value="{{ $user->user_mobile }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ $user->address }}" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="HIC_id">HIC Name</label>
                        <select name="HIC_id" class="form-control" required>
                            @foreach($hics as $hic)
                            <option value="{{ $hic->id }}" {{ $user->HIC_id == $hic->id ? 'selected' : '' }}>
                                {{ $hic->HIC_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="user_role">Role</label>
                        <select name="user_role" class="form-control" required>
                            <option value="customer" {{ $user->user_role == 'customer' ? 'selected' : '' }}>Customer</option>
                            <option value="doctor" {{ $user->user_role == 'doctor' ? 'selected' : '' }}>Doctor</option>
                        </select>
                    </div>
                
                
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection
