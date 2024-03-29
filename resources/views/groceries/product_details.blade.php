@extends("layout.groceries")

@section("main_content")

<div class="banner">
    <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('{{ asset("assets/img/bg-header.jpg") }}');">
        <div class="container">
            <h1 class="pt-5">
               {{$products -> name}}
            </h1>
            <p class="lead">
                Save time and leave the groceries to us.
            </p>
        </div>
    </div>
</div>

@if(session()->get('success'))
<div class="alert alert-success text-center">
{{ session()->get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<div class="product-detail">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="slider-zoom">
                    <a href="{{asset('assets/img/')}}/{{$products -> image}}" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                        <img alt="Detail Zoom thumbs image" src="{{asset('assets/img/')}}/{{$products -> image}}" style="width: 100%;">
                    </a>
                </div>

                <div class="slider-thumbnail">
                    <ul class="d-flex flex-wrap p-0 list-unstyled">
                        <li>
                            <a href="assets/img/meats.jpg" rel="gallerySwitchOnMouseOver: true, popupWin:'assets/img/meats.jpg', useZoom: 'cloudZoom', smallImage: 'assets/img/meats.jpg'" class="cloud-zoom-gallery">
                                <img itemprop="image" src="assets/img/meats.jpg" style="width:135px;">
                            </a>
                        </li>
                        <li>
                            <a href="assets/img/fish.jpg" rel="gallerySwitchOnMouseOver: true, popupWin:'assets/img/fish.jpg', useZoom: 'cloudZoom', smallImage: 'assets/img/fish.jpg'" class="cloud-zoom-gallery">
                                <img itemprop="image" src="assets/img/fish.jpg" style="width:135px;">
                            </a>
                        </li>
                        <li>
                            <a href="assets/img/vegetables.jpg" rel="gallerySwitchOnMouseOver: true, popupWin:'assets/img/vegetables.jpg', useZoom: 'cloudZoom', smallImage: 'assets/img/vegetables.jpg'" class="cloud-zoom-gallery">
                                <img itemprop="image" src="assets/img/vegetables.jpg" style="width:135px;">
                            </a>
                        </li>
                        <li>
                            <a href="assets/img/frozen.jpg" rel="gallerySwitchOnMouseOver: true, popupWin:'assets/img/frozen.jpg', useZoom: 'cloudZoom', smallImage: 'assets/img/frozen.jpg'" class="cloud-zoom-gallery">
                                <img itemprop="image" src="assets/img/frozen.jpg" style="width:135px;">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="col-sm-6">
                <p>
                    <strong>Overview</strong><br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <div class="row">
                    <div class="col-sm-6">
                        <p>
                            <strong>Price</strong> (/Pack)<br>
                            <span class="price">Rp {{$products-> sale_price}}</span>
                            <span class="old-price">Rp {{$products-> purchase_price}}</span>
                        </p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>
                            <span class="stock available">In Stock: {{$products-> quantity}}</span>
                        </p>
                    </div>
                </div>
                <p class="mb-1">
                    <strong>Quantity</strong>
                </p>
                <div class="row">
                    <div class="col-sm-5">
                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="" name="vertical-spin">
                    </div>
                    <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (250 gram)</span></div>
                </div>

                <button class="mt-3 btn btn-primary btn-lg">
                    <i class="fa fa-shopping-basket"></i> Add to Cart
                </button>
            </div>
        </div>
    </div>
</div>



<div class="contact-wrapper">
    <h2 class="title">Give us your comment</h2>
 <div class="container">
    <form data-aos="fade-left" data-aos-duration="1200" method="POST" action="{{ route('comment.store', ['id' => $products->id]) }}">
        @csrf
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Full Name" name="fullname" value="{{old('fullname')}}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <input class="form-control" type="email" placeholder="Email" name="email" value="{{old('email')}}">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Message" name="message" value="{{old('message')}}"></textarea>
                </div>
            </div>
            <div class="col-lg-12 text-right">
                <button type="submit" class="btn btn-lg btn-primary mb-5">Send</button>
            </div>
        </div>
    </form>
 </div>
    
</div>

<section id="related-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Commentarios</h2>
                @if ($comments->count() == 0)
                <div class="alert alert-warning text-center">
                    <h6>No hay comentarios de este producto</h6>
                </div>
                @elseif ($comments->count() > 1)
                <div class="product-carousel owl-carousel">

                   
                    @foreach($comments as $com)
                    <div class="item">
                        <div class="card fixed-card card-product">
                            <div class="card-body">
                                <h4 class="card-title">
                                    {{ $com->fullname}}
                                </h4>
                                <div class="card-price">
                                    <p class="card-subtitle text-muted">{{ $com->email}}</p>
                                </div>
                                <p class="card-text">{{$com->comment}}</p>
                            </div>
                        </div>
                    </div>
                      @endforeach  
                      
                </div>
                @else
                <div class="card fixed-card card-product">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $comments[0]->fullname}}
                        </h4>
                        <div class="card-price">
                            <p class="card-subtitle text-muted">{{ $comments[0]->email}}</p>
                        </div>
                        <p class="card-text">{{$comments[0]->comment}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<section id="related-product">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="title">Related Products</h2>
                <div class="product-carousel owl-carousel">
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until 2018
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="assets/img/meats.jpg" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail-product.html">Product Title</a>
                                </h4>
                                <div class="card-price">
                                    <span class="discount">Rp. 300.000</span>
                                    <span class="reguler">Rp. 200.000</span>
                                </div>
                                <a href="detail-product.html" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until 2018
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="assets/img/fish.jpg" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail-product.html">Product Title</a>
                                </h4>
                                <div class="card-price">
                                    <span class="discount">Rp. 300.000</span>
                                    <span class="reguler">Rp. 200.000</span>
                                </div>
                                <a href="detail-product.html" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until 2018
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="assets/img/vegetables.jpg" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail-product.html">Product Title</a>
                                </h4>
                                <div class="card-price">
                                    <span class="discount">Rp. 300.000</span>
                                    <span class="reguler">Rp. 200.000</span>
                                </div>
                                <a href="detail-product.html" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until 2018
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="assets/img/frozen.jpg" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail-product.html">Product Title</a>
                                </h4>
                                <div class="card-price">
                                    <span class="discount">Rp. 300.000</span>
                                    <span class="reguler">Rp. 200.000</span>
                                </div>
                                <a href="detail-product.html" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card card-product">
                            <div class="card-ribbon">
                                <div class="card-ribbon-container right">
                                    <span class="ribbon ribbon-primary">SPECIAL</span>
                                </div>
                            </div>
                            <div class="card-badge">
                                <div class="card-badge-container left">
                                    <span class="badge badge-default">
                                        Until 2018
                                    </span>
                                    <span class="badge badge-primary">
                                        20% OFF
                                    </span>
                                </div>
                                <img src="assets/img/fruits.jpg" alt="Card image 2" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="detail-product.html">Product Title</a>
                                </h4>
                                <div class="card-price">
                                    <span class="discount">Rp. 300.000</span>
                                    <span class="reguler">Rp. 200.000</span>
                                </div>
                                <a href="detail-product.html" class="btn btn-block btn-primary">
                                    Add to Cart
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection