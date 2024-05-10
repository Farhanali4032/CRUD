@include('header')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Student List
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ url('create/record')}}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Add New Reocrd
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        {{-- @<pre>
        {{print_r($user_records)}}
        @</pre> --}}
        <div class="container-xl">
            <div>
                @if (@session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
            </div>
            <table id="myTable">
                <thead>
                    <tr role="row">
                        <th data-dt-column="0" colspan="1">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Gander</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_records as $records)
                    <tr>
                        <td class="dtr-control" tabindex="0">{{$records->fname}}</td>
                        <td>{{$records->email}}</td>
                        <td>{{$records->phoneNo}}</td>
                        <td class="dt-body-right">{{$records->age}}</td>
                        <td>{{$records->gander}}</td>
                        <td>{{$records->desc}}</td>
                        <td>
                            <a href="{{url('datatable/'.$records->id.'/edit')}}" class="btn">Edit</a>
                            <a href="{{url('datatable/'.$records->id.'/delete')}}" class="btn">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>

@include('footer')