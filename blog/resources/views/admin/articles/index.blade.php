@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles List">
            <table-list-component v-bind:titles="['test','other']"></table-list-component>
        </panel-component>
    </page-component>
@endsection
