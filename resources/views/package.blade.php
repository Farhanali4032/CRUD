@include('header')
<style>
    :root {
        --white: #fff;
        --main-color: #76d3f0;
    }

    .pricingTable {
        background: var(--white);
        color: var(--main-color);
        font-family: 'Open Sans', sans-serif;
        text-align: center;
        padding: 30px;
        border-top: 6px solid var(--main-color);
        position: relative;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .pricingTable .pricingTable-header {
        margin: 0 0 10px;
        text-align: left;
    }

    .pricingTable .title {
        font-size: 40px;
        font-weight: 600;
        text-transform: capitalize;
        margin: 0 0 15px;
    }

    .pricingTable .price-value .amount {
        font-size: 50px;
        font-weight: 600;
        line-height: 45px;
        display: inline-block;
    }

    .pricingTable .pricing-content {
        background-color: var(--white);
        padding: 20px 15px;
        margin: 0 0 15px;
    }

    .pricingTable .pricing-content ul {
        text-align: left;
        padding: 0;
        margin: 0;
        list-style: none;
        display: inline-block;
    }

    .pricingTable .pricing-content ul li {
        font-size: 17px;
        font-weight: 500;
        text-transform: capitalize;
        line-height: 35px;
        padding: 0 0 0 30px;
        margin: 0 0 5px;
        position: relative;
    }

    .pricingTable .pricing-content ul li:last-child {
        margin: 0;
    }

    .pricingTable .pricing-content ul li:before {
        content: "\f00c";
        color: var(--main-color);
        font-family: "Font Awesome 5 free";
        font-size: 14px;
        font-weight: 900;
        text-align: center;
        position: absolute;
        top: 2px;
        left: 0;
    }

    .pricingTable .pricing-content li.disable:before {
        content: "\f00d";
    }

    .pricingTable .pricingTable-signup {
        background-color: var(--main-color);
        padding: 12px 15px 10px;
    }

    .pricingTable .pricingTable-signup a {
        color: var(--white);
        font-size: 24px;
        line-height: 24px;
        font-weight: 600;
        text-transform: uppercase;
        display: inline-block;
        transition: all 0.3s ease-in-out;
    }

    .pricingTable .pricingTable-signup a:hover {
        letter-spacing: 3px;
        text-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
    }

    .pricingTable.pink {
        --main-color: #EB6185;
    }

    .pricingTable.green {
        --main-color: #c4f7f5;
    }

    @media only screen and (max-width: 990px) {
        .pricingTable {
            margin: 0 0 40px;
        }
    }
</style>
<script async src="https://js.stripe.com/v3/pricing-table.js"></script>
<stripe-pricing-table pricing-table-id="prctbl_1PJ6mrCFCx7aK1tH6uAg1JUz"
publishable-key="pk_test_51PHIJdCFCx7aK1tHJeEBzcOk4a1TLbJnblmnO927nxYavX0wRyMpHNwp3HATgHan8tTg8DZ4T6Pwx9KAQwzVJzXj00nzZMgC2c">
</stripe-pricing-table>











{{-- <div class="demo">
    <div class="container">
        <div class="row">
            @foreach ($packages as $package)
                <div class="col-md-4 col-sm-6">
                    <form action="{{ route('checkout.session')}}" method="POST">
                        @csrf
                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <h3 class="title">{{ $package->subscription_name }} </h3>
                                <div class="price-value">
                                    <span class="amount">{{ $package->amount }}</span>
                                </div>
                            </div>
                            <div class="pricing-content">
                                <ul>

                                    <li class="disable">{{ $package->subscription_desc }}</li>
                                </ul>
                            </div>
                            <div class="">
                                <input type="hidden" name="priceId" value="{{ $package->stripe_price_id}}">
                                <input type="hidden" name="quantity" value="1">
                                <button class="btn btn-primary w-100" type="submit">Buy Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div> --}}


{{-- <script type="text/javascript" src="https://js.stripe.com/v2/"></script> --}}
{{-- <script>
    $(document).ready(function () {
        $('.buy').click(function {
        });
      });
    if(window.Stripe){
        var stripe = Stripe("{{ env('STRIPE_KEY')}}");
        var element = stripe.element();
        var card = element.create('card');
        card.mount('#datas');
    }
</script> --}}
@include('footer')
