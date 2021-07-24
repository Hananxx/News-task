<x-app-layout>
    <div class="flex">
    <section>
        @include('components.Dashboard-nav')
    </section>
<section class="bg-white m-auto w-3/4 mt-16 ml-48 shadow-2xl p-4 rounded-2xl mb-4">
    <h1 class="text-3xl font-bold mb-4">Create an Article</h1>
    <div class="grid md:grid-cols-3">
        <div class="mr-4 pr-4 col-span-2">
            {!! Form::open(['action'=>'App\Http\Controllers\ArticlesController@store','id'=>'form']) !!}
            <div>
                {{Form::label('title', 'Title:')}}
                {{Form::text('title','',['placeholder'=>'', 'class'=>'mb-2 appearance-none w-1/2 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
                <br/>
                {{Form::label('author', 'Author:')}}
                {{Form::text('author','',['placeholder'=>'', 'class'=>'mb-2 appearance-none w-1/2 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
            </div>

            <div>
                {{Form::label('content', 'Content:')}}
                {{Form::textarea('content','',['placeholder'=>'', 'class'=>'hidden', 'id'=>'textarea'])}}
                <div id="editor-container" class="h-72">
                </div>
            </div>
        </div>
        <div>
            @include('components.form-submission-msgs')
            <h3 class="font-bold">Category:</h3>
            @foreach($categories as $category)
                <div class="m-1 inline-block hover:text-blue-600 transition duration-200 ease-in-out">
                    {{Form::radio('category', $category->id)}}
                    {{Form::label('category', $category->name)}}
                </div>
                @endforeach
            <div class="my-4">
                {{Form::label('cover_img', 'Cover Image URL:')}}
                {{Form::text('cover_img','',['placeholder'=>'','class'=>'appearance-none w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
            </div>
            {{Form::submit('Add', ['class'=>'appearance-none w-32 bg-blue-400 text-grey-darker rounded-lg p-1 hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}
            {!! Form::close() !!}
        </div>
    </div>
</section>
    </div>
</x-app-layout>
