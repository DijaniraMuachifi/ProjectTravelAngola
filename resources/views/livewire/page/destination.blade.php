<div>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('luanda-1200x740.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Tour List <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Tours List</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="search-wrap-1 ftco-animate">
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
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($results as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap">
                        <a href="#" class="img" style="background-image: url({{asset('provincias/'.$item->main_image)}});">
                            <span class="price">{{$item->price_from}}/person</span>
                        </a>
                        <div class="text p-4">
                            <span class="days">8 Days Tour</span>
                            <h3><a href="#">{{$item->name}}</a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span> {{$item->short_description}}</p>
                            <ul>
                                <li><span class="flaticon-shower"></span>2</li>
                                <li><span class="flaticon-king-size"></span>3</li>
                                <li><span class="flaticon-mountains"></span>Near Mountain</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="row mt-5">
                <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                            {{ $results->links('components.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
