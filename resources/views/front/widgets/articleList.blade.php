@if(count($articles)>0)
@foreach ($articles as $article)
    

<div class="post-preview">
<a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
    <h2 class="post-title">
      {{$article->title}}
    </h2>
  <img src="{{$article->image}}">
    <h3 class="post-subtitle">
      {{Str::limit($article->content,72,' ...')}}
    </h3>
  </a>
  <p class="post-meta">Category : 
        <a href="#">{{$article->getCategory->name }}</a> 
        Oxunma Sayı : {{$article->hit}}
        <span class="float-right"> Paylaşılma Tarixi : {{$article->created_at->diffForHumans()}}</span>
  </p>
</div>
@endforeach
{{$articles->links()}}
@else
<div class="alert alert-danger">
    <h6>Bu kateqoriyaya aid meqale yoxdur</h6>

</div>
@endif
<hr>
<!-- Pager -->
<div class="clearfix">
<a class="btn btn-primary float-right" href="{{route('homepage')}}"><i class="fa fa-chevron-left"></i>  ESAS SEHIFE  </a>
</div>