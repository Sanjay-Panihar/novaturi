@extends('Admin.dashboardlayout.layout')

@section('title', 'Edit Freelance Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Freelance Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('freelance-category.index') }}">Freelance Categories</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Freelance Category</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('freelance-category.update', $freelanceCategory->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                            placeholder="Enter category name"
                            value="{{ old('category_name', $freelanceCategory->category_name) }}" required>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="featured_category">Featured Category</label>
                        <select class="form-control" id="featured_category" name="featured_category">
                            <option value="1" {{ $freelanceCategory->featured_category ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ !$freelanceCategory->featured_category ? 'selected' : '' }}>No</option>
                        </select>
                        @error('featured_category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_image">Category Images</label>
                        @if(!empty($freelanceCategory->category_image))
                            @foreach(json_decode($freelanceCategory->category_image, true) as $image)
                                @if(is_array($image))
                                    @foreach($image as $img)
                                        <img src="{{ asset('admin/freelance/category_image/smallimage/' . $img) }}"
                                            height="70px">
                                    @endforeach
                                @else
                                    <img src="{{ asset('admin/freelance/category_image/smallimage/' . $image) }}"
                                        height="70px">
                                @endif
                            @endforeach
                        @endif
                        <input type="file" class="form-control" id="category_image" name="category_image[]"
                            accept="image/*" multiple>
                        <p class="help-block">Upload new category images (jpg, jpeg, png, gif).</p>
                        @error('category_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @error('category_image.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <p class="help-block">Upload cover image (jpg, jpeg, png, gif).</p>
                        @if(!empty($freelanceCategory->cover_image))
                            <img src="{{ asset('admin/freelance/cover_image/smallimage/' . $freelanceCategory->cover_image) }}"
                                height="70px">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Enter description">{{ old('description', $freelanceCategory->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL"
                            value="{{ old('url', $freelanceCategory->url) }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title"
                            placeholder="Enter meta title"
                            value="{{ old('meta_title', $freelanceCategory->meta_title) }}">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description"
                            placeholder="Enter meta description">{{ old('meta_description', $freelanceCategory->meta_description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                            placeholder="Enter meta keywords"
                            value="{{ old('meta_keywords', $freelanceCategory->meta_keywords) }}">
                    </div>
                    <div class="form-group">
                        <label for="category_status">Category Status</label>
                        <select class="form-control" id="category_status" name="category_status" required>
                            <option value="1" {{ $freelanceCategory->category_status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $freelanceCategory->category_status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('freelance-category.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
