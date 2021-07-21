<html>
<head>
    <meta charset="utf-8">
    <title>CKEditor</title>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
</head>
<body>
<h1>Edit an article</h1>

@include('components.form-submission-errors')
{!! Form::open(['action'=>['App\Http\Controllers\ArticlesController@update', $article->id], 'method'=>'POST']) !!}
<div>

    {{Form::label('title', 'Title')}}
    {{Form::text('title',$article->title,['placeholder'=>''])}}
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
    {{Form::textarea('content',$article->content,['placeholder'=>''])}}
</div>
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Add')}}
{!! Form::close() !!}
<script>
    CKEDITOR.replace('content');
</script>
</body>
</html>
