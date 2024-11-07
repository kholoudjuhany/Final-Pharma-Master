@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Medicine</h1>
                <form action="{{ route('medicines.update', $med->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Medicine Name -->
                    <div class="form-group">
                        <label for="med_name">Medicine Name</label>
                        <input type="text" name="med_name" value="{{ $med->med_name }}" class="form-control" required>
                    </div>

                    <!-- Medicine Price -->
                    <div class="form-group">
                        <label for="med_price">Medicine Price</label>
                        <input type="text" name="med_price" value="{{ $med->med_price }}" class="form-control" required>
                    </div>

                    <!-- Medicine Image Upload -->
                    <div class="form-group">
                        <label for="med_img">Medicine Image</label>
                        <input type="file" name="med_img" class="form-control" accept="image/*">
                        <!-- Show existing image -->
                         @if ($med->med_img)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $med->med_img) }}" alt="Medicine Image" width="150">
                        </div>
                        @endif
                    </div>

                    <!-- Medicine Quantity -->
                    <div class="form-group">
                        <label for="med_quantity">Medicine Quantity</label>
                        <input type="text" name="med_quantity" value="{{ $med->med_quantity }}" class="form-control" required>
                    </div>

                    <!-- Medicine Category -->
                    <div class="form-group">
                        <label for="cat_id">Category Name</label>
                        <select name="cat_id" class="form-control" required>
                            @foreach($cats as $cat)
                            <option value="{{ $cat->id }}" {{ $med->cat_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->cat_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection


