@extends('layouts.app')

@section('content')
    <page-component size="10">
        <panel-component title="Dashboard">
            <crumbs-component v-bind:list="{{$listCrumbs}}"></crumbs-component>
            <div class="row">
                <div class="col-md-4">
                    <box-component quantify="{{$countTables['articles']}}" title="Articles" url="{{route('articles.index')}}" color="orange" icon="ion ion-pie-graph">

                    </box-component>
                </div>
                
                <div class="col-md-4">
                    <box-component quantify="{{$countTables['users']}}" title="Users" url="{{route('users.index')}}" color="blue" icon="ion ion-person-stalker">

                    </box-component>
                </div>

                <div class="col-md-4">
                    <box-component quantify="{{$countTables['authors']}}" title="Authors" url="{{route('authors.index')}}" color="red" icon="ion ion-person">

                    </box-component>
                </div>

                <div class="col-md-4">
                    <box-component quantify="{{$countTables['admins']}}" title="Admins" url="{{route('adm.index')}}" color="green" icon="ion ion-person">

                    </box-component>
                </div>
            </div>
        </panel-component>
    </page-component>
@endsection
