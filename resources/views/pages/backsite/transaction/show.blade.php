@extends('layouts.default')
@section('title', 'Transaksi Detail')
@section('content')
    @push('after-style')
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/backsite/app-assets/css/pages/invoice.css') }}">
    @endpush
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Rincian Transaksi</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Transaksi</a>
                                </li>

                                <li class="breadcrumb-item active">Rincian Transaksi
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <section class="card">
                    <div id="invoice-template" class="card-body p-4">
                        <!-- Invoice Company Details -->
                        <div id="invoice-company-details" class="row">
                            <div class="col-sm-6 col-12 text-center text-sm-left">
                                <div class="media row">
                                    <div class="col-12 col-sm-3 col-xl-2 ml-[-5]">
                                        <img src="{{ asset('../assets/image/hokkima.jpeg') }}" alt="company logo"
                                            class="mb-1 mb-sm-0" style="max-height: 130px" />
                                    </div>
                                    <div class="col-12 col-sm-9 col-xl-10">
                                        <div class="media-body">
                                            <ul class="ml-2 px-0 list-unstyled">
                                                <li class="text-bold-800">UMKM HOKKIMA</li>
                                                <li>Jalan Raya Tanjungkerta No. 00</li>
                                                <li>Desa Licin,</li>
                                                <li>Cimalaka,</li>
                                                <li>Sumedang 45353</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-12 text-center text-sm-right">
                                <h2>Transaksi Detail</h2>
                                <p class="">#{{ $transaction->invoice_number }}</p>
                                <p
                                    class="mb-sm-3 @if ($transaction->status == 'PENDING') btn btn-warning btn-sm
@else
btn-sm-primary @endif">
                                    {{ $transaction->status }}</p>
                                <ul class="px-0 list-unstyled">

                                </ul>
                            </div>
                        </div>
                        <!-- Invoice Company Details -->


                        <!-- Invoice Items Details -->
                        <div id="invoice-items-details" class="pt-2">
                            <div class="row">
                                <div class="table-responsive col-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th class="text-right">Jumlah</th>
                                                <th class="text-right">Harga</th>
                                                <th class="text-right">SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product as $tdp)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>
                                                        <p>{{ $tdp->nama }}</p>

                                                    </td>
                                                    <td class="text-right">{{ $tdp->pivot->quantity }}</td>
                                                    <td class="text-right">
                                                        {{ 'Rp. ' . number_format($tdp->pivot->price) ?? '' }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ 'Rp. ' . number_format($tdp->pivot->price * $tdp->pivot->quantity) ?? '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 col-12 text-center text-sm-left">
                                    <p class="lead">Metode Pembayaran: Transfer via {{ $transaction->metode_pembayaran }}
                                    </p>

                                </div>
                                <div class="col-sm-5 col-12">
                                    <p class="lead">Total Yang Harus Dibayar</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-right">{{ 'Rp. ' . number_format($total) ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ongkir</td>
                                                    <td class="text-right">{{ 'Rp. ' . number_format($ongkir) ?? '' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>3 Digit Unik</td>
                                                    <td class="text-right">
                                                        {{ 'Rp. ' . number_format($transaction->total_price - ($total + $ongkir)) ?? '' }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold-800">Total</td>
                                                    <td class="text-bold-800 text-right">
                                                        {{ 'Rp. ' . number_format($transaction->total_price) ?? '' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="text-center">
                                        <p class="mb-0 mt-1">Authorized person</p>
                                        <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature"
                                            class="height-100" />
                                        <h6>Amanda Orton</h6>
                                        <p class="text-muted">Managing Director</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>



                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
