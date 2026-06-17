<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Criar Evento
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-4">
                <label>Título</label>

                <input type="text" name="title" value="{{ old('title') }}" class="border w-full p-2">

                @error('title')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Descrição</label>

                <textarea name="description" class="border w-full p-2">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Data e Hora</label>

                <input type="datetime-local" name="date_time" value="{{ old('date_time') }}" class="border w-full p-2">

                @error('date_time')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Local</label>

                <input type="text" name="location" value="{{ old('location') }}" class="border w-full p-2">

                @error('location')
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label>Capacidade</label>

                <input type="number" name="capacity" value="{{ old('capacity') }}" class="border w-full p-2">

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
                        <option value="{{ $category->id }}">

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

            <button type="submit" class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 !text-white font-semibold px-4 py-2 rounded shadow">

                Salvar Evento

            </button>

        </form>

    </div>
</x-app-layout>