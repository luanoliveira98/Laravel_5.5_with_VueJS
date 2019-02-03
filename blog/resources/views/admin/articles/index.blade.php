@extends('layouts.app')

@section('content')
    <page-component size="12">

        @if($errors->all())
            <div class="alert alert-danger alert-dismissible text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                @foreach ($errors->all() as $key => $value)
                <li><strong>{{$value}}</strong></li>
                @endforeach
            </div>
        @endif

        <panel-component title="Articles List">
            <crumbs-component v-bind:list="{{$listCrumbs}}"></crumbs-component>
            <table-list-component 
                v-bind:titles="['#','Title', 'Description', 'Date']"
                v-bind:items="{{$listArticles}}"
                order ="asc" orderCol="1"
                create="#create"  detail="/admin/articles/" edit="/admin/articles/" deleted="/admin/articles/" token="{{ csrf_token() }}"
                modal="yes"
            ></table-list-component>
        </panel-component>
    </page-component>

    <modal-component name="add" title="Add">
        <form-component id="formAdd" css="" action="{{route('articles.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Description" value="{{old('description')}}">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" class="form-control" value="{{old('date')}}">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formAdd">Add</button>
        </span>
    </modal-component>
    
    <modal-component name="edit" title="Edit">
        <form-component id="formEdit" css="" v-bind:action="'/admin/articles/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" v-model="$store.state.item.title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" v-model="$store.state.item.description"  class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" v-model="$store.state.item.content"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="datetime-local" name="date" id="date" class="form-control" v-model="$store.state.item.date">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formEdit">Edit</button>
        </span>
    </modal-component>
    
    <modal-component name="detail" v-bind:title="$store.state.item.title">
        <p>@{{$store.state.item.description}}</p>
        <p>@{{$store.state.item.content}}</p>
        <p>@{{$store.state.item.date}}</p>
    </modal-component>
@endsection
