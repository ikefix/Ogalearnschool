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

            <section class="hero-section">
                
                @include("includes.nav1")
                <div class="hero-container">
                    <div class="hero-text">
                        <h1>Learn.Build.Get hired <br> All In 5 Months</h1>
                        <p>Learn by building. Become a Full-Stack Developer and land a high-paying job in months — no experience, no degree, no limits.</p>
                        <div style="height: 8vh">
                            <h3 class="typing"></h3><br>
                        </div>
                        <div class="hero-buttons">
                            {{-- <a href="{{ route('courses.index') }}" class="btn primary">ðŸ“š Browse Courses</a> --}}
                            {{-- <a href="{{ route('register.school') }}" class="btn primary">Register As A School</a> --}}
                            <a href="{{ route('register') }}" class="btn secondary">Start Application</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <img src="{{ asset('new-hero-bg-CkfV5je9.png') }}" alt="Online learning">
                        {{-- <span class="floating-text">HTML</span> --}}
                        <i class='bx bxl-html5 floating-text'></i>
                        <i class='bx bxl-nodejs floating-js'></i>
                        <i class='bx bxl-css3 floating-css'></i>
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
            
            <div class="about" style="padding: 60px 20px; background: #f9f9f9;">
                <div class="about-content" style="display: flex; align-items: center; justify-content: space-between; gap: 30px; flex-wrap: wrap;">

                    <!-- Text Side -->
                    <div class="about-text" style="flex: 1; min-width: 300px;">
                        {{-- <h3 style="font-size: 24px; color: #333; margin-bottom: 10px;">About Us</h3> --}}
                        <h2 style="font-size: 32px; color: #111; margin-bottom: 20px;">
                           Shaping Africa’s Next Generation of Innovators
                        </h2>
                        <p style="font-size: 18px; line-height: 1.6; color: #555;">
                        Ogalearn is an online Academy designed to take students from beginner to 
                        professional level in software development and other in-demand skills. With hands-on projects, expert mentorship, and flexible online learning, we equip learners with practical knowledge to thrive in today’s tech-driven world. Our goal is simple—empower Africa’s 
                        next generation of innovators and problem-solvers.
                        </p>
                        <div style="margin-top: 20px;">
                            <a href="#course-scroll">
                                <button style="padding: 12px 25px; background: #007bff; border: none; border-radius: 5px; color: #fff; font-size: 16px; cursor: pointer;">
                                    Explore Our Courses
                                </button>
                            </a>
                        </div>
                    </div>

                    <!-- Video Side -->
                    <div class="about-video" style="flex: 1; min-width: 300px;">
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; border-radius: 10px; box-shadow: 0px 5px 20px rgba(0,0,0,0.2);">
                            <iframe width="560" height="315" 
                                src="https://www.youtube.com/embed/WPtIPbY7o50" 
                                title="YouTube video player" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                            </iframe>
                        </div>
                    </div>

                </div>
            </div>

            <div class="join">
                <div class="join-content">
                    <div class="join-tent1">
                        {{-- <h3 class="h2">How to Join Ogalearn</h3> --}}
                        <h2 class="easy">How to get started</h2>
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
                                    <p>Create your free account and get instant access to your personal student dashboard</p>
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
                                    <h3>Confirm Your Email</h3>
                                    <p>Check your inbox for a confirmation link to activate your account.</p>
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
                                    <h3>Choose Your Course & Pay</h3>
                                    <p>From your dashboard, browse available courses, make payment, and start learning right away.</p>
                                </div>
                            </div>
                            <div class="join-con">
                                <div class="teps">
                                    <button>4</button>
                                </div>
                                <div>
                                    <h3>Start Learning</h3>
                                    <p>Dive into interactive lessons, real-world projects, and track your progress from your dashboard.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="gain">
                <h1>Your Complete Path to Mastery</h1>
                <p>At Ogalearn, we believe in a holistic approach to learning. Our platform is designed to guide you through every step of your educational journey, ensuring you gain the skills and knowledge needed to excel in your career.</p>
                <div class="gain-container">
                    <div class="gain-imgage">
                        <img src="{{ asset('portrait-person-promoting-marketing-campaign-removebg-preview.png') }}" alt="All-in-one learning experience">
                    </div>
                    <div class="gain-text">
                        <h1>What you'll gain</h1>
                        <div class="gain-text-all">
                            <div>
                                <span><h4>Build Real world Projects:</h4> At Ogalearn, you won’t just watch tutorials — you’ll build real-world projects like blogs, e-commerce stores, and portfolios. Every lesson is hands-on, and by the time you graduate, you’ll have a portfolio of practical projects that prove your skills and make you job-ready</span>
                            </div>
                            <div>
                                <span><h4>Fast-Paced Learning:</h4> Our curriculum is designed to get you job-ready as quickly as possible. We focus on the most relevant skills and technologies, so you can start your career without unnecessary delays.</span>
                            </div>
                            <div>
                                <span><h4>Expert Guidance:</h4> Our instructors are industry professionals with real-world experience. They provide personalized feedback and support to help you succeed.</span>
                            </div>
                        </div>
                        <a href=""><button>Register to get started Now</button></a>
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
                        {{-- <div>
                            <h3 class="about-us">Why Choose Us</h3>
                        </div> --}}
                    </div>
                    <div class="about-text">
                        <div class="we">
                            <b><p class="otp-title">Earn a Recognized Certificate</p></b>
                            <p class="spend otp">At the end of your program, you’ll be awarded a Certificate of Completion — a proof of your dedication and newly acquired skills. This digital certificate can be shared with employers, added to your CV,
                                 or showcased on LinkedIn to boost your career opportunities.</p>
                        </div>
                        <div>
                            <hr class="dive">
                        </div>
                        <div class="otp-chid">
                            <b><p class="otp-title">Unlock New Opportunities </p></b>
                            <p class="otp">Your certificate doesn’t just celebrate course completion—it opens doors. Use it to boost your credibility,
                                 win client trust, or secure your next big role.</p>
                        </div>
                        <div class="learn">
                            <a href="{{ route('learn.with.ogalearn') }}">
                                <button>Register</button>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="about-img3">
                    <img src="{{ asset('certificate.png') }}" alt="">
                </div>
            </div>


            <div id="course-scroll" class="course">
                <div class="course-content">
                    <div class="center">
                        <h3 class="course-head">Courses</h3>
                        {{-- <h2 class="offer">Start learning with free courses</h2> --}}
                    </div>
                    <div class="course-menu">
                        <div class="cou-menu">
                            <div class="cou-men-flex">
                                 <a>
                                    <div>
                                        <div class="cou-menu-con">
                                            <div><img src="{{ asset('person-front-computer-working-html.jpg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Full Stack Development</h3>
                                                {{-- <h2 class="noty">Earn A Degree</h2> --}}
                                                <p>Become a complete developer by mastering both the front and back end of web applications. This course takes you from building beautiful user interfaces to powering them with robust server-side logic and databases.</p>
                                            </div>

                                            <div class="see-more" style="display:none;">
                                                <p></p>
                                            </div>
                                            
                                            <button class="read-btn" onclick="toggleSeeMore(this)">Read More</button>
                                        </div>
                                    </div>
                                </a>

                                <!-- Card 2 -->
                                <a>
                                    <div>
                                        <div class="cou-menu-cen">
                                            <div><img src="{{ asset('20892632.jpg') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Front End Development</h3>
                                                <p>Master the art of building beautiful, responsive, and user-friendly websites. In this course, you’ll learn HTML, CSS, JavaScript, and modern frameworks to bring ideas to life on the web. By the end, you’ll be able to design interfaces that engage users and deliver seamless digital experiences.</p>
                                            </div>

                                            <div class="see-more" style="display:none;">
                                                <p>What you will learn</p>
                                            </div>
                                            <button class="read-btn" onclick="toggleSeeMore(this)">Read More</button>
                                        </div>
                                    </div>
                                </a>

                                <!-- Card 3 -->
                                <a>
                                    <div>
                                        <div class="cou-menu-can">
                                            <div><img src="{{ asset('computer-programming-coding-background_840382-42.png') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Back End Development</h3>
                                                {{-- <h2 class="noty">Earn A Degree</h2> --}}
                                                <p>Learn to power applications from behind the scenes. This course covers server-side programming, databases, APIs, and authentication systems. You’ll gain the skills to build scalable, secure, and high-performance applications that drive real-world products.</p>
                                            </div>

                                            <div class="see-more" style="display:none;">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, architecto! Expedita delectus illo necessitatibus possimus quisquam rerum, voluptas, exercitationem neque consectetur, pariatur praesentium quidem tempore quia distinctio officiis nam non.</p>
                                            </div>
                                            
                                            <button class="read-btn" onclick="toggleSeeMore(this)">Read More</button>
                                        </div>
                                    </div>
                                </a>

                                <!-- Card 4 -->
                                <a>
                                    <div>
                                        <div class="cou-menu-can">
                                            <div><img src="{{ asset('graphic-design-log.png') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Graphics Design</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>

                                            <div class="see-more" style="display:none;">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, architecto! Expedita delectus illo necessitatibus possimus quisquam rerum, voluptas, exercitationem neque consectetur, pariatur praesentium quidem tempore quia distinctio officiis nam non.</p>
                                            </div>
                                            
                                            <button class="read-btn" onclick="toggleSeeMore(this)">Read More</button>
                                        </div>
                                    </div>
                                </a>

                                <!-- Card 5 -->
                                <a>
                                    <div>
                                        <div class="cou-menu-can">
                                            <div><img src="{{ asset('employee.png') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Data Analysis</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>

                                            <div class="see-more" style="display:none;">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, architecto! Expedita delectus illo necessitatibus possimus quisquam rerum, voluptas, exercitationem neque consectetur, pariatur praesentium quidem tempore quia distinctio officiis nam non.</p>
                                            </div>
                                            
                                            <button class="read-btn" onclick="toggleSeeMore(this)">Read More</button>
                                        </div>
                                    </div>
                                </a>

                                <!-- Card 4 -->
                                <a>
                                    <div>
                                        <div class="cou-menu-can">
                                            <div><img src="{{ asset('graphic-design-log.png') }}" alt="Image"></div>
                                            <div class="course-topic">
                                                <h3 class="topy">Computer Appreciation</h3>
                                                <h2 class="noty">Earn A Degree</h2>
                                                <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                            </div>

                                            <div class="see-more" style="display:none;">
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, architecto! Expedita delectus illo necessitatibus possimus quisquam rerum, voluptas, exercitationem neque consectetur, pariatur praesentium quidem tempore quia distinctio officiis nam non.</p>
                                            </div>
                                            
                                            <button class="read-btn" onclick="toggleSeeMore(this)">Read More</button>
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

                            <!-- ðŸ‘‡ HIDDEN by default -->
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
                        <!-- ðŸ‘‡ SHOW MORE BUTTON -->
                            <div class="more-course">
                                <a class="shomo" id="shomo">
                                    {{-- <button id="shomo-button">Show More</button> --}}
                                </a>
                            </div>
                    </div>
                </div>
            </div>



            {{-- <div class="services">
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
                            </div>
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
                        {{-- <button id="view-more-btn">View More Services</button>
                    </div>
                </div>
            </div> --}}

<section class="image-slider-section py-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="testimonial-card" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background:#fff; box-shadow:0 4px 6px rgba(0,0,0,0.1); text-align:center;">
                    <!-- Person's remarks -->
                    <p style="font-style:italic; color:#555; margin-bottom:15px;">
                        "This platform really helped me understand coding better. The lessons were easy to follow and very practical!"
                    </p>
                    <!-- Rating stars -->
                    <div style="color:#FFD700; font-size:18px; margin-bottom:10px;">
                        ★ ★ ★ ★ ☆
                    </div>
                    <!-- Person giving testimony -->
                    <h4 style="margin:0; font-weight:bold; color:#333;">John Doe</h4>
                    <small style="color:#888;">Student, Web Development</small>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-card" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background:#fff; box-shadow:0 4px 6px rgba(0,0,0,0.1); text-align:center;">
                    <!-- Person's remarks -->
                    <p style="font-style:italic; color:#555; margin-bottom:15px;">
                        "This platform really helped me understand coding better. The lessons were easy to follow and very practical!"
                    </p>
                    <!-- Rating stars -->
                    <div style="color:#FFD700; font-size:18px; margin-bottom:10px;">
                        ★ ★ ★ ★ ☆
                    </div>
                    <!-- Person giving testimony -->
                    <h4 style="margin:0; font-weight:bold; color:#333;">Klissic Garri</h4>
                    <small style="color:#888;">Student, Garri 4 life</small>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-card" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background:#fff; box-shadow:0 4px 6px rgba(0,0,0,0.1); text-align:center;">
                    <!-- Person's remarks -->
                    <p style="font-style:italic; color:#555; margin-bottom:15px;">
                        "This platform really helped me understand coding better. The lessons were easy to follow and very practical!"
                    </p>
                    <!-- Rating stars -->
                    <div style="color:#FFD700; font-size:18px; margin-bottom:10px;">
                        ★ ★ ★ ★ ☆
                    </div>
                    <!-- Person giving testimony -->
                    <h4 style="margin:0; font-weight:bold; color:#333;">Goodluck Garri</h4>
                    <small style="color:#888;">Student, Web Development</small>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-card" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background:#fff; box-shadow:0 4px 6px rgba(0,0,0,0.1); text-align:center;">
                    <!-- Person's remarks -->
                    <p style="font-style:italic; color:#555; margin-bottom:15px;">
                        "This platform really helped me understand coding better. The lessons were easy to follow and very practical!"
                    </p>
                    <!-- Rating stars -->
                    <div style="color:#FFD700; font-size:18px; margin-bottom:10px;">
                        ★ ★ ★ ★ ☆
                    </div>
                    <!-- Person giving testimony -->
                    <h4 style="margin:0; font-weight:bold; color:#333;">Esther trouble</h4>
                    <small style="color:#888;">Student, Mavis Bitcoin</small>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-card" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background:#fff; box-shadow:0 4px 6px rgba(0,0,0,0.1); text-align:center;">
                    <!-- Person's remarks -->
                    <p style="font-style:italic; color:#555; margin-bottom:15px;">
                        "This platform really helped me understand coding better. The lessons were easy to follow and very practical!"
                    </p>
                    <!-- Rating stars -->
                    <div style="color:#FFD700; font-size:18px; margin-bottom:10px;">
                        ★ ★ ★ ★ ☆
                    </div>
                    <!-- Person giving testimony -->
                    <h4 style="margin:0; font-weight:bold; color:#333;">Mr Love</h4>
                    <small style="color:#888;">Developer, Web Developer</small>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="testimonial-card" style="max-width:400px; margin:auto; padding:20px; border:1px solid #ddd; border-radius:10px; background:#fff; box-shadow:0 4px 6px rgba(0,0,0,0.1); text-align:center;">
                    <!-- Person's remarks -->
                    <p style="font-style:italic; color:#555; margin-bottom:15px;">
                        "This platform really helped me understand coding better. The lessons were easy to follow and very practical!"
                    </p>
                    <!-- Rating stars -->
                    <div style="color:#FFD700; font-size:18px; margin-bottom:10px;">
                        ★ ★ ★ ★ ☆
                    </div>
                    <!-- Person giving testimony -->
                    <h4 style="margin:0; font-weight:bold; color:#333;">Op Kingz Garri</h4>
                    <small style="color:#888;">Student, Web Development</small>
                </div>
            </div>
        </div>

        <!-- Navigation arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination dots -->
        <div class="swiper-pagination" style="top: 14rem"></div>
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
                                        <div class="furth">
                                            <div class="job-img" data-popup="popup1">
                                                <div class="down-down">
                                                    <img src="{{ asset('Bloommonie.png') }}" alt="Image">
                                                    <div class="furth-info">
                                                        <h6 class="topy">Bloommonie SAAS</h6>
                                                        {{-- <h5 class="noty">Earn A Degree</h5> --}}
                                                        <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="furth">
                                            <div class="job-img" data-popup="popup2">
                                                <div>
                                                    <img src="{{ asset('doums.png') }}" alt="Image">
                                                    <div class="furth-info">
                                                        <h6 class="topy">Real Estate</h6>
                                                        {{-- <h5 class="noty">Earn A Degree</h5> --}}
                                                        <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="furth">
                                            <div class="job-img" data-popup="popup3">
                                                <div>
                                                    <img src="{{ asset('clev.png') }}" alt="Image">
                                                    <div class="furth-info">
                                                        <h6 class="topy">Clev Dynamics</h6>
                                                        {{-- <h5 class="noty">Earn A Degree</h5> --}}
                                                        <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="furth">
                                            <div class="job-img" data-popup="popup4">
                                                <div>
                                                    <img src="{{ asset('joemax.png') }}" alt="Image">
                                                    <div class="furth-info">
                                                        <h6 class="topy">Joe Max</h6>
                                                        {{-- <h5 class="noty">Earn A Degree</h5> --}}
                                                        <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="furth">
                                            <div class="job-img" data-popup="popup5">
                                                <div>
                                                    <img src="{{ asset('Emminent.png') }}" alt="Image">
                                                    <div class="furth-info">
                                                        <h6 class="topy">Emminent Strategies</h6>
                                                        {{-- <h5 class="noty">Earn A Degree</h5> --}}
                                                        <p>Do you have a great idea but need help to turn it into a business? Find courses about necessary business and financial skills to build and run your own start-up.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="go-flex2">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div id="popup1" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('Bloommonie.png') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Ogalearn SAAS</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>SAAS</p>
                            {{-- <h2>Services We Provide</h2>
                            <p>Digital Marketing<br>Web Design<br>Web Development</p> --}}
                            <a href="https://bloommonieclient90.store/" target="_blank"><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup2" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('doums.png') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Domus Properties</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Real Estate Service</p>
                            {{-- <h2>Services We Provide</h2>
                            <p>Installation Of Frontiers<br>Importation Of Vietnamise<br>Chizzy's Acrylic & Gel Nail's</p> --}}
                            <a href="https://domus.ng" target="_blank"><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup3" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('clev.png') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Clev Dynamics</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Oil Servicing</p>
                            {{-- <h2>Services We Provide</h2>
                            <p>Digital Marketing<br>Web Design<br>Web Development</p> --}}
                            <a href="https://clevdynamic.com/" target="_blank"><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup4" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('joemax.png') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Joemax</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Solar Installation</p>
                            {{-- <h2>Services We Provide</h2>
                            <p>Mini Militia Teaching<br>Player X<br>Boss</p> --}}
                            <a href="#"><h2>Visit Website</h2></a>
                        </div>
                    </div>
                    <button class="cancel-btn">&times;</button>
                </div>
                <div id="popup5" class="popup-content">
                    <div class="popo">
                        <div class="popo-con1"><img class="pop-shift" src="{{ asset('Emminent.png') }}" alt=""></div>
                        <hr  style="border: solid #F0F2F5 0.1px; margin-top: 1rem;">
                        <div class="popo-con2">
                            <h1>Silver</h1>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur itaque cumque unde eaque, animi laudantium nobis, asperiores officiis eos ratione rem placeat magni repellat quas non tenetur accusamus. Veritatis, sit.</p>
                            <h2>Industry</h2>
                            <p>Trading</p>
                            {{-- <h2>Services We Provide</h2>  --}}
                            <a href="https://www.emminentstrategies.com" target="_blank"><h2>Visit Website</h2></a>
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

            <div class="faq-wrapper">

                <!-- Left Side -->
                <div class="faq-left">
                    <h4>Frequently Asked Questions</h4>
                    <h2>Start Learning <br>Find Here.</h2>
                    <p>Start an adventure on discovering amazing courses</p>
                    <a href="{{ route('register') }}"><button class="contact-btn">Register Now</button></a>
                </div>

                <!-- Right Side -->
                <div class="faq-right">
                    <div class="faq-item">
                        <div class="faq-question">Is Opening An Account Free?</div>
                        <div class="faq-answer">Yes, creating an account is completely free. You can sign up and start using our services right away without paying any fees.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">Why Do I Need To Logout Every Time?</div>
                        <div class="faq-answer">Logging out helps secure your account, especially on shared or public devices, and prevents unauthorized access.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">How To Open An Account?</div>
                        <div class="faq-answer">Click on the "Sign Up" button, fill in the required details, and verify your email address to activate your account.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">I Forgot My Password?</div>
                        <div class="faq-answer">Click on "Forgot Password" at the login page and follow the instructions to reset your password via email.</div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-question">How Much Percentage Will I Make A Year?</div>
                        <div class="faq-answer">Your yearly percentage depends on the plan you choose. Please check our pricing and plan details for more information.</div>
                    </div>
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

            <script>
    const questions = document.querySelectorAll(".faq-question");

questions.forEach((question) => {
    question.addEventListener("click", () => {
        const openQuestion = document.querySelector(".faq-question.active");

        // Close currently open FAQ
        if (openQuestion && openQuestion !== question) {
            openQuestion.classList.remove("active");
            const openAnswer = openQuestion.nextElementSibling;
            openAnswer.style.maxHeight = null;
            openAnswer.classList.remove("open");
        }

        // Toggle clicked FAQ
        question.classList.toggle("active");
        const answer = question.nextElementSibling;
        if (question.classList.contains("active")) {
            answer.classList.add("open");
            answer.style.maxHeight = answer.scrollHeight + "px"; // <-- ensures correct height
        } else {
            answer.style.maxHeight = null;
            answer.classList.remove("open");
        }
    });
});

</script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.1.0/typed.umd.js" integrity="sha512-+2pW8xXU/rNr7VS+H62aqapfRpqFwnSQh9ap6THjsm41AxgA0MhFRtfrABS+Lx2KHJn82UOrnBKhjZOXpom2LQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        //TYPE WRITER EFFECT
        var typed = new Typed(".typing", {
            strings:["", "Build Skills That Get You Hired", "", "Code Your Way to Success", "", "Your Tech Career Starts Here", "", "5 Months to Full-Stack Mastery", "", "Code Your Way to Success", "", "Learn Fast. Build Big"],
            typeSpeed:100,
            BackSpeed:300,
            loop:true
        })

    </script>

<script>
function toggleSeeMore(btn) {
    const seeMoreDiv = btn.previousElementSibling;
    if (seeMoreDiv.style.display === "none" || seeMoreDiv.style.display === "") {
        seeMoreDiv.style.display = "block";
        btn.textContent = "Read Less";
    } else {
        seeMoreDiv.style.display = "none";
        btn.textContent = "Read Me";
    }
}
</script>
    </body>
</html>
