<x-app-layout>
  <div class="card shadow-md px-5 py-4 col-11 col-lg-7 col-md-10 mx-auto mt-5 mb-5 text-start d-flex align-items-center justify-content-center border-0">
    <form action="{{route('servicecompanies.store')}}" method="POST">
      @csrf
      <div>
        <x-b-label for="name" value="{{ __('Nombre:') }}" />
        <x-b-input type="text" name="name" required />
      </div>
      
      <div class="mt-4">
        <x-b-label for="id_service" value="{{ __('Categorías') }}" />
        <x-b-select name="id_service" id="services" required>
          @foreach ($services as $service)
            <x-b-option value="{{$service->id}}">
              {{$service->name}}
            </x-b-option>
          @endforeach
        </x-b-select>
      </div>

      <div>
        <x-b-label for="contact_number" value="{{ __('Numero de Contacto:') }}" />
        <x-b-input value="" type="text" name="contact_number" />
      </div>

      <div>
        <x-b-label for="email" value="{{ __('Email de la Compania:') }}" />
        <x-b-input value="" type="email" name="email" />
      </div>

      <div class="mt-4">
        <x-b-label for="description" value="{{ __('Descripción') }}" />
        <textarea id="description" 
          name="description" class="form-control" 
          placeholder="Describe tu texto aquí..." 
          required
        >
        </textarea>
      </div>

      <div class="col-10">
        <button class="btn btn-primary" >Nueva Compania</button>
      </div>
    </form>
  </div>


</x-app-layout>
{{-- Columns:
id bigint UN AI PK 
name varchar(255) 
id_service tinyint UN 
contact_number varchar(15) 
email varchar(100) 
description varchar(255) 
created_at timestamp 
updated_at timestamp 
deleted_at timestamp --}}