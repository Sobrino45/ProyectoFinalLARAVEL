<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('tareas.index') }}" class="p-2 bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white rounded-full transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Editar Objetivo') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            @if($errors->any())
                <div class="mb-6 p-4 bg-rose-500/10 border border-rose-500/20 text-rose-400 rounded-2xl">
                    <ul class="list-disc list-inside text-sm font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-slate-900 border border-slate-800 rounded-[2rem] p-10 shadow-xl">
                <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="space-y-8">
                        <div class="relative z-0 w-full group">
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $tarea->titulo) }}" required 
                                class="block py-3 px-0 w-full text-lg text-white bg-transparent border-0 border-b-2 border-slate-700 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer transition-colors" 
                                placeholder=" " />
                            <label for="titulo" 
                                class="peer-focus:font-semibold absolute text-sm text-slate-500 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                                Título del objetivo
                            </label>
                        </div>

                        <div class="space-y-3">
                            <label for="descripcion" class="text-sm font-semibold text-slate-400">Descripción detallada</label>
                            <textarea name="descripcion" id="descripcion" rows="5"
                                class="block w-full p-4 text-sm text-white bg-slate-800/60 rounded-2xl border border-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-2xl border border-slate-700/50">
                            <div class="flex flex-col">
                                <span class="text-sm font-bold text-white">Estado del objetivo</span>
                                <span class="text-xs text-slate-500">¿Has completado ya esta tarea?</span>
                            </div>
                            
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="hidden" name="estado" value="0">
                                <input type="checkbox" name="estado" value="1" class="sr-only peer" {{ old('estado', $tarea->estado) ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-800 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-800">
                            <a href="{{ route('tareas.index') }}" class="text-sm font-semibold text-slate-400 hover:text-white transition-colors">
                                Cancelar
                            </a>
                            
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-indigo-600 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:scale-95 transition-all shadow-lg shadow-indigo-500/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                Actualizar Objetivo
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>