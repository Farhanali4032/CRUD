@include('header')

<section class="bg-light my-5">
    <div class="container">
        <div class="row">
            <!-- cart -->
            <div class="col-lg-9">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <div class="card border shadow-0">
                    <div class="m-4">
                        @if (!empty($cart))
                            <h4 class="card-title mb-4">Your shopping cart</h4>
                            <?php $totalBill = 0;
                            ?>
                            @foreach ($cart as $product)
                                <?php
                                $totalBill += $product['price'];
                                ?>
                                <div class="row gy-3 mb-4" id="{{ $product['id'] }}">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <img src="{{ asset('uploads/images/' . $product['image']) }}"
                                                    class="border rounded me-3" style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link">{{ $product['name'] }}</a>
                                                    <p class="text-muted">Yellow, Jeans</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="col-xs-2" style="padding-right: 20px">
                                            <input style="width:50px;" class="" id="ex1" type="number"
                                                value="{{ $product['quantity'] }}">
                                        </div>
                                        <div>
                                            <text class="h6">$1156.00</text> <br />
                                            <small class="text-muted text-nowrap"> RS {{ $product['price'] }}/ per item
                                            </small>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <form class="removeBtn">
                                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                                <button type="submit"
                                                    class="btn btn-light border text-danger icon-hover-danger">
                                                    Remove</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h4 class="card-title mb-4">No product add</h4>
                        @endif
                    </div>

                </div>
            </div>
            <!-- cart -->
            <!-- summary -->
            @if (isset($totalBill))
                <div class="col-lg-3">
                    <form role="form" action="{{ url('stripe') }}" method="get">
                        <div class="card mb-3 border shadow-0">
                            <input type="hidden" name="totalBill" value="{{ $totalBill }}">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Full Name</label>
                                    <input type="text" class="form-control" name="fname"
                                        value="{{ old('fname') }}" autocomplete="off" />
                                    <span class="text-danger">
                                        @error('fname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label required">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ old('phone') }}" autocomplete="off" />
                                    <span class="text-danger">
                                        @error('fname')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-0 border">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2">$329.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Discount:</p>
                                    <p class="mb-2 text-success">-$60.00</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">TAX:</p>
                                    <p class="mb-2">$14.00</p>
                                </div>
                                <hr />
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Total price:</p>
                                    <p class="mb-2 fw-bold">RS: {{ $totalBill }}</p>

                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success w-100 shadow-0 mb-2"> Make Purchase
                                    </button>
                                    <a href="{{ route('products.index') }}" class="btn btn-light w-100 border mt-2">
                                        Back
                                        to
                                        shop </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            @endif


            <!-- summary -->
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.removeBtn').submit(function(e) {
            e.preventDefault();
            var id = $(this).find('input[name="id"]').val();
            var DivId = '#' + id;
            $.ajax({
                url: '{{ route('remvoe.cart') }}?id=' + id,
                method: 'GET',
                data: id,
                dataType: 'json',
                success: function(response) {
                    $(DivId).remove();
                    alert('Remove');
                },
                error: function(xhr, textStatus, error) {
                    alert('Error');
                }
            });
        });
    });
</script>

@include('footer');
