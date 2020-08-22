@extends('admin.layout.template')

@section('page-name') {{ $doctor->treatment }} {{ $doctor->user->name }} › Disponibilidades @endsection {{-- Page Name  --}}

@section('quick-actions')
<a href="{{ route('doctors.schedules.create', $doctor->id) }}" class="btn btn-block btn-outline-success btn-sm">
    <i class="nav-icon fas fa-user-md"></i>  Nova disponibilidade 
</a>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Especialidade</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->id }} </td>
                    <td> </td>
                    <td> </td>
                    <td></td>
                    <td> </td>
                    <td> 
                        <div class="btn-group" role="group">
                            <a href="{{ route('doctors.schedules.show', [$schedule->id, $doctor->id]) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
                            </a>   
                            <a href="{{ route('doctors.schedules.edit', [$schedule->id, $doctor->id]) }}" class="btn btn-secondary">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
   
@endsection

