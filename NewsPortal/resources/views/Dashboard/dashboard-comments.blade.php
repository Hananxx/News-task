<x-app-layout>
    <div class="flex">
        <section>
            @include('components.Dashboard-nav')
        </section>
        <section class="m-auto ml-48 w-3/4 mt-16 shadow-2xl p-4 rounded-2xl mb-4 bg-white">
            <h1 class="text-3xl font-bold mb-4">Manage Comments</h1>
            <hr class="mb-4"/>
            @include('components.form-submission-msgs')
            <div id="comments-section" class="grid lg:grid-cols-2 gap-3">
                @foreach($comments as $comment)
                    <div class="p-4 border-b flex justify-between ">
                        <div>
                            <h1></h1>
                            <h1 class="font-medium text-base">{{$comment->sender_name}}
                            <a class="text-xs text-gray-400 font-light" href="/articles/{{$comment->article->id}}"> On {{ \Illuminate\Support\Str::limit($comment->article->title, 20, $end='...') }}</a></h1>
                            <p class="text-xl">{{$comment->content}}</p>
                        </div>
                        <div class="flex">

                            {!! Form::open(['action'=>['App\Http\Controllers\CommentsController@update', $comment->id], 'method'=>'POST']) !!}
                            {{Form::hidden('_method', 'PUT')}}
                              <label>
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-8 w-8 bg-gray-100 rounded-full p-1 hover:shadow-lg hover:text-blue-600 transition duration-300 ease-in-out" viewBox="0 0 20 20" fill="currentColor">
                                      <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                  </svg>
                                  {{Form::submit('', ['class'=>'float-left appearance-none bg-blue-400 text-grey-darker rounded-lg  hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}

                              </label>
                            {!! Form::close() !!}

                            {!! Form::open(['action' => ['App\Http\Controllers\CommentsController@destroy', $comment->id], 'method'=>'POST']) !!}
                            {{ Form::hidden('_method','DELETE') }}
                            <label>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 bg-gray-100 rounded-full p-1 hover:shadow-lg hover:text-red-600 transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                {{Form::submit('',['class'=>'appearance-none bg-red-400 text-grey-darker rounded-full hover:bg-red-500 hover:shadow-lg transition duration-200 ease-in'])}}
                            </label>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>

