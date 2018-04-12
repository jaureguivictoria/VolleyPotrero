@extends('layout.lp-base')

@section('content')    
    <main role="main" class="container" id="app">
        <div class="starter-template">
            <div class="row text-center">
                <div class="col-sm-8 offset-sm-2">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="first-slide" src="{{asset('img/carrousell1.JPG')}}" alt="First slide" height="512">
                                <div class="container">
                                    <div class="carousel-caption text-left">
                                        <h1>Semillero</h1>
                                        <p>Empezando por los más chicos. Contamos con un horario de entrenamiento en particular para los más jovenes.</p>
                                        <p><a class="btn btn-lg btn-primary" href="https://fb.me/volleypotrero" role="button">
                                            <i class="fab fa-facebook-f mr-2"></i>
                                            Seguinos en Facebook</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="second-slide" src="{{asset('img/carrousell2.JPG')}}" alt="Second slide" height="512">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>Mayores</h1>
                                        <p>De 18 en adelante. Contamos con personas de todas las edades que buscan competir y divertirse en este hermoso deporte.</p>
                                        <p><a class="btn btn-lg btn-primary" href="mailto:volleypotrero@gmail.com" role="button">
                                            <i class="far fa-envelope"></i>
                                            Envianos un mensaje</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="third-slide" src="{{asset('img/carrousell3.JPG')}}" alt="Third slide" height="512">
                                <div class="container">
                                    <div class="carousel-caption text-right">
                                        <h1>Sumate!</h1>
                                        <p>Si te gustaria formar parte de nuestro equipo, estamos los martes y viernes a las 20hs en el Polideportivo. ¡No esperes más!</p>
                                        <p><a class="btn btn-lg btn-primary" href="https://goo.gl/maps/VzGXgJQ2hw32" role="button">
                                            <i class="far fa-compass"></i>
                                            Encontranos aquí</a></p>
                                    </div>
                                </div>      
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-8 offset-sm-2">
                    
                    <h3 class="mt-5 mb-3">
                        <span><i class="far fa-clock" style="font-size:70px;"></i></span><br><br>
                        Encontranos en el Polideportivo de Potrero de Garay</h3>
                    <h5 class="mb-4">Horarios: Martes y Viernes a las 20hs</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1695.9338192064693!2d-64.54241059431953!3d-31.774095842505236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x942d4d90feb0df2d%3A0x48dd7731a7bf0d24!2sCalle+15%2C+La+Estancia%2C+C%C3%B3rdoba!5e0!3m2!1ses-419!2sar!4v1523233875054" height="450" frameborder="0" style="border:0;width:100%;" allowfullscreen></iframe>
                </div>
            </div>
            
            @include('payments.debtors')
            
        </div>
    </main>
@endsection