<x-app-layout>
  @forelse ($serviceCompanies as $companie)
    {{$companie}}
    <form action="{{route('servicecompanies.destroy', $companie)}}" 
      method="POST">
      @csrf @method('DELETE')
      <button class="btn btn-danger">Dar de baja</button>
    </form>
    <button class="btn btn-primary">Contactar</button>
    <hr>
  @empty
      <p>No existen companias registradas</p>
  @endforelse
</x-app-layout>