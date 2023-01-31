@extends('layouts.app')
@section('title', 'Distributor')
@section('content')
    @push('after-style')
        <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
        <style>
            .ck-editor__editable {
                min-height: 300px;
                margin-bottom: 10px;
            }
        </style>
    @endpush

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

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

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Produk</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Produk</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add card --}}


            {{-- table card --}}
            @can('distributor_access')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Produk List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <table
                                                    class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Tipe Produk</th>
                                                            <th>Harga</th>
                                                            <th>Stok Barang</th>
                                                            <th>Photo</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($product as $key => $product_item)
                                                            <tr>
                                                                <td>{{ $product_item->nama ?? '' }}</td>
                                                                <td>{{ $product_item->tipe ?? '' }}</td>
                                                                <td>{{ 'IDR ' . number_format($product_item->harga) ?? '' }}
                                                                </td>
                                                                <td>{{ $product_item->qty ?? '' }}</td>
                                                                <td><a data-fancybox="gallery"
                                                                        data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $product_item->photo }}"
                                                                        class="blue accent-4">Show</a></td>
                                                                <td class="text-center">
                                                                    <div class="btn-group mr-1 mb-1">
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm dropdown-toggle"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu">


                                                                            @can('distributor_access')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('backsite.distributor.edit', $product_item->id) }}">
                                                                                    Tambah Stok Produk
                                                                                </a>
                                                                            @endcan


                                                                        </div>
                                                                    </div>
                                                            </tr>
                                                        @empty
                                                        @endforelse
                                                        {{--  
                                                        @forelse($doctor as $key => $doctor_item)
                                                            <tr data-entry-id="{{ $doctor_item->id }}">
                                                                <td>{{ isset($doctor_item->created_at) ? date('d/m/Y H:i:s', strtotime($doctor_item->created_at)) : '' }}
                                                                </td>
                                                                <td>{{ $doctor_item->user->name ?? '' }}</td>
                                                                <td>{{ $doctor_item->specialist->name ?? '' }}</td>
                                                                <td>{{ $doctor_item->name ?? '' }}</td>
                                                                <td>{{ 'IDR ' . number_format($doctor_item->fee) ?? '' }}</td>
                                                                <td><a data-fancybox="gallery"
                                                                        data-src="{{ request()->getSchemeAndHttpHost() . '/storage' . '/' . $doctor_item->photo }}"
                                                                        class="blue accent-4">Show</a></td>
                                                                <td class="text-center">

                                                                    <div class="btn-group mr-1 mb-1">
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm dropdown-toggle"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu">

                                                                            @can('doctor_show')
                                                                                <a href="#mymodal"
                                                                                    data-remote="{{ route('backsite.doctor.show', $doctor_item->id) }}"
                                                                                    data-toggle="modal" data-target="#mymodal"
                                                                                    data-title="Doctor Detail"
                                                                                    class="dropdown-item">
                                                                                    Show
                                                                                </a>
                                                                            @endcan

                                                                            @can('doctor_edit')
                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('backsite.doctor.edit', $doctor_item->id) }}">
                                                                                    Edit
                                                                                </a>
                                                                            @endcan

                                                                            @can('doctor_delete')
                                                                                <form
                                                                                    action="{{ route('backsite.doctor.destroy', $doctor_item->id) }}"
                                                                                    method="POST"
                                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                                    <input type="hidden" name="_method"
                                                                                        value="DELETE">
                                                                                    <input type="hidden" name="_token"
                                                                                        value="{{ csrf_token() }}">
                                                                                    <input type="submit" class="dropdown-item"
                                                                                        value="Delete">
                                                                                </form>
                                                                            @endcan

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        {{-- @endforelse --}}
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>Tipe Produk</th>
                                                            <th>Harga</th>
                                                            <th>Stok Barang</th>
                                                            <th>Photo</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

        </div>
    </div>
    <!-- END: Content-->



    @push('after-style')
        <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css') }}">

        <style>
            .label {
                cursor: pointer;
            }

            .img-container img {
                max-width: 100%;
            }
        </style>
    @endpush

    @push('after-script')
        <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

        <script>
            ClassicEditor
                .create(document.querySelector('#ckeditor5'), {
                    licenseKey: '',
                    toolbar: {
                        items: [
                            'heading', '|',
                            'alignment', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'link', '|',
                            'bulletedList', 'numberedList', 'todoList',
                            '-', // break point
                            'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                            'code', 'codeBlock', '|',
                            'insertTable', '|',
                            'outdent', 'indent', '|',
                            'blockQuote', '|',
                            'undo', 'redo'
                        ],
                    }
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(error => {
                    console.error('Oops, something went wrong!');
                    console.error(
                        'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:'
                    );
                    console.warn('Build id: t94173qfk3d4-jfha1cexgplv');
                    console.error(error);
                });
        </script>

        {{-- inputmask --}}
        <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
        <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
        <script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

        <script src="{{ url('https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js') }}" type="text/javascript">
        </script>

        <script>
            jQuery(document).ready(function($) {
                $('#mymodal').on('show.bs.modal', function(e) {
                    var button = $(e.relatedTarget);
                    var modal = $(this);

                    modal.find('.modal-body').load(button.data("remote"));
                    modal.find('.modal-title').html(button.data("title"));
                });

                $('.select-all').click(function() {
                    let $select2 = $(this).parent().siblings('.select2-full-bg')
                    $select2.find('option').prop('selected', 'selected')
                    $select2.trigger('change')
                })

                $('.deselect-all').click(function() {
                    let $select2 = $(this).parent().siblings('.select2-full-bg')
                    $select2.find('option').prop('selected', '')
                    $select2.trigger('change')
                })
            });

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

            // fancybox
            Fancybox.bind('[data-fancybox="gallery"]', {
                infinite: false
            });
        </script>

        <div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <i class="fa fa-spinner fa spin"></i>
                    </div>
                </div>
            </div>
        </div>
    @endpush
@endsection
