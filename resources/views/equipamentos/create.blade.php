<x-app-layout>
    <div class="py-12 bg-slate-900 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800/40 border border-slate-700 p-8 rounded-3xl shadow-2xl backdrop-blur-sm">
                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-100">Novo Equipamento</h2>
                    <p class="text-slate-400 mt-2">Cadastre um ativo com todas as informações técnicas e o valor final.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-3xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-200">
                        <strong class="font-semibold">Ops, algumas informações estão incorretas:</strong>
                        <ul class="mt-2 space-y-1 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('equipamentos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf

                    <div class="grid gap-6 lg:grid-cols-2">
                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Modelo</label>
                            <input type="text" name="modelo" value="{{ old('modelo') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Marca</label>
                            <input type="text" name="marca" value="{{ old('marca') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Categoria</label>
                            <select name="tipos_equipamentos_id" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-200 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="">Selecione a categoria</option>
                                @foreach($tipos_equipamentos as $tipo)
                                    <option value="{{ $tipo->id }}" {{ old('tipos_equipamentos_id') == $tipo->id ? 'selected' : '' }}>{{ $tipo->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Quantidade</label>
                            <input type="number" name="quantidade" value="{{ old('quantidade', 1) }}" min="0" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Preço Unitário</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-emerald-400 font-semibold">R$</span>
                                <input type="number" name="preco" value="{{ old('preco') }}" step="0.01" min="0" required class="w-full pl-12 bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-emerald-500 focus:border-emerald-500" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Tensão</label>
                            <input type="number" name="tensao" value="{{ old('tensao') }}" min="0" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Tamanho da Tela</label>
                            <input type="text" name="tamanhoTela" value="{{ old('tamanhoTela') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Cor</label>
                            <input type="text" name="cor" value="{{ old('cor') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Material</label>
                            <input type="text" name="material" value="{{ old('material') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Processador</label>
                            <input type="text" name="processador" value="{{ old('processador') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Memória RAM (GB)</label>
                            <input type="number" name="memoriaRam" value="{{ old('memoriaRam') }}" min="0" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Armazenamento (GB)</label>
                            <input type="number" name="armazenamento" value="{{ old('armazenamento') }}" min="0" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Portas USB</label>
                            <input type="number" name="portasUSB" value="{{ old('portasUSB', 0) }}" min="0" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Portas HDMI</label>
                            <input type="number" name="portasHDMI" value="{{ old('portasHDMI', 0) }}" min="0" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-2">
                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Resolução da Tela</label>
                            <input type="text" name="resolucaoTela" value="{{ old('resolucaoTela') }}" required class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500" />
                        </div>

                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Acessórios</label>
                            <textarea name="acessorios" rows="4" class="w-full bg-slate-900/50 border border-slate-700 text-slate-100 rounded-2xl px-4 py-3 focus:ring-indigo-500 focus:border-indigo-500">{{ old('acessorios') }}</textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Conexões e recursos</label>
                            <div class="grid gap-3 sm:grid-cols-3">
                                <label class="inline-flex items-center gap-2 bg-slate-900/60 border border-slate-700 rounded-2xl px-4 py-3 cursor-pointer">
                                    <input type="hidden" name="wifi" value="0" />
                                    <input type="checkbox" name="wifi" value="1" @checked(old('wifi')) class="h-4 w-4 rounded border-slate-600 text-indigo-500 bg-slate-900" />
                                    <span class="text-slate-200 text-sm">Wi-Fi</span>
                                </label>
                                <label class="inline-flex items-center gap-2 bg-slate-900/60 border border-slate-700 rounded-2xl px-4 py-3 cursor-pointer">
                                    <input type="hidden" name="portasEthernet" value="0" />
                                    <input type="checkbox" name="portasEthernet" value="1" @checked(old('portasEthernet')) class="h-4 w-4 rounded border-slate-600 text-indigo-500 bg-slate-900" />
                                    <span class="text-slate-200 text-sm">Ethernet</span>
                                </label>
                                <label class="inline-flex items-center gap-2 bg-slate-900/60 border border-slate-700 rounded-2xl px-4 py-3 cursor-pointer">
                                    <input type="hidden" name="bluetooth" value="0" />
                                    <input type="checkbox" name="bluetooth" value="1" @checked(old('bluetooth')) class="h-4 w-4 rounded border-slate-600 text-indigo-500 bg-slate-900" />
                                    <span class="text-slate-200 text-sm">Bluetooth</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-6 lg:grid-cols-2">
                        <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-2 tracking-widest">Foto do Produto</label>
                            <div class="flex items-center justify-center w-full">
                                <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-slate-700 rounded-3xl cursor-pointer bg-slate-900/30 hover:bg-slate-900/50 hover:border-indigo-500 transition-all group">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-10 h-10 mb-3 text-slate-500 group-hover:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        <p class="mb-2 text-sm text-slate-400"><span class="font-semibold text-indigo-400">Clique para enviar</span> ou soltar uma imagem</p>
                                    </div>
                                    <input type="file" name="image" class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between pt-6 border-t border-slate-700">
                        <a href="{{ route('equipamentos.index') }}" class="text-slate-400 hover:text-white transition-colors">Cancelar</a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-8 py-3 rounded-3xl shadow-lg shadow-indigo-500/20 transition-transform active:scale-95">Salvar Equipamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
