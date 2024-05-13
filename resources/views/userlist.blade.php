@include('header')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        User List
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ url('roles')}}" class="btn btn-primary d-none d-sm-inline-block">
                            Permissisons
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="page-body">
        <div class="container-xl">
            <div>
                @if (@session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
            </div>
            <table id="myTable">
                <thead>
                    <tr role="row">
                        <th data-dt-column="0" colspan="1">id</th>
                        <th data-dt-column="0" colspan="1">Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="dtr-control" tabindex="0">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if ($user->roles->isNotEmpty())
                                <td>
                                    @foreach ($user->getRoleNames() as $role)
                                        {{ $role }}
                                </td>
                            @endforeach
                        @else
                            <td>New User</td>
                    @endif
                    <td>
                        <a href="{{ url('role/' . $user->id . '/edit') }}" class="btn">edit</a>
                        <a href="#" class="btn" data-bs-toggle="modal"
                            data-bs-target="#modal-danger">Delete</a>
                    </td>
                    </tr>
                    @endforeach

                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="modal-body text-center py-4">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z" />
                        <path d="M12 9v4" />
                        <path d="M12 17h.01" />
                    </svg>
                    <h3>Are you sure?</h3>
                    <div class="text-muted">Do you really want to Delete</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a></div>
                            <div class="col"><a href="{{ url('user/' . $user->id . '/delete') }}"
                                    class="btn btn-danger w-100">
                                    Delete
                                </a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
