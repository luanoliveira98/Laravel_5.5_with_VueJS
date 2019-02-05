@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles">
            <div class="row">
                @foreach ($list as $article)
                    <article-card-component
                        title="{{$article->title}}"
                        description="{{$article->description}}"
                        link="#"
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
