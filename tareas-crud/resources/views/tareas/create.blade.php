<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('tareas.index') }}" class="p-2 bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white rounded-full transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Crear Nuevo Objetivo') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-slate-900 border border-slate-800 rounded-[2rem] p-10 shadow-xl">
                
                <form action="{{ route('tareas.store') }}" method="POST">
                    @csrf

                    <div class="space-y-8">
                        
                        <div class="relative z-0 w-full group">
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}" required 
                                class="block py-3 px-0 w-full text-lg text-white bg-transparent border-0 border-b-2 border-slate-700 appearance-none focus:outline-none focus:ring-0 focus:border-indigo-500 peer transition-colors" 
                                placeholder=" " />
                            <label for="titulo" 
                                class="peer-focus:font-semibold absolute text-sm text-slate-500 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-indigo-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">
                                Nombre del objetivo (Ej: Aprender Blade Avanzado)
                            </label>
                            @error('titulo')
                                <p class="text-xs text-rose-500 mt-2 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-3">
                            <label for="descripcion" class="text-sm font-semibold text-slate-300">
                                Detalles o pasos a seguir
                            </label>
                            <textarea name="descripcion" id="descripcion" rows="5" required
                                class="block w-full p-4 text-sm text-white bg-slate-800/60 rounded-2xl border border-slate-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all outline-none"
                                placeholder="Describe brevemente qué necesitas para cumplir este objetivo...">{{ old('descripcion') }}</textarea>
                            @error('descripcion')
                                <p class="text-xs text-rose-500 mt-1 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-slate-800">
                            <a href="{{ route('tareas.index') }}" class="text-sm font-semibold text-slate-400 hover:text-white transition-colors">
                                Cancelar
                            </a>
                            
                            <button type="submit" class="inline-flex items-center px-6 py-3 bg-indigo-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-500/20 active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                </svg>
                                Guardar Objetivo
                            </button>
                        </div>

                    </div>
                </form>
            </div>

            <div class="mt-8 p-6 bg-slate-900/50 rounded-2xl border border-slate-800 border-dashed text-center">
                <p class="text-sm text-slate-500">
                    <span class="font-bold text-slate-400">Consejo:</span> Trata de que tus objetivos sean específicos y medibles. Un buen título ayuda a mantener el foco.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>