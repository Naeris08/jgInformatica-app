<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-8 px-4 sm:px-0">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-100 tracking-tight">Inventário</h2>
                    <p class="text-slate-500 mt-1">Gerencie seus ativos e estoque em tempo real.</p>
                </div>
                <a href="{{ route('equipamentos.create') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-500/20 transition-all">
                    + Adicionar
                </a>
            </div>

            <div class="bg-slate-800/40 border border-slate-700 rounded-2xl overflow-hidden shadow-2xl">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-800/60 border-b border-slate-700">
                        <tr>
                            <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-widest">Item</th>
                            <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-widest">Preço</th>
                            <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-widest text-center">Status</th>
                            <th class="p-5 text-xs font-bold text-slate-500 uppercase tracking-widest text-right">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @foreach($equipamentos as $item)
                        <tr class="hover:bg-slate-700/20 transition-colors group">
                            <td class="p-5">
                                <div class="flex items-center gap-4">
                                    <div class="h-12 w-12 rounded-lg bg-slate-900 border border-slate-700 flex-shrink-0 overflow-hidden">
                                        @if($item->image)
                                            <img src="{{ asset('storage/'.$item->image) }}" class="h-full w-full object-cover">
                                        @endif
                                    </div>
                                    <div>
                                        <div class="text-slate-100 font-bold group-hover:text-indigo-400 transition-colors">{{ $item->modelo }}</div>
                                        <div class="text-slate-500 text-xs">{{ $item->tipoEquipamento->name ?? 'Geral' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-5 font-mono text-emerald-400 font-bold">
                                R$ {{ number_format($item->preco, 2, ',', '.') }}
                            </td>
                            <td class="p-5 text-center">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase {{ $item->quantidade < 5 ? 'bg-red-500/10 text-red-500 border border-red-500/20' : 'bg-slate-700 text-slate-300' }}">
                                    {{ $item->quantidade }} em estoque
                                </span>
                            </td>
                            <td class="p-5 text-right space-x-2">
                                <a href="{{ route('equipamentos.edit', $item->id) }}" class="text-slate-400 hover:text-indigo-400 transition-colors">Editar</a>
                                <form action="{{ route('equipamentos.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="text-slate-600 hover:text-red-500 transition-colors">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>