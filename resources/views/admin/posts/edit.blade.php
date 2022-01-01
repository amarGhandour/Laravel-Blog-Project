<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts/{{$post->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <x-form.input name="title" required :value="old('title',$post->title)"/>
            <x-form.input name="slug" required :value="old('slug',$post->slug)"/>

            <div class="flex">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail',$post->thumnail)"/>
                </div>
                <img src="{{asset('storage/' . $post->thumbnail)}}" alt="" class="rounded-xl" width="100">
            </div>

            <x-form.text-area name="excerpt" required>{{old('excerpt',$post->excerpt)}}</x-form.text-area>
            <x-form.text-area name="body" required>{{old('body',$post->body)}}</x-form.text-area>

            <x-form.field>
                <x-form.label name="category_id"/>
                <select name="category_id" id="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}" {{ $category->id === old('category_id', $post->category_id)? 'selected' : '' }}> {{ ucwords($category->name) }} </option>
                    @endforeach
                </select>
                <x-form.error name="category_id"/>
            </x-form.field>

            <div class="flex justify-end">
                <x-form.button>update</x-form.button>
            </div>

        </form>
    </x-setting>
</x-layout>
