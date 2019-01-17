@extends('backend.layouts.master')
@section('content')
     @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
     <nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('users') }}">Quản lý người dùng</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('users') }}">Show all</a></li>
        <li><a href="{{ URL::to('users/create') }}">Create a User</a>
    </ul>
</nav>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Active</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['Phone']}}</td>
        <td>{{$user['active']}}</td>

        <td><a href="{{ URL::to('users/' . $user->id . '/edit') }}" class="btn btn-warning">Edit</a></td>
        <td>
           {{ Form::open(array('url' => 'users/' . $user->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop