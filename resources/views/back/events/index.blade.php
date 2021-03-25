@extends('back.layouts.master')
@section('title', 'events')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"><strong>{{$articles->Count()}} meqale tapildi</strong></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Shekil</th>
              <th>Meqale Basigi</th>
              <th>Kateqoriyasi</th>
              <th>Baxilma Sayi</th>
              <th>Yaradilma tarixi</th>
              <th>Islemler</th>

            </tr>
          </thead>
                  <tbody>
                    @foreach ($articles as $article)
            <tr>

            <td><img src="{{$article->image}}" width="200px" alt=""></td>
            <td>{{$article->title}}</td>
              <td>{{$article->getCategory->name}}</td>
            <td>{{$article->hit}}</td>
              <td>{{$article->created_at->diffForHumans()}}</td>
              <td>
                    <a href="#"  title="Bax" class="btn btn-sm btn-success"><i class="fa fa-eye"> </i></a>
                    <a href="{{route('meqaleler.edit',$article->id)}}" title="Duzelt" class="btn btn-sm btn-primary"><i class="fa fa-edit"> </i></a>
              <a class="btn btn-sm btn-danger" href="{{route('delete.article',$article->id)}}"><i class="fa fa-trash bg-danger"> </i></a>
                  
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>


@endsection