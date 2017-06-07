<!-- Button trigger modal -->
<button type="button" class="btn btn-sm pull-right" data-toggle="modal" data-target="#editUserModal-{{ $user->id }}">
    <i class="fa fa-btn fa-cog">E</i>
</button>

<!-- Modal -->
<div class="modal fade" id="editUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModal-{{ $user->id }}-Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="editUserModal-{{ $user->id }}-Label">编辑用户</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($user,['method'=>'patch','route'=>['users.update',$user->id]]) !!}
                @if($user->name !== 'aquila')
                    <div class="form-group">
                        {!! Form::label('name', '名称', ['class'=>'control-label']) !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                @endif

                <div class="form-group">
                    {!! Form::label('email', '邮箱', ['class'=>'control-label']) !!}
                    {!! Form::text('email', null, ['class'=>'form-control']) !!}
                </div>

                {{--<div class="form-group">--}}
                    {{--{!! Form::label('password', '密码', ['class'=>'control-label']) !!}--}}
                    {{--{!! Form::text('password', null, ['class'=>'form-control']) !!}--}}
                {{--</div>--}}

                <div class="checkbox">
                    @foreach($roles as $role)
                        <label>
                            {!! Form::checkbox('role[]',$role->id,$user->hasRole($role->name)?true:false) !!}
                            {{$role->display_name or $role->name}}
                        </label>
                    @endforeach
                </div>
                <div class="form-group">
                    {!! Form::submit('编辑用户', ['class'=>'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>