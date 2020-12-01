@extends('admin.layout.template')

@section('page-name') Prescrições de exames @endsection {{-- Page Name  --}}

@section('quick-actions')

@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card card-primary">
    <div class="card-body">

        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Médico solicitante</th>
                    <th>Data</th>
                    <th>Exames</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($prescriptions as $prescription)
                <tr>
                    <td>{{ $prescription->id }}</td>
                    <td>{{ $prescription->record->doctor->treatment . ' ' . $prescription->record->doctor->user->name }}</td>
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

