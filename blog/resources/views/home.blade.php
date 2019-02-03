@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <panel-component title="Dashboard">
                    Content test...

                    <div class="row">
                        <div class="col-md-4">
                            <box-component></box-component>
                        </div>
                        
                        <div class="col-md-4">
                            <panel-component title="Content 2" color="orange">
                                Content test...
                            </panel-component>
                        </div>

                            
                        <div class="col-md-4">
                            <panel-component title="Content 3" color="panel-info">
                                Content test...
                            </panel-component>
                        </div>
                    </div>
                </panel-component>
            </div>
        </div>
    </div>
@endsection
