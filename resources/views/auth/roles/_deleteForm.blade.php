{!! Form::open(['method'=>'delete','route'=>['roles.destroy',$role->id]]) !!}
    <button type="submit" class="btn btn-sm pull-right">
        <i class="fa fa-btn fa-close">D</i>
    </button>
{!! Form::close() !!}