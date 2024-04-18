<!DOCTYPE html>
@extends('layouts.marketplace')
@section('content')
    <style>
        body>div>div>div>div>div.col-span-12.lg\:col-span-5.p-6.lg\:p-10>div {
            height: 300px;
            width: 450px;
        }
    </style>
    @php
        // dd($allSchemes);
    @endphp
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="bg-gray-100 p-40">
        <div class="container mx-auto mb-2">
            <h1 class="text-5xl font-bold mb-8 text-center">Latest Schemes Page</h1>
            <div class="dark:bg-gray-100 dark:text-gray-900">
                @foreach ($allSchemes as $scheme)
                    <div class="container grid grid-cols-12 mx-auto dark:bg-gray-50">
                        <!-- YouTube video on the right (col-span-8 for lg screens) -->
                        <div class="col-span-12 lg:col-span-7 p-6 lg:p-10">
                            <div class="flex justify-start">
                                <span class="px-2 py-1 text-xs rounded-full dark:bg-violet-600 dark:text-gray-50"
                                    style="
    margin-bottom: 10px;
    padding: 10px;
">Launched :-
                                    {{ $scheme->launched_date }}</span>
                            </div>
                            <h1 class="text-3xl font-semibold">{{ $scheme->name }}</h1>
                            <p class="pt-2">{{ $scheme->description }}</p>
                            <a rel="noopener noreferrer" href="{{ $scheme->website }}"
                                class="inline-flex items-center pt-2 space-x-2 text-sm dark:text-violet-600">
                                <span>Read more</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <div class="flex items-center justify-between pt-2">
                                <div class="flex space-x-2">
                                    Eligibility :- <span>{{ $scheme->eligibility }}</span>
                                </div>
                                <span class="">State :- {{ $scheme->state }}</span>
                            </div>
                        </div>
                        <!-- YouTube video on the left (col-span-4 for lg screens) -->
                        <div class="col-span-12 lg:col-span-5 p-6 lg:p-10">
                            <div class="aspect-w-16 aspect-h-9">
                                <iframe width="500" height="315" src="{{ $scheme->youtube }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>




    </div>

    </div>
    </div>
@stop
