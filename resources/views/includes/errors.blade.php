<br>
<br>
@if ($errors->any())

    @php(Flasher::addWarning('Something went wrong'))

    <div class="alert alert-danger alert-dismissible " role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <li><strong> {{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif

