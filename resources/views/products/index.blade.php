@include('header')





<div class="container d-flex justify-content-center mt-50 mb-50">

    <div class="row">

        @foreach ($products as $product)
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img-actions">

                            <img src="{{ asset('uploads/images/' . $product->image) }}" class="card-img img-fluid"
                                width="96" height="350" alt="">

                        </div>
                    </div>

                    <div class="card-body bg-light text-center">
                        <div class="mb-2">
                            <a href="#" class="text-muted" data-abc="true">{{ $product->name }}</a>
                        </div>

                        <h3 class="mb-0 font-weight-semibold">RS {{ $product->price }}</h3>

                        <div>
                            <i class="fa fa-star star"></i>
                            <i class="fa fa-star star"></i>
                            <i class="fa fa-star star"></i>
                            <i class="fa fa-star star"></i>
                        </div>

                        <div class="text-muted mb-3">{{ $product->category->name}}</div>
                        <form class="add-to-cart-form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id}}">
                            <input type="hidden" name="name" value="{{ $product->name}}">
                            <input type="hidden" name="price" value="{{ $product->price}}">
                            <input type="hidden" name="image" value="{{ $product->image}}">
                            <input type="hidden" name="category" value="{{ $product->category}}">
                            <button type="submit"class="btn bg-cart add-to-cart"><i class="fa fa-cart-plus mr-2"></i> Add to
                                cart</button>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
</div>


<script>
    $(document).ready(function() {
    $('.add-to-cart-form').submit(function(e) {
        e.preventDefault(); 
        var formData = $(this).serialize(); 
        $.ajax({
            url: '{{ route('add.cart')}}', // Update with your add to cart route
            method: 'POST',
            data: formData,
            dataType: 'json', 
            success: function(response) {
                // alert('Product added to cart successfully!');
                // You can also update the cart counter here if you have one
            },
            error: function(xhr, textStatus, error) {
                // alert('Error adding product to cart. Please try again.');
            }
        });
    });
});
</script>

@include('footer')
