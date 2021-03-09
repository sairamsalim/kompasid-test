{!! Form::open(['method' => 'PATCH','route' => ['categories.update2', $id],'style'=>'display:inline', 'id'=>'form_'.$id]) !!}
    {!! Form::checkbox('is_active', 1, $is_active, array('data-toggle' => 'toggle', 'id' => 'form_'.$id, 'onchange' => "$('#form_$id').submit()")) !!}
{!! Form::close() !!}