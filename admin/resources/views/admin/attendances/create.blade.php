@extends('admin.layout.template')

@section('page-name')  Novo agendamento  @endsection {{-- Page Name --}}

@section('content')

<div class="card card-primary">
    <!-- form start -->
    <form role="form" method="post" action="{{ route('attendances.store') }}">
        @csrf

        <div class="card-body">
          <div class="row">
            <div class="col-md-6">

                <!-- Médico -->
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="doctors">Médico*</label>
                    <select class="select2 form-control select2-hidden-accessible doctor-select" name="doctor" style="width: 100%;">
                      <option></option>
                      @foreach($doctors as $doctor)
                      <option value="{{$doctor->id}}"> {{ $doctor->user->name }}
                        (@foreach($doctor->specialties as $doctorSpecialty)
                          {{ $doctorSpecialty->name }} @if(!$loop->last) | @endif
                        @endforeach)
                      </option>
                      @endforeach
                    </select>
                    @error('doctor') <p class="text-danger">{{ $message }}</p> @enderror
                  </div>
                </div>

                <!-- Dia  -->
                <div class="bootstrap-timepicker col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Datas disponíveis*:</label>
                    <div class="input-group" id="date" data-target-input="nearest">
                        <input type="text" data-toggle="datetimepicker" class="form-control datetimepicker-input timepicker  @error('date') is-invalid @enderror"
                            data-target="#date" placeholder="Selecione" name="date"
                            autocomplete="false" value="{{ old('date') }}">
                          <div class="input-group-append" data-target="#date" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fas fa-calendar"></i></div>
                          </div>
                    </div>
                    @error('date') <p class="text-danger">{{ $message }}</p> @enderror
                  </div>
                </div>

                <!-- Horario  -->
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Horários disponíveis*:</label>
                      <select class="select2 form-control select2-hidden-accessible time-select" name="time" style="width: 100%;" disabled>
                        <option></option>
                      </select>
                    @error('time') <p class="text-danger">{{ $message }}</p> @enderror
                  </div>
                </div>

                @can('isReceptionist')
                <!-- Paciente -->
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="patients">Paciente*</label>
                    <select class="select2 form-control select2-hidden-accessible" name="patient" style="width: 100%;">
                      <option></option>
                      @foreach($patients as $patient)
                        <option value="{{$patient->id}}"> {{ $patient->user->name }} ({{ $patient->user->email }}) </option>
                      @endforeach
                    </select>
                    @error('patient') <p class="text-danger">{{ $message }}</p> @enderror
                  </div>
                </div>
                @endcan


            </div>
          </div>
        </div>

        <div class="card-footer">
            <div class="float-right">
                <button type="submit" class="btn btn-success">Agendar</button>
                <a href="#" class="btn btn-secondary goback">Voltar</a>
            </div>
        </div>
    </form>
</div>

@endsection

@section('javascript')

    <!-- Script -->
    <script type="text/javascript">

      // Desabilita a escolha da data
      $('#date').datetimepicker('disable');

      // Quando muda a seleção do médico, busca as datas disponíveis e reconstrói o calendário
      $('.doctor-select').change(function(e) {

        $('.datetimepicker-input').val('').datetimepicker('disable'); // Limpa e desabilita o select de datas

        $('.time-select').empty().prop('disabled', true); // Limpa e desabilita  o select de horarios

        $doctor_id = $(this).children("option:selected").val();
        availableDates($doctor_id);
        $('#date').datetimepicker('destroy');
      });

      // Função que buscas via ajax as datas disponíveis por médico
      function availableDates($doctor_id){
        $.ajax({
          url: `/${$doctor_id}/available-dates`,
          type: 'GET',
          dataType: 'json',
          delay: 250,
          data: function (params) {},
          processResults: function (response) {},
          cache: true
        }).done(function(data){

          // Ao finalizar a requisição, chama a função para iniciar o calendário com apenas as datas disponíveis passíveis de seleção
          if(data.length){
              onlydates = [];
              $(data).each(function(i,v){
                onlydates.push(v.start_date);
              });
              loadDates(onlydates);
          }else{
            toastr.warning("No momento, este médico não possui nenhuma agenda disponível.");
          }

        })
      }

      // Função que carrega as datas
      function loadDates(dates){
        $('#date').datetimepicker({
          format: 'DD/MM/YYYY',
          enabledDates: dates,
          useCurrent: false,
          defaultDate: false
        });
        $('#date').datetimepicker('enable');
      }

      $('#date').on("change.datetimepicker", function (e) {
        $('.time-select').empty(); // Limpa o select de horarios
        $date = (e.date).format('YYYY-MM-DD');
        availableTimes($doctor_id, $date);
      });

      function availableTimes($doctor_id, $date){
        $.ajax({
          url: `/${$doctor_id}/available-times`,
          type: 'GET',
          dataType: 'json',
          delay: 250,
          data:{
            date: $date
          },
          processResults: function (response) {},
          cache: true
        }).done(function(data){

          $('.time-select').empty(); // Limpa o select de horarios

          // Ao finalizar a requisição, chama a função para iniciar o select com os horários
          $(data).each(function(i,v){
            newOption = new Option(moment(v.start_date).format('HH:mm'), v.id, false, false);
            $('.time-select').append(newOption).trigger('change');
          });

          $('.time-select').prop('disabled', false);

        })
      }

      // CSRF Token
      let csrf_token = $('meta[name="csrf-token"]').attr('content');

    </script>
@endsection
