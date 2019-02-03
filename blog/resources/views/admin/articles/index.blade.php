@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles List">
            <table-list-component 
                v-bind:titles="['#','Title', 'Description']"
                v-bind:itens="[[1, 'PHP OO', 'PHP OO Course'],[2, 'Vue JS', 'Vue JS Course']]"
            ></table-list-component>
        </panel-component>
    </page-component>
@endsection
