@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Category</h1>
                <form action="{{ route('categories.update', $cat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" name="cat_name" value="{{ $cat->cat_name }}" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="cat_description">Category Description</label>
                        <input type="text" name="cat_description" value="{{ $cat->cat_description }}" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection