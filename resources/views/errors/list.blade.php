@if ($errors->any())
    <ul class="alert alert-danger list-unstyled Notification">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
