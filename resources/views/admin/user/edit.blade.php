@extends('admin.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
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
                            <h3 class="card-title">Edit</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.users.update',$user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputName">Name</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" name="email"  value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group" data-select2-id="46">
                                    <label>Roles</label>
                                    <div class="select2-green" data-select2-id="45">
                                        <select class="select2 select2-hidden-accessible"  name="roles[]" id="roles" multiple="" data-placeholder="Select a Role" data-dropdown-css-class="select2-green" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                            @foreach($roles as $id => $roles)
                                                <option value="{{ $roles->id }}"{{(in_array($id, old('roles', [])) ||$user->roles->contains($roles->id)) ? 'selected' : ''
}}
                                                >
                                                    {{ $roles->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName">Phone</label>
                                    <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputEmail1" placeholder="Enter">
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" name="birthday" value="{{$user->birthday}}" class="form-control" id="birthday" placeholder="Enter">
                                </div>
                                <div class="row mb-3">
                                    <label for="photo" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        @if ($user->image)
                                            <img class="img-thumbnail" width="120px" src="{{ asset($user->image) }}" alt="{{ $user->name }}" />
                                        @endif
                                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            @csrf

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

