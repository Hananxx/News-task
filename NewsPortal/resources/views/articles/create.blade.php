<html>
<head>
    <meta charset="utf-8">
    <title>CKEditor</title>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>
<body>
<h1>create an article</h1>

@include('components.form-submission-errors')
{!! Form::open(['action'=>'App\Http\Controllers\ArticlesController@store']) !!}
<div>
    {{Form::label('title', 'Title')}}
    {{Form::text('title','',['placeholder'=>''])}}
</div>
<div>
   category
@foreach($categories as $category)
        {{Form::radio('category', $category->id)}}
        {{Form::label('category', $category->name)}}
    @endforeach
</div>
<div>
    {{Form::label('content', 'Content')}}
    {{Form::textarea('content','',['placeholder'=>''])}}
</div>
{{Form::submit('Add')}}
{!! Form::close() !!}
<script>
    CKEDITOR.replace( 'content');
</script>
</body>
</html>
