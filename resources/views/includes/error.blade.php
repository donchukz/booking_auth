@if ($errors->any())

    <div class="alert alert-danger" style="padding-bottom: 10px">

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


@if(session('success'))

    <div class="alert alert-success lara-error" style="padding-bottom: 10px">

        <span class="fa fa-exclamation-circle"></span>  {{session('success')}}

    </div>

@endif

@if(session('info'))

    <div class="alert alert-info lara-error" style="padding-bottom: 10px">

        <span class="fa fa-exclamation-circle"></span> {{session('info')}}

    </div>

@endif

@if(session('error'))

    <div class="alert alert-danger lara-error" style="padding-bottom: 10px">

        <span class="fa fa-exclamation-circle"></span> {{session('error')}}

    </div>

@endif
