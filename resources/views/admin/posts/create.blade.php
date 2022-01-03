<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts/" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required/>
            <x-form.input name="slug" required/>
            <x-form.input name="thumbnail" type="file" required/>
            <x-form.text-area name="excerpt" required/>
            <x-form.text-area name="body" required/>

            <x-form.field>
                <x-form.label name="category_id"/>
                <select name="category_id" id="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}" {{ $category->id === old('category_id')? 'selected' : '' }}> {{ ucwords($category->name) }} </option>
                    @endforeach
                </select>
                <x-form.error name="category_id"/>
            </x-form.field>

            <x-form.field>
                <x-form.label name="Author"/>
                <select name="user_id" id="user_id">
                    @foreach(\App\Models\User::all() as $user)
                        <option
                            value="{{ $user->id }}" {{ $user->id === old('user_id', auth()->user()->id)? 'selected' : '' }}> {{ ucwords($user->name) }} </option>
                    @endforeach
                </select>
                <x-form.error name="user_id"/>
            </x-form.field>

            <div class="flex">
                <div class="flex-1 justify-end">
                    <x-form.button name="save" value="save as draft">Save</x-form.button>
                </div>

                <div>
                    <x-form.button name="publish" value="publish to feeds">publish</x-form.button>
                </div>
            </div>

        </form>
    </x-setting>
</x-layout>
