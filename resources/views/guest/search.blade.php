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
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Pizza</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Sushi</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Italiano</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Giapponese</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Thai</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Americano</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Indiano</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Greco</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Afghano</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Fusion</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Siriano</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Brasiliano</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Cinese</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" class="icheck"> Dessert</label>
                                </div>
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
                                            <tr>
                                                <td class="number text-center">1</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300/FF8C00"
                                                        alt=""></td>
                                                <td class="product"><strong>Product 1</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span>
                                                </td>
                                                <td class="price text-right">$350</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">2</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300/5F9EA0"
                                                        alt=""></td>
                                                <td class="product"><strong>Product 2</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
                                                </td>
                                                <td class="price text-right">$1,050</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">3</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300" alt="">
                                                </td>
                                                <td class="product"><strong>Product 3</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star-half-o"></i><i
                                                            class="fa fa-star-o"></i></span></td>
                                                <td class="price text-right">$550</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">4</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300/8A2BE2"
                                                        alt=""></td>
                                                <td class="product"><strong>Product 4</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star-o"></i></span></td>
                                                <td class="price text-right">$330</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">5</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300" alt="">
                                                </td>
                                                <td class="product"><strong>Product 5</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i></span></td>
                                                <td class="price text-right">$540</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">6</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300/6495ED"
                                                        alt=""></td>
                                                <td class="product"><strong>Product 6</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span>
                                                </td>
                                                <td class="price text-right">$870</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">7</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300/DC143C"
                                                        alt=""></td>
                                                <td class="product"><strong>Product 7</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star-o"></i><i
                                                            class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span>
                                                </td>
                                                <td class="price text-right">$620</td>
                                            </tr>
                                            <tr>
                                                <td class="number text-center">8</td>
                                                <td class="image"><img src="https://via.placeholder.com/400x300/9932CC"
                                                        alt=""></td>
                                                <td class="product"><strong>Product 8</strong><br>This is the product
                                                    description.</td>
                                                <td class="rate text-right"><span><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span>
                                                </td>
                                                <td class="price text-right">$1,550</td>
                                            </tr>
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
