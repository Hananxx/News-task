<x-app-layout>

    <div class="w-4/5 m-auto py-20 rounded-md shadow-xl h-screen">
        <h1 class="text-4xl text-center font-bold mb-12">Contact Us</h1>
        <div class="flex flex-col items-center">
            @include('components.form-submission-msgs')

            {!! Form::open(['action'=>'App\Http\Controllers\ContactController@store']) !!}
            <div>
                {{Form::label('sender', 'From:')}}
                {{Form::text('sender','',['placeholder'=>'', 'class'=>'ml-2 appearance-none w-52 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
        </div>
        <div>
            {{Form::label('message', 'Message:')}}
            <br/>
            {{Form::textarea('message','',['placeholder'=>''])}}
        </div>
            {{Form::submit('Send', ['class'=>'appearance-none w-32 bg-blue-400 text-grey-darker rounded-lg p-1 hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}
            {!! Form::close() !!}
        </div>
    </div>

</x-app-layout>
