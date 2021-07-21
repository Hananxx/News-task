<h1>{{$article->title}}</h1>
<h4>written by: {{$article->user_id}}</h4>
<p>{!! $article->content !!}</p>
<a href="/articles/{{$article->id}}/edit">edit</a>
{!! Form::open(['action' => ['App\Http\Controllers\ArticlesController@destroy', $article->id], 'method'=>'POST']) !!}
    {{ Form::hidden('_method','DELETE') }}
    {{Form::submit('Delete')}}
{!! Form::close() !!}
