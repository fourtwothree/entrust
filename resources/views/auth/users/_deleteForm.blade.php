{!! Form::open(['method'=>'delete','route'=>['users.destroy',$user->id]]) !!}
<button type="submit" class="btn btn-sm pull-right">
    <i class="fa fa-btn fa-close">D</i>
</button>
{!! Form::close() !!}