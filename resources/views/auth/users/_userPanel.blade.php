@foreach($users as $user)
    <div class="col-md-3">

        <div class="panel {{$user->name == 'aquila' ? 'panel-success' : 'panel-default'}}">

            <div class="panel-heading">
                <div class="pull-left">
                    <i class="fa fa-btn fa-user"></i>
                    {{$user->name}}
                </div>
                @if($user->name !== 'aquila')
                    {{--@ability('admin','delete_role',['validate_all'=>false])--}}
                @role('admin')
                    @include('auth.users._deleteForm')
                @endrole
                    {{--@endability--}}
                @endif

                {{--@ability('admin','edit_role')--}}
                @role('admin')
                    @include('auth.users._editUserModal')
                @endrole
                {{--@endability--}}
                <div class="clearfix"></div>
            </div>

            <div class="panel-body">
                <ul class="fa-ul">
                    @foreach($user->roles as $role)
                        <li>
                            <i class="fa-li fa fa-tag"></i>
                            {{$role->display_name or $role->name}}
                        </li>
                    @endforeach

                </ul>

                <hr />

                <ur class="fa-ul">
                    @foreach($user->groups as $group)
                        <li>
                            <i class="fa-li fa fa-tag"></i>
                            {{$group->name}}
                        </li>
                    @endforeach
                </ur>

            </div>

        </div>

    </div>
@endforeach