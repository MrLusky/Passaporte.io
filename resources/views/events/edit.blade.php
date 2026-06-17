<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Criar Evento
        </h2>
    </x-slot>

    <div class="p-6">

        <form method="POST" action="{{ route('events.update', $event) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Título</label>

                <input type="text" name="title" value="{{ old('title', $event->title) }}" class="border w-full p-2">

                @error('title')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Descrição</label>

                <textarea name="description" class="border w-full p-2">{{ old('description', $event->description) }}</textarea>

                @error('description')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Data e Hora</label>

                <input type="datetime-local" name="date_time"  value="{{ old('date_time', $event->date_time->format('Y-m-d\TH:i')) }}" class="border w-full p-2">

                @error('date_time')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Local</label>

                <input type="text" name="location" value="{{ old('location', $event->location) }}"
                    class="border w-full p-2">

                @error('location')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Capacidade</label>

                <input type="number" name="capacity" value="{{ old('capacity', $event->capacity) }}"
                    class="border w-full p-2">

                @error('capacity')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Categoria</label>

                <select name="category_id" class="border w-full p-2">

                    <option value="">
                        Selecione
                    </option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $event->category_id) == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

                @error('category_id')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label>Banner</label>

                <input type="file" name="banner" class="border w-full p-2">

                @error('banner')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">

                Salvar Evento

            </button>

        </form>

    </div>
</x-app-layout>