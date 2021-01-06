@if( session()->has('type') ) 
    <div class="alert alert-{{ session()->pull('type') }}" role="alert">
        {{ session()->pull('message') }}
    </div>
@endif
