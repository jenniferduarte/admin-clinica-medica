<div class="card-body pt-0">
    <div class="row">
        <div class="col-7">
        <h2 class="lead"><b>{{ $attendance->patient->user->name }}</b></h2>
        <ul class="ml-4 mb-0 fa-ul text-muted">
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-at"></i></span> {{ $attendance->patient->user->email }}</li>
            @if($attendance->patient->user->phone)
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> {{ $attendance->patient->user->phone }}</li>
            @endif
        </ul>
        </div>
    </div>
</div>
