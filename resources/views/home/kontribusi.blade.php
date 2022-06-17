@include('master.top')
<!-- back to top end -->

<!-- header area start -->
@include('master.header')
<!-- header area end -->

<!-- sidebar area start -->
@include('master.sidebar')
<!-- sidebar area end -->
<div class="body-overlay"></div>
<!-- sidebar area end -->

{{-- sweetalert2 area end --}}



{{-- sweetalert2 area end --}}

<main>

   <!-- page title area start -->
   <section class="page__title-area page__title-height d-flex align-items-center fix p-relative z-index-1" data-background="assets/img/page-title/page-title.jpg">
      <div class="page__title-shape">
         <img class="page-title-dot-4" src="assets/img/page-title/dot-4.png" alt="">
         <img class="page-title-dot" src="assets/img/page-title/dot.png" alt="">
         <img class="page-title-dot-2" src="assets/img/page-title/dot-2.png" alt="">
         <img class="page-title-dot-3" src="assets/img/page-title/dot-3.png" alt="">
         <img class="page-title-plus" src="assets/img/page-title/plus.png" alt="">
         <img class="page-title-triangle" src="assets/img/page-title/triangle.png" alt="">
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xxl-12">
               <div class="page__title-wrapper text-center">
                  <h3 style="color: black">Mari Berkontribusi</h3>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                           <li class="breadcrumb-item"><a href="/" style="color: black">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page" style="color: black">Kontribusi</li>
                        </ol>
                     </nav>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- page title area end -->

    <!-- contact area start  -->
    <section class="contact__area pb-150 p-relative z-index-1">
        <div class="container">
            <div class="row">
                <div class="col-xxl-10 offset-xxl-1 col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                    <div class="contact__wrapper white-bg mt--70 p-relative z-index-1 wow fadeInUp" data-wow-delay=".3s">

                      @if (session('info'))

                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Terimakasih!</strong> {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>

                      @endif

                   <div class="row">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                        <div class="contact__form">
                              <input type="text" name="namamasjid" placeholder="Nama Masjid" required>
                              <input type="text" name="namapengurusmasjid" placeholder="Nama Pengurus / Pemateri" required>
                              <input type="text" name="no_hp" placeholder="No. Handphone" required>
                              <input type="text" name="jeniskajian" placeholder="Jenis Kajian (Umum / Khusus)" required>
                              <textarea name="materidanwaktukajian" placeholder="Materi dan Waktu Kajian"  required></textarea>
                        </div>
                     </div>
                      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                         <div class="contact__form">
                               <textarea name="alamat" placeholder="Alamat" required></textarea>
                               <input type="text" name="gambar" placeholder="Gambar Masjid (Link)" required>
                               <input type="text" id="latlong" name="latlong" placeholder="Titik Koordinat" required readonly>
                               <a onclick="getlokasi('mapid')" class="w-btn w-btn-blue-5 w-btn-6 w-btn-14">Tampilkan Lokasi</a>
                                <p id="capa"></p>
                                <div class="row">
                                    <div class="col md-6">
                                        <div id="mapid" height="200px"></div>
                                    </div>
                                   </div>
                               <button type="submit" class="w-btn w-btn-blue-5 w-btn-6 w-btn-14">Kirim</button>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!-- contact area end  -->
</main>

<script>
    var marker_pilih_lokasi;
    var MAPID;
    function getlokasi(mapid) {
        MAPID = mapid;
        //jika browser mendukung navigator.geolocation maka akan menjalankan perintah di bawahnya
        if (navigator.geolocation) {
            // getCurrentPosition digunakan untuk mendapatkan lokasi pengguna
            //showPosition adalah fungsi yang akan dijalankan
            navigator.geolocation.getCurrentPosition(showPosition);
        }

    }

    function showPosition(position) {

        var latitude = position.coords.latitude;
        var longitude = position.coords.longitude;
        var accuracy = position.coords.accuracy;


        var capa = document.getElementById("capa");
        capa.innerHTML = "Akurasi : " + accuracy;

        var mymap = L.map(MAPID).setView(
            [position.coords.latitude, position.coords.longitude],
            13
        );

        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
        L.tileLayer(
            "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYWhtYWRmYWRpbGxsbGFoIiwiYSI6ImNsMDdydXM3eDJrbm0zaGxzcXEyOTljbmUifQ.BChqppsKGxQnbG2vUDOoww", {
                maxZoom: 18,
                id: "mapbox/streets-v11",
                tileSize: 512,
                zoomOffset: -1,
            }
        ).addTo(mymap);

        var popup = L.popup();

        // buat fungsi popup saat map diklik
        function onMapClick(e) {
            /*
            popup
                .setLatLng(e.latlng)
                .setContent("koordinatnya adalah " + e
                    .latlng
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
                .openOn(mymap);
            */
            if (marker_pilih_lokasi) {
                mymap.removeLayer(marker_pilih_lokasi);
            }
            marker_pilih_lokasi = new L.marker(e.latlng);
            mymap.addLayer(marker_pilih_lokasi);
            //value pada form latitde, longitude akan berganti secara otomatis
            document.getElementById('latlong').value = e.latlng

        }
        mymap.on('click', onMapClick); //jalankan fungsi

    }

</script>

<!-- footer area start -->
@include('master.footer')
<!-- footer area end -->

<!-- JS here -->
@include('master.bottom')

