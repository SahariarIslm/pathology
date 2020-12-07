@extends('Master.frontMaster')
@section('title')
    Welcome To Dokan POS Software
@endsection
@section('content')

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    <div class="border-bottom top-bar py-2 bg-dark" id="home-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="mb-0">
              <span class="mr-3"><strong class="text-white">Phone:</strong> 
                <a href="tel://#">+880 1717468814</a></span>
              <span><strong class="text-white">Email:</strong> 
                <a href="#">info@dokanpos.com</a></span>
            </p>
          </div>
          <div class="col-md-6">
            <ul class="social-media">
              <li><a href="https://facebook.com/Dokanpos/" class="p-2"><span class="icon-facebook"></span></a></li>
              <li><a href="https://www.linkedin.com/showcase/dokanpos-pos-software" class="p-2"><span class="icon-linkedin"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
              <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
        </div>
      </div> 
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-2">
            <h1 class="mb-0 site-logo"><a href="{{ route('frontend') }}" class="text-black h2 mb-0">
                {{-- {{ config('app.name') }}<span class="text-primary">.</span> --}}
                <img src="{{asset('/public')}}/Master/img/logo/logo_image.png" style="height:60px;"/></a>
            </h1>
          </div>
          <div class="col-10 col-md-10">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#work-section" class="nav-link">Features</a></li>
                <li><a href="#services-section" class="nav-link">Services</a> </li>
                <li><a href="#packages-section" class="nav-link">Packages</a> </li>
               <li> <a href="http://blog.creativesoftware.com.bd/" target="_blank">Blog</a></li>

                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                @if (Route::has('login'))
                @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    @endif
                @endauth
                @endif
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  

    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('/public') }}/FrontEnd/images/Slider.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                        
            <div class="row justify-content-center mb-4">
              <div class="col-md-8 text-center">
                <h1>Welcome To {{ config('app.name') }}
                
                {{--  <span class="typed-words"></span></h1>
                <p class="lead mb-5">Free Web Template by <a href="#" target="_blank">Colorlib</a></p>  --}}
                <div><a data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="btn btn-primary btn-md">Watch Video</a></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>  


    

    <section class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="p-3 box-with-humber">
              <div class="number-behind">01.</div>
              <h2 class="text-primary">Invoice Create</h2>
              <p class="mb-4">Make attractive, professional invoices in a single click with the invoice generator trusted by millions of people.Your Create invoice so easy. </p>
              <ul class="list-unstyled ul-check primary">
                 <li>Invoice List</li>
                  <li>Invoice Print</li>
                  <li>Seles Report</li>
               
               
              </ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="p-3 box-with-humber">
              <div class="number-behind">02.</div>
              <h2 class="text-primary">Stock Update</h2>
              <p class="mb-4">Inventory management is a step in the supply chain where inventory and stock quantities are tracked in and out of your warehouse.</p>
              <ul class="list-unstyled ul-check primary">
                <li>Real Time Stock </li>
                <li>Stock Alert</li>
                <li>Expiry Stock</li>
              </ul>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="p-3 box-with-humber">
              <div class="number-behind">03.</div>
              <h2 class="text-primary">Instant Calculator</h2>
              <p class="mb-4">Calculating Stock Value. Overview In order for Dokan Pos to calculate certain financial data, for instance profit, it needs an accurate measure of the Stock Value.</p>
              <ul class="list-unstyled ul-check primary">
                <li>Calculating Stock</li>
                <li>Financial Data</li>
                <li>Instance Profit</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section" id="work-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center">Software Features</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores, itaque neque, delectus odio iure explicabo.</p>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Dashboard.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Dashboard.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Dashboard</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Product Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Product Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Product Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Purchase Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Purchase Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Purchase Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Sales Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Sales Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Sales Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Expence Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Expence Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Expence Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Collection Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Collection Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Collection Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>


           <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Payment Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Payment Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Payment Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
          
           <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Stock Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Stock Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Stock Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
           <div class="col-md-6 col-lg-4">
            <a href="{{ asset('/public') }}/FrontEnd/images/Invoice Management.png" class="media-1" data-fancybox="gallery">
              <img src="{{ asset('/public') }}/FrontEnd/images/Invoice Management.png" alt="Image" class="img-fluid">
              <div class="media-1-content">
                <h2>Invoice Management</h2>
                <span class="category"></span>
              </div>
            </a>
          </div>
         
        </div>
      </div>
    </section>

    <section class="section ft-feature-1">
      <div class="container">
        <div class="row align-items-stretch">
          <div class="col-12 bg-black w-100 ft-feature-1-content">
            <div class="row align-items-center">
              <div class="col-lg-5">
                
                  <img src="{{ asset('/public') }}/FrontEnd/images/about_1.jpg" alt="Image" class="img-fluid mb-4 mb-lg-0">
                
              </div>
              <div class="col-lg-3 ml-auto">
                <div class="mb-5">
                  <h3 class="d-flex align-items-center"><span class="icon icon-beach_access mr-2"></span><span>User Friendly</span></h3>
                  <p>User-friendly describes a hardware device or software interface that is easy to use.</p>
                  <p><a href="#">Read More</a></p>
                </div>

                <div>
                  <h3 class="d-flex align-items-center"><span class="icon icon-build mr-2"></span><span>Connect Android Apps</span></h3>
                  <p> One of the easiest methods to wirelessly transfer files between your Android device and your desktop is to use Dokan Pos. Once you connect your computer with your phone via the free Dokan Pos, you can use the web interface to view Sales, Purchase, Stock Report in your Android device.</p>
                  <p><a href="#">Read More</a></p>
                </div>

              </div>
              <div class="col-lg-3">
                <div class="mb-5">
                  <h3 class="d-flex align-items-center"><span class="icon icon-format_paint mr-2"></span><span>Real Time Calculate</span></h3>
                  <p>A system is said to be real-time if the total correctness of an operation depends not only upon its logical correctness, but also upon the time in which it is performed.</p>
                  <p><a href="#">Read More</a></p>
                </div>

                <div>
                  <h3 class="d-flex align-items-center"><span class="icon icon-question_answer mr-2"></span><span>24/7 Support</span></h3>
                  <p>If you're awake, we are too. When you need help, our team of experts work directly with you via our 24/7 live chat to reach a quick and efficient resolution.Your Services is an around the clock customer support centre in the Bangladesh.</p>
                  <p><a href="#">Read More</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="site-section border-bottom" id="services-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-8 text-center" data-aos="fade-up">
            <h2 class="text-black h1 site-section-heading text-center">Our Services</h2>
          </div>
        </div>
        <div class="row align-items-stretch">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-laptop2"></span></div>
              <div>
                <h3>Today Highlights</h3>
                <p>calculation of daily purchases, sales, expenses and profit-loss. In some cases, this might be a gross loss.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-shopping_cart"></span></div>
              <div>
                <h3>Product Purchase </h3>
                <p>Purchasing is a business or organization attempting to acquire goods or services to accomplish its goals. Daily Products Purchase, Pre-order list, Report</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-question_answer"></span></div>
              <div>
                <h3>Product Sales</h3>
                <p>A daily sales report is a management tool used by businesses, sales  and managers in order to extract the most relevant daily sales data.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>


          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-format_paint"></span></div>
              <div>
                <h3>Expanse</h3>
                <p>Most revenue and expense accounts that need to be set up are common to all businesses, some depend on the type of business. Calculations all expense</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-extension"></span></div>
              <div>
                <h3>Stock/ Inventory</h3>
                <p>stock control techniques and learn how to develop a suitable inventory system for your business.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="unit-4 d-flex">
              <div class="unit-4-icon mr-4"><span class="text-primary icon-phonelink"></span></div>
              <div>
                <h3>Profit/Loss</h3>
                <p>profit and loss Statement is a financial statement that summarizes the revenues, costs, and expenses incurred during a specified period, usually a fiscal quarter or year.</p>
                <p><a href="#">Learn More</a></p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row mb-5">
          
          <div class="col-md-5 ml-auto mb-5 order-md-2" data-aos="fade">
            <img src="{{ asset('/public') }}/FrontEnd/images/about_1.jpg" alt="Image" class="img-fluid rounded">
          </div>
          <div class="col-md-6 order-md-1" data-aos="fade">

            <div class="row">

              <div class="col-12">
                <div class="text-left pb-1">
                  <h2 class="text-black h1 site-section-heading">About Us</h2>
                </div>
              </div>
              <div class="col-12 mb-4">
                <p class="lead">In the digital age, are you still accounting analog ? 
                              Dokan Pos makes it easy to calculate your business.
                              simplify accounting for your business, expense more time in your family.</p>
              </div>
              <div class="col-md-12 mb-md-5 mb-0 col-lg-6">
                <div class="unit-4">
                  <div class="unit-4-icon mr-4 mb-3"><span class="text-secondary icon-phonelink"></span></div>
                  <div>
                    <h3>Web &amp; Mobile Specialties</h3>
                    <p>Have a fully-functional mobile application that can totally replace the necessity of the big screen to do anything with our mobile application development.</p>
                    <p class="mb-0"><a href="#">Learn More</a></p>
                  </div>
                </div>
              </div>
              <div class="col-md-12 mb-md-5 mb-0 col-lg-6">
                <div class="unit-4">
                  <div class="unit-4-icon mr-4 mb-3"><span class="text-secondary icon-extension"></span></div>
                  <div>
                    <h3>Intuitive Thinkers</h3>
                    <p>Intuitive thinking is basically the kind of thinking that helps you understand reality in the moment, without logic or analysis. We Develop So easy Inventory Management Software.</p>
                    <p class="mb-0"><a href="#">Learn More</a></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  
    

    <div class="site-section border-bottom" id="packages-section">
      <div class="container">
        <div class="row justify-content-center mb-4">
          <div class="col-md-7 text-center">
            <h2 class="text-black h1 site-section-heading">Our Packages</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100"
            style="padding-top: 40px; padding-bottom: 40px; margin-right:40px; margin-left:60px;
              border: 2px solid skyblue; border-radius: 1%; box-shadow: 10px 10px #888888;">
            <div class="person text-center">
              <h2 class="" style="color:skyblue;"><a href="#packages-section">Startup</a></h2>
              <img src="{{ asset('/public') }}/FrontEnd/packages/standart-price.png" alt="Image" 
                class="img-fluid rounded-circle w-50 mb-2">
              <div style="text-align: left; padding-left: 25px;">
                <p><span style="color:skyblue;" class="icon-power-off"></span>&nbsp; Setup Management</p>
                <p><span style="color:skyblue;" class="icon-inbox"></span>&nbsp; Product Management</p>
                <p><span style="color:skyblue;" class="icon-shopping-bag"></span>&nbsp; Purchase Management</p>
                <p><span style="color:skyblue;" class="icon-shopping-cart"></span>&nbsp; Sales Management</p> 
                <p><span style="color:skyblue;" class="icon-receipt"></span>&nbsp; Invoice Management</p>
                <p><span style="color:skyblue;" class="icon-area-chart"></span>&nbsp; Stock Management</p> 
                <p><span style="color:skyblue;" class="icon-print"></span>&nbsp; Report Management</p>
              </div>
              <div class="row mt-4">
                <div class="col-12 button-plan">
                  <a href="{{ route('register') }}" class="btn btn-outline-info"
                    style="box-shadow: 3px 3px skyblue;"><b>Sign Up Now</b></a>
                </div>
              </div>      						
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200"
            style="padding-top: 40px; padding-bottom: 40px; margin-right:45px; margin-left:45px;
              border: 2px solid red; border-radius: 1%; box-shadow: 10px 10px #888888;">
            <div class="person text-center">
              <h2 class=""><a href="#packages-section" style="color:red;">Professional</a></h2>
              <img src="{{ asset('/public') }}/FrontEnd/packages/prof-price.png" alt="Image" 
                class="img-fluid rounded-circle w-50 mb-2">
              <div style="text-align: left; padding-left: 25px;">
                <p><span style="color:red;" class="icon-power-off"></span>&nbsp; Include 
                    <a style="color:re d;" href="#packages-section">Startup Plan</a></p>
                <p><span style="color:red;" class="icon-truck"></span>&nbsp; Delivery Management</p>
                <p><span style="color:red;" class="icon-user-secret"></span>&nbsp; Employee Management</p>
                <p><span style="color:red;" class="icon-address-card"></span>&nbsp; Expense Management</p>    
                <p><span style="color:red;" class="icon-address-card-o"></span>&nbsp; Collection Management</p> 
                <p><span style="color:red;" class="icon-money"></span>&nbsp; Payment Management</p>
                <p><span style="color:red;" class="icon-bar-chart"></span>&nbsp; Gross Profit</p>
              </div>
              <div class="row mt-4">
                <div class="col-12 button-plan">
                  <a href="{{ route('register') }}" class="btn btn-outline-danger"
                    style="box-shadow: 3px 3px red;"><b>Sign Up Now</b></a>
                </div>
              </div>      			
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="300"
            style="padding-top: 40px; padding-bottom: 40px; margin-right:50px; margin-left:40px;
              border: 2px solid skyblue; border-radius: 1%; box-shadow: 10px 10px #888888;">
            <div class="person text-center">
              <h2 class="" style="color:skyblue;"><a href="#packages-section">Enterprise</a></h2>
              <img src="{{ asset('/public') }}/FrontEnd/packages/ultimate-price.png" alt="Image" 
                class="img-fluid rounded-circle w-50 mb-2">
              <div style="text-align: left; padding-left: 25px;">
                <p><span style="color:skyblue;" class="icon-power-off"></span>&nbsp; Include 
                    <a href="#packages-section">Startup Plan</a></p>
                <p><span style="color:skyblue;" class="icon-user-o"></span>&nbsp; Customer Ledger</p>    
                <p><span style="color:skyblue;" class="icon-user"></span>&nbsp; Supplier Ledger</p> 
                <p><span style="color:skyblue;" class="icon-barcode"></span>&nbsp; Barcode Management</p>
                <p><span style="color:skyblue;" class="icon-print"></span>&nbsp; A/C Receiveable Report</p>
                <p><span style="color:skyblue;" class="icon-print"></span>&nbsp; A/C Payable Report</p>
                <p><span style="color:skyblue;" class="icon-print"></span>&nbsp; Profit & Loss Report</p>
              </div>
              <div class="row mt-4">
                <div class="col-12 button-plan">
                  <a href="{{ route('register') }}" class="btn btn-outline-info"
                    style="box-shadow: 3px 3px skyblue;"><b>Sign Up Now</b></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <section class="site-section testimonial-wrap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="text-black h1 site-section-heading text-center">Testimonials</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          
        @foreach ($testimonial as $data)
          <div>
            <div class="testimonial">
              <blockquote class="mb-5">
                <p>{{ $data->comment }}</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <div>
                  <img src="{{ asset($data->picture) }}" alt="DokanPos Testimonial" 
                    class="img-fluid mr-2" style="height:100px; width:100px;">
                </div>
                <b>{{ $data->name }}</b> 
                 {{-- &nbsp;<small>( {{ $data->b_name }} )</small>  --}}
              </figure>
            </div>
          </div>
        @endforeach

        </div>
    </section> 


    <section class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="text-black h1 site-section-heading">Contact Us</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 mb-5">
            <form action="{{ route('contact.store') }}" method="post" class="p-5 bg-white">
              @csrf
              <div class="row">
                <h2 class="h4 text-black mb-5 col-lg-4">Contact Form</h2> 
                  <div class="col-lg-8.1">
                  @if(session('message'))
                      <div class="alert alert-dismissible alert-success">
                          {{--  style="padding-top: 0px; padding-bottom: 0px; 
                          margin-top: 0px; margin-bottom: 0px;">  --}}
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong>{{ session('message') }}</strong>
                      </div>      
                  @endif
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black" for="fname">Name</label>
                  <input name="name" type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-black" for="lname">Mobile</label>
                  <input name="mobile" type="number" id="lname" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input name="email" type="email" id="email" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="subject">Subject</label> 
                  <input name="subject" type="subject" id="subject" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-4">
                  <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                </div>
                
              </div>
            </form>

          </div>

          <div class="col-md-5">
            
            <div class="p-4 mb-3 bg-white">
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">New Elephant Road, Dhaka-1203, Bangladesh.</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+880 1717468814</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">info@dokanpos.com</a></p>

            </div>
            
          </div>
        </div>
      </div>
    </section>

    <a href="#" class="bg-primary py-5 d-block">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md10"><h2 class="text-white">Let's Get Started</h2></div>
        </div>
      </div>  
    </a>
    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>In the digital age, are you still accounting analog ? 
                    Dokan Pos makes it easy to calculate your business.
                    simplify accounting for your business, expense more time in your family.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3">
                <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="https://www.facebook.com/Dokanpos/" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="https://www.linkedin.com/showcase/dokanpos-pos-software" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
       
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="{{ route('subscriber.store') }}" method="post"> @csrf
              <div class="input-group mb-3">
                <input name="email" required type="email" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-white" type="submit" id="button-addon2">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top pt-2">
                <p>Copyright © <script>document.write(new Date().getFullYear());</script>
                    <u><a href="http://www.dokanpos.com">{{ config('app.name') }}</a></u> 
                        All rights reserved. &nbsp; Develop by 
                    <u><a href="http://www.creativesoftware.com.bd">Creative Software Ltd</a>.</u>
                </p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </div>

@endsection
