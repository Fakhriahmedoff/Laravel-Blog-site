@extends('front.layouts.master')
 @section('title', $page->title)
 @section('bg',$page->image) 
@section('content')

      <div class="col-md-8 mx-auto">
        <div class="col-lg-12 col-md-10 mx-auto">
         {{$page->content}}
        </div>
      </div>
          
    
        
    
   
  <hr>
@endsection
