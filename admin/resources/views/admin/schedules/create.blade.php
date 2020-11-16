@extends('admin.layout.template')

@section('page-name') {{ $doctor->treatment }} {{ $doctor->user->name }} › Cadastrar horário  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">

    <!-- form start -->
    <form role="form" method="post" action="{{ route('doctors.schedules.store', $doctor->id) }}">
        @csrf

        <div class="card-body">
          <div class="row">
            <!-- Data -->
            <div class="bootstrap-timepicker col-md-5 col-sm-12">
              <div class="form-group">
                <label>Data:</label>
                <div class="input-group" id="date" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input timepicker  @error('date') is-invalid @enderror"
                        data-target="#date" placeholder="Selecione" name="date"
                        autocomplete="false" value="{{ old('date') }}">
                    <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                    </div>
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
          </div>
        </div>

        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-success">Cadastrar</button>
                <a href="#" class="btn btn-secondary goback">Voltar</a>
            </div>
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
