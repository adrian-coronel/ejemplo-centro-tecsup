@props(['title','message','srcImage'])

<div {{ $attributes->merge(['class' => 'bg-white p-4 text-center shadow-sm rounded-3 col-10 col-lg-4 col-md-5 col-sm-7']) }}>
  <h3 class="mb-3">{{ $title }}</h3>
  <p>{{ $message }}</p>
  <img class="alert-image mx-auto" src="{{ $srcImage }}" alt="alert">

  <div class="d-flex justify-content-center">
    <a @click="isOpen = !isOpen" class="btn btn-light mr-4">Cancelar</a>
    <button type="submit" class="btn btn-secondary ml-5">Aceptar</button>
  </div>
</div>