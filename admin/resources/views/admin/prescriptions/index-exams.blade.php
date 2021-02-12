@extends('admin.layout.template')

@section('page-name') Prescrições de exames @endsection {{-- Page Name  --}}

@section('quick-actions')
<span class="quick-actions">

</span>
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    @can(!'isDoctor')
                    <th>Médico solicitante</th>
                    @endcan
                    <th>Data</th>
                    <th data-priority="1">Exames</th>
                    <th data-priority="2">Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($prescriptions as $prescription)
                <tr>
                    <td>{{ $prescription->id }}</td>
                    @can(!'isDoctor')
                    <td>{{ $prescription->record->doctor->treatment . ' ' . $prescription->record->doctor->user->name }}</td>
                    @endcan
                    <td>{{ $prescription->created_at->format('d/m/Y H:s:i') }} </td>
                    <td>@foreach($prescription->exams as $exam) {{ $exam->name }} @if(!$loop->last)|@endif @endforeach</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('prescriptions.show', $prescription->id) }}" class="btn btn-secondary">
                                <i class="fas fa-eye"></i>
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

