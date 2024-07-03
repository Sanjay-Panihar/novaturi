@extends('Admin.dashboardlayout.layout')

@section('title', 'Edit Supplier Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Edit Supplier Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Supplier Category</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Supplier Category</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('supplier-category.update', $supplierCategory->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                            placeholder="Enter category name" value="{{ $supplierCategory->category_name }}" required>
                        @if ($errors->has('category_name'))
                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="featured_category">Featured Category</label>
                        <select class="form-control" id="featured_category" name="featured_category">
                            <option>Select</option>
                            <option value="1" {{ $supplierCategory->featured_category == 1 ? 'selected' : '' }}>Yes
                            </option>
                            <option value="0" {{ $supplierCategory->featured_category == 0 ? 'selected' : '' }}>No
                            </option>
                        </select>
                        @error('featured_category')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_image">Category Image</label>
                    @if(!empty($supplierCategory->category_image))
                        @foreach(json_decode($supplierCategory->category_image) as $image)
                            <img src="{{ asset('admin/supplier/category_image/smallimage/' . $image) }}" height="70px">
                        @endforeach
                    @endif
                    <input type="file" class="form-control" id="category_image" name="category_image[]" accept="image/*"
                        multiple>
                    <p class="help-block">Upload new category images (jpg, jpeg, png, gif).</p>
                    @if ($errors->has('category_image'))
                        <span class="text-danger">{{ $errors->first('category_image') }}</span>
                    @endif
                    @if ($errors->has('category_image.*'))
                        <span class="text-danger">{{ $errors->first('category_image.*') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cover_image">Cover Image</label>
                    @if(!empty($supplierCategory->cover_image))
                        <img src="{{ asset('admin/supplier/cover_image/smallimage/' . $supplierCategory->cover_image) }}"
                            height="70px">
                    @endif
                    <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                    <p class="help-block">Upload new cover image (jpg, jpeg, png, gif).</p>
                    @if ($errors->has('cover_image'))
                        <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Enter description">{{ $supplierCategory->description }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL"
                        value="{{ $supplierCategory->url }}">
                    @if ($errors->has('url'))
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                        placeholder="Enter meta title" value="{{ $supplierCategory->meta_title }}">
                    @if ($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2"
                        placeholder="Enter meta description">{{ $supplierCategory->meta_description }}</textarea>
                    @if ($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                        placeholder="Enter meta keywords" value="{{ $supplierCategory->meta_keywords }}">
                    @if ($errors->has('meta_keywords'))
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_status">Category Status</label>
                    <select class="form-control" id="category_status" name="category_status" required>
                        <option value="1" {{ $supplierCategory->category_status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $supplierCategory->category_status == 0 ? 'selected' : '' }}>Inactive
                        </option>
                    </select>
                    @if ($errors->has('category_status'))
                        <span class="text-danger">{{ $errors->first('category_status') }}</span>
                    @endif
                </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('supplier-category.index') }}" class="btn btn-default">Cancel</a>
        </div>
        </form>
</div><!-- /.box -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection