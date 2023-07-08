<div class="container">
    <div class="row">
        <div class="col-md">
            @if(Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
            @endif
            @if(Session::has('delete'))
            <p class="alert alert-danger">{{ Session::get('delete') }}</p>
            @endif
        </div>
    </div>
</div>