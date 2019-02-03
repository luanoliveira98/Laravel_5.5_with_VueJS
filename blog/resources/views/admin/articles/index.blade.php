@extends('layouts.app')

@section('content')
    <page-component size="12">
        <panel-component title="Articles List">
            <a href="#">Create</a>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Title...</td>
                        <td>Description...</td>
                        <td>Author...</td>
                        <td>Date...</td>
                        <td>
                            <a href="#">Edit</a> | 
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Title...</td>
                        <td>Description...</td>
                        <td>Author...</td>
                        <td>Date...</td>
                        <td>
                            <a href="#">Edit</a> | 
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Title...</td>
                        <td>Description...</td>
                        <td>Author...</td>
                        <td>Date...</td>
                        <td>
                            <a href="#">Edit</a> | 
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Title...</td>
                        <td>Description...</td>
                        <td>Author...</td>
                        <td>Date...</td>
                        <td>
                            <a href="#">Edit</a> | 
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </panel-component>
    </page-component>
@endsection
