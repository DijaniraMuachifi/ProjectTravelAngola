<div>
    {{-- Image Main --}}
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('images/IMG_5472.webp') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Welcome to Angola</span>
                    <h1 class="mb-4">Explore the <span class="text-warning">Wonders</span> of Angola</h1>
                    <p class="caps mb-5">Travel through the most beautiful corners of the country with ease</p>

                    <div class="d-flex align-items-center">
                        <a href="#destinations" class="btn btn-primary btn-lg px-4 py-3 mr-3">
                            Explore Now <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="https://www.youtube.com/watch?v=ouTWfsddFa0"
                            class="icon-video popup-vimeo d-flex align-items-center justify-content-center">
                            <span class="fa fa-play mr-2"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
    {{-- Section form form search locatiopn and  Hotel --}}

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1"
                                        aria-selected="true">Search Tour</a>

                                    <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                                        role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">

                                <div class="tab-content" id="v-pills-tabContent">
                                    {{-- Viajem com a gente --}}
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-nextgen-tab">
                                        <form action="{{ route('search') }}" class="search-property-1">

                                            <input type="hidden" name="type" value="tour">
                                            <div class="row no-gutters">
                                                <!-- Origin -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="origin">Origin</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-map-marker"></span>
                                                            </div>
                                                            <select name="origin" id="origin" class="form-control"
                                                                name='origin'>
                                                                <option value="" disabled selected>Select origin
                                                                    province</option>
                                                                @foreach ($provincias as $provincia)
                                                                    <option value="{{ $provincia->id }}">
                                                                        {{ $provincia->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Destination -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="destination">Destination</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-search"></span></div>
                                                            <select name="destination" id="destination"
                                                                class="form-control" name='destination'>
                                                                <option value="" disabled selected>Select
                                                                    destination province</option>
                                                                @foreach ($provincias as $provincia)
                                                                    <option value="{{ $provincia->id }}">
                                                                        {{ $provincia->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Check-in -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="checkin_date">Check-in Date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span>
                                                            </div>
                                                            <input type="text" class="form-control checkin_date"
                                                                name='checkin_date'>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-- Price Limit -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="price_limit">Price Limit</label>
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span
                                                                        class="fa fa-chevron-down"></span></div>
                                                                <select name="price_limit" id="price_limit"
                                                                    class="form-control">
                                                                    <option value="">10,000</option>
                                                                    <option value="">50,000</option>
                                                                    <option value="">100,000</option>
                                                                    <option value="">200,000</option>
                                                                    <option value="">300,000</option>
                                                                    <option value="">400,000</option>
                                                                    <option value="">500,000</option>
                                                                    <option value="">600,000</option>
                                                                    <option value="">700,000</option>
                                                                    <option value="">800,000</option>
                                                                    <option value="">900,000</option>
                                                                    <option value="">1,000,000</option>
                                                                    <option value="">2,000,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="col-md d-flex">
                                                    <div class="form-group d-flex w-100 border-0">
                                                        <div class="form-field w-100 align-items-center d-flex">
                                                            <input type="submit" name="formtour" value="SearchTour"
                                                                class="align-self-stretch form-control btn btn-primary">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel"
                                        aria-labelledby="v-pills-performance-tab">
                                        <form action="{{ route('search') }}" class="search-property-1">
                                            @csrf
                                            <input type="hidden" name="type" value="hotel">
                                            <div class="row no-gutters">
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="destination">Destination</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-search"></span>
                                                            </div>
                                                            <select name='destino'
                                                                id="destino" class="form-control">
                                                                <option value="" disabled selected>Select
                                                                    destination province</option>
                                                                @foreach ($provincias as $provincia)
                                                                    <option value="{{ $provincia->name }}">
                                                                        {{ $provincia->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Check-in date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span>
                                                            </div>
                                                            <input type="date" class="form-control "
                                                                placeholder="Check In Date" name='data1'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="#">Check-out date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span>
                                                            </div>
                                                            <input type="date" class="form-control "
                                                                placeholder="Check Out Date" name='data2'>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg d-flex">
                                                    <div class="form-group d-flex w-100 border-0">
                                                        <div class="form-field w-100 align-items-center d-flex">
                                                            <input type="submit" value="Search"

                                                                class="align-self-stretch form-control btn btn-primary p-0">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    {{-- Section  for Abou My Angola --}}
    <section id="destinations" class="ftco-section services-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100">
                        <span class="subheading">Welcome to Angola</span>
                        <h2 class="mb-4">It's time to start your adventure in Angola</h2>
                        <p>A land of rich culture, stunning landscapes, and untold stories, Angola invites you to
                            explore its hidden gems and vibrant traditions.</p>
                        <p>From the golden beaches of Benguela to the majestic Kalandula Falls, and the wild beauty of
                            Kissama National Park — every corner holds a new adventure. Experience the warmth of Angolan
                            hospitality and discover a destination like no other in the heart of Africa.</p>
                        <p><a href="{{ route('destination') }}" class="btn btn-primary py-3 px-4">Explore
                                Destinations</a></p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url(images/catarata-ruacana-angola-namibia-africa-web-1170-768.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-paragliding"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Nature & Adventure</h3>
                                    <p>Explore breathtaking natural wonders such as the Kalandula Falls, Tundavala Gap,
                                        and the Namib Desert in southern Angola.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url(images/igma.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-route"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Safari & Wildlife</h3>
                                    <p>Enjoy an unforgettable experience at Kissama National Park, home to elephants,
                                        giraffes, and other iconic African wildlife.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url(images/Angola-20101118-184022-12269-1240x827.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-tour-guide"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Culture & History</h3>
                                    <p>Discover Angola's rich heritage through its monuments, museums, and traditions.
                                        Don't miss the iconic Moon Viewpoint and National Museum of Anthropology.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url(images/sehr-schon.jpg);">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="flaticon-map"></span>
                                </div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Tropical Beaches</h3>
                                    <p>Relax on the crystal-clear waters of Blue Bay, Praia Morena, and Cabo Ledo —
                                        perfect for swimming, surfing, and unforgettable sunsets.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section class="ftco-section ftco-about img"style="background-image: url(images/bg_4.jpg);">
        <div class="overlay"></div>
        <div class="container py-md-5">
            <div class="row py-md-5">
                <div class="col-md d-flex align-items-center justify-content-center">
                    <a href="https://vimeo.com/45830194"
                        class="icon-video popup-vimeo d-flex align-items-center justify-content-center mb-4">
                        <span class="fa fa-play"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about ftco-no-pt img">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-12 about-intro">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-stretch">
                            <div class="img d-flex w-100 align-items-center justify-content-center"
                                style="background-image:url({{ asset('angola.png') }});">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-5 py-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <span class="subheading">Why Visit Angola?</span>
                                    <h2 class="mb-4">A land of contrasts and natural beauty</h2>
                                    <p>Angola is a country of remarkable diversity, from the tropical Atlantic coast to
                                        the arid south and lush northern rainforests. <br>Over 1,600 km of pristine
                                        coastline with world-class beaches. <br>Home to diverse ecosystems and national
                                        parks.</p>
                                    <p><a href="{{ route('hotel') }}" class="btn btn-primary">Book Your Destination</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-bottom" style="background-image: url(images/bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-4">Tourist Feedback</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_3.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_1.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4">
                                <div class="text">
                                    <p class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </p>
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.</p>
                                    <div class="d-flex align-items-center">
                                        <div class="user-img" style="background-image: url(images/person_2.jpg)">
                                        </div>
                                        <div class="pl-3">
                                            <p class="name">Roger Scott</p>
                                            <span class="position">Marketing Manager</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
