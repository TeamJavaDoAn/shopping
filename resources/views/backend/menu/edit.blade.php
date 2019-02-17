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

 <h2>Hiệu chỉnh menu {{$menu->menu_id}}</h2><br/>
 {!! Form::model($menu, [
    'method' => 'PATCH',
    'route' => ['menu.update',  $menu->menu_id]
]) !!}
      <!--<form method="PATCH"  action="{{url('menu', $menu->menu_id)}}">-->
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Id">Id:</label>
            <input type="text" class="form-control" name="id" value="{{$menu->menu_id}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Menu name">Menu name:</label>
              <input type="text" class="form-control" name="menu_name" value="{{$menu->menu_name}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Link">Link:</label>
              <input type="text" class="form-control" name="menu_link" value="{{$menu->menu_link}}">
            </div>
          </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
@stop