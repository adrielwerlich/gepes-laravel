@extends('site.home.base_template')

@section('title', 'GEPES VIDA - Grupo de Estudo e Pesquisa em Educa&ccedil;&atilde;o, Sa&uacute;de e Qualidade de
Vida')

@section('stylesheet')
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
--}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.css" media="screen"> --}}

<link rel="stylesheet" href="{{ asset('/css/estilos.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/animate.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css')}}" />

<link rel="stylesheet" href="{{ asset('/css/fontawesome.min.css')}}" />

@stop

@section('content')

{{-- {{dd($quemSomos)}} --}}

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
                <a onclick="manchete({{$quemSomos}})" href="#">QUEM SOMOS</a>
                <a onclick="manchete({{$oqueFazemos}})" href="#">O QUE FAZEMOS</a>
                <a onclick="manchete({{$linhas}})" href="#">LINHAS DE PESQUISA</a>
                <a href="{{ asset('/storage/manchetes/certi.pdf') }}">CERTIFICAÇÃO</a>
                <a onclick="showMap()" href="#">LOCALIZAÇÃO</a>
            </div>
        </div>

        <a id="publicacoes" onclick="manchete({{$publicacoes}})" class="btn">PUBLICAÇÕES</a>
        <a id="revista" href="http://www.icepsc.com.br/ojs/" class="btn">REVISTA ELETRÔNICA</a>
        <button id="contato" onclick="mostraFormContato()" class="btn">CONTATO</button>

    </div>

</div>


<div id="banner">

    <h1 id="text-banner">
        Grupo de Estudo e Pesquisa em Educação, Saúde e Qualidade de Vida
    </h1>
</div>

<div id="container-content" style="display:block">

    <div class="album py-5 bg-light">
        <!-- <div id="container-content"> -->

        <div class="row" id="vue">
            <!-- dd($manchetes)}} -->


            {{-- <router-view></router-view> --}}

            <div id="wraper" style="display:none">


            </div>
            
            <div class="container">
                <div class="row">
                    {{-- ######################### CAROUSEL SLIDER ABAIXO ###################################--}}
                    <div id="news-slider" class="owl-carousel owl-theme col-12" style="display:block; margin: 1px; overflow-x: hidden;">


                        @foreach ($manchetes as $manchete)
                        <div id="element-{{$manchete->id}}" class="">
                            <div class="col-sm-12 col-md-12 col-lg-12" style="border: 1px solid brown; margin: 2px">
                                <div class="card mb-4 shadow-sm" data-id="{{$manchete->id}}" data-tema="{{$manchete->tema}}"
                                    data-tit="{{ $manchete->titulo }}" data-desc="{{$manchete->descricao}}">
                                    <div class="card-header">
                                        <h2 style="background: gold;" class="my-0 font-weight-normal">
                                            {{ $manchete->tema }}
                                        </h2>
                                    </div>
                                    <h3>{{ $manchete->titulo }}</h3>

                                    <a href="{{ asset('/storage/'.$manchete->imagem) }}">
                                        <img id="img-{{$manchete->id}}" class="col-md-4 card-img-top" alt="No image"
                                            style="max-width: 30%; max-height:120px; display: block;" src="{{ asset('/storage/'.$manchete->imagem) }}"
                                            data-holder-rendered="true">
                                    </a>
                                    <div class="card-body">
                                        <div>
                                            <p class="card-text">
                                                @if ( strpos($manchete->descricao, 'img') )

                                                {!! str_limit(strip_tags($manchete->descricao), $limit = 50, $end =
                                                '...') !!}

                                                @else

                                                {!! str_limit(strip_tags($manchete->descricao), $limit = 350, $end = '...') !!}

                                                @endif
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a id="btn-view-{{ $manchete->id }}" data-id="{{$manchete->id}}"
                                                    data-tema="{{$manchete->tema}}" data-tit="{{ $manchete->titulo }}"
                                                    data-desc="{{$manchete->descricao}}" to="/manchete" type="button"
                                                    style="background-color:blue; margin-bottom: 2px" class="btn btn-sm btn-view">

                                                    Ver

                                                </a>

                                                @if( strlen($manchete->link) > 0 )
                                                <a id="btn-view-{{ $manchete->id }}" href="{{ $manchete->link }}" type="button"
                                                    style="background-color:red; margin-bottom: 2px" class="btn btn-sm btn-link">

                                                    Link

                                                </a>
                                                @endif
                                            </div>
                                            <small class="text-muted">{{$manchete->created_at}}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div> <!-- news-slider -->
                </div> <!-- row -->
            </div> <!-- container -->
            {{-- ######################### CAROUSEL SLIDER ACIMA ###################################--}}

        </div>
    </div>



</div>





{{-- ######################### MAPA LOCALIZAÇÃO ABAIXO ###################################--}}
<div id="map-content" style="display:none">
    <h3>Av. Castelo branco, 170 - Bairro Universitário CEP: 88509900 Lages - SC</h3>

    <div id="map">
    </div>

</div>
{{-- ######################### MAPA LOCALIZAÇÃO ACIMA ###################################--}}




{{-- ######################### CONTATO ABAIXO ###################################--}}


<div class="container" align="center">
    <div class="row">

        @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif


        <div id="form-contato" style="display:none" class="col-lg-12">

            {{-- action="{{ route('phpSendMail') }}" --}}
            <form class="form-horizontal" action="https://formspree.io/adriel@uniplaclages.edu.br" method="post">
                <input type="hidden" name="_next" value="#" />
                {{-- {{ csrf_field() }} --}}

                <fieldset class="col-md-8 col-lg-8">
                    <legend class="text-center">Entre em contato</legend>

                    <!-- Name input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">Seu nome</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="Seu nome" class="form-control">
                        </div>
                    </div>

                    <!-- Email input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="email">Your E-mail</label>
                        <div class="col-md-9">
                            <input id="email" name="_replyto" type="text" placeholder="Seu email" class="form-control">
                        </div>
                    </div>

                    <!-- Message body -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="message">Sua menssagem</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="message" name="message" placeholder="Por favor, entre com sua mensagem aqui..."
                                rows="5"></textarea>
                        </div>
                    </div>

                    <!-- Form actions -->
                    <div class="form-group">
                        <div class="col-md-12 text-right">
                            <button type="submit" value="Send" style="color: blue;" id="btn-submit-contact" class="btn btn-primary btn-lg">Enviar</button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div>

    </div>
</div>


{{-- ######################### CONTATO ACIMA ###################################--}}







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

@section('javascript')
<script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
<script src="{{ asset('/js/GepesController.js')}}"></script>
<script src="../../js/app.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxf-_YAcQPy4qAwLROFUIucjzHt8l0uIs&callback=initMap">
</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.1.2/flickity.pkgd.js"></script> --}}

<script src="{{ asset('/js/owl.carousel.min.js')}}"></script>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> -->

<script>
    $(document).ready(function () {



        // $('#news-slider').flickity({
        // // options
        // cellAlign: 'left',
        // contain: true
        // });


        // var flkty = new Flickity( '#news-slider', {
        // // options
        // cellAlign: 'left',
        // contain: true
        // });








        // $('#news-slider').on('mousewheel', '.owl-stage', function (e) {
        //     if (e.deltaY>0) {
        //         owl.trigger('next.owl');
        //     } else {
        //         owl.trigger('prev.owl');
        //     }
        //     e.preventDefault();
        // });

        $('#news-slider').owlCarousel({
            // center: false,
            loop: true,
            // rewind: true,
            margin: 5,
            items: 3,
            // itemsDesktop:[1280,1],
            // itemsDesktopSmall:[1000,1],
            itemsMobile: [600, 1],
            pagination: true,
            navigationText: true,
            dots: true,
            autoPlay: true,
            autoplayTimeout: 1500,
            autoplayHoverPause: true,
            scrollPerPage: true,
            animateOut: 'slideOutDown',
            animateIn: 'flipInX',
            stagePadding: 5,
            smartSpeed: 1650,

            dotsEach: 3,

            nav: true,

            responsiveClass: true,



            // responsive: {
            //         0: {
            //         // items: 1,
            //         nav:true,
            //         dots:true,
            // autoPlay:true,
            // autoplayTimeout:1500,
            // autoplayHoverPause:true,    

            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            // stagePadding:40,
            // smartSpeed:1650,
            //         },
            //         768: {
            //         // items: 2,
            //         nav:true,
            //         dots:true,
            // autoPlay:true,
            // autoplayTimeout:1500,
            // autoplayHoverPause:true,    

            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            // stagePadding:40,
            // smartSpeed:1650,
            //         },
            //         992: {
            //         // items: 3,
            //         nav:true,
            //         dots:true,
            // autoPlay:true,
            // autoplayTimeout:1500,
            // autoplayHoverPause:true,    

            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            // stagePadding:40,
            // smartSpeed:1650,
            //         },
            //         1280: {
            //         // items: 4,
            //         nav:true,
            //         dots:true,
            // autoPlay:true,
            // autoplayTimeout:1500,
            // autoplayHoverPause:true,    

            // animateOut: 'slideOutDown',
            // animateIn: 'flipInX',
            // stagePadding:40,
            // smartSpeed:1650,
            //         }
            // }
        })
    })

</script>

@stop
