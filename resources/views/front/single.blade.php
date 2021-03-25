@extends('front.layouts.master')
 @section('title', $article->title)
 @section('bg',$article->image) 
@section('content')

      <div class="col-md-8 mx-auto">
        <h2 class="text-center"> {{$article->title}} </h2>
       
       {{$article->content}}<br/> <br/>
       <span class="text-danger">Oxunma SAYI : {{$article->hit}}</span> 
      </div>
          
    

         <!-- Pager -->
         <div class="clearfix">
          <a class="btn btn-primary float-right" href="{{route('homepage')}}"><i class="fa fa-chevron-left"></i>  ESAS SEHIFE  </a>
          </div>

        
    
   
  <hr>
@endsection