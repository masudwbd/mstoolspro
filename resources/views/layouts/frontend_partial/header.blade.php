<!-- contact content -->

@php
    $settings = DB::table('settings')->first();
@endphp


<div class="header-content-top mb-2">
    <div class="content">
        <span style="font-size: 18px"><i class="fas fa-phone-square-alt"></i>{{ $settings->phone_one }}</span>
        <span style="font-size: 18px"><i class="fas fa-envelope-square"></i>{{ $settings->main_email }}</span>
    </div>
</div>
<!-- / contact content -->
<div class="header-container">
    <div class="container header-flex">
        <!-- logo -->
        <strong class="logo">
            <div class="logo-container">
                <img src="{{ $settings->logo }}" alt="">
            </div>
        </strong>
        <!-- open nav mobile -->

        <!--search -->
        <label class="open-search" for="open-search">
            <i class="fas fa-search"></i>
            <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
            <div class="search">
                <button class="button-search"><i class="fas fa-search"></i></button>
                <input type="text" placeholder="What are you looking for?" class="input-search" />
            </div>
        </label>
        <!-- // search -->
        <nav class="nav-content">
            <!-- nav -->
            <ul class="nav-content-list">
                <li class="nav-content-item account-login">
                    <label class="open-menu-login-account" for="open-menu-login-account">

                        <input class="input-menu" id="open-menu-login-account" type="checkbox" name="menu" />

                        @if (Auth::user())
                            <i class="fas fa-user-circle mr-2"></i>
                            {{ Auth::user()->name }}
                            <span class="item-arrow"></span>
                        @else
                            <i class="fas fa-user-circle mr-2"></i>
                            Create Account
                            <span class="item-arrow"></span>
                        @endif

                        <!-- submenu -->
                        <ul class="login-list" style="z-index: 1">
                            <li class="login-list-item"><a href="https://www.cupcom.com.br/">My account</a></li>
                            <li class="login-list-item"><a href={{route("logout")}}>logout</a></li>
                    </label>
            </ul>
            </li>
            <li class="nav-content-item"><a class="nav-content-link" href="https://www.cupcom.com.br/"><i
                        class="fas fa-heart"></i></a></li>
            <li class="nav-content-item"><a class="nav-content-link" href="https://www.cupcom.com.br/"><i
                        class="fas fa-shopping-cart"></i></a></li>
            <!-- call to action -->
            </ul>
        </nav>
    </div>
</div>
