<section class="flat-row row-product-new">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section margin-bottom-52">
                    <h2 class="title">
                        New Service
                    </h2>
                </div>
                <div class="product-content product-fourcolumn clearfix">
                    <ul class="product style2 clearfix">
                        @foreach ($product as $proItem)
                            <li class="product-item kid woman">

                                <div class="product-thumb clearfix">
                                    <a href="#">
                                        <img src="/book/{{ $proItem->image }}" alt="image">
                                    </a>
                                </div>
                                <div class="product-info clearfix">
                                    <span class="product-title">New arrival fancy and affordable
                                        {{ $proItem->name }}</span>
                                    <div class="price">
                                        <ins>
                                            <span class="amount"> {{ '#' . $proItem->price }}</span>
                                        </ins>
                                    </div>
                                    
                                </div>
                                <div class="add-to-cart text-center">
                                    <a
                                        href="{{ route('cart.add', ['user_id' => Session::get('loginId'), 'product_id' => $proItem->id, 'price' => $proItem->price]) }}">
                                        ADD TO CART</a>
                                </div>
                            </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
