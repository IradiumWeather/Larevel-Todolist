@extends('layout.app')

@section('title')
    Liste des tâches
@endsection

@section('content')
    <div class="col-md-6 offset-md-3 text-center border border-primary mt-5">
        <form method="post" action="{{ route('addTask') }}">
            @csrf
            <div class="mb-3">
                <label for="tache" class="form-label">Tache :</label>
                <input type="text" class="form-control" id="tache" name="tache" placeholder="Intitulé de la tache">
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
    <div class="col-md-6 offset-md-3 {{-- text-center --}}border border-primary mt-5">
                <!-- Nouvelle interface -->
        <table class="table">
            <thead>
              <tr>
                <th scope="col" class="text-center">#</th>
                <th scope="col" class="text-center">Nom</th>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" colspan="2" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($taches as $tache )
                <tr>
                    @if ($tache->status)

                        <th scope="row"><a href="{{ route('state',$tache)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check-square" viewBox="0 0 16 16">
                                <path
                                    d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z" />
                            </svg></a></th>
                        <td><strike>{{ $tache->content }} </strike></td>
                        <td><strike>{{ $tache->updated_at->format('h\Hm \| d/M/y') }}</strike></td>
                    @else
                        <th scope="row"><a href="{{ route('state',$tache)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-app"
                                viewBox="0 0 16 16">
                                <path
                                    d="M11 2a3 3 0 0 1 3 3v6a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V5a3 3 0 0 1 3-3h6zM5 1a4 4 0 0 0-4 4v6a4 4 0 0 0 4 4h6a4 4 0 0 0 4-4V5a4 4 0 0 0-4-4H5z" />
                            </svg></a></th>
                        <td>{{ $tache->content }} </td>
                        <td>{{ $tache->updated_at->format('h\Hm  \| d/M/y') }}</td>
                    @endif
                    <td><a class="btn btn-outline-primary" href="{{ route('modifier',$tache) }}" role="button">Modifier</a></td>
                    <td><a href="" class="btn btn-danger" onClick="event.preventDefault();
                        document.getElementById('destroy-task-form').submit();" >Supprimer</a></td>
                    <form action="{{ route('supp',$tache) }}" method="POST" id='destroy-task-form'>
                        @method('delete')
                        @csrf
                    </form>
                </tr>
                @endforeach
              </tr>
            </tbody>
          </table>
    </div>
@endsection
