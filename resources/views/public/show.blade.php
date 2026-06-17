<div class="p-6">

    <img
        src="{{ asset('storage/'.$event->banner_path) }}"
        class="w-full max-h-96 object-cover mb-6"
    >

    <h1 class="text-3xl font-bold">
        {{ $event->title }}
    </h1>

    <p class="mt-4">
        {{ $event->description }}
    </p>

    <hr class="my-4">

    <p>
        Categoria:
        {{ $event->category->name }}
    </p>

    <p>
        Organizador:
        {{ $event->organizer->name }}
    </p>

    <p>
        Local:
        {{ $event->location }}
    </p>

    <p>
        Data:
        {{ $event->date_time->format('d/m/Y H:i') }}
    </p>

    <p>
        Vagas:
        {{ $event->capacity }}
    </p>

</div>