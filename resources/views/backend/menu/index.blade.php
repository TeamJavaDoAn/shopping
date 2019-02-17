@extends('backend.layouts.master')
@section('content')
<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('menu') }}">Quản lý menu</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('menu') }}">Show all</a></li>
        <li><a href="{{ URL::to('menu/create') }}">Create a menu</a>
    </ul>
</nav>
   <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Menu name</th>
        <th>Menu link</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($menu as $item)
      <tr>
        <td>{{$item['menu_id']}}</td>
        <td>{{$item['menu_name']}}</td>
        <td>{{$item['menu_link']}}</td>
        <td>{{$item['created_at']}}</td>
        <td>{{$item['updated_at']}}</td>

        <td><a href="{{ URL::to('menu/' . $item->menu_id . '/edit') }}" class="btn btn-warning">Edit</a></td>
        <td>
           {{ Form::open(array('url' => 'menu/' . $item->menu_id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@stop