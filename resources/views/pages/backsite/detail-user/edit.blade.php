@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content bg-dark">
        <div class="content-overlay"></div>
        <div class="content-wrapper d-flex justify-content-center">
            <div class="content-header row ">

                <div class="content-body col-sm-8 ">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body navbar-dark text-white ">
                                <!-- Basic tabs start -->
                                <section id="basic-tabs-components">
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
                                    <h3 class="form-section text-white mb-1"><i class="ft-user"></i>
                                        Change Password</h3>
                                    <form action="{{ route('backsite.update-password', Auth::user()->id) }}" method="POST"
                                        enctype="multipart/form-data">

                                        @csrf
                                        @method('PUT')
                                        <div class="row ">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Current Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="Current Password" required
                                                            data-validation-required-message="This username field is required"
                                                            name="current_password" id="current_password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>New Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="New Password" required
                                                            data-validation-required-message="This username field is required"
                                                            name="new_password" id="new_password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Confirmation Password</label>
                                                        <input type="password" class="form-control"
                                                            placeholder="New Password" required
                                                            data-validation-required-message="This username field is required"
                                                            name="confirmation_password" id="confirmation_password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit"
                                                    class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 text-black">Change
                                                    Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                                <!-- Basic badge Input end -->
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- END: Content-->
@endsection
@push('before-script')
    <script>
        function previewImage() {

            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');


            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush
