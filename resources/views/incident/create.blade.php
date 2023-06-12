<x-app-layout >
  <x-b-form action="{{route('incidents.store')}}" method="POST" class="col-9 my-4  col-lg-5 mx-auto" id="support-form" enctype="multipart/form-data">
    @include('incident._form',[
      'selectIdService' => $selectIdService,
      'btnText' => 'Registrar',
    ])
  </x-b-form>

</x-app-layout>