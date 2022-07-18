<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Ubah Pemasukan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{route('cash-in.update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$transaction->id}}">
                        <div>
                            <x-label for="date" :value="__('Tanggal')" />
                            <x-input id="date" class="block w-full mt-1" type="date" name="date" :value="$transaction->date ?? $dateNow" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="category" :value="__('Kategori')" />
                            <x-select id="category" class="block w-full mt-1" name="category" required autofocus >
                                <option value="">Pilih</option>
                                @foreach ($transactionCategories as $data)
                                    <option value="{{ $data->id }}" {{($data->id == $transaction->transaction_category_id) ? 'selected' : ''}}>{{ $data->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="mt-4">
                            <x-label for="nominal" :value="__('Nominal')" />
                            <x-input id="nominal" class="block w-full mt-1" type="number" name="nominal" :value="$transaction->nominal" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Keterangan')" />
                            <x-input id="description" class="block w-full mt-1" type="text" name="description" :value="$transaction->description" required autofocus />
                        </div>
                        <div class="mt-4 text-center">
                            <x-button>Simpan</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
