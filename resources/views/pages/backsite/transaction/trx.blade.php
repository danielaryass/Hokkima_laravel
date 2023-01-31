@extends('layouts.default')
@section('title', 'Daftar Transaksi')
@section('content')
    @push('after-style')
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/backsite/app-assets/css/pages/invoice.css') }}">
    @endpush
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">List Transaksi</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Invoice</a>
                                </li>
                                <li class="breadcrumb-item active">List Transaksi
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-head">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Transaksi Semua</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>

                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Invoices List table -->
                                    <div class="table-responsive">
                                        <table id="invoices-list"
                                            class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle default-table">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Invoice #</th>
                                                    <th>Nama Pembeli</th>
                                                    <th>No Hp</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Alamat</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- PAID -->
                                                @foreach ($transaction as $tsn)
                                                    <tr>
                                                        <td>{{ $tsn->created_at->format('d-M-Y') }}</td>
                                                        <td><a href="{{ route('backsite.transaction.show', $tsn->invoice_number) }}"
                                                                class="text-bold-600">{{ $tsn->invoice_number }}</a></td>
                                                        <td>{{ $tsn->nama_pembeli }}</td>
                                                        <td>{{ $tsn->no_hp }}</td>
                                                        <td><span
                                                                class="badge badge-lg @if ($tsn->status == 'PENDING') badge-warning @elseif($tsn->status == 'SUCCESS') badge-success @else badge-danger @endif">{{ $tsn->status }}</span>
                                                        </td>
                                                        <td>{{ 'Rp. ' . number_format($tsn->total_price) ?? '' }}</td>
                                                        <td>{{ $tsn->alamat_pengiriman }}</td>
                                                        <td>
                                                            <span class="dropdown">
                                                                <button id="btnSearchDrop2" type="button"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="true"
                                                                    class="btn btn-primary dropdown-toggle dropdown-menu-right"><i
                                                                        class="ft-settings"></i></button>
                                                                <span aria-labelledby="btnSearchDrop2"
                                                                    class="dropdown-menu mt-1 dropdown-menu-right">
                                                                    <a href="{{ route('backsite.transaction.edit', $tsn->invoice_number) }}"
                                                                        class="dropdown-item"><i class="la la-pencil"></i>
                                                                        Edit Transaksi</a>
                                                                    <a href="https://api.whatsapp.com/send?phone={{ str_replace('08', '628', $tsn->no_hp) }}&text=Halo, Barang sudah dikirim oleh kurir kita, mohon ditunggu dan akan dihubungi oleh kurir apabila sudah dekat. Terima kasih sudah belanja di UMKM HOKKIMA"
                                                                        class="dropdown-item" target="_blank"><i
                                                                            class="la la-check"></i> Whatsapp Pembeli</a>

                                                                </span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach




                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Invoice #</th>
                                                    <th>Order No</th>
                                                    <th>Customer Name</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Alamat</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <!--/ Invoices table -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->
    @push('after-script')
        <script>
            $('.default-table').DataTable({
                "order": [],
                "paging": true,
                "lengthMenu": [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "All"]
                ],
                "pageLength": 10
            });

            $(function() {
                $(":input").inputmask();
            });
        </script>
    @endpush
@endsection
