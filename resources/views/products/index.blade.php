@include('header')

<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <h2 class="page-title">
                        Products
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ url('create/record') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Add Product
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
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
            </div>
            <table id="myTable">
                <thead>
                    <tr role="row">
                        <th data-dt-column="0" colspan="1">Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    <span class="avatar me-2">
                                        <img src="{{ asset('uploads/images/' . $product->image) }}" alt="Images">
                                    </span>
                                    <div class="flex-fill">
                                        <div class="font-weight-medium">{{ $product->name }}</div>
                                        <div class="text-muted"><a href="#" class="text-reset"></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="#" class="btn btn-light btn-pill w-50 ">Add to cart</a>
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
