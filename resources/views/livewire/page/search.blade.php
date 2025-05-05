<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* Estilos personalizados */
        .results-tabs {
            border-bottom: 2px solid #dee2e6;
        }

        .results-tabs .nav-item {
            margin-bottom: -2px;
        }

        .results-tabs .nav-link {
            border: none;
            color: #6c757d;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 0;
            transition: all 0.3s ease;
        }

        .results-tabs .nav-link.active {
            color: #007bff;
            background-color: transparent;
            border-bottom: 3px solid #007bff;
        }

        .results-tabs .nav-link:hover:not(.active) {
            color: #0056b3;
            background-color: rgba(0, 123, 255, 0.05);
        }

        .result-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .result-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .hotel-image {
            height: 180px;
            width: 100%;
            object-fit: cover;
        }

        .btn-reserve {
            padding: 8px 25px;
            border-radius: 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-reserve:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
        }

        .rating-box {
            background: #f8f9fa;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
        }

        .rating-value {
            font-size: 24px;
            font-weight: bold;
            color: #ffc107;
        }

        .stars {
            color: #ffc107;
            font-size: 16px;
        }

        /* Animações */
        .animate__animated {
            animation-duration: 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate__fadeIn {
            animation-name: fadeIn;
        }

        <style>.filter-card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-card .card-header {
            border-radius: 10px 10px 0 0 !important;
        }

        .form-check-label {
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .transport-filter:checked+label {
            font-weight: 600;
            color: #007bff;
        }
    </style>
    </style>
    <section class="ftco-section ftco-no-pb ftco-no-pt" style="margin-top: 250px;">
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
                                            @csrf
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
                                                            <input type="date" class="form-control "
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
                                                            <select name='destino' id="destino"
                                                                class="form-control">
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

    <!-- Seção de Resultados -->
    <section class="ftco-section">
        <div class="container-fluid">
            @if ($typeSearch == 'tour')
                <!-- Abas de navegação para Tours -->
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10">
                        <div class="row">
                            <!-- Painel de Filtros (esquerda) -->
                            <div class="col-md-3">
                                <div class="card filter-card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">Filtrar por Transporte</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-check mb-3">
                                            <input class="form-check-input transport-filter" type="checkbox"
                                                value="aerio" id="filter-aerio" checked>
                                            <label class="form-check-label" for="filter-aerio">
                                                <i class="fas fa-plane mr-2"></i> Voos
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input transport-filter" type="checkbox"
                                                value="terrestre" id="filter-terrestre" checked>
                                            <label class="form-check-label" for="filter-terrestre">
                                                <i class="fas fa-bus mr-2"></i> Autocarros
                                            </label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input transport-filter" type="checkbox"
                                                value="maritimo" id="filter-maritimo" checked>
                                            <label class="form-check-label" for="filter-maritimo">
                                                <i class="fas fa-ship mr-2"></i> Barcos
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input transport-filter" type="checkbox"
                                                value="ferreo" id="filter-ferreo" checked>
                                            <label class="form-check-label" for="filter-ferreo">
                                                <i class="fas fa-train mr-2"></i> Comboios
                                            </label>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-light">
                                        <button class="btn btn-sm btn-primary w-100" id="apply-filters">Aplicar
                                            Filtros</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <ul class="nav nav-tabs results-tabs" id="tourTabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="fastest-tab" data-toggle="tab"
                                            href="#fastest" role="tab" aria-controls="fastest"
                                            aria-selected="true">
                                            <i class="fas fa-bolt mr-2"></i> Mais Rápidos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cheapest-tab" data-toggle="tab" href="#cheapest"
                                            role="tab" aria-controls="cheapest" aria-selected="false">
                                            <i class="fas fa-euro-sign mr-2"></i> Mais Baratos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="quality-tab" data-toggle="tab" href="#quality"
                                            role="tab" aria-controls="quality" aria-selected="false">
                                            <i class="fas fa-star mr-2"></i> Mais Qualidade
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="tourTabsContent">
                                    <!-- Mais Rápidos -->
                                    <div class="tab-pane fade show active" id="fastest" role="tabpanel"
                                        aria-labelledby="fastest-tab">
                                        <div class="row justify-content-center">
                                            @if ($search->count() > 0)
                                                @foreach ($search->sortBy('duracao') as $result)
                                                    <div class="col-md-10 mb-4">
                                                        <div
                                                            class="card result-card animate__animated animate__fadeIn">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    @switch($result->tipo_transporte)
                                                                        @case('aerio')
                                                                            Voo
                                                                            {{ $this->getProvianciaName($result->origem_id) }} →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('terrestre')
                                                                            Autocarros
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('maritimo')
                                                                            Barco
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('ferreo')
                                                                            Comboio
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @default
                                                                            Viagem
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                    @endswitch
                                                                </h5>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p><i class="far fa-clock mr-2"></i>
                                                                            <strong>Duração:</strong>
                                                                            {{ $result->duracao }}min
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <strong>Preço:</strong>
                                                                        {{ $result->preco }} kz</p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <p>
                                                                            <i
                                                                                class="fas
                                                                        @switch($result->tipo_transporte)
                                                                            @case('aerio') fa-plane @break
                                                                            @case('terrestre') fa-bus @break
                                                                            @case('maritimo') fa-ship @break
                                                                            @case('ferreo') fa-train @break
                                                                            @default fa-route
                                                                        @endswitch
                                                                        mr-2"></i>
                                                                            <strong>Companhia:</strong>
                                                                            {{ $result->transportadora_nome }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button
                                                                        class="btn btn-primary btn-reserve">Reservar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-10">
                                                    <div class="alert alert-info">
                                                        Nenhum resultado encontrado para os critérios de busca.
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Mais Baratos -->
                                    <div class="tab-pane fade" id="cheapest" role="tabpanel"
                                        aria-labelledby="cheapest-tab">
                                        <div class="row justify-content-center">
                                            @if ($search->count() > 0)
                                                @foreach ($search->sortBy('preco') as $result)
                                                    <div class="col-md-10 mb-4">
                                                        <div
                                                            class="card result-card animate__animated animate__fadeIn">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    @switch($result->tipo_transporte)
                                                                        @case('aerio')
                                                                            Voo
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('terrestre')
                                                                            Autocarros
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('maritimo')
                                                                            Barco
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('ferreo')
                                                                            Comboio
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @default
                                                                            Viagem
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                    @endswitch
                                                                </h5>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <p><i class="far fa-clock mr-2"></i>
                                                                            <strong>Duração:</strong>
                                                                            {{ $result->duracao }}min
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <strong>Preço:</strong>
                                                                        {{ $result->preco }} kz</p>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <p>
                                                                            <i
                                                                                class="fas
                                                                        @switch($result->tipo_transporte)
                                                                            @case('aerio') fa-plane @break
                                                                            @case('terrestre') fa-bus @break
                                                                            @case('maritimo') fa-ship @break
                                                                            @case('ferreo') fa-train @break
                                                                            @default fa-route
                                                                        @endswitch
                                                                        mr-2"></i>
                                                                            <strong>Companhia:</strong>
                                                                            {{ $result->transportadora_nome }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button
                                                                        class="btn btn-primary btn-reserve">Reservar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-10">
                                                    <div class="alert alert-info">
                                                        Nenhum resultado encontrado para os critérios de busca.
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Mais Qualidade -->
                                    <div class="tab-pane fade" id="quality" role="tabpanel"
                                        aria-labelledby="quality-tab">
                                        <div class="row justify-content-center">
                                            @if ($search->count() > 0)
                                                @foreach ($search->sortByDesc('avaliacao') as $result)
                                                    <div class="col-md-10 mb-4">
                                                        <div
                                                            class="card result-card animate__animated animate__fadeIn">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    @switch($result->tipo_transporte)
                                                                        @case('aerio')
                                                                            Voo
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('terrestre')
                                                                            Autocarros
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('maritimo')
                                                                            Barco
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @case('ferreo')
                                                                            Comboio
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                        @break

                                                                        @default
                                                                            Viagem
                                                                            {{ $this->getProvianciaName($result->origem_id) }}
                                                                            →
                                                                            {{ $this->getProvianciaName($result->destino_id) }}
                                                                    @endswitch
                                                                </h5>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <p><i class="far fa-clock mr-2"></i>
                                                                            <strong>Duração:</strong>
                                                                            {{ $result->duracao }}min
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <p>
                                                                            <strong>Preço:</strong>
                                                                            {{ $result->preco }} kz
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <p><i class="fas fa-star mr-2"></i>
                                                                            <strong>Avaliação:</strong>
                                                                            {{ $result->distancia ?? '4.5' }}/5
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <p>
                                                                            <i
                                                                                class="fas
                                                                        @switch($result->tipo_transporte)
                                                                            @case('aerio') fa-plane @break
                                                                            @case('terrestre') fa-bus @break
                                                                            @case('maritimo') fa-ship @break
                                                                            @case('ferreo') fa-train @break
                                                                            @default fa-route
                                                                        @endswitch
                                                                        mr-2"></i>
                                                                            <strong>Companhia:</strong>
                                                                            {{ $result->transportadora_nome }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="text-right">
                                                                    <button
                                                                        class="btn btn-primary btn-reserve">Reservar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-10">
                                                    <div class="alert alert-info">
                                                        Nenhum resultado encontrado para os critérios de busca.
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Conteúdo das abas para Tours -->
            @elseif($typeSearch == 'hotel')
                <!-- Abas de navegação para Hotéis -->
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10">
                        <ul class="nav nav-tabs results-tabs" id="hotelTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="cheapest-hotel-tab" data-toggle="tab"
                                    href="#cheapest-hotel" role="tab" aria-controls="cheapest-hotel"
                                    aria-selected="true">
                                    <i class="fas fa-euro-sign mr-2"></i> Mais Baratos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="quality-hotel-tab" data-toggle="tab" href="#quality-hotel"
                                    role="tab" aria-controls="quality-hotel" aria-selected="false">
                                    <i class="fas fa-star mr-2"></i> Maior Qualidade
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Conteúdo das abas para Hotéis -->
                <div class="tab-content" id="hotelTabsContent">
                    <!-- Mais Baratos -->
                    <div class="tab-pane fade show active" id="cheapest-hotel" role="tabpanel"
                        aria-labelledby="cheapest-hotel-tab">
                        <div class="row justify-content-center">
                            @if ($search->count() > 0)
                                @foreach ($search->sortBy('preco_total') as $result)
                                    <div class="col-md-10 mb-4">
                                        <div class="card result-card animate__animated animate__fadeIn">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="{{ asset('hoteis/' . $result->main_image) }}"
                                                            alt="Hotel Image" class="img-fluid rounded hotel-image">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5 class="card-title">{{ $result->name }}</h5>
                                                        <p class="text-muted"><i
                                                                class="fas fa-map-marker-alt mr-2"></i>
                                                            {{ $result->location }}</p>

                                                        <div class="row mt-3">
                                                            <div class="col-md-4">
                                                                <p><i class="far fa-calendar-alt mr-2"></i>
                                                                    <strong>Check-in:</strong>
                                                                    {{ $result->checkin_date }}
                                                                </p>
                                                                <p><i class="far fa-calendar-alt mr-2"></i>
                                                                    <strong>Check-out:</strong>
                                                                    {{ $result->checkout_date }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <p><i class="fas fa-bed mr-2"></i>
                                                                    <strong>Tipo:</strong> {{ $result->type }}
                                                                </p>
                                                                <p><i class="fas fa-user-friends mr-2"></i>
                                                                    <strong>Capacidade:</strong>
                                                                    {{ $result->capacity }} pessoas
                                                                </p>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <strong>Preço/noite:</strong>
                                                                {{ $result->price_per_night }} kz
                                                                </p>
                                                                <p>
                                                                    <strong>Total:</strong>
                                                                    {{ $result->preco_total }}
                                                                    kz
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button
                                                                class="btn btn-primary btn-reserve">Reservar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-10">
                                    <div class="alert alert-info">
                                        Nenhum resultado encontrado para os critérios de busca.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Maior Qualidade -->
                    <div class="tab-pane fade" id="quality-hotel" role="tabpanel"
                        aria-labelledby="quality-hotel-tab">
                        <div class="row justify-content-center">
                            @if ($search->count() > 0)
                                @foreach ($search->sortByDesc('star') as $result)
                                    <div class="col-md-10 mb-4">
                                        <div class="card result-card animate__animated animate__fadeIn">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="{{ asset('hoteis/' . $result->main_image) }}"
                                                            alt="Hotel Image" class="img-fluid rounded hotel-image">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5 class="card-title">{{ $result->name }}</h5>
                                                        <p class="text-muted"><i
                                                                class="fas fa-map-marker-alt mr-2"></i>
                                                            {{ $result->location }}</p>

                                                        <div class="row mt-3">
                                                            <div class="col-md-3">
                                                                <p><i class="far fa-calendar-alt mr-2"></i>
                                                                    <strong>Check-in:</strong>
                                                                    {{ $result->checkin_date }}
                                                                </p>
                                                                <p><i class="far fa-calendar-alt mr-2"></i>
                                                                    <strong>Check-out:</strong>
                                                                    {{ $result->checkout_date }}
                                                                </p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p><i class="fas fa-bed mr-2"></i>
                                                                    <strong>Tipo:</strong> {{ $result->type }}
                                                                </p>
                                                                <p><i class="fas fa-user-friends mr-2"></i>
                                                                    <strong>Capacidade:</strong>
                                                                    {{ $result->capacity }} pessoas
                                                                </p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <p>
                                                                    <strong>Preço/noite:</strong>
                                                                    {{ $result->price_per_night }} €
                                                                </p>
                                                                <p><i class="fas fa-euro-sign mr-2"></i>
                                                                    <strong>Total:</strong>
                                                                    {{ $result->preco_total }}
                                                                    kz
                                                                </p>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="rating-box">
                                                                    <span
                                                                        class="rating-value">{{ $result->stars ?? '4.5' }}</span>/5
                                                                    <div class="stars">
                                                                        @for ($i = 1; $i <= $result->stars; $i++)
                                                                            <span class="fa fa-star"></span>
                                                                        @endfor
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-right">
                                                            <button
                                                                class="btn btn-primary btn-reserve">Reservar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-10">
                                    <div class="alert alert-info">
                                        Nenhum resultado encontrado para os critérios de busca.
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>



<!-- Incluir bibliotecas necessárias -->
