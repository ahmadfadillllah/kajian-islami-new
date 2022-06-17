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
                        <h2 class="content-header-title float-start mb-0">Saran dan Masukan</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">Saran dan Masukan
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Card Actions Section -->
            <section id="card-actions">
                <!-- Info table about actions -->
                @foreach ($saran as $item)
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li>
                                            <a data-action="collapse"><i data-feather="chevron-down"></i></a>
                                        </li>
                                        <li>
                                            <a data-action="reload"><i data-feather="rotate-cw"></i></a>
                                        </li>
                                        <li>
                                            <a data-action="close"><i data-feather="x"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Field</th>
                                                            <th>Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                            <tr>
                                                                <td>Nama</td>
                                                                <td>{{ $item->name }}</td>

                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td>{{ $item->email }}</td>

                                                            </tr>
                                                            <tr>
                                                                <td>Subject</td>
                                                                <td>{{ $item->subject }}</td>

                                                            </tr>
                                                            <tr>
                                                                <td>Pesan</td>
                                                                <td>{{ $item->message }}</td>

                                                            </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--/ Info table about actions -->
            </section>
            <!--/ Card Actions Section -->

        </div>
    </div>
</div>
<!-- END: Content-->
<!-- BEGIN: Footer-->
@include('dashboard.master.footer')
<!-- END: Footer-->
