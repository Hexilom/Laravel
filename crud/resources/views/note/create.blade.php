@extends('layouts.app')
@section('content')
<a href="{{ route('note.index') }}">Back</a>
<form method="post" action="{{ route('note.store') }}">
    @csrf 

    <label>Title:</label>
    <input type="text" name="title"/> <br/>
    @error('title')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <label>Descripcion</label>
    <input type="text" name="description"/> <br/>
    @error('description')
    <p style="color:red">{{ $message }}</p>
    @enderror
    <input type="submit" value="create"/>
</form>
@endsection