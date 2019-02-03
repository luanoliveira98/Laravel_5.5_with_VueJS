@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles List">
            <crumbs-component v-bind:list="{{$listCrumbs}}"></crumbs-component>
            <modal-link-component type="link" name="myModalTest" title="Create" css=""></modal-link-component>
            <table-list-component 
                v-bind:titles="['#','Title', 'Description']"
                v-bind:items="[[1, 'PHP OO', 'PHP OO Course'],[2, 'Vue JS', 'Vue JS Course']]"
                order ="asc" orderCol="1"
                create="#create"  detail="#detail" edit="#edit" deleted="#deleted" token="7878797987"
            ></table-list-component>
        </panel-component>
    </page-component>
    <modal-component name="myModalTest">
        <panel-component title="Add">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <input type="file" id="exampleInputFile">
                    <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                    <label>
                    <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </panel-component>
    </modal-component>
@endsection
