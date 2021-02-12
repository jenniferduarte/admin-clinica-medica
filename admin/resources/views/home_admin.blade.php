<div id="dashboard">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-id-card"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Registros de atendimentos</span>
                <span class="info-box-number">
                    <span id="attendances"></span>
                    <i class="fas fa-1x fa-sync-alt fa-spin text-gray"></i>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-times"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Consultas canceladas</span>
                <span class="info-box-number">
                    <span id="canceled_attendances"></span>
                    <i class="fas fa-1x fa-sync-alt fa-spin text-gray"></i>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
        <!-- /.info-box -->
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-md"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Médicos cadastrados</span>
                <span class="info-box-number">
                    <span id="doctors"></span>
                    <i class="fas fa-1x fa-sync-alt fa-spin text-gray"></i>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-injured"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Pacientes Cadastrados</span>
                <span class="info-box-number">
                    <span id="patients"></span>
                    <i class="fas fa-1x fa-sync-alt fa-spin text-gray"></i>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Especialidades mais cadastradas</h3>

                    <div class="card-tools hidden-xs">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-12">
                        <div class="chart-responsive">
                            <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="topSpecialties" height="66" width="198" class="chartjs-render-monitor"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
            </div>
    </div>

    <div class="col-md-6">
        <div class="card" id="last-schedules">
            <div class="card-header border-transparent">
            <h3 class="card-title">Próximas consultas </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                        <tr>
                            <th>Dia</th>
                            <th>Horário</th>
                            <th>Médico(a)</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($next_attendances as $attendance)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($attendance->start_date)->format('d/m/Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($attendance->start_date)->format('H:i') . ' às ' . Carbon\Carbon::parse($attendance->end_date)->format('H:i')}}</td>
                            <td>{{ $attendance->doctor_name }}</td>
                            <td><a href="{{ route('attendances.show', $attendance->id)}}"><i class="fas fa-eye"></i> Ver detalhes</a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            </div>

        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Médicos que mais realizaram consultas</h5>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row" id="doctorsAttendances">
                    <canvas id="bar-chart" width="800" height="200"></canvas>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

</div>

