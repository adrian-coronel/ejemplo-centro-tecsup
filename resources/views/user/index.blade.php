<x-app-layout>
  @forelse ($users as $user)
    <p>id:   {{$user->id}}</p>
    {{$user->roles->name}}
    <p>name:   {{$user->name}}</p>
    <p>email:   {{$user->email}}</p>
    <p>current_team_id:   {{$user->current_team_id}}</p>
    <p>profile_photo_path:   {{$user->profile_photo_path}}</p>
    <p>created_at:   {{$user->created_at}}</p>
    <p>updated_at:   {{$user->updated_at}}</p>
    <a class="btn btn-danger" onclick="document.getElementById('{{'destroy-user-'.$user->id}}').submit();">Delete</a>
    <form id="{{'destroy-user-'.$user->id}}" 
    action="{{route('users.destroy', $user)}}" 
    method="POST">
    @csrf @method('DELETE')
    </form>
    <hr>
  @empty
    <p>Ningun usuario registrado</p>
  @endforelse
</x-app-layout>
