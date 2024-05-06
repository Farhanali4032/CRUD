@include('header')
<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Dashboard
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="add-record" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
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
        <div class="container-xl">
            <table id="myTable">
                <thead>
                    <tr role="row">
                        <th data-dt-column="0" colspan="1">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th>Gander</th>
                        <th>Subject</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="dtr-control" tabindex="0">Farhan</td>
                        <td>farhan@bitzstudio.com</td>
                        <td>03098790086</td>
                        <td class="dt-body-right">22</td>
                        <td>Male</td>
                        <td>Maths</td>
                        <td>Description</td>
                        <td>
                            <a href="#" class="btn">Edit</a>
                            <a href="#" class="btn">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Usman</td>
                        <td>usman@bitzstudio.com</td>
                        <td>03098790086</td>
                        <td>30</td>
                        <td>Male</td>
                        <td>English</td>
                        <td>Description</td>
                        <td>
                            <a href="#" class="btn">Edit</a>
                            <a href="#" class="btn">Delete</a>
                        </td>
                    </tr>
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
</div>

@include('footer')