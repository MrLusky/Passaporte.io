<x-app-layout>
<div class="p-6">

    <h1 class="text-2xl font-bold mb-6">
        Check-in de Participantes
    </h1>

    @if(session('success'))
        <div class="mb-4 border p-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 border p-3">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST"
          action="{{ route('events.checkin') }}">

        @csrf

        <input
            type="text"
            name="ticket_code"
            placeholder="Código do ingresso"
            class="border p-2 w-full"
        >

        <button
            type="submit"
            class="mt-4 bg-green-500 text-white px-4 py-2 rounded"
        >
            Validar
        </button>

    </form>

</div>
</x-app-layout>