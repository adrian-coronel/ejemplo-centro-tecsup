<x-app-layout >
  @forelse ($incidents as $incident)
    <p>id: {{ $incident->id }}</p>
    <p>id_service {{$incident->id_service}}</p>
    <p>Name Service: {{ $incident->service->name }}</p>
    <br>
    <p>id del usuario:   {{$incident->id_user}}</p>
    <p>Username: {{ $incident->user->name }}</p>
    <br>
    <p>Subject: {{ $incident->subject }}</p>
    <p>Date: {{ $incident->date }}</p>
    <p>Hour: {{ $incident->hour }}</p>
    <p>File Path: <a href="{{ asset($incident->file_path)}}">{{ $incident->file_path ? asset($incident->file_path) : 'None' }} </a></p>
    <img src="{{asset($incident->file_path)}}" alt="">
    <p>Location: {{ $incident->location }}</p>
    <p>Urgency: {{ $incident->urgency }}</p>
    <p>Impact: {{ $incident->impact }}</p>
    <p>Description: {{ $incident->description }}</p>
    <p>Estado: {{$incident->state}}</p>
    <p>Create At: {{ $incident->created_at }}</p>
    <p>Update At: {{ $incident->updated_at }}</p>
    <a class="btn btn-primary" href="{{route('incidents.edit', $incident)}}">Editar</a>
    <a class="btn btn-danger" onclick="document.getElementById('{{'destroy-incident-'.$incident->id}}').submit()" href="#">Eliminar</a>
    <hr>
    <form id="{{'destroy-incident-'.$incident->id}}" 
      action="{{route('incidents.destroy', $incident)}}" 
      method="POST">
      @csrf @method('DELETE')
    </form>
  @empty
    No existe ningún registro

  @endforelse
</x-app-layout>