<x-layout>
    <article>
        <h1>{{$post->title}}</h1>
        <p>
            By <a href="/user/{{$post->user->username}}">{{$post->user->username}}</a> in <a
                href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        {!! $post->body !!}
    </article>

    <p><a href="/">Go back</a></p>
</x-layout>
