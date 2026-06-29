<nav class="mt-2">

    <ul class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        data-accordion="false">


        {{-- DASHBOARD --}}
        <li class="nav-item menu-open">

            <a href="{{ route('dashboard') }}" class="nav-link active">

                <i class="nav-icon bi bi-speedometer"></i>

                <p>
                    {{ __('messages.dashboard') }}
                </p>

            </a>

        </li>





        {{-- STOCK MANAGEMENT --}}
        <li class="nav-item menu-open">


            <a href="#"
               class="nav-link active">


                <i class="nav-icon bi bi-box-seam-fill"></i>


                <p>

                    {{ __('messages.stock_management') }}

                    <i class="nav-arrow bi bi-chevron-right"></i>

                </p>


            </a>



            <ul class="nav nav-treeview" style="display:block;">


                <li class="nav-item">

                    <a href="{{ route('categories.index') }}"
                       class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-tags-fill"></i>

                        <p>
                            {{ __('messages.categories') }}
                        </p>

                    </a>

                </li>





                <li class="nav-item">

                    <a href="{{ route('products.index') }}"
                       class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-box"></i>

                        <p>
                            {{ __('messages.products') }}
                        </p>

                    </a>

                </li>





                <li class="nav-item">

                    <a href="{{ route('a') }}"
                       class="nav-link {{ request()->routeIs('a') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-arrow-left-right"></i>

                        <p>
                            {{ __('messages.stock_movements') }}
                        </p>

                    </a>

                </li>





                <li class="nav-item">

                    <a href="{{ route('alerts.index') }}"
                       class="nav-link {{ request()->routeIs('alerts.index') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-exclamation-triangle-fill"></i>


                        <p>

                            {{ __('messages.alerts') }}


                            @if($lowStockCount > 0)

                                <span class="badge bg-danger ms-2">

                                    {{ $lowStockCount }}

                                </span>

                            @endif


                        </p>


                    </a>

                </li>


            </ul>


        </li>
        {{-- SUPPLY MANAGEMENT --}}

        <li class="nav-item menu-open">


            <a href="#"
               class="nav-link active">


                <i class="nav-icon bi bi-truck"></i>


                <p>

                    {{ __('messages.supply_management') }}

                    <i class="nav-arrow bi bi-chevron-right"></i>

                </p>


            </a>





            <ul class="nav nav-treeview" style="display:block;">





                <li class="nav-item">

                    <a href="{{ route('suppliers.index') }}"
                       class="nav-link {{ request()->routeIs('suppliers.index') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-building"></i>


                        <p>
                            {{ __('messages.suppliers') }}
                        </p>


                    </a>


                </li>







                <li class="nav-item">

                    <a href="{{ route('arrivals.index') }}"
                       class="nav-link {{ request()->routeIs('arrivals.index') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-box-arrow-in-down"></i>


                        <p>
                            {{ __('messages.arrivals') }}
                        </p>


                    </a>


                </li>




            </ul>


        </li>








        {{-- SALES MANAGEMENT --}}


        <li class="nav-item menu-open">


            <a href="#"
               class="nav-link active">


                <i class="nav-icon bi bi-cart-fill"></i>


                <p>

                    {{ __('messages.sales_management') }}

                    <i class="nav-arrow bi bi-chevron-right"></i>

                </p>


            </a>







            <ul class="nav nav-treeview" style="display:block;">






                <li class="nav-item">


                    <a href="{{ route('customers.index') }}"
                       class="nav-link {{ request()->routeIs('customers.index') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-person-lines-fill"></i>


                        <p>

                            {{ __('messages.customers') }}

                        </p>


                    </a>


                </li>







                <li class="nav-item">


                    <a href="{{ route('sales.index') }}"
                       class="nav-link {{ request()->routeIs('sales.index') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-cart-check-fill"></i>


                        <p>

                            {{ __('messages.sales') }}

                        </p>


                    </a>


                </li>







                <li class="nav-item">


                    <a href="{{ route('sale-detail') }}"
                       class="nav-link {{ request()->routeIs('sale-detail') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-receipt"></i>


                        <p>

                            {{ __('messages.sale_details') }}

                        </p>


                    </a>


                </li>





            </ul>


        </li>
        {{-- SECURITY --}}

        <li class="nav-item menu-open">


            <a href="#"
               class="nav-link active">


                <i class="nav-icon bi bi-shield-lock-fill"></i>


                <p>

                    {{ __('messages.security') }}

                    <i class="nav-arrow bi bi-chevron-right"></i>

                </p>


            </a>





            <ul class="nav nav-treeview" style="display:block;">





                <li class="nav-item">


                    <a href="{{ route('users.index') }}"
                       class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-people-fill"></i>


                        <p>

                            {{ __('messages.users') }}

                        </p>


                    </a>


                </li>







                <li class="nav-item">


                    <a href="{{ route('roles.index') }}"
                       class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">


                        <i class="nav-icon bi bi-shield-check"></i>


                        <p>

                            {{ __('messages.roles') }}

                        </p>


                    </a>


                </li>





            </ul>


        </li>




        {{-- SETTINGS / CONFIGURATION --}}
        <li class="nav-item menu-open ">

            <a href="#"
               class="nav-link active">

                <i class="nav-icon bi bi-gear-fill"></i>

                <p>

                    {{ __('messages.settings') }}

                    <i class="nav-arrow bi bi-chevron-right"></i>

                </p>

            </a>


            <ul class="nav nav-treeview" style="display:block;">



                {{-- General Settings --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link {{ request()->routeIs('settings.index') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-sliders"></i>

                        <p>
                            {{ __('messages.general_settings') }}

                            <span class="badge bg-warning ms-2">
                        {{ __('messages.in_progress') }}
                    </span>

                        </p>

                    </a>

                </li>





                {{-- Company Information --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link {{ request()->routeIs('company.settings') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-building-gear"></i>

                        <p>

                            {{ __('messages.company_information') }}

                            <span class="badge bg-warning ms-2">
                        {{ __('messages.in_progress') }}
                    </span>

                        </p>

                    </a>

                </li>






                {{-- ABOUT --}}
                <li class="nav-item">

                    <a href="#"
                       class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}">

                        <i class="nav-icon bi bi-info-circle-fill"></i>

                        <p>

                            {{ __('messages.about') }}

                            <span class="badge bg-secondary ms-2">
                        {{ __('messages.planned') }}
                    </span>

                        </p>

                    </a>

                </li>



            </ul>

        </li>





    </ul>

</nav>
