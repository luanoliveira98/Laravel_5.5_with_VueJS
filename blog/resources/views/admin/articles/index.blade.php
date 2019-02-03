@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles List">
            <crumbs-component v-bind:list="{{$listCrumbs}}"></crumbs-component>
            <table-list-component 
                v-bind:titles="['#','Title', 'Description']"
                v-bind:items="{{$listArticles}}"
                order ="asc" orderCol="1"
                create="#create"  detail="#detail" edit="#edit" deleted="#deleted" token="7878797987"
                modal="yes"
            ></table-list-component>
        </panel-component>
    </page-component>

    <modal-component name="add" title="Add">
        <form-component id="formAdd" css="" action="#" method="delete" enctype="multipart/form-data" token="123123">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Description">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formAdd">Add</button>
        </span>
    </modal-component>
    
    <modal-component name="edit" title="Edit">
        <form-component id="formEdit" css="" action="#" method="put" enctype="multipart/form-data" token="123123">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" v-model="$store.state.item.title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" v-model="$store.state.item.description"  class="form-control" placeholder="Description">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formEdit">Edit</button>
        </span>
    </modal-component>
    
    <modal-component name="detail" v-bind:title="$store.state.item.title">
        <p>@{{$store.state.item.description}}</p>
    </modal-component>
@endsection
