
@extends('layout')

@section('content')

<div class="box box-success">
    <br/>
    <br/>
    @if (Session::has('msg'))
    <h4 class="alert alert-info">
        {{{ Session::get('msg') }}}
        {{{Session::put('msg',NULL)}}}
    </h4>
    @endif
    <br/>

    <div class="box-body ">
        <form method="post" action="{{ URL::Route('AdminAdminsAdd') }}">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" type="text" name="username" placeholder="Agregar email"/>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Agregar Contraseña"/>
            </div>
            <div class="box-footer">
                <button type="submit" id="btnsearch" class="btn btn-flat btn-block btn-success">Agregar Administrador</button>
            </div>
        </form>
    </div>
    <div class="form-group">
        <label>Usuarios:</label>
        <select name="users_id" id="users_id">
            <option value="0">Seleccione</option>
            <?php $i=1; foreach (get_users() as $user) {?>
            <option value="{{ $user->id }}">{{ $user->username }}</option>
            <?php $i++; } ?>
        </select>
    </div>
    <div class="form-group">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Modulo</th>
                    <th>Activar</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach (modulos() as $modulo) {?>
                <tr>
                    <td>{{ $i }} </td>
                    <td> {{  trans($modulo->modulo) }}</td>
                    <td> <input class="users" type="checkbox" name="" value="{{ $modulo->id }}"></td>
                </tr>
                <?php $i++; } ?>
            </tbody>
        </table>
    </div>
    <div class="box-footer">
                <button type="submit" id="btnsearch" class="btn btn-flat btn-block btn-primary">Agregar Modulos</button>
            </div>
</div>


@stop