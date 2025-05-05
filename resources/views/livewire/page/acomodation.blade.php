<div>
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('hoteis/Carpe-Diem-Bar-2-1.jpeg')}});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Hotel <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Hotel</h1>
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
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                @foreach ($results as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="project-wrap hotel">
                        <a href="#" class="img" style="background-image: url({{asset('hoteis/'.$item->main_image)}});">
                            <span class="price">{{$item->price_per_night}} kz/night</span>
                        </a>
                        <div class="text p-4">
                            <p class="star mb-2">
                                @for ($i = 1; $i <= $item->stars; $i++)
                                <span class="fa fa-star"></span>
                                @endfor


                            </p>
                            <h3><a href="#">{{$item->name}}</a></h3>
                            <p class="location"><span class="fa fa-map-marker"></span> {{$item->location}}</p>
                            <p>
                               {{$item->amenities}}
                            </p>
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
