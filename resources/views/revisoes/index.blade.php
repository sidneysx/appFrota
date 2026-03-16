<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Revisões do Veículo
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <!-- CARD VEICULO -->
            <div class="bg-white shadow sm:rounded-lg p-6 mb-6">

                <div class="flex gap-8 items-center text-sm">

                    <div>
                        <p class="text-gray-400 text-xs">Placa</p>
                        <p class="text-lg font-semibold">{{ $veiculo->placa }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Veículo</p>
                        <p class="font-medium">{{ $veiculo->veiculo }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Ano</p>
                        <p class="font-medium">{{ $veiculo->ano }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Responsável</p>
                        <p class="font-medium">{{ $veiculo->responsavel }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Setor</p>
                        <p class="font-medium">{{ $veiculo->setor }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Tipo</p>
                        <p class="font-medium">{{ $veiculo->tipo }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">DPL</p>
                        <p class="font-medium">{{ $veiculo->dpl }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-xs">Total gasto</p>
                        <p class="font-semibold text-red-600">
                            R$ {{ number_format($revisoes->sum('valor'), 2, ',', '.') }}
                        </p>
                    </div>

                </div>

            </div>


            <!-- BOTAO NOVA REVISAO -->
            <div class="flex justify-between mb-4">
                <a href="{{ route('revisoes.create', $veiculo->id) }}"
                    class="px-4 py-2 bg-indigo-300 text-black rounded-md text-sm hover:bg-indigo-400 hover:text-white transition">
                    <i class="fa-solid fa-plus"></i> Nova Revisão
                </a>

                <a href="{{ route('veiculos.index') }}" class="px-4 py-2 bg-indigo-300 text-black rounded-md text-sm hover:bg-indigo-400 hover:text-white transition">
                <i class="fa-solid fa-backward"></i> Voltar para veículos
                </a>


            </div>


            <!-- TABELA REVISOES -->
            <div class="bg-white shadow sm:rounded-lg overflow-x-auto">

                <table class="min-w-full text-sm">

                    <thead class="bg-gray-100 text-gray-700">
                        <tr>

                            <th class="px-4 py-3 text-left">Data da Revisão</th>
                            <th class="px-4 py-3 text-left">KM da Revisão</th>
                            <th class="px-4 py-3 text-left">Próxima revisão (KM)</th>
                            <th class="px-4 py-3 text-left">Local da Revisão</th>
                            <th class="px-4 py-3 text-left">Valor da Revisão</th>
                            <th class="px-4 py-3 text-center">Ações</th>

                        </tr>
                    </thead>

                    <tbody>

                        @forelse($revisoes as $revisao)
                            <tr class="border-t hover:bg-gray-50 transition">

                                <td class="px-4 py-3">
                                    {{ \Carbon\Carbon::parse($revisao->data)->format('d/m/Y') }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ number_format($revisao->km, 0, ',', '.') }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $revisao->proxima_km ? number_format($revisao->proxima_km, 0, ',', '.') : '-' }}
                                </td>

                                <td class="px-4 py-3">
                                    {{ $revisao->local ?? '-' }}
                                </td>

                                <td class="px-4 py-3 font-medium">
                                    R$ {{ number_format($revisao->valor, 2, ',', '.') }}
                                </td>

                                <td class="px-4 py-3 text-center space-x-3">

                                    <a href="{{ route('revisoes.edit', $revisao->id) }}"
                                        class="text-blue-600 hover:text-blue-800 font-medium">
                                        Editar
                                    </a>

                                    <form action="{{ route('revisoes.destroy', $revisao->id) }}" method="POST"
                                        class="inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Excluir revisão?')"
                                            class="text-red-600 hover:text-red-800 font-medium">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                    Nenhuma revisão cadastrada.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
