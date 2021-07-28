@auth
    <div class="flex">
        {!! Form::open(['action' => ['App\Http\Controllers\CommentsController@toggleVisibility', $comment->id], 'method'=>'POST']) !!}
        {{ Form::hidden('_method','PUT') }}
        <label>
            @if($comment->isHidden)
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-3 h-6 w-6 bg-gray-200 shadow-inner rounded-full p-1 hover:shadow-lg hover:text-gray-800 transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
            @else
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-3 h-6 w-6 bg-yellow-200 rounded-full p-1 hover:shadow-lg hover:text-yellow-600 transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            @endif
            {{Form::submit('',['class'=>'appearance-none bg-red-400 text-grey-darker rounded-full hover:bg-red-500 hover:shadow-lg transition duration-200 ease-in'])}}
        </label>
        {!! Form::close() !!}

        {!! Form::open(['action' => ['App\Http\Controllers\CommentsController@destroy', $comment->id], 'method'=>'POST']) !!}
        {{ Form::hidden('_method','DELETE') }}
        <label>
            <svg xmlns="http://www.w3.org/2000/svg" class=" h-6 w-6 bg-red-200 rounded-full p-1 hover:shadow-lg hover:text-red-600 transition duration-300 ease-in-out" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            {{Form::submit('',['class'=>'appearance-none bg-red-400 text-grey-darker rounded-full hover:bg-red-500 hover:shadow-lg transition duration-200 ease-in'])}}
        </label>
        {!! Form::close() !!}

    </div>
@endauth
