@props(['heading'])
<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold border-b pb-2 mb-8"> {{$heading}}</h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="lg:font-bold mb-2">Links</h4>
            <ul>
                <li class="{{request()->is('admin/posts')? 'text-blue-500' : ''}}">
                    <a href="/admin/posts">
                        All Posts
                    </a>
                </li>

                <li class="{{request()->is('admin/posts/create')? 'text-blue-500' : ''}}">
                    <a href="/admin/posts/create">
                        New Post
                    </a>
                </li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel class="bg-gray-100">

                {{ $slot }}

            </x-panel>
        </main>
    </div>
</section>
