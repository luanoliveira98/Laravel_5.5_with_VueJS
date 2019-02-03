@extends('layouts.app')

@section('content')
    <page-component size="10">
        <panel-component title="Dashboard">
            <crumbs-component v-bind:list="{{$listCrumbs}}"></crumbs-component>
            <div class="row">
                <div class="col-md-4">
                    <box-component quantify="80" title="Articles" url="{{route('articles.index')}}" color="orange" icon="ion ion-pie-graph">

                    </box-component>
                </div>
                
                <div class="col-md-4">
                    <box-component quantify="1500" title="Users" url="#" color="blue" icon="ion ion-person-stalker">

                    </box-component>
                </div>

                    
                <div class="col-md-4">
                    <box-component quantify="3" title="Autors" url="#" color="red" icon="ion ion-person">

                    </box-component>
                </div>
            </div>
        </panel-component>
    </page-component>
@endsection
