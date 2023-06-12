<x-app-layout>
  @forelse ($users as $user)
    <p>Username: {{$user->email}}</p>
    <form action="{{route('userstrashed.restore',$user)}}" method="post" accept-charset="UTF-8">
      @csrf @method('PUT')
      <button class="btn btn-success" type="submit">Restaurar</button>
    </form>
  @empty
      <p>No hay ningun registro</p>
  @endforelse
</x-app-layout>