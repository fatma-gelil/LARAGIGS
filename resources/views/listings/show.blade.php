@extends('partials.layout')
@section('content')
    @include('partials._search')
    <a href="index.html" class="inline-block text-black ml-4 mb-4"
    ><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div
                    class="flex flex-col items-center justify-center text-center"
            >
                <img
                        class="w-48 mr-6 mb-6"
                        src="{{asset('images/acme.png')}}"
                        alt=""
                />

                <h3 class="text-2xl mb-2">{{$listing['title']}}</h3>
                <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
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


                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i>{{$listing->location}}
                </div>
                <div>
                    {{--            <x-listing-tags :tagsCsv="$listing->tags"></x-listing-tags>--}}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Job Description
                    </h3>

                    <div class="text-lg space-y-6">
                        {{$listing->description}}

                        <a
                                href="mailto:{{$listing->email}}"
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                        >

                        <a
                                href="{{$listing->website}}"
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                        ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                        >

                    </div>
                </div>
            </div>
        </x-card>
    </div>
@endsection