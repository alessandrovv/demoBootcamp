@extends('layout.home', ['pageclass' => 'login-signin-on'])
@section('title') Home @endsection

@section('styles')
  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <style>
     .swiper.mySwiper {
        width: 100%;
        height: 100%;
    }
    .swiper-pagination.myPaginator>.swiper-pagination-bullet-active{
        width: 1.4rem;
        border-radius: 0.4rem;
    }
  </style>
@endsection

@section('content')

<section id="section-slider">
  <div class="container-fluid" style="padding: 0px;
  overflow: hidden;">
    <div class="row align-content-center justify-content-center">
      <div class="col-12 px-0">
        <div class="swiper mySwiperSlider" style="height: 550px;">
          <div class="swiper-wrapper">
              <div class="swiper-slide">
                  <div class="container-slider d-flex pb-0 h-100" >
                      <div class="bloque-texto d-flex flex-column justify-content-center p-5" style="width: 35%;height: 100%;background-color: #003780;">
                          <a href="" style="color: #FFFFFF;text-decoration: none;"><h2>TÍTULO DE LA NOVEDAD EN EL SLIDER</h2></a>
                          <p style="color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae harum magni deleniti sint delectus facilis? Excepturi consectetur in corporis veniam rem minima earum soluta! Qui laboriosam velit nesciunt necessitatibus cupiditate?</p>
                          <div class="botones-slider d-flex align-content-center justify-content-between pt-3">
                              <button type="button" class="btn btn-outline-light">Conoce más</button>
                              <div class="d-flex ">                                        
                                  <div class="swiper-button-prev" style="position: inherit!important;margin-top: 0px!important;padding-right: 1rem!important;"></div>
                                  <div class="swiper-button-next" style="position: inherit!important;margin-top: 0px!important;"></div>
                              </div>
                          </div>
                      </div>
                      <div class="bloque-imagen" style="width: 65%;height: 100%;">
                          
                      <img src="https://images.pexels.com/photos/256381/pexels-photo-256381.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" loading="lazy" style="object-fit: cover;height: 550px;width: 100%;" alt="...">
                      </div>
                  </div>
              </div>
              <div class="swiper-slide">
                  <div class="container-slider d-flex pb-0 h-100" >
                      <div class="bloque-texto d-flex flex-column justify-content-center p-5" style="width: 35%;height: 100%;background-color: #003780;">
                          <a href="" style="color: #FFFFFF;text-decoration: none;"><h2>TÍTULO DE LA NOVEDAD EN EL SLIDER</h2></a>
                          <p style="color: #FFFFFF;">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vitae harum magni deleniti sint delectus facilis? Excepturi consectetur in corporis veniam rem minima earum soluta! Qui laboriosam velit nesciunt necessitatibus cupiditate?</p>
                          <div class="botones-slider d-flex align-content-center justify-content-between pt-3">
                              <button type="button" class="btn btn-outline-light">Conoce más</button>
                              <div class="d-flex ">                                        
                                  <div class="swiper-button-prev" style="position: inherit!important;margin-top: 0px!important;padding-right: 1rem!important;"></div>
                                  <div class="swiper-button-next" style="position: inherit!important;margin-top: 0px!important;"></div>
                              </div>
                          </div>
                      </div>
                      <div class="bloque-imagen" style="width: 65%;height: 100%;">
                          
                      <img src="https://images.pexels.com/photos/256381/pexels-photo-256381.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" loading="lazy" style="object-fit: cover;height: 550px;width: 100%;" alt="...">
                      </div>
                  </div>
              </div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </div>
</section>

 <!--PLABRAS BIENVENIDA-->
 <section id="palabras-rector">
  <div class="container">
    <div class="row align-content-center justify-content-center py-5 w-100">
      <div class="col-12 pt-5">
        <h2 style="color: #333333;">PALABRAS DEL <span style="color: #003780;">DECANO</span></h2>            
        <div class="border-title">
          <span class="border-span"></span>
        </div>
      </div>
      <div class="col-12">
        <div class="row pt-5">
          <div class="col-6">
            <h4 style="color: #001839;">Dr. Miguel Armando Benites Gutiérrez</h4>
            <p class="pt-2" style="text-align: justify;">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam rerum soluta ab impedit vitae explicabo. In deleniti quas dolorum nostrum vel beatae laboriosam possimus, repudiandae doloribus, dolores adipisci officia aut.
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam vel, nam itaque id alias expedita repudiandae dolorum animi voluptatem earum laborum molestiae cumque labore porro assumenda rem inventore perferendis. Illo!
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio ipsum dolorum repellendus culpa fugiat inventore sapiente voluptatum. Magni, praesentium pariatur culpa libero mollitia facere ullam quasi inventore corporis recusandae ratione!
            </p>
          </div>
          <div class="col-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/2pqfLDEoVK4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
        
    </div>
  </div>
</section>
<!--CONTADOR-->
<section id="contador">
  <div class="container-fluid">
    <div class="row align-content-center justify-content-center">
      <div class="col-12 px-0">            
        <div class="container-contador" style="height: 200px;">
          
          <div class="row align-content-center h-100 w-100">
            <div class="col-4">
              <div class="counter-container px-5 text-center">
                <div class="counter" data-target="1500" style="color: #fff;font-size: 4rem;"> 1500</div>
                <h3 style="color: #fff;">ALUMNOS</h3>
              </div>
            </div>
            <div class="col-4">
              <div class="counter-container px-5 text-center">
                <div class="counter" data-target="2500" style="color: #fff;font-size: 4rem;"> 1500</div>
                <h3 style="color: #fff;">ALUMNOS</h3>
              </div>
            </div>
            <div class="col-4">
              <div class="counter-container px-5 text-center">
                <div class="counter" data-target="3500" style="color: #fff;font-size: 4rem;"> 1500</div>
                <h3 style="color: #fff;">ALUMNOS</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Noticias-->
<section id="section-noticias">
    <div class="container py-3">
      <div class="row align-content-center justify-content-center py-3">
        <div class="col-12">
          <div class="d-flex justify-content-between">
            <div>
              <h2 style="color: #333333;">NOTICIAS</span></h2>            
              <div class="border-title">
                <span class="border-span"></span>
              </div>
            </div>
            <div>
              <a class="" href="#"> Ver todos</a>
            </div>
          </div>
        </div>
        <div class="col-11">
          <div class="swiper mySwiper2 my-2">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="card card-inge">
                  <div class="card-body p-0">
                      <div class="container-card-img">
                        <img src="https://images.pexels.com/photos/518543/pexels-photo-518543.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" loading="lazy" class="img-fluid card-img-top" alt="...">
                      </div>
                    
                    <div class="p-4">
                      <p>02 AGO, 2022</p>
                      <h5>Herramientas para la gestion de seguridad y salud en el trabajo</h5>
                      <a href="#" class="btn btn-outline-dark">Leer más</a>
                    </div>  
    
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card">
                  <div class="card-body p-0">
                      <div class="container-card-img">
                        <img src="https://images.pexels.com/photos/518543/pexels-photo-518543.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" loading="lazy" class="img-fluid card-img-top" alt="...">
                      </div>
                    
                    <div class="p-4">
                      <p>02 AGO, 2022</p>
                      <h5>Herramientas para la gestion de seguridad y salud en el trabajo</h5>
                      <a href="#" class="btn btn-outline-dark">Leer más</a>
                    </div>  
    
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card">
                  <div class="card-body p-0">
                      <div class="container-card-img">
                        <img src="https://images.pexels.com/photos/518543/pexels-photo-518543.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" loading="lazy" class="img-fluid card-img-top" alt="...">
                      </div>
                    
                    <div class="p-4">
                      <p>02 AGO, 2022</p>
                      <h5>Herramientas para la gestion de seguridad y salud en el trabajo</h5>
                      <a href="#" class="btn btn-outline-dark">Leer más</a>
                    </div>  
    
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
</section>

<!--Publicaciones-->
<div class="overlay">
  <div class="slideshow">
    <span class="btn_cerrar">&times;</span>
    <div class="botones atras">
      <i class="mdi mdi-arrow-left-circle-outline"></i>
    </div>
    <div class="botones adelante">
      <i class="mdi mdi-arrow-right-circle-outline"></i>
    </div>
    <img src="" alt="" id="img_slideshow">
  </div>
</div>

<section id="section-publicaciones" style="background-color: #F9F9F9;">
    <div class="container py-3">
      <div class="row align-content-center justify-content-center py-3">
        <div class="col-12">
          <div class="d-flex justify-content-between">
            <div>
              <h2 style="color: #333333;">PUBLICACIONES</span></h2>            
              <div class="border-title">
                <span class="border-span"></span>
              </div>
            </div>
            <div>
              <a class="" href="#"> Ver más</a>
            </div>
          </div>
        </div>
        <div class="col-11">
          <div class="swiper mySwiper3 my-2">
            <div class="swiper-wrapper" data-slider-nav-autoplay-interval="5000">
              <div class="swiper-slide galeria">
                <img src="./img/comunicados/0_Comunicados_090520220200.jpg" style="height: 400px;" alt="..." 
                    data-img-mostrar="0">
              </div>
              <div class="swiper-slide galeria">
                <img src="./img/comunicados/0_Comunicados_180720220835.jpg" style="height: 400px;"  alt="..." 
                    data-img-mostrar="1">
              </div>
              <div class="swiper-slide galeria">
                <img src="./img/comunicados/0_Comunicados_090520220200.jpg" style="height: 400px;" alt="..." 
                    data-img-mostrar="2">
              </div>
              <div class="swiper-slide galeria">
                <img src="./img/comunicados/0_Comunicados_180720220835.jpg" style="height: 400px;"  alt="..." 
                    data-img-mostrar="3">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<section id="section-contacto">
  <div class="container-fluid py-5">
    <div class="row align-content-center justify-content-center">
      <div class="col-11 text-center">
        <div style="border: 1px solid #bebebe;padding: 1rem;">
          <h2>¿Necesitas comunicarte con nosotros?</h2>
          <button type="button" class="btn btn-dark">CONTACTANOS</button>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

{{-- Scripts Section --}}
@section('scripts')

  <script src="{{ asset('vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('js/pages/home/app.js') }}" type="text/javascript"></script>

   <!-- Initialize Swiper -->
   <script>
    var swiper = new Swiper(".mySwiperSlider", {
        pagination: {
        el: ".swiper-pagination",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var swiper = new Swiper(".mySwiper3", {
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 2,            
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
  });

  var swiper = new Swiper(".mySwiper2", {
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
    "@0.00": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@0.75": {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    "@1.00": {
      slidesPerView: 2,            
      spaceBetween: 20,
    },
    "@1.50": {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
  });
</script>

@endsection
