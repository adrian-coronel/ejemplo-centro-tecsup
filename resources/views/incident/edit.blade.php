<x-app-layout >
  <x-b-form action="{{route('incidents.update',$incident)}}" method="POST" class="col-9 my-4  col-lg-5 mx-auto" id="support-form" enctype="multipart/form-data">
    @method('PATCH')
    @include('incident._form',[
      'selectIdService' => $incident->id_service,
      'btnText' => 'Actualizar',
    ])
  </x-b-form>
  
  </x-app-layout>