@if (Session::has('message'))
    <div class="alert alert-{{ Session::get('message_type') }} alert-prompt">
        <p>{{ Session::get('message') }}</p>
    </div>
@endif