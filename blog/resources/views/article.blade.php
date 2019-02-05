@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component>
            <h1 class="h2" align="center">{{$article->title}}</h1 class="h2">
            <h2 class="h4" align="center">{{$article->description}}</h2>
            <p>{{$article->content}}</p>
            <p align="center">
                <small>Por {{$article->user->name}} - {{date('d/m/Y', strtotime($article->date))}}</small>
            </p>
        </panel-component>
    </page-component>
@endsection
