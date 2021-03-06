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

        <panel-component title="Admins List">
            <crumbs-component v-bind:list="{{$listCrumbs}}"></crumbs-component>
            <table-list-component 
                v-bind:titles="['#','Name', 'E-mail']"
                v-bind:items="{{json_encode($listModel)}}"
                order ="asc" orderCol="1"
                create="#create"  detail="/admin/adm/" edit="/admin/adm/"
                modal="yes"
            ></table-list-component>
            <div align="center">
                {{$listModel}}
            </div>
        </panel-component>
    </page-component>

    <modal-component name="add" title="Add">
        <form-component id="formAdd" css="" action="{{route('adm.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="admin">Admin</label>
                <select name="admin" id="admin" class="form-control">
                    <option value="N" {{(old('admin') && old('admin') == 'N' ? 'selected' : '')}}>No</option>
                    <option value="S" {{(old('admin') && old('admin') == 'S' ? 'selected' : '')}} {{(!old('admin') ? 'selected' : '')}}>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formAdd">Add</button>
        </span>
    </modal-component>
    
    <modal-component name="edit" title="Edit">
        <form-component id="formEdit" css="" v-bind:action="'/admin/adm/'+$store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" v-model="$store.state.item.name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" v-model="$store.state.item.email" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
                <label for="admin">Admin</label>
                <select name="admin" id="admin" class="form-control" v-model="$store.state.item.admin" >
                    <option value="N">No</option>
                    <option value="S">Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
        </form-component>
        <span slot="buttons">
            <button class="btn btn-info" form="formEdit">Edit</button>
        </span>
    </modal-component>
    
    <modal-component name="detail" v-bind:title="$store.state.item.name">
        <p>@{{$store.state.item.email}}</p>
@endsection
