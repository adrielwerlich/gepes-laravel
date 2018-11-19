@extends('site.home.base_template')

@section('title', 'GEPES VIDA - Grupo de Estudo e Pesquisa em Educa&ccedil;&atilde;o, Sa&uacute;de e Qualidade de
Vida')

@section('stylesheet')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"> -->

<link rel="stylesheet" href="{{ asset('/css/estilos.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/animate.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css')}}" />

<link rel="stylesheet" href="{{ asset('/css/fontawesome.min.css')}}" />

@stop

@section('content')

{{--{#<div class="container">#}--}}

    <div id="header">
        {{--{#<div class="row">#}--}}
            <div id="logo-gepes" class="col-2"></div>

            <img src="{{ asset('/images/uniplac.png') }}" class="" alt="" id="logo-uniplac">
            {{--{#</div>#}--}}
        <div id="second-row">

            <div class="dropdown">
                <button class="btn">
                    GEPES VIDA
                    <img src="images/seta.png" width="14" height="11">
                </button>
                <div class="dropdown-content">
                    <a href="#">QUEM SOMOS</a>
                    <a href="#">O QUE FAZEMOS</a>
                    <a href="#">LINHAS DE PESQUISA</a>
                    <a href="#">CERTIFICAÇÃO</a>
                    <a href="#">LOCALIZAÇÃO</a>
                </div>
            </div>

            <button id="publicacoes" class="btn">PUBLICAÇÕES</button>
            <button id="revista" class="btn">REVISTA ELETRÔNICA</button>
            <button id="contato" class="btn">CONTATO</button>

        </div>

    </div>


    <div id="banner">

        <h1 id="text-banner">
            Grupo de Estudo e Pesquisa em Educação, Saúde e Qualidade de Vida
        </h1>
    </div>

    <div id="container-content" >

        <div class="album py-5 bg-light">
            <!-- <div id="container-content"> -->

                <div class="row" id="vue">
                    <!-- dd($manchetes)}} -->


                    <router-view></router-view>


                    <div id="news-slider" class="owl-carousel owl-theme col-12" style="display:block">

                        

                        @foreach ($manchetes as $manchete)
                        <!-- <div class="slide" id="slide-{{$manchete->id}}"> -->
                            <div class="col-sm-12 col-md-12 col-lg-12" style="border: 1px solid brown">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header">
                                        <h2 style="background: gold;" class="my-0 font-weight-normal">
                                            @foreach($temas as $tema)
                                            @if ($tema->id == $manchete->temaId)
                                            {{ $tema->tema }}
                                            @endif
                                            @endforeach
                                        </h2>
                                    </div>
                                    <h3>Titulo {{ $manchete->titulo }}</h3>

                                    {{-- {#{{ dump(manchete) }}#}--}}

                                    <a href="{{ asset('/storage/'.$manchete->imagem) }}">
                                        <img class="col-md-4 card-img-top" alt="Thumbnail [100%x225]" style="max-width: 30%; max-height:120px; display: block;"
                                            src="{{ asset('/storage/'.$manchete->imagem) }}" data-holder-rendered="true">
                                    </a>
                                    <div class="card-body">
                                        <div>
                                            <p class="card-text">
                                                {!! str_limit($manchete->descricao, 700, $end = '...') !!}
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <router-link id="btn-view" data-id-manchete={{ $manchete->id }} to="/manchete" type="button" style="background-color:blue"
                                                    class="btn btn-sm">Ver</router-link>
                                            </div>
                                            <small class="text-muted">{{$manchete->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div>     -->
                        @endforeach

                    </div> <!-- slider -->

                </div>
            <!-- </div> -->
        </div>


    </div>


    <br /><br />

    <!-- <div >
    
                <ol>
                <!-- Cria uma instância do componente todo-item --
                <todo-item></todo-item>
                </ol>

    <router-view></router-view>


    </div> -->



    <!-- Vue.component('todo-item', {
  template: '<li>Isso é um item</li>'
}) -->




    <div class="container">
        <div class="row alwi-dados-rodape">
            <div class="col-md-3 col-sm-4">
                <span class="alwi-dados-titulo">Fone:</span>
                <span class="alwi-dados-contatos"> (49) 3251-1000 </span>
            </div>
            <div class="col-md-5 col-sm-4">
                <span class="alwi-dados-titulo"> E-MAIL:</span>
                <span class="alwi-dados-contatos"> stricto@uniplaclages.edu.br </span>
            </div>
            <div class="col-md-4 col-sm-4 col-md-pull-2">
                <span class="alwi-dados-titulo"> COORDENA&Ccedil;&Atilde;O:</span>
                <span class="alwi-dados-contatos"> Profa. Dra. Lucia Ceccato de Lima </span>
            </div>
        </div>
    </div>


    @stop {{-- fim do content nesse stop--}}

    @section('javascripts')
    <script src="{{ asset('/js/GepesController.js')}}"></script>
    <script src="../../js/app.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>

    <script src="{{ asset('/js/owl.carousel.min.js')}}"></script>

    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->
    
    <script>
    
        $(document).ready(function(){

            // $('#news-slider').on('mousewheel', '.owl-stage', function (e) {
            //     if (e.deltaY>0) {
            //         owl.trigger('next.owl');
            //     } else {
            //         owl.trigger('prev.owl');
            //     }
            //     e.preventDefault();
            // });

            $('#news-slider').owlCarousel({
                center: false,
                loop:true,
                margin:10,
                items:3,
                itemsDesktop:[1199,2],
                itemsDesktopSmall:[1000,3],
                itemsMobile:[600,1],
                pagination:true, 
                navigationText:true,
                dots:true,
                autoPlay:true,
                autoplayTimeout:1500,
                autoplayHoverPause:true,    

                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                stagePadding:40,
                smartSpeed:1650,

                nav:true,

                responsiveClass:true,   

               

                responsive: {
                        0: {
                        items: 1,
                        nav:true,
                        dots:true,
                autoPlay:true,
                autoplayTimeout:1500,
                autoplayHoverPause:true,    

                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                stagePadding:40,
                smartSpeed:1650,
                        },
                        768: {
                        items: 2,
                        nav:true,
                        dots:true,
                autoPlay:true,
                autoplayTimeout:1500,
                autoplayHoverPause:true,    

                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                stagePadding:40,
                smartSpeed:1650,
                        },
                        992: {
                        items: 3,
                        nav:true,
                        dots:true,
                autoPlay:true,
                autoplayTimeout:1500,
                autoplayHoverPause:true,    

                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                stagePadding:40,
                smartSpeed:1650,
                        },
                        1280: {
                        items: 4,
                        nav:true,
                        dots:true,
                autoPlay:true,
                autoplayTimeout:1500,
                autoplayHoverPause:true,    

                animateOut: 'slideOutDown',
                animateIn: 'flipInX',
                stagePadding:40,
                smartSpeed:1650,
                        }
                }
            })
        })
    
    </script>

    @stop
