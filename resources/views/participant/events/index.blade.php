<x-app-layout>
@if(session('success'))
    <div class="p-3 mb-4 border">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="p-3 mb-4 border">
        {{ session('error') }}
    </div>
@endif

<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Eventos Disponíveis
    </h1>

    @foreach ($events as $event)
        <div class="border rounded p-4 mb-4">

            <h2 class="font-bold">
                {{ $event->title }}
            </h2>

            <p>
                Categoria:
                {{ $event->category->name }}
            </p>

            <p>
                {{ $event->location }}
            </p>

            <p>
                {{ $event->date_time->format('d/m/Y H:i') }}
            </p>

        </div>
        <form action="{{ route('participant.events.subscribe', $event) }}" method="POST">

            @csrf

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                Inscrever-se
            </button>

        </form>
    @endforeach

</div>
</x-app-layout>
