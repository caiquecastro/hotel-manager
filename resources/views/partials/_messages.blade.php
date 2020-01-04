@if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }}">
        <p class="m-0">{{ Session::get('message') }}</p>
    </div>
@endif
