<h1>All Articles</h1>
@foreach($articles as $article)
    <div>
      <h1>{{$article->title}}</h1>
        <p>{!! $article->content !!}</p>
    </div>
    <a href="/articles/{{$article->id}}">read more >></a>
    <hr/>
@endforeach
