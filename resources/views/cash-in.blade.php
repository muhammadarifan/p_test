<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Pemasukan') }}
            </h2>
            @if (Auth::user()->role->name == 'BAPAK')
                <a href="{{route('cash-in.add')}}"><x-button>Tambah Pemasukan</x-button></a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($transactions as $transaction)
                        <div class="flex items-start justify-between p-3 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="ml-4">
                                    <div class="text-sm font-medium leading-5 text-gray-900">
                                        {{$transaction->transactionCategory->name}}
                                    </div>
                                    <div class="text-sm leading-5 text-gray-500">
                                        {{$transaction->description}}
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col items-end">
                                <div class="ml-4 text-sm leading-5 text-gray-900">
                                    Rp. {{number_format($transaction->nominal, '0', ',', '.')}}
                                </div>
                                <div class="ml-4 text-sm leading-5 text-gray-900">
                                    {{$transaction->date}}
                                </div>
                                <div class="ml-4 text-sm leading-5 text-gray-900">
                                    {{($transaction->confirmed) ? 'Sudah Dikonfirmasi' : 'Belum dikonfirmasi'}}
                                </div>
                                <div class="flex items-end mt-5">
                                    @if (!$transaction->confirmed)
                                        <div class="ml-4 text-sm leading-5 text-gray-900">
                                            <a href="{{route('cash-in.edit', $transaction->id)}}"><x-button>Ubah</x-button></a>
                                        </div>
                                        <div class="ml-4 text-sm leading-5 text-gray-900">
                                            <a href="{{route('cash-in.delete', $transaction->id)}}"><x-button>Hapus</x-button></a>
                                        </div>
                                    @endif
                                    @if (Auth::user()->role->name == 'ANAK' && !$transaction->confirmed)
                                        <div class="ml-4 text-sm leading-5 text-gray-900">
                                            <a href="{{route('cash-in.confirm', $transaction->id)}}"><x-button>Konfirmasi</x-button></a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if (count($transactions) == 0)
                        <div class="flex items-center justify-center">
                            <div class="text-sm font-medium leading-5 text-gray-900">
                                Tidak ada data
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
