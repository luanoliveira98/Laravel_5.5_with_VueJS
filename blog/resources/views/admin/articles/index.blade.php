@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles List">
            <table-list-component 
                v-bind:titles="['#','Title', 'Description']"
                v-bind:itens="[[1, 'PHP OO', 'PHP OO Course'],[2, 'Vue JS', 'Vue JS Course']]"
                create="#create"  detail="#detail" edit="#edit" deleted="#deleted" token="7878797987"
            ></table-list-component>
        </panel-component>
    </page-component>
@endsection
