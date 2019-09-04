<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lens•</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/unicons.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <!-- MAIN STYLE -->
    <link rel="stylesheet" href="css/tooplate-style.css">
    <link rel="stylesheet" href="css/style.css">
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('css/rtl.css')}}">
    @endif
    <!-- Fonts -->

</head>

<body>

    <!-- MENU -->
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}"> <span class="icon-len"></span>
                Lens•</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{route('post.index')}}" class="nav-link"><span data-hover="{{__('general.Timeline')}}">{{__('general.Timeline')}}</span></a>
                    </li>
                    @auth
                    <li class="nav-item" class="nav-link">
                        <a href="{{ route('home.index') }} " class="nav-link"><span data-hover="{{__('general.Home')}}">{{__('general.Home')}}</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.edit', ['user' => Auth::user()->id]) }}">
                              {{ __('general.profile.EditProfile') }}
                             </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                              {{ __('general.Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item" class="nav-link">
                        <a href="{{ route('login') }}" class="nav-link"><span data-hover="{{__('general.Login')}}">{{__('general.Login')}}</span></a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link"><span data-hover="{{__('general.Register')}}">{{__('general.Register')}}</span></a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>


            </div>
        </div>
    </nav>

    <!-- ABOUT -->
    <section class="about full-screen d-lg-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-12 col-12 d-flex align-items-center">
                    <div class="about-text">
                        <small class="small-text">{{ __('general.welcome') }}</span></small>
                        <h1 class="animated animated-text">
                            <span class="mr-2">{{__('general.AreYou')}}</span>
                        </h1>

                        <p>{{__('general.AreYouAnd')}}</p>

                        <div class="custom-btn-group mt-4">
                            <a href="{{ route('register') }}" class="btn custom-btn custom-btn-bg custom-btn-link">{{__('general.GETSTARTED')}}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-12">
                    <div class="about-image svg">
                        <img src="images/photographers.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section class="project py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-11 text-center mx-auto col-12">

                    <div class="col-lg-8 mx-auto">
                        <h2>{{__('general.lastPhotos')}}</h2>
                    </div>

                    <div class="owl-carousel owl-theme">
                       <div class="item">
                         <div class="project-info">
                           <img src="images/project/project-image01.png" class="img-fluid" alt="project image">
                         </div>
                       </div>

                       <div class="item">
                         <div class="project-info">
                           <img src="images/project/project-image02.png" class="img-fluid" alt="project image">
                         </div>
                       </div>

                       <div class="item">
                         <div class="project-info">
                           <img src="images/project/project-image03.png" class="img-fluid" alt="project image">
                         </div>
                       </div>

                       <div class="item">
                         <div class="project-info">
                           <img src="images/project/project-image04.png" class="img-fluid" alt="project image">
                         </div>
                       </div>

                       <div class="item">
                         <div class="project-info">
                           <img src="images/project/project-image05.png" class="img-fluid" alt="project image">
                         </div>
                       </div>
                     </div>
                </div>
            </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <p class="copyright-text text-center">{{__('general.footer')}}</p>
                </div>

            </div>
        </div>
    </footer>
    <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/Headroom.js"></script>
      <script src="js/jQuery.headroom.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/smoothscroll.js"></script>
      <script src="js/custom.js"></script>

</body>

</html>
