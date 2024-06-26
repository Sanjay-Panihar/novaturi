@extends('Admin.dashboardlayout.layout')

@section('title', 'Create Freelance Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Create Freelance Category</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('freelance-category.index') }}">Freelance Categories</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Create Freelance Category</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('freelance-category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
                    </div>
                    <div class="form-group">
                        <label for="featured_category">Featured Category</label>
                        <input type="text" class="form-control" id="featured_category" name="featured_category" placeholder="Enter featured category">
                    </div>
                    <div class="form-group">
                        <label for="category_image">Category Image</label>
                        <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*">
                        <p class="help-block">Upload category image (jpg, jpeg, png, gif).</p>
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                        <p class="help-block">Upload cover image (jpg, jpeg, png, gif).</p>
                    </div>
                    <div class="form-group">
                        <label for="category_discount">Category Discount</label>
                        <input type="number" step="0.01" class="form-control" id="category_discount" name="category_discount" placeholder="Enter category discount">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="url">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter URL">
                    </div>
                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter meta title">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2" placeholder="Enter meta description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords">
                    </div>
                    <div class="form-group">
                        <label for="category_status">Category Status</label>
                        <select class="form-control" id="category_status" name="category_status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('freelance-category.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </form>
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
