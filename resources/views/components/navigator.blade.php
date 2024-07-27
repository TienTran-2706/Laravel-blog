    <a {{ $attributes->merge(['class' => 'flex items-center gap-2 mt-2 text-xs font-black tracking-wider leading-6 uppercase text-text font-grotesque  group hover:underline'])}}>
        <span>{{$slot}}</span>
        <span class="flex flex-col justify-center items-start p-1 text-background bg-text rounded-full border group-hover:bg-pink">
            <svg class="w-3.5 h-3.5 fill-current text-current group-hover:text-background"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path d="M7 17L17 7M17 7H8M17 7V16"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </g>
            </svg>
        </span>
    </a>

