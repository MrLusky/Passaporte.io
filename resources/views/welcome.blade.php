<x-app-layout>
    <div class="space-y-12 py-6">
        
        <div class="text-center max-w-3xl mx-auto space-y-4 py-8">
            <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-slate-900 sm:leading-none">
                Seu passaporte para <span class="text-indigo-600">grandes experiências</span>.
            </h1>
            <p class="text-slate-500 text-base sm:text-lg max-w-xl mx-auto font-medium">
                Descubra, participe e gerencie eventos incríveis de forma simples e segura em uma única plataforma.
            </p>
            <div class="pt-2">
                <a href="/events" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold text-sm px-5 py-3 rounded-xl shadow-md shadow-indigo-100 transition-all duration-200 hover:-translate-y-0.5">
                    <span>Ver todos os eventos</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="border-b border-slate-200/60 pb-4">
            <h2 class="text-xl font-bold text-slate-900 tracking-tight">Eventos em Destaque</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($events as $event)
                <div class="bg-white border border-slate-200/60 shadow-sm rounded-2xl p-5 hover:shadow-md transition-all duration-300 flex flex-col justify-between space-y-4">
                    <div class="space-y-3">
                        <div class="bg-indigo-50 text-indigo-700 font-bold text-xs uppercase px-2.5 py-1 rounded-md inline-block tracking-wider">
                            Próximo
                        </div>
                        
                        <h3 class="font-bold text-xl text-slate-900 tracking-tight line-clamp-1">
                            {{ $event->title }}
                        </h3>

                        <div class="space-y-1.5 text-sm text-slate-500 font-medium">
                            <p class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span class="line-clamp-1">{{ $event->location }}</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span>{{ $event->date_time->format('d/m/Y \à\s H:i') }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="pt-2 border-t border-slate-100">
                        <a href="{{ route('events.show', $event) }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-700 inline-flex items-center gap-1 group">
                            <span>Garantir Vaga</span>
                            <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-dashed border-slate-300">
                    <p class="text-slate-500 font-medium">Não há eventos agendados no momento.</p>
                </div>
            @endforelse
        </div>

    </div>
</x-app-layout>