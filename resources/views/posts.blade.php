<x-layout>

    @foreach ($posts as $post)
        <article>
            <h1><a href="/post/{{$post->id}}"> {{$post->title}} </a></h1>
            <p>
                By <a href="/user/{{$post->user->username}}">{{$post->user->name}}</a> in <a
                    href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>

            {!! $post->excerpt !!}
        </article>
    @endforeach
</x-layout>

