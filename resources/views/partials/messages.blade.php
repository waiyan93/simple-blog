@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:&nbsp</strong>{{ Session::get('success') }}
    </div>
@endif