@extends('layouts.layout_user')
@section('content')
<div class="block-header">
    <h2>Reportes</h2>
    <small class="text-muted">Reportes generales.</small><br>
    <hr>
    Imprimir: <a href="javascript:window.print()" class="btn btn-raised btn-success"><i class="zmdi zmdi-print"></i></a>
  </div>
<div class="row clearfix">
    <div class="col-md-12 col-xs-12">
      @if(Auth::user()->role_id == 1)
      <table class="table table-bordered thead-inverse">
          <tbody>
            <tr>
              <th class="text-center" colspan="2" scope="row">Reporte usuarios</th>
            </tr>
            <tr>
              <td class="text-center white" width="40%">Total de usuarios</td>
              <td class="text-center white" width="60%">{{$user}}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td class="text-center" width="25%"><span class="label bg-blue">Administrador</span></td>
                            <td class="text-center" width="25%"><span class="label bg-light-green">Empatronador</span></td>
                          </tr>
                          <tr>
                            <td class="text-center white" width="25%">{{$admin}}</td>
                            <td class="text-center white" width="25%">{{$empatronador}}</td>
                          </tr>
                        </tbody>
                    </table>
                </td>
              </tr>
          </tbody>
      </table>
      @endif
        <table class="table table-bordered thead-inverse">
            <tbody>
              <tr>
                <th class="text-center" scope="row" colspan="2">Reporte militantes</th>
              </tr>
              <tr>
                <td class="text-center white" width="40%">Total de militantes</th>
                <td class="text-center white" width="60%">{{$militantes}}</td>
              </tr>
              <tr>
                <td class="text-center white" width="40%">Masculinos</th>
                <td class="text-center white" width="60%">{{$masculino}}</td>
              </tr>
              <tr>
                <td class="text-center white" width="40%">Femeninos</th>
                <td class="text-center white" width="60%">{{$femenino}}</td>
              </tr>
              <tr>
                <td colspan="2">
                    <table class="table table-bordered">
                        <tbody>
                          <tr>
                            <td class="text-center" width="25%"><span class="label bg-teal">Regidor</span></td>
                            <td class="text-center" width="25%"><span class="label label-danger">Alcalde</span></td>
                            <td class="text-center" width="25%"><span class="label bg-indigo">Diputado</span></td>
                            <td class="text-center" width="25%"><span class="label label-primary">Senador</span></td>
                          </tr>
                          <tr>
                            <td class="text-center white" width="25%">{{$regidor}}</td>
                            <td class="text-center white" width="25%">{{$alcalde}}</td>
                            <td class="text-center white" width="25%">{{$diputado}}</td>
                            <td class="text-center white" width="25%">{{$senador}}</td>
                          </tr>
                        </tbody>
                    </table>
                </td>
              </tr>
            </tbody>
          </table>
          <table class="table table-bordered thead-inverse">
            <tbody>
              <tr>
                <th class="text-center" colspan="2" scope="row">Reporte grupos</th>
              </tr>
              <tr>
                <td class="text-center white" width="40%">Total de grupos</td>
                <td class="text-center white" width="60%">{{$grupos}}</td>
              </tr>
            </tbody>
        </table><br><br>
    </div>
</div>
@endsection