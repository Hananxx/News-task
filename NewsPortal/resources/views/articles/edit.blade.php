<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<x-app-layout>
    <div class="flex pt-12">
        <section>
            @include('components.Dashboard-nav')
        </section>
        <section class="p-8 rounded-xl shadow-xl m-auto h-screen">
            <h1 class="text-3xl font-bold mb-4">Edit Article</h1>
            <div class="grid md:grid-cols-3 ">
                <div class="mr-4 pr-4 border-r col-span-2">
                    {!! Form::open(['action'=>['App\Http\Controllers\ArticlesController@update', $article->id], 'method'=>'POST']) !!}
                    <div>
                        {{Form::label('title', 'Title:')}}
                        {{Form::text('title',$article->title,['placeholder'=>'', 'class'=>'appearance-none w-32 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
                        {{Form::label('author', 'Author:')}}
                        {{Form::text('author',$article->author_name,['placeholder'=>'', 'class'=>'appearance-none w-32 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
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
                        {{Form::text('cover_img',$article->cover_img,['placeholder'=>'','class'=>'appearance-none w-56 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-8 px-2'])}}
                    </div>

                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Edit', ['class'=>'float-left mx-2 appearance-none w-32 bg-blue-400 text-grey-darker rounded-lg p-1 hover:bg-blue-500 hover:shadow-lg transition duration-200 ease-in'])}}
                    {!! Form::close() !!}

                    {!! Form::open(['action' => ['App\Http\Controllers\ArticlesController@destroy', $article->id], 'method'=>'POST']) !!}
                    {{ Form::hidden('_method','DELETE') }}
                    {{Form::submit('Delete',['class'=>'appearance-none w-20 bg-red-400 text-grey-darker rounded-lg p-1 hover:bg-red-500 hover:shadow-lg transition duration-200 ease-in'])}}
                    {!! Form::close() !!}
                </div>
            </div>

        </section>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var colors = [
            "#2188ff", "#4498dc","#c70000",
            "#000791", "#0046a5", "#a70063",
            "#4a0042", "#fff", "#df0000",
            "#dc60c4", "#001937",
            "#000", "#009ead", "#005764",
        ];
        var bgColors = [
            "#ffe080","#ffa8cf","#c70000","#a4b2ff","#ce97fb",
            "#67ebfa", "#faa99d"
        ];
        var quill = new Quill('#editor-container', {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ['bold', 'italic', 'underline',{'color':colors}, {'background':bgColors}],
                    ['image', 'video']
                ]
            },
            placeholder: '',
            theme: 'snow'  // or 'bubble'
        });
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("textarea").value = quill.root.innerHTML;
        });
    </script>
</x-app-layout>




