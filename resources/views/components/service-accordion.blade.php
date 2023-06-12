<div class="hover-effect accordion w-100 mb-4">
    <div class="accordion-header d-flex justify-content-between text-align">
        <a href="{{route('incident.create',$service->id)}}" class="p-2 nav-link text-primary" onclick="document.getElementById('send-service').submit()">{{$service->name}}</a>

        <button class="btn text-secondary text-center" 
            type="button" data-bs-toggle="collapse" 
            data-bs-target="{{'#content-'. $key}}"
            aria-controls="content-$key" aria-expanded="false"
        >
            Ver más...
        </button>        
    </div>

    <a class="nav-link">
        <div id="{{'content-'. $key}}" class="collapse navbar-collapse">
            <p>
                {{$service->description}}
            </p>
        </div>
    </a>
   
    
   
</div>
