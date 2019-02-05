@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles">
            <h2>{{$article->title}}</h2>
        </panel-component>
    </page-component>
@endsection
