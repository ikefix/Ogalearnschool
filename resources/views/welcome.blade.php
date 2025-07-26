<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Ogalearn</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>


        <!-- Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    </head>  
    <body class="antialiased">
        {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            {{-- <div class="hero">
                <div class="hero-content">
                    <div class="container">
                        <div class="typewriter">
                            <div class="hetop"><h2 >Welcome to <i>Ogalearn University</i></h2></div>
                            <div><h1 class="retype" id="text"></h1></div>
                            <div class="des"><p>School of  Software Development and Data Analysis</p></div>
                            <div class="yort">
                                <a href="/Ogalearn-Project/Navbar/Sign/sign.php"><button class="type-new">Create An Account</button></a>
                                <a href=""><button class="get-new">Get started</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <section class="hero-section">
                
                @include("includes.nav1")
                <div class="hero-container">
                    <div class="hero-text">
                        <h1>Empower Your Future Through Learning</h1>
                        <p>Learn high-demand skills from top instructors in tech, business, design & more.</p>
                        <div class="hero-buttons">
                            {{-- <a href="{{ route('courses.index') }}" class="btn primary">📚 Browse Courses</a> --}}
                            <a href="{{ route('register.school') }}" class="btn primary">Register As A School</a>
                            <a href="{{ route('register') }}" class="btn secondary">🚀 Start Learning Free</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('Online learning-amico.svg') }}" alt="Online learning">
                    </div>
                </div>
            </section>

            
            {{-- <div class="body">
                <div class="body-content">
                    <div class="bod-img">
                        <img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="A Lady Veiwing Content On Her Device">
                    </div>
                    <div class="bod-text">
                        <div class="contan1"><h3>Who we are</h3></div>
                        <div class="contan2"><h1>Flexible learning options and skills acquisition</h1></div>
                        <div class="contan3"><p>Welcome to Ogalearn University, Your gateway to Software Development and Data Analysis. At Ogalearn University, we empower you with the skills needed to become a skilled software Developer and Data Analyst</p></div>
                        <div class="read"><a href="/Ogalearn-Project/Navbar/About/About.php"><button>Read More On <i>Ogalearn</i></button></a></div>
                    </div>
                </div>
            </div> --}}
            
            <div class="about">
                <div class="about-content">
                    <div class="about-img">
                        <img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="">
                    </div>
                    <div class="about-text">
                        <div class="hold1"><h3 class="h2">About Us</h3></div>
                        <div class="hold2"><h2>We Care About The Quality Of Knowledge That Is Being Inculcated To Our Students.</h2></div>
                        <div class="about-button">
                            <div class="but1"><a href=""><button>OUR GOAL</button></a></div>
                            <div class="but2"><a href=""><button>OUR VISION</button></a></div>
                            <div class="but3"><a href=""><button>OUR MISSION</button></a></div>
                        </div>
                        <div class="but4"><p>Our goal is to produce over 10,000 quality Tallent that will dominate Africa and beyond by 2030 </p></div>
                        <div class="explore"><a href="#course-scroll"><button>Explore Our Courses</button></a></div>
                    </div>
                </div>
            </div>

            <div class="join">
                <div class="join-content">
                    <div class="join-tent1">
                        <h3 class="h2">How To Join</h3>
                        <h2 class="easy">It's Easy To Join And Learn With Us</h2>
                    </div>
                    <div class="join-tent2">
                        <div class="tentleft">
                            <div class="join-con">
                                <div class="join-text">
                                    <img src="assets/line.png" alt="">
                                </div>
                                <div class="teps">
                                    <button>1</button>
                                </div>
                                <div>
                                    <h3>Register</h3>
                                    <p>To be an account holder you have to open an account first.</p>
                                </div>
                            </div>
                            <div class="join-con">
                                <div class="join-text">
                                    <img src="assets/line.png" alt="">
                                </div>
                                <div class="teps">
                                    <button>2</button>
                                </div>
                                <div>
                                    <h3>Verification</h3>
                                    <p>After registration you need to verify your Email and Mobile Number.</p>
                                </div>
                            </div>
                        </div>
                        <div class="tentleft">
                            <div class="join-con">
                                <div class="join-text">
                                    <img src="assets/line.png" alt="">
                                </div>
                                <div class="teps">
                                    <button>3</button>
                                </div>
                                <div>
                                    <h3>Learning Account</h3>
                                    <p>To be an account holder you have to open an account first.</p>
                                </div>
                            </div>
                            <div class="join-con">
                                <div class="teps">
                                    <button>4</button>
                                </div>
                                <div>
                                    <h3>Open An Account</h3>
                                    <p>To be an account holder you have to open an account first.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="choose">
                <div class="choose-content">
                    <div class="rea-con">
                        <div class="numb">
                            <div class="one">
                                <button style="color: purple;"><b>1</b></button>
                            </div>
                            <div class="two">
                                <button style="color: purple;"><b>2</b></button>
                            </div>
                        </div>
                        <div>
                            <h3 class="about-us">Why Choose Us</h3>
                        </div>
                    </div>
                    <div class="about-text">
                        <div class="we">
                            <b><p class="otp-title">We Offer Qualified Courses And Adequate Teaching</p></b>
                            <p class="spend">Save it, spend it, send it. It's up to you. Whatever you choose to do with your money, we'll make sure it's done better and free of charge.</p>
                        </div>
                        <div>
                            <hr class="dive">
                        </div>
                        <div class="otp-chid">
                            <b><p class="otp-title">Qualified Certificates</p></b>
                            <p class="otp">The OTP is a randomly generated code that is sent to your phone or email. You will need to enter this code in order to confirm your transaction.</p>
                        </div>
                        <div class="learn">
                            <a href="">
                                <button>Learn With <i>Ogalearn</i></button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="about-img3">
                    <img src="{{ asset('WhatsApp Image 2025-07-20 at 18.23.15 (1).jpeg') }}" alt="">
                </div>
            </div>


            <div id="course-scroll" class="course">
                <div class="course-content">
                    <div class="center">
                        <h3 class="course-head">Courses</h3>
                        <h2 class="offer">Start learning with free courses</h2>
                    </div>
                    <div class="course-menu">
                        <div class="cou-menu">
                            <div class="cou-men-flex">
                                <a>
                                    <div>
                                        <div class="cou-menu-con">
                                            <div><img src="{{ asset('WhatsApp Image 2024-03-23 at 9.47.58 AM (2).jpg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Summer Holiday Training</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a>
                                    <div>
                                        <div class="cou-menu-cen">
                                            <div><img src="{{ asset('WhatsApp Image 2025-07-18 at 10.22.18.jpeg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Data Analytics</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a>
                                    <div>
                                        <div class="cou-menu-can">
                                            <div><img src="{{ asset('WhatsApp Image 2025-07-20 at 18.23.15 (1).jpeg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Digital Marketing</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            {{-- <div class="cou-men-flex">
                                <a>
                                    <div>
                                        <div class="cou-menu-con">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Web Development</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a>
                                    <div>
                                        <div class="cou-menu-cen">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Graphics Design</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="/Ogalearn-check.php">
                                    <div>
                                        <div class="cou-menu-can">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Graphics Design</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}

                            <!-- 👇 HIDDEN by default -->
                            <div id="comen-more">
                                <div class="cou-men-flex">
                                    <a href="/Ogalearn-check.php">
                                        <div>
                                            <div class="cou-menu-con">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                                <div class="course-topic">
                                                    <h3 class="topy">Data Analysis</h3>
                                                    <h2 class="noty">Earn A Degree</h2>
                                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/Ogalearn-check.php">
                                        <div>
                                            <div class="cou-menu-cen">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                                <div class="course-topic">
                                                    <h3 class="topy">Data Analysis</h3>
                                                    <h2 class="noty">Earn A Degree</h2>
                                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/Ogalearn-check.php">
                                        <div>
                                            <div class="cou-menu-can">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                                <div class="course-topic">
                                                    <h3 class="topy">Data Analysis</h3>
                                                    <h2 class="noty">Earn A Degree</h2>
                                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="cou-men-flex">
                                    <a href="/Ogalearn-check.php">
                                        <div>
                                            <div class="cou-menu-con">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                                <div class="course-topic">
                                                    <h3 class="topy">Data Analysis</h3>
                                                    <h2 class="noty">Earn A Degree</h2>
                                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/Ogalearn-check.php">
                                        <div>
                                            <div class="cou-menu-cen">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                                <div class="course-topic">
                                                    <h3 class="topy">Data Analysis</h3>
                                                    <h2 class="noty">Earn A Degree</h2>
                                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="/Ogalearn-check.php">
                                        <div>
                                            <div class="cou-menu-can">
                                            <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                                <div class="course-topic">
                                                    <h3 class="topy">Data Analysis</h3>
                                                    <h2 class="noty">Earn A Degree</h2>
                                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- 👇 SHOW MORE BUTTON -->
                            <div class="more-course">
                                <a class="shomo" id="shomo">
                                    {{-- <button id="shomo-button">Show More</button> --}}
                                </a>
                            </div>
                    </div>
                </div>
            </div>



            <div class="services">
                <div class="services-content">
                    <div class="service-tent1">
                        <h3>Services</h3>
                        <h2>We Offer And Serve Quality Services</h2>
                    </div>
                    <div class="service-tent2">
                        <div class="ser-tent">
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Web & Mobile App Development</h3>
                                    <h2 class="noty">We Develop Websites</h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div>
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Graphics Design</h3>
                                    <h2 class="noty">We Design Websites</h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div>
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Sales & Repairs Of Gadgets</h3>
                                    <h2 class="noty">We Marketise Digitally </h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="ser-tent">
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Graphics Design</h3>
                                    <h2 class="noty">We Design Websites</h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div> --}}
                            
                            {{-- <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Web Development</h3>
                                    <h2 class="noty">We Develop And Create Website</h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div> --}}
                        </div>
                        <div class="ser-tent sert">
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Web Design</h3>
                                    <h2 class="noty">We Design Websites</h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div>
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Digital Marketing</h3>
                                    <h2 class="noty">We Marketise Digitally </h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div>
                            <div class="service-tent-con">
                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                <div class="service-topic">
                                    <h3 class="topy">Web Development</h3>
                                    <h2 class="noty">We Develop And Create Website</h2>
                                    <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-button">
                        {{-- <button id="view-more-btn">View More Services</button> --}}
                    </div>
                </div>
            </div>

<section class="image-slider-section py-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('WhatsApp Image 2025-07-20 at 18.23.15 (1).jpeg') }}" alt="Image 1" class="carousel-img">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('WhatsApp Image 2023-12-29 at 5.42.27 AM (2).jpg') }}" alt="Image 2" class="carousel-img">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('WhatsApp Image 2025-07-20 at 18.23.15 (2).jpeg') }}" alt="Image 3" class="carousel-img">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('WhatsApp Image 2025-07-18 at 10.22.18.jpeg') }}" alt="Image 4" class="carousel-img">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('WhatsApp Image 2024-03-23 at 9.47.58 AM (2).jpg') }}" alt="Image 5" class="carousel-img">
            </div>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination dots -->
        <div class="swiper-pagination"></div>
    </div>
</section>




            <div>
                <div class="job">
                    <div class="job-content">
                        <div class="center">
                            <h3 class="course-head">Jobs</h3>
                            <h2 class="offer">Our Student Projects</h2>
                        </div>
                        <div class="course-menu">
                            <div class="cou-menu">
                                <div class="hob-flex">
                                    <div class="go-flex1">
                                        <div>
                                            <div class="job-img" data-popup="popup1">
                                                <div class="down-down"><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="job-img" data-popup="popup2">
                                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="job-img" data-popup="popup3">
                                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="go-flex2">
                                        <div>
                                            <div class="job-img" data-popup="popup4">
                                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="job-img" data-popup="popup5">
                                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="job-img" data-popup="popup6">
                                                <div><img src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt="Image"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div id="popup1" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Wills</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Wills Tech Institute</p>
                            <h2>Services We Provide</h2>
                            <p>Digital Marketing<br>Web Design<br>Web Development</p>
                            <a href=""><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup2" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Sonia</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Hair Dressing</p>
                            <h2>Services We Provide</h2>
                            <p>Installation Of Frontiers<br>Importation Of Vietnamise<br>Chizzy's Acrylic & Gel Nail's</p>
                            <a href=""><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup3" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('ui-ux-representations-with-laptop.jpg') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Henschel</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Architectural Services</p>
                            <h2>Services We Provide</h2>
                            <p>Digital Marketing<br>Web Design<br>Web Development</p>
                            <a href=""><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup4" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="assets/Fidelity-bank-plc-building-financial.webp" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Sheyi</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Pending</p>
                            <h2>Services We Provide</h2>
                            <p>Mini Militia Teaching<br>Player X<br>Boss</p>
                            <a href=""><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup5" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="assets/Fidelity-bank-plc-building-financial.webp" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Silver</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Trading</p>
                            <h2>Services We Provide</h2>
                            <p>Buying & Selling Of Food Stuffs<br>Buying Biscuit<br>Mini Pablo</p>
                            <a href=""><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup6" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="assets/Fidelity-bank-plc-building-financial.webp" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Samuel</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Trading</p>
                            <h2>Services We Provide</h2>
                            <p>Digital Marketing<br>Web Design<br>Web Development</p>
                            <a href=""><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
            
                <div class="overlay"></div>
            
                <div class="popup-content">
                    <button class="prev-btn">&Leftarrow;</button>
                    <button class="next-btn">&Rightarrow;</button>
                </div>
            </div>
            @include("includes.footer")
        

        {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const popups = document.querySelectorAll(".popup-content");
            const overlay = document.querySelector(".overlay");
            const cancelButtons = document.querySelectorAll(".cancel-btn");
            const jobImages = document.querySelectorAll(".job-img");

            jobImages.forEach(img => {
                img.addEventListener("click", () => {
                    const popupId = img.getAttribute("data-popup");
                    const popup = document.getElementById(popupId);
                    if (popup) {
                        popup.style.display = "block";
                        overlay.style.display = "block";
                    }
                });
            });

            cancelButtons.forEach(btn => {
                btn.addEventListener("click", () => {
                    popups.forEach(p => p.style.display = "none");
                    overlay.style.display = "none";
                });
            });

            overlay.addEventListener("click", () => {
                popups.forEach(p => p.style.display = "none");
                overlay.style.display = "none";
            });
        });
        </script> --}}
        </div>

            {{-- <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const showMoreBtn = document.getElementById("shomo-button");
                    const extraCourses = document.getElementById("comen-more");
                    let isOpen = false;

                    showMoreBtn.addEventListener("click", function () {
                        if (!isOpen) {
                            extraCourses.classList.add("active");
                            showMoreBtn.textContent = "Show Less";
                            isOpen = true;
                        } else {
                            extraCourses.classList.remove("active");
                            showMoreBtn.textContent = "Show More";
                            isOpen = false;
                        }
                    });
                });
            </script> --}}

            <script>
                window.addEventListener("scroll", function () {
                    const navbar = document.querySelector(".glass-navbar");
                    if (window.scrollY > 50) {
                        navbar.classList.add("scrolled");
                    } else {
                        navbar.classList.remove("scrolled");
                    }
                });
            </script>

            {{-- <script>
                document.addEventListener("DOMContentLoaded", function () {
                    const viewMoreBtn = document.getElementById("view-more-btn");
                    const extraServices = document.querySelector(".sert");
                    let isVisible = false;

                    viewMoreBtn.addEventListener("click", function () {
                        isVisible = !isVisible;
                        extraServices.classList.toggle("show", isVisible);
                        viewMoreBtn.textContent = isVisible ? "View Less Services" : "View More Services";
                    });
                });
            </script> --}}
            <script>
            const images = document.querySelectorAll('.job-img');
            const popups = document.querySelectorAll('.popup-content');
            const overlay = document.querySelector('.overlay');

            images.forEach(image => {
                image.addEventListener('click', () => {
                    const target = image.getAttribute('data-popup');
                    document.getElementById(target).style.display = 'block';
                    overlay.style.display = 'block';
                });
            });

            document.querySelectorAll('.cancel-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    btn.closest('.popup-content').style.display = 'none';
                    overlay.style.display = 'none';
                });
            });

            overlay.addEventListener('click', () => {
                document.querySelectorAll('.popup-content').forEach(p => p.style.display = 'none');
                overlay.style.display = 'none';
            });
        </script>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 20,
    centeredSlides: true,
    slidesPerView: 1,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    breakpoints: {
      768: {
        slidesPerView: 2
      },
      992: {
        slidesPerView: 3
      }
    }
  });
</script>


    </body>
</html>
