@extends('Admin.dashboardlayout.layout')

@section('title', 'Business Category')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Tables
            <small>Business Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('AdminDashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <section class="content">
        @if(Session::has('error_message'))
        <div class="alert alert-danger">
            <i class="fa fa-exclamation-triangle"></i> Error: {{ Session::get('error_message') }}
        </div>
        @endif

        @if(Session::has('Success_message'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i> Success: {{ Session::get('Success_message') }}
        </div>
        @endif

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Business Categories</h3>
                <a href="{{ route('business-category.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Category</a>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Serial No.</th>
                            <th>Category Name</th>
                            <th>Featured Category</th>
                            <th>Category Image</th>
                            <th>Cover Image</th>
                            <th>Category Discount</th>
                            <th>Description</th>
                            <th>URL</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $serial = ($businessCategories->currentpage()-1) * $businessCategories->perpage() + 1;
                        @endphp
                        @forelse($businessCategories as $category)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->featured_category }}</td>
                            <td>
                                @if(!empty($category->category_image))
                                @foreach(json_decode($category->category_image) as $image)
                                <img src="{{ asset('admin/category_image/smallimage/' . $image) }}" height="70px">
                                @endforeach
                                @else
                                <img style="height: 70px;" src="{{ asset('img/No_Image_Available.jpg') }}" alt="No Image Available">
                                @endif
                            </td>
                            <td>
                                @if(!empty($category->cover_image))
                                <img src="{{ asset('admin/cover_image/smallimage/' . $category->cover_image) }}" height="70px">
                                @else
                                <img style="height: 70px;" src="{{ asset('img/No_Image_Available.jpg') }}" alt="No Image Available">
                                @endif
                            </td>
                            <td>{{ $category->category_discount }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->url }}</td>
                            <td>
                                @if($category->category_status == 1)
                                <span class="badge bg-success">Active</span>
                                @else
                                <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('business-category.edit', $category->id) }}" role="button"><i class="fa fa-pencil"></i> Edit</a>
                                <form action="{{ route('business-category.destroy', $category->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">No records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $businessCategories->links() }} <!-- Pagination links -->
                <p>Showing {{ $businessCategories->firstItem() }} to {{ $businessCategories->lastItem() }} of {{ $businessCategories->total() }} entries</p>
            </div>
        </div>
    </section>
</div>
@endsection
