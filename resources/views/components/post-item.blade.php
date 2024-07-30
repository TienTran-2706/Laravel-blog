<article class="flex flex-col w-[33%] max-md:ml-0 max-md:w-full">
    <div class="flex flex-col max-md:mt-8">
        <img loading="lazy"
             src="{{ $post->thumbnail}}"
             alt="post-thumbnail"
             class="w-full aspect-[1.41]">

        <div class="flex font-grotesque mt-5 text-xs font-black tracking-wider leading-4 uppercase text-text">


            @foreach($categories as $category)
                <x-tag href="#" >{{ $category->title}} </x-tag>
            @endforeach

        </div>

        <a href="#" class="mt-2.5 text-3xl font-financierdisplay leading-8 text-text hover:text-yellow">
            {{ $post->title}}
        </a>

        <div class="mt-3 text-base leading-5 font-grotesqueregular text-neutral-400">
            By {{ $post->user->name}}, Published on {{ $post->published_at}}
        </div>
        <p class="mt-2.5 text-lg font-financierdisplay leading-8 text-text hover:text-yellow">
            {{ $post->shortBody() }}
        </p>

        <x-navigator href="#">Read it now</x-navigator>
    </div>
</article>

