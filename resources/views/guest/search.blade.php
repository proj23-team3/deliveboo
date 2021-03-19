@extends('layouts.guest')
@section('content')
    <div class="container">
        <div class="row">
            <!-- BEGIN SEARCH RESULT -->
            <div class="col-md-12">
                <div class="grid search">
                    <div class="grid-body">
                        <div class="row">
                            <!-- BEGIN FILTERS -->
                            <div class="col-md-3">
                                <h2 class="grid-title"><i class="fa fa-filter"></i> Filtri</h2>
                                <hr>
                                <!-- BEGIN FILTER BY CATEGORY -->
                                <h4>Categorie</h4>
                                <categories-component v-bind:choose_cat="{{ $category->name }}"></categories-component>

                                <!-- END FILTER BY CATEGORY -->

                                <div class="padding"></div>
                            </div>
                            <!-- END FILTERS -->
                            <!-- BEGIN RESULT -->
                            <div class="col-md-9">
                                <h2><i class="fa fa-file-o"></i> Result</h2>
                                <hr>
                                <!-- BEGIN SEARCH INPUT -->
                                <div class="input-group">
                                    <input type="text" class="form-control" value="Piatti, ristoranti o tipi di cucina">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                                <!-- END SEARCH INPUT -->
                                <p>Ecco i risultati relativi alla tua ricerca</p>

                                <div class="padding"></div>

                                <div class="row">


                                    <div class="col-md-6 text-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default active"><i
                                                    class="fa fa-list"></i></button>
                                            <button type="button" class="btn btn-default"><i class="fa fa-th"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <!-- BEGIN TABLE RESULT -->
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tbody>
                                            @foreach ($restaurants as $restaurant)
                                                @if ($restaurant->category_id == $category->id)

                                                    <tr>
                                                        <td class="number text-center">1</td>
                                                        <td class="image"><img src="{{ $restaurant->cover }}" alt=""
                                                                height="300"></td>
                                                        <td class="product">
                                                            <strong>{{ $restaurant->name }}</strong><br>{{ $restaurant->address }}
                                                        </td>
                                                        <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                                    class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                    class="fa fa-star"></i><i
                                                                    class="fa fa-star-half-o"></i></span>
                                                        </td>
                                                        <td class="price text-right">Consegna
                                                            {{ $restaurant->shipping_costs }} €</td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END TABLE RESULT -->

                            </div>
                            <!-- END RESULT -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END SEARCH RESULT -->
        </div>
    </div>
@endsection

@section('scriptJs')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
