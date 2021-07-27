<x-app-layout>
    <section class="pt-14 grid grid-cols-6 m-auto px-1 lg:px-3 gap-2 lg:gap-3 mb-8">
        <div class="bg-white shadow-xl mt-12 rounded-lg">
            <h3 class="font-bold text-xl mb-2 p-3">Category</h3>
            <div class="flex flex-col leading-9 h-full px-3 text-gray-600">
                @foreach($categories as $category)
                    @if($category->name == $article->category->name)
                        <a class="font-medium text-blue-800" href="/categories/{{$category->id}}">
                            {{$category->name}}
                        </a>
                        @else
                    <a class="hover:text-blue-600 transition duration-200 ease-in-out"href="/categories/{{$category->id}}">
                        {{$category->name}}
                    </a>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="col-span-3 ">
           <h1 class="text-2xl font-bold">{{$article->category->name}}</h1>
            <div class="mt-4 bg-white shadow-xl p-2 rounded-lg">
                <div style="background-image: url({{$article->cover_img}})" class="md:h-80 h-64  bg-no-repeat bg-center bg-cover rounded-xl"></div>
                <div class="px-3">
                    <div class="text-xs font-bold flex flex-col sm:flex-row justify-between px-2 mt-3">
                        <span class="text-center p-1 px-3 bg-indigo-100 rounded-full text-indigo-600 uppercase">{{$article->category->name}}</span>
                        <div class="text-gray-700 flex items-center ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <span class="">{{$article->comments->count()}}</span>
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
                        <div class="">
                            <h1 class="text-md md:text-2xl font-bold my-2 pr-2">{{$article->title}}</h1>
                            <h4 class="text-gray-600 text-sm">by <span class="font-bold uppercase">{{$article->author_name}}</span></h4>
                            <h4 class="text-xs text-gray-500">{{ \Illuminate\Support\Str::limit($article->created_at, 10, $end='') }}</h4>

                        </div>
                        <div class="mt-4 whitespace-nowrap ">
                            <div class="px-2 p-1 text-xs font-bold border border-gray-500 rounded-full text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                                </svg>
                                <span class="hidden sm:block ">Share on media</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 px-2 leading-relaxed">
                {!! $article->content !!}
            </div>
            <div id="comments-section" class="mt-4 rounded-lg p-2 overflow-hidden bg-white shadow-xl">
                <h1 class="text-2xl my-2"><span class="font-bold"></span> Comments</h1>
                @include('components.form-submission-msgs')
                <div class="mb-5 text-center md:px-9">
                    {!! Form::open(['action'=>['App\Http\Controllers\CommentsController@store', $article->id], 'method'=>'POST']) !!}
                    <div class="text-left">
                        {{Form::label('sender_name', 'From:')}}
                        {{Form::text('sender_name','',['placeholder'=>'', 'class'=>'appearance-none w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
                    </div>
                    <div class="text-left">
                        {{Form::label('content', 'Comment:')}}
                        <br/>
                        {{Form::textarea('content','',['placeholder'=>'','maxlength'=>100,'class'=>'text-sm h-24 resize-none rounded-lg w-full'])}}
                    </div>
                    {{Form::submit('Add comment', ['class'=>'appearance-none w-40 bg-blue-400 text-grey-darker rounded-lg  hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}
                    {!! Form::close() !!}
                </div>
                @foreach($comments as $comment)
                <div class="bg-gray-100 rounded-lg w-full p-1 px-2 my-2 lg:px-7">
                    <div class="flex justify-between items-center">
                        <h1 class="font-medium mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            {{$comment->sender_name}}
                        </h1>
                        @auth
                        {!! Form::open(['action' => ['App\Http\Controllers\CommentsController@destroy', $comment->id], 'method'=>'POST']) !!}
                        {{ Form::hidden('_method','DELETE') }}
                        <label>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 bg-red-100 rounded-full p-1 hover:shadow-lg hover:text-red-600 transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            {{Form::submit('',['class'=>'appearance-none bg-red-400 text-grey-darker rounded-full hover:bg-red-500 hover:shadow-lg transition duration-200 ease-in'])}}
                        </label>
                        {!! Form::close() !!}
                        @endauth
                    </div>

                    <p class="text-sm font-light text-gray-800 lg:w-4/5 lg:text-base">
                        {{$comment->content}}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-span-2">
            <h1 class="text-2xl"><span class="font-bold">Related</span> News</h1>
            <div class="">

                @if($relatedArticles->count() == 1)
                    <h1 class="text-sm mt-4 text-gray-600"><span class="font-medium">No available news...</span></h1>
                @endif
               @foreach($relatedArticles as $related)
                   @if($article->id != $related->id)
                   <div class="mt-4 rounded-lg p-2 overflow-hidden bg-white shadow-xl">
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
