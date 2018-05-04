@extends('layouts.app')

@section('content')
{{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <ul>
                        <li>Name: {{ $current_user->name }} </li>
                        <li>Email {{ $current_user->email }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>--}}

{{-- <h2>Current preference: {{ $preference }}</h2>

<h2>Set preference:</h2>

<form action='{{ url("setpreference") }}' method="POST">
{{ csrf_field() }}
<div class="form-group">
<label>Preference:
<select class="input-group" name="preference">
    <option value="Abigail">Abigail</option>
    <option value="Maria">Maria</option>
    <option value="Sora">Sora</option>
</select>

<input type="submit" value="Set">
</form>
</label>
</div> --}}


