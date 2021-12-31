<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <form action="/admin/posts/" method="post">
                @csrf

                <div class="mb-6">
                    <label for="title"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Title
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ old('title') }}"
                           required
                    >

                    @error('title')
                    <p class="text-red-500 text-sm"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Slug
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                           type="text"
                           name="slug"
                           id="slug"
                           value="{{ old('slug') }}"
                           required
                    >

                    @error('slug')
                    <p class="text-red-500 text-sm"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="excerpt"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Excerpt
                    </label>
                    <textarea name="excerpt" id="excerpt" rows="5"
                              class="border border-gray-400 p-2 w-full rounded">{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-sm"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="body"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Body
                    </label>
                    <textarea name="body" id="body" rows="5"
                              class="border border-gray-400 p-2 w-full rounded">{{ old('excerpt') }}</textarea>

                    @error('body')
                    <p class="text-red-500 text-sm"> {{$message}} </p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="category_id"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Category
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}" {{ $category->id === old('category_id')? 'selected' : '' }}> {{ ucwords($category->name) }} </option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-sm"> {{$message}} </p>
                    @enderror
                </div>

                <div class="flex justify-end mt-2 pt-2">
                    <button type="submit"
                            class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-5 rounded-2xl hover:bg-blue-600">
                        publish
                    </button>
                </div>

            </form>
        </main>
    </section>
</x-layout>
