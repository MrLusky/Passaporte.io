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
            class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow"
        >
            Validar
        </button>

    </form>

</div>
</x-app-layout>