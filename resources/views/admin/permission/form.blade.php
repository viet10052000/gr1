<div class="card-body">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror"
               id="name" name="name" value="{{old('name',$permission->name)}}">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="card-body">
    <div class="form-group">
        <label for="exampleInputName">Permission</label>
        <input type="text" class="form-control @error('permission') is-invalid @enderror"
               id="permission" name="permission" value="{{old('permission',$permission->permission)}}">
        @error('permission')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<!-- /.card-body -->
