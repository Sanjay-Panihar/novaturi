@extends('Admin.dashboardlayout.layout')

@section('title', 'Freelance Categories')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Freelance Categories</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Freelance Categories</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Freelance Categories</h3>
                <a href="{{ route('freelance-category.create') }}" class="btn btn-primary pull-right"><i
                        class="fa fa-plus"></i> Add New Category</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                @if(session('Success_message'))
                    <div class="alert alert-success">
                        <i class="fa fa-check-circle"></i> {{ session('Success_message') }}
                    </div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Featured Category</th>
                            <th>Category Images</th>
                            <th>Cover Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($freelanceCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->featured_category ? 'Yes' : 'No' }}</td>
                                <td>
                                    @if(!empty($category->category_image))
                                        @foreach(json_decode($category->category_image, true) as $image)
                                            @foreach((array)$image as $img)
                                                <img src="{{ asset('admin/freelance/category_image/smallimage/' . $img) }}"
                                                    height="50px">
                                            @endforeach
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($category->cover_image))
                                        <img src="{{ asset('admin/freelance/cover_image/smallimage/' . $category->cover_image) }}"
                                            height="50px">
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $category->category_status ? 'bg-success' : 'bg-danger' }}">
                                        {{ $category->category_status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('freelance-category.edit', $category->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                    <form action="{{ route('freelance-category.destroy', $category->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this category?')"><i
                                                class="fa fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection
