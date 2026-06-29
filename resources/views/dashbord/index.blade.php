@extends('dashboard')

@section('title','Dashboard')


@section('content')

    <div class="container-fluid p-5">


        {{-- HEADER --}}
        <div class="row mb-4">

            <div class="col-md-10 mx-auto">


                <div class="app-content-header p-0">


                    <div class="container-fluid p-0">


                        <div class="row align-items-center">


                            <div class="col-sm-6">


                                <h3 class="mb-0">


                                    @php

                                        $hour = now()->format('H');


                                        if($hour < 12){

                                            $greeting = __('messages.good_morning');

                                        }elseif($hour < 18){

                                            $greeting = __('messages.good_afternoon');

                                        }else{

                                           $greeting = __('messages.good_evening');

                                        }

                                    @endphp



                                    <i class="bi bi-hand-wave-fill"></i>


                                    {{ $greeting }},


                                    {{ auth()->user()->name }}


                                </h3>


                                <small class="text-muted">

                                    {{ __('messages.welcome_dashboard') }}

                                </small>


                            </div>



                            <div class="col-sm-6 text-end">


                            <span class="text-muted">

                                {{ now()->format('d M Y H:i') }}

                            </span>


                            </div>



                        </div>


                    </div>


                </div>


            </div>


        </div>





        {{-- DASHBOARD CARDS --}}
        <div class="row justify-content-center">


            <div class="col-md-10">


                <div class="row">



                    {{-- PRODUCTS --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">


                        <span class="info-box-icon text-bg-primary shadow-sm">

                            <i class="bi bi-box-seam-fill"></i>

                        </span>



                            <div class="info-box-content">


                            <span class="info-box-text">

                               {{ __('messages.products') }}

                            </span>



                                <span class="info-box-number">

                                {{ $productsCount }}

                            </span>


                            </div>


                        </div>


                    </div>





                    {{-- LOW STOCK --}}
                    <div class="col-12 col-sm-6 col-md-3">


                        <div class="info-box shadow-sm">


                        <span class="info-box-icon text-bg-warning shadow-sm">


                            <i class="bi bi-exclamation-triangle-fill"></i>


                        </span>



                            <div class="info-box-content">


                            <span class="info-box-text">

                               {{ __('messages.low_stock') }}

                            </span>



                                <span class="info-box-number">

                                {{ $lowStockCount }}

                            </span>


                            </div>


                        </div>


                    </div>






                    {{-- STOCK MOVEMENTS --}}
                    <div class="col-12 col-sm-6 col-md-3">


                        <div class="info-box shadow-sm">


                        <span class="info-box-icon text-bg-success shadow-sm">


                            <i class="bi bi-arrow-left-right"></i>


                        </span>




                            <div class="info-box-content">


                            <span class="info-box-text">

                               {{ __('messages.stock_movements') }}

                            </span>




                                <span class="info-box-number">

                                {{ $movementsCount }}

                            </span>



                            </div>


                        </div>


                    </div>






                    {{-- CATEGORIES --}}
                    <div class="col-12 col-sm-6 col-md-3">


                        <div class="info-box shadow-sm">


                        <span class="info-box-icon text-bg-danger shadow-sm">


                            <i class="bi bi-tags-fill"></i>


                        </span>




                            <div class="info-box-content">


                            <span class="info-box-text">

                                {{ __('messages.categories') }}

                            </span>




                                <span class="info-box-number">

                                {{ $categoriesCount }}

                            </span>



                            </div>


                        </div>


                    </div>




                    {{-- SUPPLIERS --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">


        <span class="info-box-icon text-bg-info shadow-sm">

            <i class="bi bi-truck"></i>

        </span>



                            <div class="info-box-content">


            <span class="info-box-text">

                {{ __('messages.suppliers') }}

            </span>


                                <span class="info-box-number">

                {{ $suppliersCount }}

            </span>


                            </div>


                        </div>


                    </div>





                    {{-- ARRIVALS --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">


        <span class="info-box-icon text-bg-secondary shadow-sm">

            <i class="bi bi-box-arrow-in-down"></i>

        </span>



                            <div class="info-box-content">


            <span class="info-box-text">

                {{ __('messages.arrivals') }}

            </span>


                                <span class="info-box-number">

                {{ $arrivalsCount }}

            </span>


                            </div>


                        </div>


                    </div>


                    {{-- SALES TODAY --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">

        <span class="info-box-icon text-bg-success shadow-sm">

            <i class="bi bi-cart-check-fill"></i>

        </span>


                            <div class="info-box-content">


            <span class="info-box-text">

               {{ __('messages.sales_today') }}

            </span>


                                <span class="info-box-number">

                {{ $salesTodayCount }}

            </span>


                            </div>


                        </div>

                    </div>





                    {{-- TOTAL SALES --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">

        <span class="info-box-icon text-bg-primary shadow-sm">

            <i class="bi bi-cash-stack"></i>

        </span>


                            <div class="info-box-content">


            <span class="info-box-text">

               {{ __('messages.total_sales') }}

            </span>


                                <span class="info-box-number">

                {{ number_format($totalSales,2) }}

                                    {{ $currency ?? '' }}

            </span>


                            </div>


                        </div>

                    </div>





                    {{-- CUSTOMERS --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">

        <span class="info-box-icon text-bg-warning shadow-sm">

            <i class="bi bi-people-fill"></i>

        </span>


                            <div class="info-box-content">


            <span class="info-box-text">


{{ __('messages.customers') }}

            </span>


                                <span class="info-box-number">

                {{ $customersCount }}

            </span>


                            </div>


                        </div>

                    </div>





                    {{-- OUT OF STOCK --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">

        <span class="info-box-icon text-bg-danger shadow-sm">

            <i class="bi bi-box2-fill"></i>

        </span>


                            <div class="info-box-content">


            <span class="info-box-text">

                {{ __('messages.out_of_stock') }}

            </span>


                                <span class="info-box-number">

                {{ $outStockCount }}

            </span>


                            </div>


                        </div>

                    </div>


                    {{-- USERS --}}
                    <div class="col-12 col-sm-6 col-md-3">

                        <div class="info-box shadow-sm">


        <span class="info-box-icon text-bg-dark shadow-sm">

            <i class="bi bi-people-fill"></i>

        </span>



                            <div class="info-box-content">


            <span class="info-box-text">

                {{ __('messages.users') }}

            </span>



                                <span class="info-box-number">

                {{ $usersCount }}

            </span>


                            </div>


                        </div>

                    </div>



                </div>


            </div>


        </div>



    </div>


@endsection
