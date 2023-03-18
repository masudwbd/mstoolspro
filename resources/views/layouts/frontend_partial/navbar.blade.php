<!-- nav navigation commerce -->
<div class="nav-container sticky-top bg-white" style="">
    <div class="container navbar-flex">
        <nav class="all-category-nav">
            <label class="open-menu-all" for="open-menu-all">
                <input class="input-menu-all" id="open-menu-all" type="checkbox" name="menu-open" />
                <span class="all-navigator"><i class="fas fa-bars"></i> <span>All category</span> <i
                        class="fas fa-angle-down"></i>
                    <i class="fas fa-angle-up"></i>
                </span>

                <ul class="all-category-list">
                    @php
                        $categories = DB::table('categories')->get();
                    @endphp
                    @foreach ($categories as $item)
                        <li class="all-category-list-item"><a href="{{ route('tools.category', $item->id) }}"
                                class="all-category-list-link">{{ $item->name }}<i class="fas fa-angle-right"></i></a>
                        </li>
                    @endforeach
                </ul>
            </label>

        </nav>
        <nav class="featured-category">
            <ul class="nav-row">
                <li class="nav-row-list"><a href="{{route('tools.all')}}" class="nav-row-list-link"
                        style="text-decoration: none">Tools</a></li>
                <li class="nav-row-list"><a href="{{route('tools.free')}}" class="nav-row-list-link"
                        style="text-decoration: none">Free Utilities</a></li>
                <li class="nav-row-list"><a href="{{route('frontend.blogs.all')}}" class="nav-row-list-link"
                        style="text-decoration: none">Blogs</a></li>
                <li class="nav-row-list"><a href="{{route('frontend.about_us')}}" class="nav-row-list-link"
                        style="text-decoration: none">About Us</a></li>
                <li class="nav-row-list"><a href="{{route('frontend.contact_us')}}" class="nav-row-list-link"
                        style="text-decoration: none">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>
