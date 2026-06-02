<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200">Nova Categoria</h2>
    </x-slot>

    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800/40 border border-slate-700 p-8 rounded-3xl shadow-2xl backdrop-blur-sm">
                <div class="mb-6">
                    <h2 class="text-3xl font-extrabold text-slate-100">Nova Categoria</h2>
                    <p class="text-slate-400 mt-2">Adicione um tipo de equipamento para usar no cadastro de ativos.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-3xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-200">
                        <strong class="font-semibold">Verifique os campos abaixo:</strong>
                        <ul class="mt-2 space-y-1 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('tipos_equipamentos.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Nome da Categoria</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                    </div>
                    <div class="flex justify-between items-center gap-4">
                        <a href="{{ route('tipos_equipamentos.index') }}" class="text-slate-400 hover:text-slate-100 transition">Voltar</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-6 py-3 rounded-3xl shadow-lg shadow-indigo-500/20">Criar Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
