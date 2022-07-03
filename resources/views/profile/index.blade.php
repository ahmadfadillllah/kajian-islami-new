@include('dashboard.master.head')
@include('dashboard.master.header')
@include('dashboard.master.main')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Profile</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Profile</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div id="user-profile">
                <!-- profile header -->
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-header mb-2">

                            <div class="position-relative">
                                <!-- profile picture -->
                                <div class="profile-img-container d-flex align-items-center">
                                    <div class="profile-img">
                                        <img src="https://virtualeducationacademy-my.sharepoint.com/personal/adhy_apsi_virtualeducationacademy_or_id/Documents/id-card.png" class="rounded img-fluid m-5" alt="Card image" width="70" />
                                    </div>
                                    <!-- profile title -->
                                    <div class="profile-title ms-3">
                                        <h2 class="text-white">{{ auth()->user()->name }}</h2>
                                        <p class="text-white">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                            </div>


                            @if (session('info'))
                            <script>
                                Swal.fire(
                                'Information',
                                '{{ session('info') }}',
                                'info'
                                )
                            </script>
                            @endif

                            <!-- add new card modal  -->
                <div class="modal fade" id="addNewCard" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-transparent">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                <h1 class="text-center mb-1" id="addNewCardTitle">Ganti Password</h1>
                                <p class="text-center">Jangan lupa untuk mengingat password anda</p>

                                <!-- form -->
                                <form class="row gy-1 gx-2 mt-75" action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label" for="modalAddCardNumber">Password lama</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password_lama" class="form-control add-credit-card-mask" type="password" placeholder="Masukkan password lama" aria-describedby="modalAddCard2" data-msg="Masukkan password lama" />
                                            <span class="input-group-text cursor-pointer p-25" id="modalAddCard2">
                                                <span class="add-card-type"></span>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label" for="modalAddCardNumber">Password baru</label>
                                        <div class="input-group input-group-merge">
                                            <input name="password_baru" class="form-control add-credit-card-mask" type="password" placeholder="Masukkan password baru" aria-describedby="modalAddCard2" data-msg="Masukkan password baru" />
                                            <span class="input-group-text cursor-pointer p-25" id="modalAddCard2">
                                                <span class="add-card-type"></span>
                                            </span>
                                        </div>
                                    </div>



                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                                            Cancel
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ add new card modal  -->

                            <!-- tabs pill -->
                            <div class="profile-header-nav">
                                <!-- navbar -->
                                <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                    <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <i data-feather="align-justify" class="font-medium-5"></i>
                                    </button>

                                    <!-- collapse  -->
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <div class="profile-tabs d-flex justify-content-between flex-wrap m-4">
                                            <!-- edit button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addNewCard">
                                                Ganti Password
                                            </button>
                                        </div>
                                    </div>
                                    <!--/ collapse  -->
                                </nav>
                                <!--/ navbar -->
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ profile header -->
    </div>
</div>
<!-- END: Content-->
<!-- BEGIN: Footer-->
@include('dashboard.master.footer')
<!-- END: Footer-->
