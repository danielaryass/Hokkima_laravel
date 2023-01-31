@extends('layouts.app')
@section('title', 'Produk')
@section('content')

    @push('after-style')
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/backsite/app-assets/css/pages/ecommerce-shop.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('/assets/backsite/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
    @endpush
    {{-- error --}}
    @if ($errors->any())
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Shops</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Shop
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-detached ">
                <div class="content-body">
                    <div class="product-shop">
                        <div class="card">
                            <div class="card-body">
                                <span class="shop-title">Produk</span>
                                <span class="float-right">
                                    <span class="result-text mr-1"> Semua Produk</span>

                                </span>
                            </div>
                        </div>
                        <div class="row match-height">
                            @forelse($product as $key => $product_item)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="card pull-up">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <a href="backsite.product.show">
                                                    <div class="product-img d-flex align-items-center">
                                                        <div class="badge badge-success round">{{ $product_item->tipe }}
                                                        </div>
                                                        <img class="img-fluid mb-1"
                                                            style="width: 100%;height:300px; object-fit: cover;"
                                                            src="{{ url(Storage::url($product_item->photo)) }}"
                                                            alt="Card
                                                        image cap">
                                                    </div>
                                                    <h4 class="product-title">{{ $product_item->nama }}</h4>
                                                    <div class="price-reviews">
                                                        <span class="price-box">
                                                            <span
                                                                class="price">{{ 'Rp. ' . number_format($product_item->harga) ?? '' }}</span>
                                                        </span>
                                                        <span class="ratings float-right"></span>
                                                        <br>
                                                        <p class="price">Stok: {{ $product_item->qty }}</p>

                                                    </div>
                                                    <div class="d-flex justify-content-center text-white">
                                                        <a href="{{ route('backsite.product.show', $product_item->id) }}"
                                                            type="button"
                                                            class="btn btn-dark btn-min-width mr-1 mb-1">Lihat
                                                            Produk</a>
                                                        <form action="{{ route('backsite.cart.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" value="{{ $product_item->id }}"
                                                                name="id">
                                                            <input type="hidden" value="{{ $product_item->nama }}"
                                                                name="name">
                                                            <input type="hidden" value="{{ $product_item->harga }}"
                                                                name="price">
                                                            <input type="hidden" value="{{ $product_item->photo }}"
                                                                name="image">
                                                            <input type="hidden" value="1" name="quantity">
                                                            <button type="submit"
                                                                class="btn btn-secondary btn-min-width mr-1 mb-1">Masukan
                                                                Keranjang</button>
                                                        </form>

                                                    </div>
                                                </a>
                                                {{-- <div class="product-action d-flex justify-content-center">
                                                    <button type="button"
                                                        class="btn btn-dark btn-min-width mr-1 mb-1">Lihat Barang</button>

                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- END: Content-->
@endsection
