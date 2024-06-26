@extends('Admin.dashboardlayout.layout')

@section('title', 'Create Business Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Create Business Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Business Category</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Business Category</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('business-category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" value="{{ old('category_name') }}" required>
                        @error('category_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="featured_category">Featured Category</label>
                        <input type="text" class="form-control" id="featured_category" name="featured_category" placeholder="Enter featured category" value="{{ old('featured_category') }}">
                        @error('featured_category')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <input type="file" class="form-control" id="category_image" name="category_image[]" multiple accept="image/*">
                        <p class="help-block">Upload category image (jpg, jpeg, png, gif).</p>
                        @error('category_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <p class="help-block">Upload cover image (jpg, jpeg, png, gif).</p>
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_discount">Category Discount</label>
                        <input type="number" step="0.01" class="form-control" id="category_discount" name="category_discount" placeholder="Enter category discount" value="{{ old('category_discount') }}">
                        @error('category_discount')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" value="{{ old('url') }}">
                        @error('url')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title" value="{{ old('meta_title') }}">
                        @error('meta_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2" placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                        @error('meta_description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords" value="{{ old('meta_keywords') }}">
                        @error('meta_keywords')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_status">Category Status</label>
                        <select class="form-control" id="category_status" name="category_status" required>
                            <option value="1" {{ old('category_status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('category_status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('category_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('business-category.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
