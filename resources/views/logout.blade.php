@auth
    <div class="row justify-content-end" style="margin-top: 2%">
        <div class="col-3">
            {{ Auth::user()->name }}
            <a href="/logout" class="btn btn-warning">Logout</a>
        </div>
    </div>
@endauth
