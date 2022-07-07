@extends('layout.app')

@section('title')
    modifier {{ $tache->content }}
@endsection

@section('content')
<div class="col-md-6 offset-md-3 text-center border border-primary mt-5">
    <form method="post" action="{{ route('updateTask',$tache->id) }}">
        @csrf
        <div class="mb-3">
            <label for="tache" class="form-label">Tache :</label>
            <input type="text" class="form-control" id="tache" name="tache" placeholder="Intitulé de la tache" value="{{ $tache->content }}">
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>
@endsection
