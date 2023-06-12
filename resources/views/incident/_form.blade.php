
  @csrf

  <div>
    <x-b-label for="subject" value="{{ __('Asunto') }}" />
    <x-b-input value="{{old('subject',$incident->subject)}}" type="text" name="subject" required />
  </div>

  <div class="mt-4">
    <x-b-label for="id_service" value="{{ __('Categorías') }}" />
    <x-b-select name="id_service" id="services" required>
      @foreach ($services as $service)
        <x-b-option :selected="$service->id == $selectIdService" value="{{$service->id}}">
          {{$service->name}}
        </x-b-option>
      @endforeach
    </x-b-select>
  </div>
  
  <div class="mt-4">
    <x-b-label for="description" value="{{ __('Describe qué ha ocurrido y cómo ha ocurrido') }}" />
    <textarea id="description" 
      name="description" class="form-control" 
      placeholder="Describe tu texto aquí..." 
      required
    >{{old('description ',$incident->description)}}</textarea>
  </div>

  <div class="mt-4">
    <x-b-label for="attachment" value="{{ __('Archivo adjunto:') }}" />
    <div class="file-upload form-control py-5 text-center">
      <x-b-label for="file-upload" value="{{ __('Arrastra y suelta archivos, pega captura de pantalla o busca') }}" /><br>
      <input class="input-form p-2 rounded border" 
        type="file" name="file-upload" 
        value="{{old('file',$incident->file_path)}}"
        id="file-upload" style="display: none;" 
        onchange="showFileName(this)"
      />
      <button class="btn btn-secondary px-5 mt-3" type="button" onclick="document.getElementById('file-upload').click()">Subir</button>
    </div>
  </div>

  <div class="mt-4">
    <x-b-label for="location" value="{{ __('Ubicación de los hechos') }}" />
    <x-b-input value="{{old('location',$incident->location)}}" type="text" name="location" required />
  </div>

  <div class="mt-4">
    <x-b-label for="urgency" value="{{__('¿Con qué urgencia hay que arreglar el problema?')}}"/>
    <x-b-select id="urgency" name="urgency" value="{{old('urgency',$incident->urgency)}}" required>
      <x-b-option value="" disabled selected>Seleccione...</x-b-option>
      <x-b-option :selected="$incident->urgency == 'critico'" value="critico">Crítico</x-b-option>
      <x-b-option :selected="$incident->urgency == 'alto'" value="alto">Alto</x-b-option>
      <x-b-option :selected="$incident->urgency == 'medio'" value="medio">Medio</x-b-option>
      <x-b-option :selected="$incident->urgency == 'bajo'" value="bajo">Bajo</x-b-option>
    </x-b-select>
  </div>

  <div class="mt-4">
    <x-b-label for="impact" value="{{__('¿En qué medida te afecta el problema a ti o a los demás?')}}" />
    <x-b-select id="impact" name="impact" required>
      <x-b-option value="" disabled selected>Seleccione...</x-b-option>
      <x-b-option :selected="$incident->impact == 'Extenso/generalizado'" value="Extenso/generalizado">Extenso / generalizado</x-b-option>
      <x-b-option :selected="$incident->impact == 'Significativo/grande'" value="Significativo/grande">Significativo / grande</x-b-option>
      <x-b-option :selected="$incident->impact == 'Moderado/limitado'" value="Moderado/limitado">Moderado / limitado</x-b-option>
      <x-b-option :selected="$incident->impact == 'Menor/localizado'" value="Menor/localizado">Menor / localizado</x-b-option>
    </x-b-select>
  </div>

  <div class="mt-4" x-data="{isOpen: false}">
    <button @click="isOpen = true"
    class="btn btn-primary text-white border-0" type="button">{{$btnText}}</button>
    <a href="{{route('services.index')}}" class="btn btn-light text-dark border-0 mx-2" type="button">Regresar</a>


    <!-- Alerta (COMPONENTE)-->
    <div class="alert-overlay" x-show="isOpen" @keydown.escape.window="isOpen = false">
      <x-b-alert 
       :title="'¡Todo listo '. Auth::user()->name" 
       :message="'Gracias por reportar, nos pondremos a trabajar en ello.'" 
       :srcImage="asset('/img/alert_form.png')" 
      />
    </div>

  </div>
