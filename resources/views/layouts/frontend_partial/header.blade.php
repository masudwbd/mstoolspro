<!-- contact content -->
@include('sweetalert::alert')

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
        <a href="{{ route('home') }}">
            <strong class="logo">
                <div class="logo-container">
                    <img src="{{ asset($settings->logo) }}" style="margin-top:18px" alt="">
                </div>
            </strong>
        </a>
        <!-- open nav mobile -->

        <!--search -->
        <label class="open-search" for="open-search">
            <i class="fas fa-search"></i>
            <input class="input-open-search" id="open-search" type="checkbox" name="menu" />
            <div class="search">
                <form action="{{ route('search') }}"">
                    @csrf
                    <button type="submit" class="button-search"><i class="fas fa-search"></i></button>
                    <input type="text" name='search' placeholder="What are you looking for?" class="input-search" />
                </form>
            </div>
        </label>
        <!-- // search -->
        <nav class="nav-content" style="width:200px">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ route('user.profile') }}">
                        @if (Auth::user())
                            <label class="" style="cursor:pointer" class="open-menu-login-account"
                                for="open-menu-login-account">
                                <img src="{{ asset(Auth::user()->image) }}"
                                    style="height:30px;width:30px;border-radius:50%" alt="">
                                {{ Auth::user()->name }}
                                <span class="item-arrow"></span>
                            </label>
                        @else
                            <label class="" style="cursor:pointer" class="open-menu-login-account"
                                for="open-menu-login-account">
                                <i class="fas fa-user-circle mr-2"></i>
                                Create Account
                                <span class="item-arrow"></span>
                            </label>
                        @endif
                    </a>
                </div>
                <div class="mt-1">
                    <div class="nav-content-item"><a class="nav-content-link logout"  href="{{ route('logout') }}"><i
                                class="fa-solid fa-right-from-bracket " id="logout"></i></a></div>
                </div>
            </div>
        </nav>
    </div>
</div>
