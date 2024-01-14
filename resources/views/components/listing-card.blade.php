@props(['listing'])

<!-- Item 1 -->
<x-card>
    <div class="flex">
        <img
                class="hidden w-48 mr-6 md:block"
                src="{{asset('images/no-image.png')}}"
                alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing['id']}}">{{$listing['title']}}</a>
            </h3>

{{--            <div class="text-xl font-bold mb-4">{{$listing['tag']}}</div>--}}

            <div class="text-xl font-bold mb-4">{{$listing['company']}}</div>
        <div>

            @php
                $tags = explode(',',$listing['tag']);
            @endphp

            <ul class="flex">
                @foreach($tags as $tag)
                <li
                        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                    <a href="/?tag={{$tag}}">{{$tag}}</a>

                </li>
                @endforeach
            </ul>

        </div>
{{--            <x-listing-tags :tagsCsv="$listing->tags" />--}}
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i>{{$listing['location']}}
            </div>
        </div>
    </div>
</x-card>