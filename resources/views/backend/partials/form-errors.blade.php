@if ($errors->any() || session('error'))
    <div class="alert alert-danger" style="margin:0 0 15px;">
        <ul style="margin:0;padding-left:18px;">
            @if (session('error'))<li>{{ session('error') }}</li>@endif
            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
        </ul>
    </div>
@endif
