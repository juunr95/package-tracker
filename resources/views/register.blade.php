@extends('welcome')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf
    <label for="nome"> Nome:</label><br>
    <input type="text" name="nome"><br>
    <label for="nome"> Email:</label><br>
    <input type="text" name="email"><br>
    <label for="nome"> Senha:</label><br>
    <input type="password" name="senha"><br>
    <br>
    <button type="submit">Enviar</button>
</form>
@if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <ul>
            <li>{{ $error }}</li>
        </ul>
        @endforeach
    </div>
@endif
@endsection