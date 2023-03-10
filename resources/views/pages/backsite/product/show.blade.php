    @extends('layouts.app')
    @section('title', 'Produk')
    @section('content')

        @push('after-style')
            <link rel="stylesheet" type="text/css" href="{{ asset('/assets/backsite/app-assets/css/pages/ecommerce-shop.css') }}">
            <link rel="stylesheet" type="text/css"
                href="{{ asset('/assets/backsite/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
            <link rel="stylesheet" type="text/css"
                href="{{ asset('/assets/backsite/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}"">
        @endpush
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                        <h3 class="content-header-title mb-0 d-inline-block">Produk Detail</h3>
                        <div class="row breadcrumbs-top d-inline-block">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('backsite.product.index') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Produk Detail
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="content-body">
                    <div class="product-detail">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-sm-4 col-12">
                                            <div class="product-img d-flex align-items-center">
                                                <div class="badge badge-success round">
                                                    {{ $product->tipe }}
                                                </div>
                                                <form action="{{ route('backsite.cart.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <img alt="Card image cap" class="img-fluid mb-1"
                                                        src="{{ url(Storage::url($product->photo)) }}"
                                                        style="width: 800px; max-height:450px">
                                            </div>
                                        </div>
                                        <div class="col-sm-8 col-12">
                                            <div class="title-area clearfix">
                                                <h2 class="product-title float-left">
                                                    {{ $product->nama }}
                                                </h2>

                                            </div>
                                            <div class="price-reviews clearfix">
                                                <span class="price-box">
                                                    <span class="price h4">
                                                        {{ 'Rp. ' . number_format($product->harga) ?? '' }}
                                                    </span>
                                                </span>
                                            </div>
                                            <!-- Product Information -->
                                            <div class="product-info">

                                                {!! $product->deskripsi !!}
                                                <input disabled class="text-center mt-2" type="text"
                                                    value="Stok {{ $product->qty }}" for="quantity" name="quantity"
                                                    min="1" max="1000" />
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-6 mb-1">
                                                    <div class="product-count pr-1">
                                                        <div class="input-group">
                                                            <input class="text-center count touchspin" type="number"
                                                                value="1" for="quantity" name="quantity" min="1"
                                                                max="1000" />

                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->nama }}" name="name">
                                                <input type="hidden" value="{{ $product->harga }}" name="price">
                                                <input type="hidden" value="{{ $product->photo }}" name="image">
                                                <div class="col-xl-5 col-lg-5 col-md-12">
                                                    <div class="product-buttons pl-2">
                                                        <button type="submit" class="btn btn-danger btn-lg">
                                                            <i class="la la-shopping-cart">
                                                            </i>
                                                            Tambahkan Ke Keranjang
                                                        </button>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <ul class="product-tabs nav nav-tabs nav-underline no-hover-bg">
                                            <li class="nav-item">
                                                <a aria-controls="desc" aria-expanded="true" class="nav-link active"
                                                    data-toggle="tab" href="#desc" id="description">
                                                    Description
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a aria-controls="ratings" aria-expanded="false" class="nav-link"
                                                    data-toggle="tab" href="#ratings" id="review">
                                                    Ratings
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a aria-controls="comment" aria-expanded="false" class="nav-link"
                                                    data-toggle="tab" href="#comment" id="comments">
                                                    Comments
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="product-content tab-content px-1 pt-1">
                                            <div aria-expanded="true" aria-labelledby="description" class="tab-pane active"
                                                id="desc" role="tabpanel">
                                                <h2 class="my-1">
                                                    Fitbit Alta HR Special Edition
                                                </h2>
                                                <p>
                                                    Tootsie roll gingerbread drag??e gummies candy tart. Danish dessert sweet
                                                    roll icing dessert bonbon.
                                                    Brownie
                                                    sesame snaps pastry chocolate biscuit wafer tart. Candy canes gummies
                                                    wafer donut chupa chups pudding
                                                    sweet
                                                    donut. Lollipop halvah dessert chocolate cake danish cake. Oat cake
                                                    topping sweet chocolate muffin cake
                                                    pie
                                                    halvah. Topping danish fruitcake apple pie carrot cake. Pudding cupcake
                                                    cupcake cotton candy croissant.
                                                    Pastry
                                                    pastry jelly beans powder drag??e toffee wafer cupcake pastry. Sweet
                                                    lemon drops lollipop croissant
                                                    bonbon.
                                                    Souffl?? biscuit dessert biscuit gummi bears sugar plum cake. Tootsie
                                                    roll sugar plum bear claw chocolate
                                                    bar
                                                    gummies pudding powder danish caramels. Bear claw biscuit lemon drops
                                                    croissant gummi bears. Lollipop
                                                    chupa
                                                    chups souffl?? sweet roll souffl?? biscuit bear claw wafer.
                                                </p>
                                                <p>
                                                    Liquorice candy cotton candy tootsie roll chupa chups jelly-o pastry
                                                    croissant marshmallow. Gingerbread
                                                    tiramisu jelly. Cheesecake pudding marshmallow marshmallow candy donut
                                                    donut chocolate cake gummies.
                                                    Macaroon
                                                    tootsie roll wafer ice cream. Icing cupcake pudding. Caramels topping
                                                    cake caramels toffee sesame snaps
                                                    pie
                                                    halvah halvah. Sesame snaps toffee pudding macaroon souffl?? sesame
                                                    snaps. Topping lemon drops sweet roll
                                                    lollipop chocolate bar souffl?? cotton candy carrot cake. Lollipop drag??e
                                                    cheesecake toffee donut
                                                    macaroon tart
                                                    marshmallow. Croissant jelly-o chocolate jujubes souffl??. Halvah sweet
                                                    pastry apple pie cake. Powder
                                                    icing
                                                    bonbon candy canes. Cake toffee marshmallow chocolate cake candy canes.
                                                </p>
                                                <p>
                                                    Caramels macaroon lemon drops topping topping. Jelly muffin muffin sweet
                                                    roll drag??e gummi bears cake
                                                    wafer
                                                    apple pie. Pudding gingerbread oat cake. Jelly chocolate bar candy.
                                                    Cotton candy macaroon jelly beans
                                                    caramels
                                                    sesame snaps chocolate caramels cheesecake icing. Oat cake chocolate
                                                    cake halvah gingerbread. Icing
                                                    candy
                                                    marzipan. Powder dessert marzipan powder. Candy canes cake croissant
                                                    jelly beans chupa chups chocolate
                                                    cake.
                                                    Jelly-o candy toffee caramels jelly-o marshmallow. Lollipop wafer
                                                    caramels pudding. Icing gingerbread
                                                    halvah
                                                    chocolate bar caramels.
                                                </p>
                                                <p>
                                                    Pudding tootsie roll lollipop tiramisu chocolate oat cake carrot cake
                                                    sweet roll powder. Powder
                                                    gingerbread
                                                    pie biscuit candy pie cookie toffee icing. Muffin muffin chocolate.
                                                    Tiramisu ice cream jelly beans
                                                    jelly-o
                                                    tootsie roll. Cotton candy jujubes cupcake drag??e bear claw muffin candy
                                                    cake marshmallow. Tart halvah
                                                    marshmallow. Donut cake pie. Drag??e dessert liquorice gummi bears. Jelly
                                                    chupa chups sesame snaps bonbon
                                                    chocolate bar biscuit tootsie roll candy chocolate bar. Lemon drops
                                                    halvah pastry. Tart donut halvah
                                                    pudding.
                                                    Caramels gummies caramels candy.
                                                </p>
                                                <br>
                                                <h4>
                                                    Special Features :
                                                </h4>
                                                <ul>
                                                    <li>
                                                        Jelly-o candy toffee caramels jelly-o marshmallow.
                                                    </li>
                                                    <li>
                                                        Cotton candy jujubes cupcake.
                                                    </li>
                                                    <li>
                                                        Donut cake pie.
                                                    </li>
                                                    <li>
                                                        Dessert liquorice gummi bears.
                                                    </li>
                                                    <li>
                                                        Lemon drops halvah pastry.
                                                    </li>
                                                </ul>
                                            </div>
                                            <div aria-labelledby="review" class="tab-pane" id="ratings">
                                                <h2 class="my-1">
                                                    Customer Rating & Review
                                                </h2>
                                                <div class="media-list media-bordered">
                                                    <div class="media">
                                                        <span class="media-left">
                                                            <img alt="Generic placeholder image" class="media-object"
                                                                src="../../../app-assets/images/portrait/small/avatar-s-1.png"
                                                                width="64" height="64" />
                                                        </span>
                                                        <div class="media-body">
                                                            <span class="ratings float-right">
                                                            </span>
                                                            <h5 class="media-heading mb-0 text-bold-600">
                                                                Cookie candy
                                                            </h5>
                                                            <div class="media-notation mb-1">
                                                                2 Oct, 2018 at 8:39am
                                                            </div>
                                                            Tootsie roll chocolate cake oat cake. Cake topping sweet jelly
                                                            beans gummies. Oat cake sugar plum
                                                            cheesecake
                                                            drag??e bear claw chocolate cake dessert gummies chupa chups.
                                                            Jujubes cake cotton candy danish
                                                            gingerbread
                                                            pastry tart danish tart. Gummies croissant icing tart. Sweet
                                                            muffin marzipan danish. Lemon drops
                                                            carrot cake
                                                            carrot cake gummies. Oat cake wafer dessert. Chocolate jujubes
                                                            jelly biscuit. Souffl?? sweet
                                                            cheesecake.
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <span class="media-left">
                                                            <img alt="Generic placeholder image" class="media-object"
                                                                src="../../../app-assets/images/portrait/small/avatar-s-8.png"
                                                                width="64" height="64" />
                                                        </span>
                                                        <div class="media-body">
                                                            <span class="ratings float-right">
                                                            </span>
                                                            <h5 class="media-heading mb-0 text-bold-600">
                                                                Tootsie roll dessert
                                                            </h5>
                                                            <div class="media-notation mb-1">
                                                                27 Sep, 2018 at 2:30pm
                                                            </div>
                                                            Pastry gummi bears jelly sweet. Pie gummi bears pastry chocolate
                                                            danish powder oat cake bear claw.
                                                            Marshmallow
                                                            cake croissant. Cake lemon drops jelly beans marzipan pie carrot
                                                            cake. Carrot cake ice cream donut.
                                                            Chocolate
                                                            jelly carrot cake tootsie roll chocolate chocolate cake. Souffl??
                                                            donut sweet tootsie roll.
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <span class="media-left">
                                                            <img alt="Generic placeholder image" class="media-object"
                                                                src="../../../app-assets/images/portrait/small/avatar-s-6.png"
                                                                width="64" height="64" />
                                                        </span>
                                                        <div class="media-body">
                                                            <span class="ratings float-right">
                                                            </span>
                                                            <h5 class="media-heading mb-0 text-bold-600">
                                                                Lemon drops ice cream
                                                            </h5>
                                                            <div class="media-notation mb-1">
                                                                27 Jul, 2018 at 11:10am
                                                            </div>
                                                            Cookie lollipop caramels. Liquorice jelly beans icing chupa
                                                            chups. Wafer brownie fruitcake sugar
                                                            plum
                                                            tiramisu. Jelly bear claw biscuit pie wafer. Croissant chupa
                                                            chups cake. Tart dessert gingerbread
                                                            cupcake.
                                                            Ice
                                                            cream jelly-o bonbon pudding chupa chups danish topping topping.
                                                            Candy canes pastry wafer cheesecake
                                                            brownie.
                                                            Croissant donut bonbon candy sesame snaps candy canes sesame
                                                            snaps wafer. Muffin candy croissant
                                                            biscuit
                                                            drag??e.
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 class="my-1">
                                                    Leave Your Review
                                                </h2>
                                                <form class="form">
                                                    <div class="form-body">
                                                        <label>
                                                            Ratings
                                                        </label>
                                                        <div class="mb-1" id="customer-review">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">
                                                                        Your Name
                                                                    </label>
                                                                    <input class="form-control" id="name"
                                                                        name="name" placeholder="Your Name"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="subject">
                                                                        Subject
                                                                    </label>
                                                                    <input class="form-control" id="subject"
                                                                        name="subject" placeholder="Subject"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="review-desc">
                                                                Your Review
                                                            </label>
                                                            <textarea class="form-control" id="review-desc" name="comment" placeholder="Your Review" rows="5"></textarea>
                                                        </div>
                                                        <button class="btn btn-info" type="submit">
                                                            <i class="la la-check-square-o">
                                                            </i>
                                                            Submit Review
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div aria-labelledby="comments" class="tab-pane" id="comment">
                                                <h2 class="my-1">
                                                    Comments
                                                </h2>
                                                <div class="media-list media-bordered">
                                                    <div class="media">
                                                        <span class="media-left">
                                                            <img alt="Generic placeholder image" class="media-object"
                                                                src="../../../app-assets/images/portrait/small/avatar-s-10.png"
                                                                width="64" height="64" />
                                                        </span>
                                                        <div class="media-body">
                                                            <h5 class="media-heading mb-0 text-bold-600">
                                                                Fruitcake apple pie
                                                            </h5>
                                                            <div class="media-notation mb-1">
                                                                20 Sep, 2018 at 7:37pm
                                                            </div>
                                                            Cupcake ice cream cake cotton candy gummi bears cotton candy
                                                            macaroon chocolate. Cake croissant
                                                            tiramisu
                                                            drag??e marshmallow halvah tiramisu. Gummi bears souffl?? pudding.
                                                            Donut muffin brownie brownie.
                                                            Liquorice
                                                            sweet
                                                            roll chocolate cake tootsie roll fruitcake. Jujubes bonbon cake
                                                            chocolate bar liquorice pastry
                                                            dessert.
                                                            Fruitcake apple pie pie caramels sweet roll. Jelly icing jujubes
                                                            souffl??.
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <span class="media-left">
                                                            <img alt="Generic placeholder image" class="media-object"
                                                                src="../../../app-assets/images/portrait/small/avatar-s-12.png"
                                                                width="64" height="64" />
                                                        </span>
                                                        <div class="media-body">
                                                            <h5 class="media-heading mb-0 text-bold-600">
                                                                Tiramisu cupcake
                                                            </h5>
                                                            <div class="media-notation mb-1">
                                                                7 Aug, 2018 at 10:48am
                                                            </div>
                                                            Brownie cotton candy topping chocolate cake danish drag??e
                                                            souffl?? jujubes powder. Toffee tart carrot
                                                            cake
                                                            donut. Macaroon apple pie sweet roll sweet toffee sweet. Pastry
                                                            powder croissant candy canes jelly
                                                            beans
                                                            macaroon macaroon donut. Jelly beans ice cream marshmallow.
                                                            Tiramisu cupcake pudding sesame snaps.
                                                            Jelly-o
                                                            caramels gummies candy canes apple pie chupa chups jelly
                                                            macaroon sweet roll.
                                                        </div>
                                                    </div>
                                                    <div class="media">
                                                        <span class="media-left">
                                                            <img alt="Generic placeholder image" class="media-object"
                                                                src="../../../app-assets/images/portrait/small/avatar-s-7.png"
                                                                width="64" height="64" />
                                                        </span>
                                                        <div class="media-body">
                                                            <h5 class="media-heading mb-0 text-bold-600">
                                                                Caramels marshmallow
                                                            </h5>
                                                            <div class="media-notation mb-1">
                                                                19 Jun, 2018 at 1:11pm
                                                            </div>
                                                            Jelly drag??e pie carrot cake caramels marshmallow. Wafer
                                                            croissant wafer cookie liquorice. Candy
                                                            canes
                                                            souffl??
                                                            brownie jelly macaroon wafer gummies cotton candy danish.
                                                            Souffl?? sweet carrot cake halvah liquorice
                                                            jujubes.
                                                            Sweet chocolate carrot cake. Liquorice donut biscuit souffl??.
                                                            Brownie sweet roll drag??e apple pie
                                                            souffl??
                                                            cheesecake. Biscuit jelly carrot cake danish pudding dessert
                                                            biscuit cake fruitcake. Jelly toffee
                                                            cotton
                                                            candy
                                                            lemon drops ice cream chocolate cake. Marzipan powder gummies.
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 class="my-1">
                                                    Leave Comment
                                                </h2>
                                                <form class="form">
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pr-name">
                                                                        Name
                                                                    </label>
                                                                    <input class="form-control" id="pr-name"
                                                                        name="name" placeholder="Name" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="pr-subject">
                                                                        Subject
                                                                    </label>
                                                                    <input class="form-control" id="pr-subject"
                                                                        name="lname" placeholder="Subject"
                                                                        type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="review-desc-comment">
                                                                Your Comment
                                                            </label>
                                                            <textarea class="form-control" id="review-desc-comment" name="comment" placeholder="Your Comment" rows="5"></textarea>
                                                        </div>
                                                        <button class="btn btn-info" type="submit">
                                                            <i class="la la-check">
                                                            </i>
                                                            Submit
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- END: Content-->
        @push('after-script')
            <script
                src="{{ asset('/assets/backsite/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}""></script>
            <script src="{{ asset('/assets/backsite/app-assets/vendors/js/ui/prism.min.js') }}""></script>
            <script src="{{ asset('/assets/backsite/app-assets/vendors/js/extensions/jquery.raty.js') }}""></script>
            <script src="{{ asset('/assets/backsite/app-assets/vendors/js/extensions/jquery.cookie.js') }}""></script>
            <script src="{{ asset('/assets/backsite/app-assets/vendors/js/extensions/jquery.treeview.js') }}""></script>
            <script src="{{ asset('/assets/backsite/app-assets/js/scripts/pages/ecommerce-product-details.js') }}""></script>
        @endpush
    @endsection
