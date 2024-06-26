@extends('Admin.dashboardlayout.layout')

@section('title', 'Supplier Categories')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Tables
            <small>Supplier Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Supplier Categories</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Supplier Categories</h3>
                <a href="{{ route('supplier-category.create') }}" class="btn btn-primary pull-right"><i
                        class="fa fa-plus"></i> Add New Category</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                @if(session('Success_message'))
                    <div class="alert alert-success">
                        {{ session('Success_message') }}
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
                        @forelse($supplierCategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>{{ $category->featured_category==1 ? "Yes" : "No" }}</td>
                                <td>
                                    @if(!empty($category->category_image))
                                        @foreach(json_decode($category->category_image) as $image)
                                            <img src="{{ asset('admin/supplier/category_image/smallimage/' . $image) }}"
                                                height="50px">
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($category->cover_image))
                                        <img src="{{ asset('admin/supplier/cover_image/smallimage/' . $category->cover_image) }}"
                                            height="50px">
                                    @endif
                                </td>
                                <td>
                                    @if($category->category_status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('supplier-category.edit', $category->id) }}"
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
                                    <form action="{{ route('supplier-category.destroy', $category->id) }}" method="POST"
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
                                <td colspan="8" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $supplierCategories->links() }} <!-- Pagination links -->
                <p>Showing {{ $supplierCategories->firstItem() }} to {{ $supplierCategories->lastItem() }} of
                    {{ $supplierCategories->total() }} entries</p>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection