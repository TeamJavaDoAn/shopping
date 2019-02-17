@extends('backend.layouts.master')
@section('content')
 <nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">Quản lý người dùng</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">Show all</a></li>
        <li><a href="{{ URL::to('users/create') }}">Create a User</a>
    </ul>
</nav>

<h1>Create a User</h1>

<!-- if there are creation errors, they will show here -->

@stop