<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'ID:') !!}
    <p>{!! $empleado->id !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    <p>{!! $empleado->user ? $empleado->user->email : '&nbsp;' !!}</p>
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    <p>{!! $empleado->nombres !!}</p>
</div>

<!-- Apellido Paterno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
    <p>{!! $empleado->apellido_paterno !!}</p>
</div>

<!-- Apellido Materno Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
    <p>{!! $empleado->apellido_materno !!}</p>
</div>

<!-- Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('admin', 'Admin:') !!}
    <p>{!! $empleado->admin  ? 'Si' : 'No'!!}</p>
</div>

{!! Form::model($empleado, ['route' => ['empleados.permisos', $empleado->id], 'method' => 'patch']) !!}
@if(isset($empleado->user))
<script>
    var user_role_permission = {!! $json !!};
</script>

<div class="form-group col-md-12 checklist_dependency" data-entity="user_role_permission">
    <label>Permisos del rol del usuario</label>
    <div class="row">
        <div class="col-xs-12">
            <label>Roles</label>
        </div>


        @foreach ($roles as $role)
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <input class="primary_list" {{ in_array($role->id, $user_roles) ? 'checked=checked' : '' }} name="roles[]" value="{{ $role->id }}" type="checkbox">
                        {{ $role->name }}
                    </label>

                </div>
            </div>
        @endforeach

    </div>


    <div class="row">
        <div class="col-xs-12">
            <label>Permiso</label>
        </div>
        @foreach ($permisos as $permiso)
            <div class="col-sm-4">
                <div class="checkbox">
                    <label>
                        <input class="primary_list" name="permisos[]" disabled value="{{ $permiso->id }}" type="checkbox">
                        {{ $permiso->name }}
                    </label>

                </div>
            </div>
        @endforeach

    </div>

</div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12 text-right">
    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Back</a>

    @if(isset($empleado->user))
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @endif

</div>

{!! Form::close() !!}

@push('custom-scripts')
    <script type="text/javascript">
        function checkPermisos(){
            $("input[name='permisos\\[\\]']").prop('checked', false);
            $("input[name='roles\\[\\]']").each(function() {
                var value = this.value;

                if(this.checked){
                    $.each(user_role_permission[value], function(i, item){
                        $("input[value="+item+"][name='permisos\\[\\]']").prop('checked', true);
                    });
                }
            });
        }

        $( document ).ready(function() {
            checkPermisos();

            $("input[name='roles\\[\\]']").click(function(){
                checkPermisos();
            });


        })
    </script>
@endpush

