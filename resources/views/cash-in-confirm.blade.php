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

                    <form action="{{route('cash-in.confirm-process')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$id}}">
                        <span>Apakah Anda yakin ingin mengonfirmasi transaksi ini?</span>
                        <div class="mt-4 text-center">
                            <x-button>Simpan</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
