@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add Medicine</h1>
                <form action="{{ route('medicines.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="med_name">Medicine Name</label>
                        <input type="text" name="med_name" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="med_price">Medicine Price</label>
                        <input type="text" name="med_price" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="med_img">Medicine Image</label>
                        <input type="file" name="med_img" class="form-control" accept="image/*" required>
                    </div>
                
                    <div class="form-group">
                        <label for="med_quantity">Medicine Quantity</label>
                        <input type="text" name="med_quantity" class="form-control" required>
                    </div>
                
                    <div class="form-group">
                        <label for="cat_id">Category Name</label>
                        <select name="cat_id" class="form-control" required>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Add Medicine</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
