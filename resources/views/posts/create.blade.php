<x-layout>
    <section class="px-6 py-8 max-w-lg mx-auto">
        <h1 class="text-lg font-bold">Publish New Post</h1>
        <main class="mt-5 bg-gray-100 border border-gray-200 p-7 rounded-xl">
            <form action="/admin/posts/" method="post" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title"/>
                <x-form.input name="slug"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.text-area name="excerpt"/>
                <x-form.text-area name="body"/>

                <x-form.panel>
                    <x-form.label name="category_id"/>
                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}" {{ $category->id === old('category_id')? 'selected' : '' }}> {{ ucwords($category->name) }} </option>
                        @endforeach
                    </select>
                    <x-form.error name="category_id"/>
                </x-form.panel>

                <div class="flex justify-end">
                    <x-form.button>publish</x-form.button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
