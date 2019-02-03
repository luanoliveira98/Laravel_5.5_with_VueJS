@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <panel-component title="Dashboard">
                    Content test...

                    <div class="row">
                        <div class="col-md-4">
                            <box-component quantify="80" title="Articles" url="#" color="orange" icon="ion ion-pie-graph">

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
            </div>
        </div>
    </div>
@endsection
