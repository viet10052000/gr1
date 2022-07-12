<div class="card-body">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input type="text" name="name" value="{{old('name',$role->name)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
    </div>
    <div class="form-group" data-select2-id="46">
        <label>permissions</label>
        <div class="select2-green" data-select2-id="45">
            <select class="select2 select2-hidden-accessible"  name="permissions[]" id="permissions" multiple="" data-placeholder="Select a permission" data-dropdown-css-class="select2-green" style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                @foreach($permissions as $id => $permissions)
                    <option value="{{ $permissions->id }}" {{(in_array($id, old('permissions', [])) ||$role->permissions->contains($permissions->id)) ? 'selected' : ''}}>
                        {{ $permissions->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <!-- /.form-group -->
</div>
<!-- /.card-body -->
