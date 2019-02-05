@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles">

            <p>
                <form action="{{route('site')}}" class="form-inline text-center" method="get">
                    <input type="search" name="search" id="search" placeholder="Search" class="form-control" value="{{isset($search) ? $search : ""}}">
                    <button class="btn btn-info">Search</button>
                </form>
            </p>

            <div class="row">
                @foreach ($list as $article)
                    <article-card-component
                        title="{{str_limit($article->title,25,"...")}}"
                        description="{{str_limit($article->description, 40,"...")}}"
                        link="{{route('article',[$article->id, str_slug($article->title)])}}"
                        image="https://coletiva.net/files/e4da3b7fbbce2345d7772b0674a318d5/midia_foto/20170713/118815-maior_artigo_jul17.jpg"
                        date="{{$article->date}}"
                        author="{{$article->author}}"
                        sm="6"  md="4">
                    </article-card-component>
                @endforeach
            </div>
            <div align="center">
                {{$list}}
            </div>
        </panel-component>
    </page-component>
@endsection
