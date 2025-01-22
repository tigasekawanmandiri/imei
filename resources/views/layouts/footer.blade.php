<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        {{-- <img class="mb-2" src="{{ asset('assets/brand/bootstrap-logo.svg') }}" alt="" width="24" height="19"> --}}
        <img src="{{ url('/files/image/logo.png')}}" alt="">
        <div style="padding: 10px 0px 10px 0px;"></div>
        <p>imei.id merupakan marketplace produk virtual & fisik yang dapat memenuhi kebutuhan anda, sistem yang interaktif namun tetap mengedepankan keamanan & kenyamanan pengguna..</p>
        <small class="d-block mb-3 text-body-secondary">&copy; 2016-2024 </small>
      </div>
      <div class="col-12 col-md">
        <h5>Media Sosial</h5>
        <a href="https://t.me/imei_id" style="text-decoration: none">
          <button class="btn btn-sm btn-success"><i class="bi bi-telegram"></i></button>
        </a>
        <a href="https://www.instagram.com/imei.kreatif/" style="text-decoration: none">
          <button class="btn btn-sm btn-success"><i class="bi bi-instagram"></i></button>
        </a>
        <a href="https://wa.me/+6287889010203?text=Hallo%20saya%20tahu%20imei%20dari%20website%20dan%20saya%20mau%20menanyakan%20produk%20tersedia.%20terima%20kasih." style="text-decoration: none">
          <button class="btn btn-sm btn-success"><i class="bi bi-whatsapp"></i></button>
        </a>
        <a href="#" style="text-decoration: none">
          <button class="btn btn-sm btn-success"><i class="bi bi-tiktok"></i></button>
        </a>
        
      </div>
      <div class="col-12 col-md">
        <h5>Butuh Bantuan ?</h5>
        <a href="{{route('layanan.index')}}">
          <button class="btn btn-sm btn-success">Hubungi Kami <i class="bi bi-link-45deg"></i></button>
        </a>
      </div>
    </div>
</footer>