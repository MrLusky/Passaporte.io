<div class="p-6">

    <h1 class="text-3xl font-bold mb-6">
        Passaporte.io
    </h1>

    <form method="GET" class="mb-6">

        <select
            name="category"
            onchange="this.form.submit()"
            class="border p-2"
        >

            <option value="">
                Todas Categorias
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(request('category') == $category->id)
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

    </form>

    @foreach($events as $event)

        <div class="border rounded p-4 mb-4">

            <img
                src="{{ asset('storage/'.$event->banner_path) }}"
                class="w-full h-48 object-cover mb-3"
            >

            <h2 class="text-xl font-bold">
                {{ $event->title }}
            </h2>

            <p>
                Categoria:
                {{ $event->category->name }}
            </p>

            <p>
                Organizador:
                {{ $event->organizer->name }}
            </p>

            <p>
                Vagas:
                {{ $event->capacity }}
            </p>

            <a
                href="{{ route('events.show', $event) }}"
                class="text-blue-600"
            >
                Ver detalhes
            </a>

        </div>

    @endforeach

    {{ $events->links() }}

</div>