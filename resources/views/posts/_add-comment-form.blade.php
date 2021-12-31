@auth
    <form method="POST" action="/posts/{{ $post->slug }}/comments"
          class="border border-gray-200 p-6 rounded-xl">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                 class="rounded-full">
            <h1 class="ml-4">want to participate? </h1>
        </header>

        <div class="mt-4">
                        <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" rows="5"
                                  placeholder="Quick, thing of something to say" required></textarea>

            @error('body')
            <p class="text-sm text-red-600"> {{ $message }} </p>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                post
            </button>
        </div>

    </form>

@else
    <p>Try to <a href="/login" class="hover:underline">login</a> or <a href="/register"
                                                                       class="hover:underline">register</a>
        to post a comment</p>
@endauth
