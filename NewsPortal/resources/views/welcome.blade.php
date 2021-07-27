<x-app-layout>
    <section class="pt-14 grid grid-cols-6 m-auto px-1 lg:px-3 gap-2 lg:gap-3 mb-5">
        <div class="hidden md:block bg-white mt-12 rounded-lg h-11/12 shadow-xl">
            <h3 class="font-bold text-xl mb-2 p-3">Category</h3>
            <div class="flex flex-col leading-9 h-full px-3 text-gray-600">
                @foreach($categories as $category)
                    <a class="hover:text-blue-600 transition duration-200 ease-in-out" href="/categories/{{$category->id}}">
                        {{$category->name}}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-span-4 md:col-span-3">

            <h1 class="text-2xl font-bold">Latest <span class="font-light">Headlines</span></h1>
            <div class="mt-4 bg-white p-2 rounded-lg shadow-xl">
                <div style="background-image: url({{$articles[0]->cover_img}})" class="h-64 bg-no-repeat bg-center bg-cover rounded-xl"></div>
                <div class="px-3">
                    <div class="text-xs font-bold flex justify-between px-2 mt-3">
                        <span class="p-1 px-3 bg-indigo-100 rounded-full text-indigo-600 uppercase">{{$articles[0]->category->name}}</span>
                        <div class="hidden md:flex text-gray-700  items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <span class="">{{$articles[0]->comments->count()}}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>25.7k</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            <span>4.6k</span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="pr-1">
                            <h1 class="text-2xl font-bold my-2">{{$articles[0]->title}}</h1>

                        </div>
                        <div class=" mt-2">
                            <div class="px-2 md:px-4 p-1 text-xs font-bold hover:bg-blue-50 transition duration-300 ease-in-out border border-blue-400 rounded-full text-blue-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <a href="articles/{{$articles[0]->id}}">Read</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="text-xl font-bold mt-11">More <span class="font-light">Headlines</span> </h1>
            <div class="grid md:grid-cols-2 gap-2 mt-2">
                @foreach($articles as $article)
                    @if($article->id != $articles[0]->id AND $article->id != $articles[1]->id AND $article->id != $articles[2]->id)
                        <div class="bg-white overflow-hidden rounded-lg shadow-xl mt-2">
                            <div class="h-32 rounded-lg bg-center bg-no-repeat bg-cover" style="background-image: url({{$article->cover_img}})"></div>
                            <div class="p-1 mt-1">
                                <span class="p-0.5 px-2 bg-yellow-100 rounded-full text-yellow-600 uppercase text-xs font-medium">{{$article->category->name}}</span>
                                <div class="flex justify-between">
                                    <div>
                                        <h5 class="text-base font-medium capitalize mt-2">{{$article->title}}</h5>
                                        <h4 class="uppercase text-gray-600 text-xs my-1">{{$article->category->name}} | {{$article->author_name}}</h4>
                                    </div>
                                    <div class="self-end ">
                                        <div class="px-2 p-1 text-xs font-bold hover:bg-gray-100 transition duration-300 ease-in-out border border-gray-400 rounded-full text-gray-500 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                            <a href="articles/{{$article->id}}">Read</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
@if($articles->count()>3)
        <div class="col-span-2">
            <div class="flex justify-between items-center">
                <h1 class="text-lg font-bold">Trending <span class="font-light">Headlines</span></h1>
                <h4 class="text-sm italic font-light text-gray-500 pr-2 "><a class="hover:text-black transition duration-300 ease-in-out" href="/articles">see all</a></h4>
            </div>
            <div class="">
                <div class="grid gap-2 my-5">
                            <div class="bg-white overflow-hidden rounded-lg shadow-xl">
                                <div class="p-1 px-2 mt-1">
                                    <div class="h-32 rounded-lg bg-center bg-no-repeat bg-cover" style="background-image: url({{$articles[1]->cover_img}})"></div>
                                    <span class="p-0.5 px-2 bg-yellow-100 rounded-full text-yellow-600 uppercase text-xs font-medium">{{$articles[1]->category->name}}</span>
                                    <h5 class="text-lg font-medium capitalize mt-2">{{$articles[1]->title}}</h5>
                                    <h4 class="uppercase text-gray-600 text-xs my-1">{{$articles[1]->category->name}} | {{$articles[1]->author_name}}</h4>
                                </div>
                            </div>
                    <div class="bg-white overflow-hidden rounded-lg shadow-xl">
                        <div class="p-1 px-2 mt-1">
                            <div class="h-32 rounded-lg bg-center bg-no-repeat bg-cover" style="background-image: url({{$articles[2]->cover_img}})"></div>

                            <span class="p-0.5 px-2 bg-yellow-100 rounded-full text-yellow-600 uppercase text-xs font-medium">{{$articles[2]->category->name}}</span>
                            <h5 class="text-lg font-medium capitalize mt-2">{{$articles[2]->title}}</h5>
                            <h4 class="uppercase text-gray-600 text-xs my-1">{{$articles[2]->category->name}} | {{$articles[2]->author_name}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </section>
</x-app-layout>
