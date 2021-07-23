<x-app-layout>
    <div class="flex">
    <section>
        @include('components.Dashboard-nav')
    </section>
<section class="p-8 rounded-xl shadow-xl m-auto h-screen">
    <h1 class="text-3xl font-bold mb-4">Create an Article</h1>
    <div class="flex justify-between lg:flex-row flex-col">
        <div class="mr-4 pr-4 border-r">
            {!! Form::open(['action'=>'App\Http\Controllers\ArticlesController@store']) !!}
            <div>
                {{Form::label('title', 'Title:')}}
                {{Form::text('title','',['placeholder'=>'', 'class'=>'appearance-none w-32 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
                {{Form::label('author', 'Author:')}}
                {{Form::text('author','',['placeholder'=>'', 'class'=>'appearance-none w-32 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
            </div>

            <div>
                {{Form::label('content', 'Content:')}}
                {{Form::textarea('content','',['placeholder'=>''])}}
            </div>
        </div>
        <div>
            @include('components.form-submission-msgs')
            <h3 class="font-bold">Category:</h3>
            @foreach($categories as $category)
                {{Form::radio('category', $category->id)}}
                {{Form::label('category', $category->name)}}
            @endforeach
            <div class="my-4">
                {{Form::label('cover_img', 'Cover Image URL:')}}
                {{Form::text('cover_img','',['placeholder'=>'','class'=>'appearance-none w-48 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
            </div>
            {{Form::submit('Add', ['class'=>'appearance-none w-32 bg-blue-400 text-grey-darker rounded-lg p-1 hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}
            {!! Form::close() !!}
        </div>
    </div>

</section>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</x-app-layout>

