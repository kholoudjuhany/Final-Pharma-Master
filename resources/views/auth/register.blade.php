@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="first_name" class="text-black">First Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="first_name" name="Fname" value="{{ old('Fname') }}" required>
                                    @error('Fname')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name" class="text-black">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="last_name" name="Lname" value="{{ old('Lname') }}" required>
                                    @error('Lname')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="dob" class="text-black">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="dob" name="DoB" value="{{ old('DoB') }}" required max="{{ date('Y-m-d') }}">
                                    @error('DoB')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="text-black">Gender <span class="text-danger">*</span></label>
                                    <div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="gender_male" name="gender" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="gender_male">Male</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="gender_female" name="gender" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="gender_female">Female</label>
                                        </div>
                                        @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="personal_id" class="text-black">Personal ID <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="personal_id" name="personal_id" value="{{ old('personal_id') }}" required>
                                    @error('personal_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="user_mobile" class="text-black">Mobile Number <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="user_mobile" name="user_mobile" value="{{ old('user_mobile') }}" required>
                                    @error('user_mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="password" class="text-black">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="confirm_password" class="text-black">Confirm Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" required>
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Health Insurance Company Selection -->
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="hic" class="text-black">Health Insurance Company <span class="text-danger">*</span></label>
                                    <select class="form-control" id="hic" name="HIC_id" required>
                                        <option value="" disabled selected>Select Health Insurance Company</option>
                                        <option value="1" {{ old('HIC_id') == 1 ? 'selected' : '' }}>ASEZA (المفوضية)</option>
                                        <option value="2" {{ old('HIC_id') == 2 ? 'selected' : '' }}>JPMC (شركة مناجم الفوسفات الأردنية)</option>
                                        <option value="3" {{ old('HIC_id') == 3 ? 'selected' : '' }}>Arab Potash Company (شركة البوتاس العربية)</option>
                                        <option value="4" {{ old('HIC_id') == 4 ? 'selected' : '' }}>Nat Health Company (شركة نات هيلث)</option>
                                        <option value="5" {{ old('HIC_id') == 5 ? 'selected' : '' }}>GIG (شركة الشرق العربي)</option>
                                        <option value="6" {{ old('HIC_id') == 6 ? 'selected' : '' }}>Med Service (شركة ميد سيرفس)</option>
                                        <option value="7" {{ old('HIC_id') == 7 ? 'selected' : '' }}>Al-Nisr Al-Arabi Insurance(شركة النسر العربي)</option>
                                        <option value="8" {{ old('HIC_id') == 8 ? 'selected' : '' }}>ACT (محطة حاويات العقبة)</option>
                                    </select>
                                    @error('HIC_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg py-2 px-4">Register</button>
                                </div>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                        </div>
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection