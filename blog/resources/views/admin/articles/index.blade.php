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
                modal="1"
            ></table-list-component>
        </panel-component>
    </page-component>

    <modal-component name="add">
        <panel-component title="Add">
            <form-component css="" action="#" method="delete" enctype="multipart/form-data" token="123123">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                </div>
                <button class="btn btn-info">Add</button>
            </form-component>
        </panel-component>
    </modal-component>
    
    <modal-component name="detail">
        <panel-component title="Add">
            <form-component css="" action="#" method="delete" enctype="multipart/form-data" token="123123">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Description">
                </div>
                <button class="btn btn-info">Add</button>
            </form-component>
        </panel-component>
    </modal-component>
    
    <modal-component name="edit">
        <panel-component title="Add">
            <form-component css="" action="#" method="delete" enctype="multipart/form-data" token="123123">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" v-model="$store.state.item.title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" v-model="$store.state.item.description"  class="form-control" placeholder="Description">
                </div>
                <button class="btn btn-info">Add</button>
            </form-component>
        </panel-component>
    </modal-component>
@endsection
