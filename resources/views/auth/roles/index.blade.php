@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>新建用户</h3>
                    {!! Form::open(['method'=>'post','route'=>'users.store']) !!}

                    <div class="form-group">
                        {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', '邮箱', ['class'=>'control-label']) !!}
                        {!! Form::text('email', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', '密码', ['class'=>'control-label']) !!}
                        {!! Form::text('password', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="checkbox">
                        @foreach($roles as $role)
                            <label>
                                {!! Form::checkbox('role[]',$role->id,false) !!}
                                {{$role->display_name or $role->name}}
                            </label>
                        @endforeach
                    </div>

                    <div class="form-group">
                        {!! Form::submit('新建用户', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

        </div>

        <div class="col-md-9">
        @include('auth.users._userPanel')
        </div>
    </div>

    <div class="container">
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>新建角色</h3>
                    {{--<form action="/admin/roles" method="post">--}}
                    {!! Form::open(['method'=>'post','route'=>'roles.store']) !!}
                        @include('auth.roles._createForm')

                        <div class="checkbox">
                            @foreach($perms as $perm)
                                <label>
                                    {!! Form::checkbox('perm[]',$perm->id,false) !!}
                                    {{$perm->display_name or $perm->name}}
                                </label>
                            @endforeach
                        </div>

                        <div class="form-group">
                            {!! Form::submit('新建角色', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                    {{--</form>--}}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>新建权限</h3>
                    {{--<form action="/admin/permissions" method="post">--}}
                    {!! Form::open(['method'=>'post','route'=>'permissions.store']) !!}
                        @include('auth.roles._createForm')


                        <div class="form-group">
                            {!! Form::submit('新建权限', ['class'=>'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                    {{--</form>--}}
                </div>
            </div>
        </div>
        <div class="col-md-9">
            @include('auth.roles._rolePanel')
        </div>

    </div>
@endsection