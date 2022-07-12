@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Category</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data" >
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="menu">Name</label>
                                            <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Nhập tên danh mục">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" class="form-control">{{$category->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tax</label>
                                            <input type="number" name="tax" value="{{$category->tax}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <input type="text" name="unit" value="{{$category->unit}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="photo" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            @if ($category->image)
                                                <img class="img-thumbnail" width="120px" src="{{ asset($category->image) }}" alt="{{ $category->name }}" />
                                            @endif
                                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                                            @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@stop



