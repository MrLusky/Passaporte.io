<x-app-layout>
    <div class="space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Explore Eventos</h1>
                <p class="text-slate-500 text-sm">Encontre os melhores passaportes e experiências</p>
            </div>

            <form method="GET" class="w-full md:w-auto">
                <div class="relative">
                    <select
                        name="category"
                        onchange="this.form.submit()"
                        class="w-full md:w-64 bg-slate-50 border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 p-3 pr-10 appearance-none font-medium transition-all"
                    >
                        <option value="">Todas as Categorias</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($events as $event)
                <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm overflow-hidden group hover:shadow-md transition-all duration-300 flex flex-col">
                    
                    <div class="relative aspect-[16/9] bg-slate-100 overflow-hidden">
                        <img
                            src="{{ asset('storage/'.$event->banner_path) }}"
                            class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-500"
                            alt="{{ $event->title }}"
                        >
                        <span class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm text-indigo-600 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">
                            {{ $event->category->name }}
                        </span>
                    </div>

                    <div class="p-5 flex flex-col flex-1 justify-between space-y-4">
                        <div class="space-y-2">
                            <h2 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors line-clamp-1">
                                {{ $event->title }}
                            </h2>
                            
                            <div class="space-y-1.5 text-sm text-slate-500">
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span>Organizado por: <span class="font-medium text-slate-700">{{ $event->organizer->name }}</span></span>
                                </p>
                                <p class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                    <span>Vagas disponíveis: <span class="font-semibold text-slate-700">{{ $event->capacity }}</span></span>
                                </p>
                            </div>
                        </div>

                        <div class="pt-2">
                            <a
                                href="{{ route('events.show', $event) }}"
                                class="w-full inline-flex justify-center items-center font-semibold bg-slate-50 hover:bg-indigo-50 border border-slate-200 hover:border-indigo-200 text-slate-700 hover:text-indigo-600 py-2.5 px-4 text-sm rounded-xl transition-all duration-200"
                            >
                                Ver detalhes
                            </a>
                        </div>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-dashed border-slate-300">
                    <p class="text-slate-500 font-medium">Nenhum evento encontrado para esta categoria.</p>
                </div>
            @endforelse
        </div>

        <div class="pt-4">
            {{ $events->links() }}
        </div>
    </div>
</x-app-layout>