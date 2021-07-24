<link rel="stylesheet" href="/Users/hanans/Desktop/phpTask/News/NewsPortal/resources/css/app.css">
<x-app-layout>
    <section class="pt-14 grid grid-cols-6 m-auto px-1 lg:px-3 gap-2 lg:gap-3">
        <div class="bg-white mt-12 rounded-lg">
            <h3 class="font-bold text-xl mb-2 p-3">Category</h3>
            <div class="flex flex-col leading-9 h-full px-3 text-gray-600">
                @foreach($categories as $category)
                    @if($category->name == $article->category->name)
                        <a class="font-medium text-blue-800">
                            {{$category->name}}
                        </a>
                        @else
                    <a class="hover:text-blue-600 transition duration-200 ease-in-out" href="#">
                        {{$category->name}}
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-span-3 ">
           <h1 class="text-2xl font-bold">{{$article->category->name}}</h1>
            <div class="mt-4 bg-white p-2 rounded-lg">
                <div style="background-image: url({{$article->cover_img}})" class="h-48  bg-no-repeat bg-center bg-cover rounded-xl"></div>
                <div class="px-3">
                    <div class="text-xs font-bold flex justify-between px-2 mt-3">
                        <span class="p-1 px-3 bg-indigo-100 rounded-full text-indigo-600 uppercase">{{$article->category->name}}</span>
                        <div class="text-gray-700 flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <span>25.7k</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            <span>25.7k</span>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="">
                            <h1 class="text-2xl font-bold my-2">{{$article->title}}</h1>
                            <h4 class="text-gray-600 text-sm">by <span class="font-bold uppercase">{{$article->author_name}}</span></h4>
                            <h4 class="text-xs text-gray-500">{{ \Illuminate\Support\Str::limit($article->created_at, 10, $end='') }}</h4>

                        </div>
                        <div class=" mt-2">
                            <div class="px-2 p-1 text-xs font-bold border border-gray-500 rounded-full text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                <span class=" ">Share on media</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 px-2">
                {!! $article->content !!}
            </div>


        </div>

        <div class="col-span-2">
            <h1 class="text-2xl"><span class="font-bold">Related</span> News</h1>
            <div class="">

                @if($relatedArticles->count() == 1)
                    <h1 class="text-sm mt-4 text-gray-600"><span class="font-medium">no avaliable new..</h1>

                @endif
               @foreach($relatedArticles as $related)
                   @if($article->id != $related->id)
                   <div class="mt-4 rounded-lg p-2 overflow-hidden bg-white">
                       <div class="h-28 mb-2 rounded-xl bg-center bg-cover bg-no-repeat" style="background-image: url({{$related->cover_img}})"></div>
                       <div class="text-xs font-bold flex justify-between px-2">
                           <span class="p-0.5 px-2 bg-indigo-100 rounded-full text-indigo-600 uppercase">{{$related->category->name}}</span>
                            <div class="text-gray-700 flex items-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <span>1.2k</span>
                            </div>
                       </div>
                       <h1 class="text-xl font-medium px-2 mt-1">{{$related->title}}</h1>
                   </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
