@extends('layouts.default')
@section('title', 'Dashboard')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- show error --}}
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

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Dashboard</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Activity</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- eCommerce statistic -->
            <div class="row">
                @foreach ($type_user as $key => $type_user_item)
                    <div class="col-xl-3 col-lg-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{ $type_user_item->detail_user_count }}</h3>
                                            <h6>{{ $type_user_item->name }}</h6>
                                        </div>
                                        <div>
                                            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!--/ eCommerce statistic -->
            <!-- Recent Transactions -->
            <div class="row">
                <div id="recent-transactions" class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Recent Transactions</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                                            href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table id="recent-orders" class="table table-hover table-xl mb-0">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Nomor Transaksi</th>
                                            <th class="border-top-0">Nama Customer</th>
                                            <th class="border-top-0">Metode Pembayaran</th>
                                            <th class="border-top-0">No Hp</th>
                                            <th class="border-top-0">Total Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($transaction as $key => $transaction_item)
                                            <tr>
                                                <td class="text-truncate ">
                                                    <p
                                                        class="@if ($transaction_item->status == 'PENDING') text-primary
@elseif($transaction_item->status == 'SUCCESS')
                                                    text-success @else($transaction_item->status=="FAILED")
                                                        text-danger @endif">
                                                        {{ $transaction_item->status }}</p>
                                                </td>
                                                <td class="text-truncate"><a
                                                        href="{{ route('backsite.transaction.show', $transaction_item->invoice_number) }}">{{ $transaction_item->invoice_number }}</a>
                                                </td>
                                                <td class="text-truncate">
                                                    <span>{{ $transaction_item->nama_pembeli }}</span>

                                                </td>

                                                <td>
                                                    <div class="btn btn-sm btn-primary text-white">Transfer Via :
                                                        {{ $transaction_item->metode_pembayaran }}</d>
                                                </td>
                                                <td class="text-truncate p-1">
                                                    <a href="https://api.whatsapp.com/send?phone={{ str_replace('08', '628', $transaction_item->no_hp) }}&text=Halo, Barang sudah dikirim oleh kurir kita, mohon ditunggu dan akan dihubungi oleh kurir apabila sudah dekat. Terima kasih sudah belanja di UMKM HOKKIMA"
                                                        target="_blank">{{ $transaction_item->no_hp }}</a>
                                                </td>
                                                <td class="text-truncate">
                                                    {{ 'Rp. ' . number_format($transaction_item->total_price) ?? '' }}</td>
                                            </tr>
                                        @empty
                                            Tidak ada transaksi bulan ini
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Recent Transactions -->
        </div>
    </div>
    <!-- END: Content-->

@endsection
