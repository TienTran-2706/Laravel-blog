<a {{ $attributes->merge(['class' => "flex gap-2.5 justify-center px-6 py-4 text-xs font-grotesque tracking-wider leading-4 uppercase border border-solid border-text rounded-[110px] max-md:px-5 max-md:mt-10 hover:text-background hover:bg-text" ]) }}>
            <div >{{ $slot }}</div>
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
        </a>
