@include('header')

<form action="{{ url('set-roles') }}" method="POST">
    @csrf
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Role And Permission</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th>Permissions</th>
                                        <th></th>
                                        @foreach ($roles as $roleName)
                                            <th>{{ $roleName->name }}</th>
                                        @endforeach
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->name }}
                                                <input type="hidden" name="allPermissions[]" value="{{$permission->id}}">
                                            </td>

                                            <td></td>
                                            @foreach ($roles as $role)
                                                <td>
                                                    <input class="form-check-input m-0 align-middle"
                                                        name="permissions[{{ $permission->id }}][]" type="checkbox"
                                                        value="{{ $role->name }}"
                                                        {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <button type="submit" class="btn btn-primary d-none d-sm-inline-block">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@include('footer')
