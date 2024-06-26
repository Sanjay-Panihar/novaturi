@extends('Admin.dashboardlayout.layout')

@section('title', 'Create Supplier Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Create Supplier Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Supplier Category</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Supplier Category</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('supplier-category.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name"
                            placeholder="Enter category name" value="{{ old('category_name') }}" required>
                        @if ($errors->has('category_name'))
                            <span class="text-danger">{{ $errors->first('category_name') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="featured_category">Featured Category</label>
                        <select class="form-control" id="featured_category" name="featured_category">
                            <option value="">Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_image">Category Image</label>
                    <input type="file" class="form-control" id="category_image" name="category_image[]" accept="image/*"
                        multiple>
                    <p class="help-block">Upload category images (jpg, jpeg, png, gif).</p>
                    @if ($errors->has('category_image'))
                        <span class="text-danger">{{ $errors->first('category_image') }}</span>
                    @endif
                    @if ($errors->has('category_image.*'))
                        <span class="text-danger">{{ $errors->first('category_image.*') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="cover_image">Cover Image</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                    <p class="help-block">Upload cover image (jpg, jpeg, png, gif).</p>
                    @if ($errors->has('cover_image'))
                        <span class="text-danger">{{ $errors->first('cover_image') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Enter description">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL"
                        value="{{ old('url') }}">
                    @if ($errors->has('url'))
                        <span class="text-danger">{{ $errors->first('url') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                        placeholder="Enter meta title" value="{{ old('meta_title') }}">
                    @if ($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description" rows="2"
                        placeholder="Enter meta description">{{ old('meta_description') }}</textarea>
                    @if ($errors->has('meta_description'))
                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                        placeholder="Enter meta keywords" value="{{ old('meta_keywords') }}">
                    @if ($errors->has('meta_keywords'))
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="category_status">Category Status</label>
                    <select class="form-control" id="category_status" name="category_status" required>
                        <option value="1" {{ old('category_status') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('category_status') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @if ($errors->has('category_status'))
                        <span class="text-danger">{{ $errors->first('category_status') }}</span>
                    @endif
                </div>
        </div><!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('supplier-category.index') }}" class="btn btn-default">Cancel</a>
        </div>
        </form>
</div><!-- /.box -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection