<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-center gap-10">
                        <div>
                            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                                {{ __('Saldo Keseluruhan') }}
                            </h2>
                            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                                Rp. {{ number_format($balance, '0', ',', '.') }}
                            </h2>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                                {{ __('Saldo Dalam Setahun') }}
                            </h2>
                            <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                                Rp. {{ number_format($balanceThisYear, '0', ',', '.') }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                        {{ __('Pemasukan Dalam Setahun') }}
                    </h2>
                    <div id="chart1" style="height: 300px;"></div>
                    <script>
                        const chart1 = new Chartisan({
                            el: '#chart1',
                            url: "@chart('cash_in_this_year_chart')",
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                        {{ __('Pengeluaran Dalam Setahun') }}
                    </h2>
                    <div id="chart2" style="height: 300px;"></div>
                    <script>
                        const chart2 = new Chartisan({
                            el: '#chart2',
                            url: "@chart('cash_out_this_year_chart')",
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                        {{ __('Transaksi Pemasukan Belum Dikonfirmasi') }} : {{count($transactionUnconfirmedIns)}}
                    </h2>
                    <div class="mt-5"></div>
                    @foreach ($transactionUnconfirmedIns as $transactionUnconfirmedIn)
                    <div class="flex items-start justify-between p-3 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                    {{$transactionUnconfirmedIn->transactionCategory->name}}
                                </div>
                                <div class="text-sm leading-5 text-gray-500">
                                    {{$transactionUnconfirmedIn->description}}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <div class="ml-4 text-sm leading-5 text-gray-900">
                                Rp. {{number_format($transactionUnconfirmedIn->nominal, '0', ',', '.')}}
                            </div>
                            <div class="ml-4 text-sm leading-5 text-gray-900">
                                {{$transactionUnconfirmedIn->date}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
                        {{ __('Transaksi Pengeluaran Belum Dikonfirmasi') }} : {{count($transactionUnconfirmedOuts)}}
                    </h2>
                    <div class="mt-5"></div>
                    @foreach ($transactionUnconfirmedOuts as $transactionUnconfirmedOut)
                    <div class="flex items-start justify-between p-3 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="ml-4">
                                <div class="text-sm font-medium leading-5 text-gray-900">
                                    {{$transactionUnconfirmedOut->transactionCategory->name}}
                                </div>
                                <div class="text-sm leading-5 text-gray-500">
                                    {{$transactionUnconfirmedOut->description}}
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end">
                            <div class="ml-4 text-sm leading-5 text-gray-900">
                                Rp. {{number_format($transactionUnconfirmedOut->nominal, '0', ',', '.')}}
                            </div>
                            <div class="ml-4 text-sm leading-5 text-gray-900">
                                {{$transactionUnconfirmedOut->date}}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
