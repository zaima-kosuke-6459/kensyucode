@if ($errors->count())
    <ul class="alert">
        @foreach ($errors->all() as $error)
            <li class="alert_li">{{ $error }}</li>
        @endforeach
    </ul>
@endif
