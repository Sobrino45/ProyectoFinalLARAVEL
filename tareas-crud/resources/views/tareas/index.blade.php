<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Mis Objetivos') }}
            </h2>
            <a href="{{ route('tareas.create') }}" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold rounded-xl transition-all shadow-lg shadow-indigo-500/30">
                + Nueva Tarea
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($tareas as $tarea)
                    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start mb-4">
                                <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="titulo" value="{{ $tarea->titulo }}">
                                    <input type="hidden" name="estado" value="{{ $tarea->estado ? 0 : 1 }}">
                                    <button type="submit" class="transition-transform active:scale-95">
                                        @if($tarea->estado)
                                            <span class="px-3 py-1 text-xs font-bold bg-emerald-500/10 text-emerald-500 rounded-full border border-emerald-500/20 hover:bg-emerald-500/20">✅ Completada</span>
                                        @else
                                            <span class="px-3 py-1 text-xs font-bold bg-amber-500/10 text-amber-500 rounded-full border border-amber-500/20 hover:bg-amber-500/20">⏳ Pendiente</span>
                                        @endif
                                    </button>
                                </form>
                            </div>

                            <h3 class="text-lg font-bold text-white mb-2 leading-tight">{{ $tarea->titulo }}</h3>
                            <p class="text-slate-400 text-sm mb-6">{{ $tarea->descripcion }}</p>
                        </div>

                        <div class="flex items-center justify-between pt-4 border-t border-slate-800">
                            <a href="{{ route('tareas.edit', $tarea) }}" class="flex items-center gap-1 text-xs font-bold text-indigo-400 hover:text-indigo-300 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                EDITAR
                            </a>
                            
                            <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" onsubmit="return confirm('¿Seguro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-rose-500 hover:text-rose-400 transition-colors">
                                    ELIMINAR
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center text-white">No hay tareas.</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>