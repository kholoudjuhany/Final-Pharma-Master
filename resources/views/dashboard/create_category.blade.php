@extends('layouts.dashApp')

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">{{ isset($category) ? 'Edit' : 'Add New' }} Category</h1>
                <form action="{{ isset($category) ? route('categories.update', $categories->id) : route('categories.store') }}" method="POST">
                    @csrf
                    @if(isset($hIC))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="cat_name">Category Name</label>
                        <input type="text" name="cat_name" value="{{ isset($category) ? $category->cat_name : '' }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cat_description">Category Description</label>
                        <input type="text" name="cat_description" value="{{ isset($category) ? $category->cat_description : '' }}" class="form-control" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mt-3">{{ isset($category) ? 'Save Changes' : 'Add Category' }}</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection
