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
                v-bind:titles="['#','Title', 'Description', 'Author', 'Date']"
                v-bind:items="{{json_encode($listModel)}}"
                order ="desc" orderCol="1"
                create="#create"  detail="/admin/articles/" edit="/admin/articles/" deleted="/admin/articles/" token="{{ csrf_token() }}"
                modal="yes"
            ></table-list-component>
            <div align="center">
                {{$listModel}}
            </div>
        </panel-component>
    </page-component>

    <modal-component name="add" title="Add">
        <form-component id="formAdd" css="" action="{{route('articles.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="addTitle">Title</label>
                <input type="text" name="title" id="addTitle" class="form-control" placeholder="Title" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label for="addDescription">Description</label>
                <input type="text" name="description" id="addDescription" class="form-control" placeholder="Description" value="{{old('description')}}">
            </div>
            <div class="form-group">
                <label for="addContent">Content</label>
                <textarea name="content" id="addContent" class="form-control" value="{{old('contet')}}"></textarea>
            </div>
            <div class="form-group">
                <label for="addDate">Date</label>
                <input type="date" name="date" id="addDate" class="form-control" value="{{old('date')}}">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formAdd">Add</button>
        </span>
    </modal-component>
    
    <modal-component name="edit" title="Edit">
        <form-component id="formEdit" css="" v-bind:action="'/admin/articles/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="editTitle">Title</label>
                <input type="text" name="title" id="editTitle" v-model="$store.state.item.title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="editDescription">Description</label>
                <input type="text" name="description" id="editDescription" v-model="$store.state.item.description"  class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="editContent">Content</label>
                <textarea name="content" id="editContent" class="form-control" v-model="$store.state.item.content"></textarea>
            </div>
            <div class="form-group">
                <label for="editDate">Date</label>
                <input type="date" name="date" id="editDate" class="form-control" v-model="$store.state.item.date">
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
