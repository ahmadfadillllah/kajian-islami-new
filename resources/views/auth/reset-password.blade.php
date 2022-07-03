@include('master.top')
<!-- back to top end -->

<!-- header area start -->
@include('master.header')
<!-- header area end -->

<!-- sidebar area start -->
@include('master.sidebar')
<!-- sidebar area end -->

<main>


   <!-- sign up area start -->
   <section class="signup__area po-rel-z1 pt-100 pb-145">
      <div class="sign__shape">
         <img class="man-1" src="{{ asset('wetland') }}/assets/img/icon/sign/man-1.png" alt="">
         <img class="man-2" src="{{ asset('wetland') }}/assets/img/icon/sign/man-2.png" alt="">
         <img class="circle" src="{{ asset('wetland') }}/assets/img/icon/sign/circle.png" alt="">
         <img class="zigzag" src="{{ asset('wetland') }}/assets/img/icon/sign/zigzag.png" alt="">
         <img class="dot" src="{{ asset('wetland') }}/assets/img/icon/sign/dot.png" alt="">
         <img class="bg" src="{{ asset('wetland') }}/assets/img/icon/sign/sign-up.png" alt="">
      </div>
      <div class="container">

         <div class="row">
            <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2">
               <div class="page__title-wrapper text-center mb-55">
                  <h2 class="page__title-2">Lupa Password</h2>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
               <div class="sign__wrapper white-bg">
                  <div class="sign__form">
                      @if (session('info'))

                      <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Info!</strong> {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      @endif
                     <form action="{{ route('password.update') }}" method="POST">
                      @csrf
                      @if($errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        {!! $errors->first() !!}
                                    </div>
                                @endif
                                @if (\Session::has('success'))
                                    <div class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="sign__input-wrapper mb-25">
                                    <h5>Email</h5>
                                    <div class="sign__input">
                                       <input type="email" name="email" placeholder="Masukkan email">
                                       <i class="fal fa-envelope"></i>
                                    </div>
                                 </div>
                        <div class="sign__input-wrapper mb-25">
                           <h5>Password baru</h5>
                           <div class="sign__input">
                              <input type="password" name="password" placeholder="Masukkan Password baru">
                              <i class="fal fa-envelope"></i>
                           </div>
                        </div>
                        <div class="sign__input-wrapper mb-25">
                            <h5>Confirmasi Password</h5>
                            <div class="sign__input">
                               <input type="password" name="password_confirmation" placeholder="Konfirmasi Password baru">
                               <i class="fal fa-envelope"></i>
                            </div>
                         </div>
                        <button class="w-btn w-btn-11 w-100"> <span></span> Ubah Password</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- sign up area end -->
</main>


<!-- footer area start -->
@include('master.footer')
<!-- footer area end -->

<!-- JS here -->
@include('master.bottom')

