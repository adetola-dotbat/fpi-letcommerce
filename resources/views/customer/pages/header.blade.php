<header id="header" class="header header-container clearfix">
    <div class="container clearfix" id="site-header-inner">
        <div id="logo" class="logo float-left">
            <div class="row d-flex align-items-center justify-content-center">
                <a title="logo">
                    <img src="customer/images/fpi-logo.jpg" alt="image" width="90">
                </a>
                <div>
                    <h3 style="text-transform: uppercase">Federal Polytechnic Ilaro</h3>
                    <small>PMB 50, Ilaro, Ogun State</small>
                </div>
            </div>

        </div>
        <div class="mobile-button"><span></span></div>
        <ul class="menu-extra">

            <li class="box-cart nav-top-cart-wrapper">
                <a class="icon_cart nav-cart-trigger active"><span>{{ count($cart) }}</span></a>
                <div class="nav-shop-cart">
                    <div class="widget_shopping_cart_content">
                        <div class="woocommerce-min-cart-wrap">
                            <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                                @foreach ($cart as $carted)
                                    <li
                                        class="woocommerce-mini-cart-item mini_cart_item d-flex justify-content-between py-2">
                                        <span>{{ $carted->products->name }}</span>

                                        <span class="btn btn-outline-danger p-1"> <a
                                                href="{{ route('cart.delete', $carted->id) }}">
                                                X
                                            </a></span>

                                    </li>
                                @endforeach

                                <div>
                                    <form action="{{ route('pay') }}" method="POST">
                                        {{-- @csrf --}}

                                        @php
                                            $total_price = \App\Models\Cart::where('user_id', Session::get('loginId'))->sum('price');
                                        @endphp
                                        {{-- <a href="{{ route('pay', Session::get('loginId')) }}"
                                            style="border: 1px solid green; border-radius:1px; backgound-color:green">
                                            BUY</a> --}}

                                        {{ csrf_field() }}

                                        <input name="name" type="hidden" value="customer" />
                                        <input name="email" type="hidden" value="customer@gmail.com" />
                                        <input name="phone" type="hidden" value="09050030028" />
                                        <input name="price" type="hidden" value="{{ $total_price }}" />
                                        <button type="submit" class="btn btn-primary me-2">BUY</button>

                                    </form>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="nav-wrap">
            <nav id="mainnav" class="mainnav">
                <ul class="menu">
                    <li class="active">
                        <a href="#">HOME</a>

                    </li>
                    <li>
                        <a href="#">SHOP</a>

                    </li>

                    <li>
                        <a href="#">BLOG</a>
                    </li>
                    <li>
                        <a href="#">CONTACT</a>
                    </li>
                    @if (Session::has('loginId'))
                        <li>
                            <a href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">LOGIN</a>

                        </li>

                        <li>
                            <a href="{{ route('register') }}">REGISTER</a>
                        </li>
                    @endif

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
