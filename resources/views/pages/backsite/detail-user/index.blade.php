@extends('layouts.app')
@section('title', 'Edit Profile')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content bg-dark">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body navbar-dark text-white">
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

                            <div class="tab-content px-1 pt-1">

                                <!-- users edit start -->
                                <section class="users-edit">


                                    <div class="tab-content">
                                        <div class="tab-pane active" id="account" aria-labelledby="account-tab"
                                            role="tabpanel">
                                            <h3 class="form-section text-white mb-1"><i class="ft-user"></i>
                                                Personal Info
                                                <span
                                                    class="badge bg-yellow text-dark mr-1 mb-1">{{ auth()->user()->detail_user->type_user->name }}</span>
                                            </h3>
                                            <!-- users edit media object start -->
                                            <form action="{{ route('backsite.detail_user.update', Auth::user()->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="media mb-2">
                                                    <a class="mr-2" href="#">
                                                        @if (isset(Auth::user()->detail_user->photo))
                                                            <img src="{{ asset('storage/' . auth()->user()->detail_user->photo) }}"
                                                                alt="users avatar"
                                                                class="img-preview users-avatar-shadow rounded-circle"
                                                                height="70px" width="70px">
                                                        @else
                                                            <img src="{{ asset('/assets/frontsite/images/authenticated-user.svg') }}"
                                                                alt="users avatar"
                                                                class="img-preview users-avatar-shadow rounded-circle"
                                                                height="64" width="64">
                                                        @endif
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading text-white">Photo</h4>
                                                        <div class="col-12 px-0 d-flex">
                                                            <input type="file" class="form-control-file" id="photo"
                                                                name="photo" onchange="previewImage()">
                                                        </div>
                                                    </div>



                                                </div>
                                                <!-- users edit media object ends -->
                                                <!-- users edit account form start -->

                                                {{-- <div class="media-body">
                                                <h4 class="media-heading">Avatar</h4>
                                                <div class="col-12 px-0 d-flex">
                                                    <input type="file" class="form-control-file" id="photo"
                                                        name="photo" onchange="previewImage()">
                                                </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            value="{{ Auth::user()->name }}" required
                                                            data-validation-required-message="This username field is required"
                                                            name="name" id="name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control" placeholder="Email"
                                                            value="{{ Auth::user()->email }}" required
                                                            data-validation-required-message="This email field is required"
                                                            name="email" id="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Age </label>
                                                        <input type="text" class="form-control" placeholder="Age"
                                                            value="{{ Auth::user()->detail_user->age }}" name="age"
                                                            id="age">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Contact</label>
                                                        <input type="text" class="form-control" placeholder="Contact"
                                                            value="{{ Auth::user()->detail_user->contact }}" name="contact"
                                                            id="contact">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Address </label>
                                                        <input type="text" class="form-control" placeholder="address"
                                                            value="{{ Auth::user()->detail_user->address }}" name="address"
                                                            id="address">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender">
                                                        <option
                                                            {{ Auth::user()->detail_user->gender == '1' ? 'selected' : '' }}
                                                            value="1">Laki-Laki
                                                        </option>
                                                        <option value="2"
                                                            {{ Auth::user()->detail_user->gender == '2' ? 'selected' : '' }}>
                                                            Perempuan
                                                        </option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                            <button type="submit"
                                                class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1 text-black">Save
                                                changes</button>
                                            <a href="{{ route('backsite.dashboard.index') }}" class="btn btn-warning "
                                                style>Cancel</a>
                                        </div>
                                    </div>
                                    </form>
                                    <!-- users edit account form ends -->

                                </section>
                                <!-- users edit ends -->
                            </div>
                        </div>

                        <!-- Basic badge Input end -->
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
