<x-layout>

  @foreach ($posts as $post)

        <article> 

            <h1> 
                <a href="/posts/{{ $post->slug }}">
                    {!! $post->title !!}
                </a>
            </h1>

        <p>
            <a href="/catagories/{{ $post->catagory->id }}">{{ $post->catagory->name }}</a>
        </p>

        <div>
            {{ $post->excerpt}}
        </div>


        </article>
        
    @endforeach

    
</x-layout>






