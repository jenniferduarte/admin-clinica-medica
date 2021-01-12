<div class="card-body pt-0">
    <div class="row">
        <div class="col-7">
        <h2 class="lead"><b>{{ $attendance->doctor->treatment }} {{ $attendance->doctor->user->name }}</b></h2>
        <p class="text-muted text-sm">
            <strong> Especialista em: </strong>
            @foreach($attendance->doctor->specialties as $specialty)
            {{ $specialty->name }} @if(!$loop->last) / @endif
            @endforeach
        </p>
        <ul class="ml-4 mb-0 fa-ul text-muted">
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> {{ $attendance->doctor->user->email }}</li>
            @if($attendance->doctor->user->phone)
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{ $attendance->doctor->user->phone }}</li>
            @endif
        </ul>
        </div>
    </div>
</div>
