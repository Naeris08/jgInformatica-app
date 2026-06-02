<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800/40 border border-slate-700 p-8 rounded-3xl shadow-2xl backdrop-blur-sm">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-extrabold text-slate-100 tracking-tight">Categorias de Equipamentos</h2>
                        <p class="text-slate-400 mt-2">Organize os tipos de equipamentos que serão usados no inventário.</p>
                    </div>
                    <a href="{{ route('tipos_equipamentos.create') }}" class="inline-flex items-center justify-center rounded-3xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-indigo-500">+ Nova Categoria</a>
                </div>

                @if($tipos_equipamentos->isEmpty())
                    <div class="rounded-3xl border border-dashed border-slate-700 bg-slate-900/50 p-10 text-center text-slate-400">
                        <p class="text-lg font-semibold text-slate-100">Nenhuma categoria cadastrada ainda.</p>
                        <p class="mt-2">Adicione sua primeira categoria para começar a classificar seus equipamentos.</p>
                    </div>
                @else
                    <div class="grid gap-4">
                        @foreach($tipos_equipamentos as $tipo)
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 p-5 bg-slate-900/70 border border-slate-700 rounded-3xl transition hover:border-slate-500">
                                <div>
                                    <p class="text-slate-200 text-lg font-semibold">{{ $tipo->name }}</p>
                                    <p class="text-slate-500 text-sm">Criado em {{ $tipo->created_at->format('d/m/Y') }}</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('tipos_equipamentos.edit', $tipo->id) }}" class="text-indigo-400 hover:text-indigo-300 font-bold">Editar</a>
                                    <form action="{{ route('tipos_equipamentos.destroy', $tipo->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-rose-400 hover:text-rose-300 font-bold">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
