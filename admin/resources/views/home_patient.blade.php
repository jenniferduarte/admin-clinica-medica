{{-- Next attendance --}}
@if($next_attendance)
<div class="alert alert-info">
    <h5><i class="icon fas fa-info"></i><strong> Atenção! </strong></h5>
    Sua próxima consulta é no dia
    <strong> {{ Carbon\Carbon::parse($next_attendance->start_date)->format('d/m/Y à\s\ H:i') }} </strong>
    com <strong>{{ $doctor->treatment }} {{ $doctor->user->name}}</strong>.
    <br>
    <hr>
    <div>

        @if($next_attendance->status_id == Status::SCHEDULED)
        <a href="#" class="text-danger btn btn-sm btn-delete update-attendance-status"
            data-attendance="{{$next_attendance->id}}" data-status="{{ Status::CANCELED }}">
            <i class="fas fa-times"></i> Cancelar consulta
        </a>
        @endif

        <a href="{{ route('attendances.show', $next_attendance->id) }}" class="btn btn-sm btn-outline btn-secondary">
            <i class="fas fa-plus"></i> Ver detalhes
        </a>
    </div>

</div>
@endif

<br><br>
<div class="row">

    <div class="col-md-6 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>Minhas consultas</h3>

            <p>Aqui você pode visualizar os detalhes, cancelar ou confirmar suas consultas</p>
            <br><br>
            </div>
            <div class="icon">
            <i class="ion ion-android-list"></i>
            </div>
            <a href="{{ route('attendances.index') }}" class="small-box-footer">Ver todas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-6 col-sm-12">

        <!-- small box -->

        <div class="small-box bg-info">
            <div class="inner">
            <h3>Agendar consultas</h3>

            <p>Escolha o melhor dia e horário para você e marque com seu médico de preferência </p>
            <br><br>
            </div>
            <div class="icon">
            <i class="ion ion-android-calendar"></i>
            </div>
            <a href="{{ route('attendances.create') }}" class="small-box-footer"> Agendar <i class="fas fa-arrow-circle-right"></i></a>
        </div>

    </div>

    <div class="col-md-6 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>Meus resultados de exames</h3>

            <p>Veja todos seus resultados de exames!</p>
            <br><br>
            </div>
            <div class="icon">
            <i class="ion ion-clipboard"></i>
            </div>
            <a href="{{ route('results.index') }}" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

      <div class="col-md-6 col-sm-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>Atualização cadastral</h3>

            <p>É muito importante manter seus dados pessoais sempre atualizados</p>
            <br><br>
            </div>
            <div class="icon">
            <i class="ion ion-person"></i>
            </div>
            <a href="{{ route('users.edit', Auth::user()->id ) }}" class="small-box-footer">Atualizar <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
