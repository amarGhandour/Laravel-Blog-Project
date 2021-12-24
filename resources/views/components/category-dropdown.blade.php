<div>

    <x-dropdown>

        <x-slot name="trigger">
            <button
                class="py-2 pl-3 pr-9 text-sm font-semibold w-40 text-left px-3 inline-flex ">

                {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}

                <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>

            </button>
        </x-slot>

        <x-dropdown-item
            href="/?{{request()->routeIs('home') && request('search') !== null? 'search=' . request('search') : ''}}"
            :active="request()->routeIs('home') && request('category') === null">
            All
        </x-dropdown-item>

        @foreach($categories as $category)
            <x-dropdown-item
                href="/?category={{$category->slug}}&{{http_build_query(request()->except('category', 'page'))}}"
                :active="isset($currentCategory) && $category->is($currentCategory)"
            >{{ucwords($category->name)}}
            </x-dropdown-item>
        @endforeach
    </x-dropdown>

</div>
