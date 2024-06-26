@extends('Admin.dashboardlayout.layout')

@section('title', 'Edit Business Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Business Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Business Category</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Business Category</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('business-category.update', $businessCategory->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group @error('category_name') has-error @enderror">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" value="{{ old('category_name', $businessCategory->category_name) }}" required>
                        @error('category_name')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('featured_category') has-error @enderror">
                        <label for="featured_category">Featured Category</label>
                        <input type="text" class="form-control" id="featured_category" name="featured_category" placeholder="Enter featured category" value="{{ old('featured_category', $businessCategory->featured_category) }}">
                        @error('featured_category')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('category_image') has-error @enderror">
                        <label for="category_image">Category Images</label>
                        @if(!empty($businessCategory->category_image))
                            @foreach(json_decode($businessCategory->category_image) as $image)
                                <img src="{{ asset('admin/category_image/smallimage/' . $image) }}" height="70px">
                            @endforeach
                        @endif
                        <input type="file" class="form-control" id="category_image" name="category_image[]" multiple accept="image/*">
                        <p class="help-block">Upload new category images (jpg, jpeg, png, gif).</p>
                        @error('category_image')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('cover_image') has-error @enderror">
                        <label for="cover_image">Cover Image</label>
                        @if(!empty($businessCategory->cover_image))
                            <img src="{{ asset('admin/cover_image/smallimage/' . $businessCategory->cover_image) }}" height="70px">
                        @endif
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <p class="help-block">Upload new cover image (jpg, jpeg, png, gif).</p>
                        @error('cover_image')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('category_discount') has-error @enderror">
                        <label for="category_discount">Category Discount</label>
                        <input type="number" step="0.01" class="form-control" id="category_discount" name="category_discount" placeholder="Enter category discount" value="{{ old('category_discount', $businessCategory->category_discount) }}">
                        @error('category_discount')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('description') has-error @enderror">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ old('description', $businessCategory->description) }}</textarea>
                        @error('description')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('url') has-error @enderror">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL" value="{{ old('url', $businessCategory->url) }}">
                        @error('url')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('meta_title') has-error @enderror">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title" value="{{ old('meta_title', $businessCategory->meta_title) }}">
                        @error('meta_title')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('meta_description') has-error @enderror">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2" placeholder="Enter meta description">{{ old('meta_description', $businessCategory->meta_description) }}</textarea>
                        @error('meta_description')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('meta_keywords') has-error @enderror">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords" value="{{ old('meta_keywords', $businessCategory->meta_keywords) }}">
                        @error('meta_keywords')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group @error('category_status') has-error @enderror">
                        <label for="category_status">Category Status</label>
                        <select class="form-control" id="category_status" name="category_status" required>
                            <option value="1" {{ old('category_status', $businessCategory->category_status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('category_status', $businessCategory->category_status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('category_status')
                            <span class="help-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('business-category.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
