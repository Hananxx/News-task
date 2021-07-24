<x-app-layout>
<section class="w-screen h-screen flex justify-center items-center">
    <div class="md:w-4/5 m-auto py-8 rounded-md shadow-xl bg-white">
        <h1 class="text-4xl text-center font-bold mb-12 ">Contact Us</h1>
        <div class="px-2 flex flex-col items-center justify-around leading-loose">
            @include('components.form-submission-msgs')
            {!! Form::open(['action'=>'App\Http\Controllers\ContactController@store']) !!}
            <div>
                {{Form::label('sender', 'From:')}}
                {{Form::text('sender','',['placeholder'=>'', 'class'=>'appearance-none md:w-full w-11/12 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
            </div>
            <div>
                {{Form::label('message', 'Message:')}}
                <br/>
                {{Form::textarea('message','',['placeholder'=>'','maxlength'=>100,'class'=>'h-24 resize-none rounded-lg md:w-full w-11/12'])}}
            </div>
            {{Form::submit('Send', ['class'=>'appearance-none w-32 bg-blue-400 text-grey-darker rounded-lg  hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}
            {!! Form::close() !!}
        </div>
    </div>
</section>


</x-app-layout>
