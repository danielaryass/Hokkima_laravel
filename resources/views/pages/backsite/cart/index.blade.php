  @extends('layouts.app')
  @section('title', 'Keranjang Belanja')
  @section('content')
      @push('after-style')
          <link rel="stylesheet" type="text/css" href="{{ asset('/assets/backsite/app-assets/css/pages/ecommerce-shop.css') }}">
          <link rel="stylesheet" type="text/css"
              href="{{ asset('/assets/backsite/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
          <link rel="stylesheet" type="text/css"
              href="{{ asset('/assets/backsite/app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css') }}"">
          <link rel="stylesheet" type="text/css" href="{{ asset('/assets/backsite/app-assets/css/pages/ecommerce-cart.css') }}">
      @endpush
      <!-- BEGIN: Content-->
      <div class="app-content content">
          <div class="content-overlay"></div>
          <div class="content-wrapper">
              <div class="content-header row">
                  <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block">Keranjang Belanja</h3>
                      <div class="row breadcrumbs-top d-inline-block">
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="{{ route('backsite.product.index') }}">Home</a>
                                  </li>
                                  <li class="breadcrumb-item active">Keranjang Belanja
                                  </li>
                              </ol>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="content-body">
                  <div class="shopping-cart">
                      <ul class="nav nav-tabs nav-justified">
                          <li class="nav-item">
                              <a class="nav-link active" id="shopping-cart" data-toggle="tab" aria-controls="shop-cart-tab"
                                  href="#shop-cart-tab" aria-expanded="true">Keranjang Belanja</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="checkout" data-toggle="tab" aria-controls="checkout-tab"
                                  href="#checkout-tab" aria-expanded="false">Checkout</a>
                          </li>

                      </ul>
                      <div class="tab-content pt-1">
                          <div role="tabpanel" class="tab-pane active" id="shop-cart-tab" aria-expanded="true"
                              aria-labelledby="shopping-cart">
                              <div class="card">
                                  <div class="card-content">
                                      <div class="card-body">
                                          <div class="table-responsive">
                                              <table class="table table-borderless mb-0">
                                                  <thead>
                                                      <tr>
                                                          <th>Foto Produk</th>
                                                          <th>Nama</th>
                                                          <th>Jumlah</th>
                                                          <th>Total</th>
                                                          <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      @forelse($cartItems as $cart)
                                                          <tr>
                                                              <td>
                                                                  <div class=" d-flex align-items-center">
                                                                      <img class="img-fluid" style="max-width: 200px"
                                                                          src="{{ url(Storage::url($cart->attributes->image)) }}"
                                                                          alt="{{ url(Storage::url($cart->image)) }}">
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="product-title">{{ $cart->name }}</div>
                                                              </td>
                                                              <td>
                                                                  <div class="input-group " style="max-width: 300px">
                                                                      <input disabled class="text-center count "
                                                                          value="{{ $cart->quantity }}" />
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <div class="total-price">
                                                                      {{ 'Rp. ' . number_format($cart->quantity * $cart->price) ?? '' }}
                                                                  </div>
                                                              </td>
                                                              <td>
                                                                  <form action="{{ route('backsite.cart.remove') }}"
                                                                      method="POST">
                                                                      @csrf
                                                                      <input type="hidden" value="{{ $cart->id }}"
                                                                          name="id">
                                                                      <button
                                                                          class="px-4 py-2 text-white bg-dark shadow rounded-full"><i
                                                                              class="ft-trash-2"></i></button>
                                                                  </form>
                                                              </td>
                                                          </tr>
                                                      @empty
                                                      @endforelse

                                                  </tbody>
                                              </table>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row match-height">
                                  <div class="col-lg-6 col-md-12">
                                      <div class="card">
                                          <div class="card-header">
                                              <h4 class="card-title">Nomor Rekening Pembayaran</h4>
                                          </div>
                                          <div class="card-content">
                                              <div class="card-body">
                                                  <div class="d-flex justify " style="align-items: center;">
                                                      <img style="max-width: 25%; max-height:70px"
                                                          src="{{ asset('/assets/image/bca.jpg') }}" alt="BCA">
                                                      <p class="justify-content-center "
                                                          style="font-size: 15px; text-align:center; max-width:50%; margin-top:15px; margin-left:10px">
                                                          7749123021931 A/N UMKM HOKKIMA
                                                      </p>
                                                  </div>
                                                  <br>
                                                  <div class="d-flex justify " style="align-items: center;">
                                                      <img style="max-width: 25%; max-height:70px"
                                                          src="{{ asset('/assets/image/bri.png') }}" alt="bri">
                                                      <p class="justify-content-center "
                                                          style="font-size: 15px; text-align:center; max-width:50%; margin-top:15px; margin-left:10px">
                                                          1122-333-1222-333 A/N UMKM HOKKIMA
                                                      </p>
                                                  </div>
                                                  <div class="d-flex justify " style="align-items: center;">
                                                      <img style="max-width: 25%; "
                                                          src="{{ asset('/assets/image/gopay.jpg') }}" alt="gopay">
                                                      <p class="justify-content-center "
                                                          style="font-size: 15px; text-align:center; max-width:50%; margin-top:15px; margin-left:10px">
                                                          085123321123 A/N UMKM HOKKIMA
                                                      </p>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6 col-md-12">
                                      <div class="card">
                                          <div class="card-header">
                                              <h4 class="card-title">Price Details</h4>
                                          </div>
                                          <div class="card-content">
                                              <div class="card-body">
                                                  <div class="price-detail">Harga {{ $total_barang }} Produk <span
                                                          class="float-right">
                                                          {{ 'Rp. ' . number_format(Cart::getTotal()) ?? '' }}</span></div>
                                                  <div class="price-detail">Ongkir <span
                                                          class="float-right">{{ 'Rp. ' . number_format($ongkir) ?? '' }}</span>
                                                  </div>
                                                  <hr>
                                                  <div class="price-detail">Jumlah yang harus dibayar <span
                                                          class="float-right">{{ 'Rp. ' . number_format($subtotal) ?? '' }}</span>
                                                  </div>
                                                  <div class="price-detail">
                                                      Tolong samakan 3 digit terakhir agar transaksi cepat diproses
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="card">
                                          <div class="card-content">
                                              <div class="card-body">
                                                  <div class="text-right">
                                                      <a href="{{ route('backsite.product.index') }}"
                                                          class="btn btn-info mr-2">Lanjut Belanja
                                                      </a>
                                                      <button id="place-order-button" class="btn btn-warning"
                                                          aria-controls="checkout-tab">Checkout
                                                      </button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="tab-pane" id="checkout-tab" aria-labelledby="checkout">
                              <div class="row">
                                  <div class="col-md-4 order-md-2 mb-4">
                                      <div class="card">
                                          <div class="card-header mb-3">
                                              <h4 class="card-title">Keranjangmu {{ Cart::getTotalQuantity() }} Produk
                                              </h4>
                                          </div>
                                          <div class="card-content">
                                              <ul class="list-group mb-3">
                                                  @forelse($cartItems as $cart)
                                                      <li
                                                          class="list-group-item d-flex justify-content-between lh-condensed">
                                                          <div>

                                                              <h6 class="my-0">{{ $cart->name }} x
                                                                  {{ $cart->quantity }}</h6>

                                                          </div>
                                                          <span
                                                              class="text-muted">{{ 'Rp. ' . number_format($cart->price * $cart->quantity) ?? '' }}</span>

                                                      </li>
                                                  @empty
                                                      Barang Masih kosong
                                                  @endforelse

                                                  <li class="list-group-item d-flex justify-content-between">
                                                      <span class="product-name">Ongkir</span>
                                                      <span
                                                          class="product-price">{{ 'Rp. ' . number_format($ongkir) ?? '' }}</span>
                                                  </li>

                                                  <li class="list-group-item d-flex justify-content-between">
                                                      <span class="product-name success"> <strong>Total</strong></span>
                                                      <span
                                                          class="product-price">{{ 'Rp. ' . number_format($subtotal) ?? '' }}</span>
                                                  </li>
                                              </ul>
                                          </div>
                                      </div>

                                      <div class="card pl-2 pt-2">
                                          <div class="card-header">
                                              <h4 class="card-title">Nomor Rekening Pembayaran</h4>
                                          </div>
                                          <div class="input-group ml-2 pb-2">
                                              <div class="d-flex justify " style="align-items: center;">
                                                  <img style="max-width: 25%; max-height:70px"
                                                      src="{{ asset('/assets/image/bca.jpg') }}" alt="BCA">
                                                  <p class="justify-content-center "
                                                      style="font-size: 15px; text-align:center; max-width:50%; margin-top:15px; margin-left:10px">
                                                      7749123021931 A/N UMKM HOKKIMA
                                                  </p>
                                              </div>
                                              <br>
                                              <div class="d-flex justify " style="align-items: center;">
                                                  <img style="max-width: 25%; max-height:70px"
                                                      src="{{ asset('/assets/image/bri.png') }}" alt="bri">
                                                  <p class="justify-content-center "
                                                      style="font-size: 15px; text-align:center; max-width:50%; margin-top:15px; margin-left:10px">
                                                      1122-333-1222-333 A/N UMKM HOKKIMA
                                                  </p>
                                              </div>
                                              <div class="d-flex justify " style="align-items: center;">
                                                  <img style="max-width: 25%; "
                                                      src="{{ asset('/assets/image/gopay.jpg') }}" alt="gopay">
                                                  <p class="justify-content-center "
                                                      style="font-size: 15px; text-align:center; max-width:50%; margin-top:15px; margin-left:10px">
                                                      085123321123 A/N UMKM HOKKIMA
                                                  </p>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-8 order-md-1">
                                      <div class="card">
                                          <div class="card-header">
                                              <h4 class="card-title">Alamat Pesanan</h4>
                                          </div>
                                          <div class="card-content">
                                              <div class="card-body">
                                                  <form action="{{ route('backsite.transaction.store') }}" method="POST"
                                                      enctype="multipart/form-data">
                                                      @csrf
                                                      <div class="row">
                                                          <div class="col-md-12 mb-3">
                                                              <label for="nama_pembeli">Nama Lengkap</label>
                                                              <input type="text" class="form-control"
                                                                  id="nama_pembeli" placeholder=""
                                                                  value="{{ Auth::user()->name }}" required=""
                                                                  name="nama_pembeli">
                                                              <div class="invalid-feedback">
                                                                  Nama Lengkap Harus di isi.
                                                              </div>
                                                          </div>

                                                      </div>

                                                      <div class="mb-3">
                                                          <label for="alamat_pengiriman">Alamat</label>
                                                          <input type="alamat_pengiriman" class="form-control"
                                                              id="alamat_pengiriman" placeholder="Alamat Pengiriman"
                                                              value="{{ Auth::user()->detail_user->address }}"
                                                              name="alamat_pengiriman">
                                                          <div class="invalid-feedback">
                                                              Masukan alamat dengan benar.
                                                          </div>
                                                      </div>

                                                      <div class="mb-3">
                                                          <label for="no_hp">Nomor Telepon</label>
                                                          <input type="text" class="form-control" id="no_hp"
                                                              placeholder="085123123123" required="true" name="no_hp"
                                                              value="{{ Auth::user()->detail_user->contact }}">
                                                          <div class="invalid-feedback">
                                                              Masukan nomor telepon anda.
                                                          </div>
                                                      </div>

                                                      <div class="mb-3">
                                                          <input type="hidden" class="form-control" id="total_harga"
                                                              placeholder="" required="true" name="total_price"
                                                              value="{{ $subtotal }}">
                                                      </div>



                                                      <h4 class="mb-1">Metode Pembayaran Transfer Via:</h4>

                                                      <div class="d-block my-2">
                                                          <div class="custom-control custom-radio">
                                                              <input id="BRI" name="metode_pembayaran"
                                                                  type="radio" class="custom-control-input"
                                                                  checked="" required="" value="BRI">
                                                              <label class="custom-control-label"
                                                                  for="BRI">BRI</label>
                                                          </div>
                                                          <div class="custom-control custom-radio">
                                                              <input id="BCA" name="metode_pembayaran"
                                                                  type="radio" class="custom-control-input"
                                                                  required="" value="BCA">
                                                              <label class="custom-control-label"
                                                                  for="BCA">BCA</label>
                                                          </div>
                                                          <div class="custom-control custom-radio">
                                                              <input id="GOPAY" name="metode_pembayaran"
                                                                  type="radio" class="custom-control-input"
                                                                  required="" value="GOPAY">
                                                              <label class="custom-control-label"
                                                                  for="GOPAY">GOPAY</label>
                                                          </div>
                                                      </div>
                                                      <button class="btn btn-info btn-lg" type="submit">Lanjutkan
                                                          Pembayaran</button>
                                                  </form>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          {{-- <div class="tab-pane" id="comp-order-tab" aria-labelledby="complete-order">
                              <div class="card">
                                  <div class="card-header">
                                      <h4 class="card-title text-center">Thank you. Your order has been processed.</h4>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-content">
                                      <div class="card-body">
                                          <div class="d-flex justify-content-around lh-condensed">
                                              <div class="order-details text-center">
                                                  <div class="order-title">Order Number</div>
                                                  <div class="order-info">#CV45632</div>
                                              </div>
                                              <div class="order-details text-center">
                                                  <div class="order-title">Date</div>
                                                  <div class="order-info">10<sup>th</sup> Oct, 2018</div>
                                              </div>
                                              <div class="order-details text-center">
                                                  <div class="order-title">Amount Paid</div>
                                                  <div class="order-info">$2550</div>
                                              </div>
                                              <div class="order-details text-center">
                                                  <div class="order-title">Payment Method</div>
                                                  <div class="order-info">Credit Card</div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="card">
                                  <div class="card-header">
                                      <h4 class="mb-0"><strong>My Orders</strong></h4>
                                  </div>
                              </div>
                              <div class="card pull-up">
                                  <div class="card-header">
                                      <div class="float-left">
                                          <a href="#" class="btn btn-info">#CV45632</a>
                                      </div>
                                      <div class="float-right">
                                          <a href="#" class="btn btn-outline-info mr-1"><i
                                                  class="la la-question"></i>
                                              Need Help</a>
                                          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i>
                                              Track</a>
                                      </div>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body py-0">
                                          <div class="d-flex justify-content-between lh-condensed">
                                              <div class="order-details text-center">
                                                  <div class="product-img d-flex align-items-center">
                                                      <img class="img-fluid"
                                                          src="../../../app-assets/images/elements/fitbit-watch.png"
                                                          alt="Card image cap">
                                                  </div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Fitbit Alta HR Special Edition x 1</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                              <div class="order-details">
                                                  <div class="order-info">$250</div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Delivered on Sun, Oct 15th 2018</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                      <span class="float-left">
                                          <span class="text-muted">Ordered On</span>
                                          <strong>Wed, Oct 3rd 2018</strong>
                                      </span>
                                      <span class="float-right">
                                          <span class="text-muted">Ordered Amount</span>
                                          <strong>$250</strong>
                                      </span>
                                  </div>
                              </div>
                              <div class="card pull-up">
                                  <div class="card-header">
                                      <div class="float-left">
                                          <a href="#" class="btn btn-info">#CV65472</a>
                                      </div>
                                      <div class="float-right">
                                          <a href="#" class="btn btn-outline-info mr-1"><i
                                                  class="la la-question"></i>
                                              Need Help</a>
                                          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i>
                                              Track</a>
                                      </div>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body py-0">
                                          <div class="d-flex justify-content-between lh-condensed">
                                              <div class="order-details text-center">
                                                  <div class="product-img d-flex align-items-center">
                                                      <img class="img-fluid"
                                                          src="../../../app-assets/images/elements/13.png"
                                                          alt="Card image cap">
                                                  </div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Mackbook pro 19'' x 1</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                              <div class="order-details">
                                                  <div class="order-info">$1150</div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Delivered on Mon, Oct 16th 2018</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                      <span class="float-left">
                                          <span class="text-muted">Ordered On</span>
                                          <strong>Wed, Oct 3rd 2018</strong>
                                      </span>
                                      <span class="float-right">
                                          <span class="text-muted">Ordered Amount</span>
                                          <strong>$1150</strong>
                                      </span>
                                  </div>
                              </div>
                              <div class="card pull-up">
                                  <div class="card-header">
                                      <div class="float-left">
                                          <a href="#" class="btn btn-info">#CV78645</a>
                                      </div>
                                      <div class="float-right">
                                          <a href="#" class="btn btn-outline-info mr-1"><i
                                                  class="la la-question"></i>
                                              Need Help</a>
                                          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i>
                                              Track</a>
                                      </div>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body py-0">
                                          <div class="d-flex justify-content-between lh-condensed">
                                              <div class="order-details text-center">
                                                  <div class="product-img d-flex align-items-center">
                                                      <img class="img-fluid"
                                                          src="../../../app-assets/images/elements/vr.png"
                                                          alt="Card image cap">
                                                  </div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">VR Headset x 2</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                              <div class="order-details">
                                                  <div class="order-info">$700</div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Delivered on Tue, Oct 17th 2018</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                      <span class="float-left">
                                          <span class="text-muted">Ordered On</span>
                                          <strong>Wed, Oct 3rd 2018</strong>
                                      </span>
                                      <span class="float-right">
                                          <span class="text-muted">Ordered Amount</span>
                                          <strong>$700</strong>
                                      </span>
                                  </div>
                              </div>
                              <div class="card pull-up">
                                  <div class="card-header">
                                      <div class="float-left">
                                          <a href="#" class="btn btn-info">#CV84123</a>
                                      </div>
                                      <div class="float-right">
                                          <a href="#" class="btn btn-outline-info mr-1"><i
                                                  class="la la-question"></i>
                                              Need Help</a>
                                          <a href="#" class="btn btn-outline-info"><i class="la la-map-marker"></i>
                                              Track</a>
                                      </div>
                                  </div>
                                  <div class="card-content">
                                      <div class="card-body py-0">
                                          <div class="d-flex justify-content-between lh-condensed">
                                              <div class="order-details text-center">
                                                  <div class="product-img d-flex align-items-center">
                                                      <img class="img-fluid"
                                                          src="../../../app-assets/images/carousel/25.jpg"
                                                          alt="Card image cap">
                                                  </div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Smart Watch with LED x 1</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                              <div class="order-details">
                                                  <div class="order-info">$700</div>
                                              </div>
                                              <div class="order-details">
                                                  <h6 class="my-0">Delivered on Wed, Oct 18th 2018</h6>
                                                  <small class="text-muted">Brief description</small>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                      <span class="float-left">
                                          <span class="text-muted">Ordered On</span>
                                          <strong>Wed, Oct 3rd 2018</strong>
                                      </span>
                                      <span class="float-right">
                                          <span class="text-muted">Ordered Amount</span>
                                          <strong>$700</strong>
                                      </span>
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
          <script>
              // create the place order button to change tab to checkout-tab
              var placeOrderButton = document.getElementById('place-order-button');
              placeOrderButton.addEventListener('click', function() {
                  document.getElementById('shopping-cart').setAttribute('class', 'nav-link deactived');
                  document.getElementById('shopping-cart').setAttribute('aria-expanded', 'false');
                  document.getElementById('shop-cart-tab').setAttribute('class', 'tab-pane');
                  document.getElementById('checkout').setAttribute('aria-expanded', 'true');
                  document.getElementById('checkout-tab').setAttribute('class', 'tab-pane active');
                  document.getElementById('checkout').setAttribute('class', 'nav-link active');

              });
          </script>
          <script
              src="{{ asset('/assets/backsite/app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js') }}""></script>
          <script src="{{ asset('/assets/backsite/app-assets/vendors/js/ui/prism.min.js') }}""></script>
          <script src="{{ asset('/assets/backsite/app-assets/vendors/js/extensions/jquery.raty.js') }}""></script>
          <script src="{{ asset('/assets/backsite/app-assets/vendors/js/extensions/jquery.cookie.js') }}""></script>
          <script src="{{ asset('/assets/backsite/app-assets/vendors/js/extensions/jquery.treeview.js') }}""></script>
          <script src="{{ asset('/assets/backsite/app-assets/js/scripts/pages/ecommerce-product-details.js') }}""></script>
      @endpush
  @endsection
