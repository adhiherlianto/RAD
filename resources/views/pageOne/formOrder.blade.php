<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Etrain</title>

    <link rel="icon" href="{{asset('assets/front/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <!-- themify CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/themify-icons.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/flaticon.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
</head>

<body>

     <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.html"> <img src="{{asset('assets/front/img/logo.png')}}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cource.html">Product</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                                <li class="d-none d-lg-block">
                                    <a class="btn_1" href="#">Get a Quote</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->


    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{asset('assets/front/img/blog/order-now.png')}}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>18</h3>
                                    <p>Jul</p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <!-- ================ contact section start ================= -->
                                <section class="contact-section">
                                    <div class="container">
                                        <div class="d-none d-sm-block mb-5 pb-4">
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <h3 class="">{{$produk->nama}}</h3>   
                                                </div>
                                               <div class="col-sm-6">
                                                     <h3 class="">Rp.{{$produk->harga}}</h3>
                                                </div>

                                                <div class="col-12">
                                                    <h2 class="contact-title mt-2">Form</h2>
                                                </div>
                                                <div class="col-lg-12">
                                                    <form class="form-contact contact_form" action="{{route('form.insert', ['id'=> $prdk->id])}}" method="post" id="contactForm" novalidate="novalidate">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                     <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder = 'Enter your name'>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                     <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder = 'Enter email address'>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                  <input class="form-control" name="phone" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Phone Number'" placeholder = 'Enter Your Phone Number'>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                  <input class="form-control" name="amount" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Amount'" placeholder = 'Enter Your Amount'>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                     <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder = 'Enter Message'></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mt-3">
                                                            <button type="submit" class="button button-contactForm btn_1">Send Message</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                    <!-- ================ contact section end ================= -->
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->






        <!-- footer part start-->
        <footer class="footer-area">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="single-footer-widget footer_1">
                            <a href="index.html"> <img src="img/logo.png" alt=""> </a>
                            <p>But when shot real her. Chamber her one visite removal six
                            sending himself boys scot exquisite existend an </p>
                            <p>But when shot real her hamber her </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Newsletter</h4>
                            <p>Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.
                            </p>
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Enter email address'
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                        <div class="input-group-append">
                                            <button class="btn btn_1" type="button"><i class="ti-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="social_icon">
                                <a href="#"> <i class="ti-facebook"></i> </a>
                                <a href="#"> <i class="ti-twitter-alt"></i> </a>
                                <a href="#"> <i class="ti-instagram"></i> </a>
                                <a href="#"> <i class="ti-skype"></i> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-md-4">
                        <div class="single-footer-widget footer_2">
                            <h4>Contact us</h4>
                            <div class="contact_info">
                                <p><span> Address :</span> Hath of it fly signs bear be one blessed after </p>
                                <p><span> Phone :</span> +2 36 265 (8060)</p>
                                <p><span> Email : </span>info@colorlib.com </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright_part_text text-center">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer part end-->

            <!-- jquery plugins here-->
            <!-- jquery -->
            <script src="js/jquery-1.12.1.min.js"></script>
            <!-- popper js -->
            <script src="js/popper.min.js"></script>
            <!-- bootstrap js -->
            <script src="js/bootstrap.min.js"></script>
            <!-- easing js -->
            <script src="js/jquery.magnific-popup.js"></script>
            <!-- swiper js -->
            <script src="js/swiper.min.js"></script>
            <script src="js/jquery.nice-select.min.js"></script>
            <!-- swiper js -->
            <script src="js/masonry.pkgd.js"></script>
            <!-- particles js -->
            <script src="js/owl.carousel.min.js"></script>
            <!-- swiper js -->
            <script src="js/slick.min.js"></script>
            <script src="js/jquery.counterup.min.js"></script>
            <script src="js/waypoints.min.js"></script>
            <!-- custom js -->
            <script src="js/custom.js"></script>
        </body>

        </html>