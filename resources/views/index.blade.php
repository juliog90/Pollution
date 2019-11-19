@extends('layouts.user')

{{-- Content --}}
@section('content')
<section class="contenedor seccion">
        <!-- <h2 class="fw-300 centrar-texto">About Project</h2> -->
        <div class="heading-text heading-section text-center">
            <h2>ABOUT PROJECT</h2>
        </div>
        <div class="iconos-nosotros">
            <div class="icono" style="padding:15px;">
                <!-- <img src="/img/icono1.svg" alt="Icono Seguridad"> -->
                <i style="color:#CC625B; margin-bottom: 15px;" class="fas fa-balance-scale-left fa-7x"></i>
                <h3 style="margin-bottom: 5px;">Problem</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>

            <div class="icono" style="padding:15px;">
                <i style="color:#C9CC5B; margin-bottom: 15px;"class="fas fa-shield-alt fa-7x"></i>
                <h3 style="margin-bottom: 5px;">Security</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>

            <div class="icono" style="padding:15px;">
                <i style="color:#5BCC89; margin-bottom: 15px;"class="fas fa-clock fa-7x"></i>
                <h3 style="margin-bottom: 5px;">Solution</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>
        </div>
    </section>

    <main class="seccion contenedor">
        <!-- <h2 class="fw-300 centrar-texto">Affected Places</h2> -->
        <div class="heading-text heading-section text-center">
            <h2>AFFECTED PLACES</h2>
        </div>
        <div class="contenedor-anuncios">
            <div class="anuncio">
                <img src="/img/anuncio1.jpg" alt="Anuncio casa en el lago">
                <div class="contenido-anuncio">
                    <h3>Tijuana</h3>
                    <p>Descripcion de lo ocurrido</p>
                    <p class="precio">Costo en danos: $3,000,0000</p>
                    <!-- <ul class="iconos-caracteristicas">
                        <li>
                            <img src="img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="img/icono_estacionamiento.svg" alt="icono autos">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>4</p>
                        </li>
                    </ul> -->
                    <!-- Button to see more about this place. 
                    <a href="#" class="boton boton-amarillo d-block">See more</a> -->
                </div>
            </div>

            <div class="anuncio">
                <img src="/img/anuncio2.jpg" alt="Anuncio casa de lujo">
                <div class="contenido-anuncio">
                    <h3>Rosarito</h3>
                    <p>Descripcion de lo ocurrido</p>
                    <p class="precio">Costo en danos: $2,000,0000</p>
                    <!-- <ul class="iconos-caracteristicas">
                        <li>
                            <img src="img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="img/icono_estacionamiento.svg" alt="icono autos">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>4</p>
                        </li>
                    </ul> -->
                    <!-- Button to see more about this place. 
                    <a href="#" class="boton boton-amarillo d-block">See more</a> -->
                </div>
            </div>

            <div class="anuncio">
                <img src="/img/anuncio3.jpg" alt="Anuncio casa con alberca">
                <div class="contenido-anuncio">
                    <h3>Ensenada</h3>
                    <p>Descripcion de lo ocurrido</p>
                    <p class="precio">Costo en danos: $3,000,0000</p>
                    <!-- <ul class="iconos-caracteristicas">
                        <li>
                            <img src="img/icono_wc.svg" alt="icono wc">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="img/icono_estacionamiento.svg" alt="icono autos">
                            <p>3</p>
                        </li>
                        <li>
                            <img src="img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p>4</p>
                        </li>
                    </ul> -->
                    <!-- Button to see more about this place. 
                    <a href="#" class="boton boton-amarillo d-block">See more</a> -->
                </div>
            </div>
        </div>
        <!-- Button for watch all places-->
        <!-- <div class="ver-todas">
            <a href="#" class="boton boton-verde">Ver Todas</a>
        </div> -->
    </main>
    <section class="contenedor seccion">
        <div class="container">
                    <div class="heading-text heading-section text-center">
                        <h2>MEET OUR TEAM</h2>
                        <p>Lorem ipsum dolor sit amet, consecte adipiscing elit. Suspendisse condimentum porttitor cursumus.</p>
                    </div>
                    <div class="row team-members">
                        <div class="col-lg-3">
                            <div class="team-member">
                                <div class="team-image">
                                    <img src="/img/6.jpg" alt="">
                                </div>
                                <div class="team-desc">
                                    <h3>Eulices Escalante</h3>
                                    <span>Software Developer</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                                    <div class="align-center">
                                        <a target="_blank" href="https://www.facebook.com/eulicesw" class="btn btn-xs btn-slide btn-light">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <a target="_blank" href="#" class="btn btn-xs btn-slide btn-light" data-width="100">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                        <a target="_blank" href="https://www.instagram.com/eulices.php/" class="btn btn-xs btn-slide btn-light" data-width="118">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <a target="_blank" href="#" class="btn btn-xs btn-slide btn-light" data-width="80">
                                            <i class="far fa-envelope"></i>
                                            <span>Mail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="team-member">
                                <div class="team-image">
                                    <img src="/img/7.jpg" alt="">
                                </div>
                                <div class="team-desc">
                                    <h3>Julio Gastelum</h3>
                                    <span>Software Developer</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                                    <div class="align-center">
                                        <a href="#" class="btn btn-xs btn-slide btn-light">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="100">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="118">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="80">
                                            <i class="far fa-envelope"></i>
                                            <span>Mail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="team-member">
                                <div class="team-image">
                                    <img src="/img/8.jpg" alt="">
                                </div>
                                <div class="team-desc">
                                    <h3>Erika Acosta</h3>
                                    <span>Software Developer</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                                    <div class="align-center">
                                        <a href="#" class="btn btn-xs btn-slide btn-light">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="100">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="118">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="80">
                                            <i class="far fa-envelope"></i>
                                            <span>Mail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="team-member">
                                <div class="team-image">
                                    <img src="/img/9.jpg" alt="">
                                </div>
                                <div class="team-desc">
                                    <h3>Christopher</h3>
                                    <span>Software Developer</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing tristique hendrerit laoreet. </p>
                                    <div class="align-center">
                                        <a href="#" class="btn btn-xs btn-slide btn-light">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>Facebook</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="100">
                                            <i class="fab fa-twitter"></i>
                                            <span>Twitter</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="118">
                                            <i class="fab fa-instagram"></i>
                                            <span>Instagram</span>
                                        </a>
                                        <a href="#" class="btn btn-xs btn-slide btn-light" data-width="80">
                                            <i class="far fa-envelope"></i>
                                            <span>Mail</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
<script type="text/javascript">
    $(document).ready(function() {
        $('a[href="/dashboard"]').removeClass("active");
        $('a[href="/"]').addClass("active");
    });
</script>
@stop