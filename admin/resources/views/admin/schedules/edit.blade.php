@extends('admin.layout.template')

@section('page-name') {{ $doctor->treatment }} {{ $doctor->user->name }} › Editar horário  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('doctors.schedules.update', [$doctor->id, $schedule->id]) }}">
        @method('PUT')
        @csrf

        <div class="card-body">
          <div class="row">
            <!-- Data -->
            <div class="bootstrap-timepicker col-md-5 col-sm-12">
              <div class="form-group">
                <label>Data:</label>
                <div class="input-group" id="date">
                  <input type="text" class="form-control  datetimepicker-input timepicker @error('date') is-invalid @enderror" name="date"
                    autocomplete="false" value="{{ old('date',  $schedule->start_date->format('d/m/YYYY') )}}">
                </div>
                @error('date') <p class="text-danger">{{ $message }}</p> @enderror
              </div>
            </div>

            <!-- Horário início -->
            <div class="bootstrap-timepicker col-md-2 col-sm-12">
              <div class="form-group">
                <label>Horário início:</label>
                <div class="input-group" id="start_time" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input timepicker  @error('start_time') is-invalid @enderror"
                        data-target="#start_time" placeholder="Selecione" name="start_time" value="{{ old('start_time') }}">
                    <div class="input-group-append" data-target="#start_time" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                  </div>
                @error('start_time') <p class="text-danger">{{ $message }}</p> @enderror
              </div>
            </div>

            <!-- Horário fim -->
            <div class="bootstrap-timepicker col-md-2 col-sm-12">
              <div class="form-group">
                <label>Horário fim:</label>
                <div class="input-group" id="end_time" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input timepicker  @error('end_time') is-invalid @enderror"
                        data-target="#end_time" placeholder="Selecione" name="end_time" value="{{ old('end_time') }}">
                    <div class="input-group-append" data-target="#end_time" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fas fa-clock"></i></div>
                    </div>
                  </div>
                    @error('end_time') <p class="text-danger">{{ $message }}</p> @enderror
              </div>
            </div>

            <!-- Tempo da consulta -->
            <div class="col-md-3 col-sm-12">
                <div class="form-group @error('weekday') is-invalid @enderror">
                    <label for="consultation_time">Tempo da consulta</label>
                    <select class="select2 form-control select2-hidden-accessible" name="consultation_time" style="width: 100%;">
                        <option></option>
                        <option value="30" @if (old('weekday') === "30") {{ 'selected' }} @endif> 30 min </option>
                        <option value="60" @if (old('weekday') === "60") {{ 'selected' }} @endif> 60 min </option>
                        <option value="90" @if (old('weekday') === "90") {{ 'selected' }} @endif> 90 min </option>
                    </select>

                    @error('consultation_time') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="name">Active</label> <br>
                <div class="bootstrap-switch">
                    <div class="bootstrap-switch-container">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" data-bootstrap-switch="" data-off-color="danger" data-on-color="success" id="active" value="1"
                            {{ old('is_active', $schedule->active) ? 'checked' : '' }}
                        >
                    </div>
                </div>
            </div>

          </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>

            <form id="deleteForm" action="{{ route('doctors.schedules.destroy', [$doctor->id, $schedule->id]) }}" method="post">
              @method('delete') @csrf
              <button type="submit" data-id="{{ $doctor->id }}" class="text-danger btn btn-delete">Deletar</button>
            </form>

            <a href="#" class="btn btn-secondary float-right goback">Voltar</a>
        </div>
    </form>
</div>

@endsection

@section('javascript')
    <script type="text/javascript">

$(function() {

    //Datepicker
    $('#date').datetimepicker({
        allowMultidate: true,
        multidateSeparator: ',',
        format: 'DD/MM/YYYY',
        minDate: moment(),
    });

    //Start timepicker
    $('#start_time').datetimepicker({
        format: 'HH:mm',
        stepping: 30
    })

    //End timepicker
    $('#end_time').datetimepicker({
        format: 'HH:mm',
        stepping: 30
    })

});



    </script>
@endsection
