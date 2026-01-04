<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between mt-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cash Holding Create') }}
            </h2>

                <a href="{{ route('cashHolding.index') }}"> 
                    <x-primary-button class="ms-3">
                        {{ __('Back') }} 
                    </x-primary-button>
                </a>
        </div>
    </x-slot>

    <x-message></x-message>

    <form method="post" action="{{ route('cashHolding.store') }}" 
          class="grid grid-cols-1 md:grid-cols-2 px-3 gap-6">
        @csrf

        <!-- FRONT -->
        <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">
            <h3 class="text-lg font-semibold mb-4">Cash Holding</h3>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Date</span>
                <input type="date" name="date" value="{{ $today }}" required class="input w-full" readonly />
            </label>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Previous Day Cash Holding</span>
                <input type="number" name="previous_day_cash_holding" value="{{ $previous_day_cash_holding }}" required class="input w-full" readonly />
            </label>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Today Total Collection</span>
                <input type="text" name="today_total_collection" value="{{ $today_total_collection }}" required class="input w-full" readonly />
            </label>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Today Total Expenses</span>
                <input type="text" name="today_total_expenses" value="{{ $today_total_expenses }}" required class="input w-full" readonly />
            </label>
        </div>

        <!-- BACK -->
        <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">
            <h3 class="text-lg font-semibold mb-4">Enter Cash Holding</h3>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Cash In Hand</span>
                <input type="number" name="cash_in_hand" class="input w-full" min="0" required oninput="calcTotal()" />
            </label>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Cash In Account</span>
                <input type="number" name="cash_in_account" class="input w-full" min="0" required oninput="calcTotal()" />
            </label>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Cash In Wallet</span>
                <input type="number" name="cash_in_wallet" class="input w-full" min="0" required oninput="calcTotal()" />
            </label>

            <label class="block mb-4">
                <span class="block mb-2 font-medium">Total Cash</span>
                <input type="text" name="total_cash" id="total_cash" class="input w-full" readonly />
            </label>

            <div class="md:col-span-2 flex justify-end mt-5">
                <button class="px-6 py-3 bg-gray-900 hover:bg-gray-700 text-white font-semibold rounded-xl shadow">
                    Submit
                </button>
            </div>
        </div>
    </form>

    <script>
        function calcTotal() {
            let hand = parseFloat(document.querySelector('[name="cash_in_hand"]').value) || 0;
            let account = parseFloat(document.querySelector('[name="cash_in_account"]').value) || 0;
            let wallet = parseFloat(document.querySelector('[name="cash_in_wallet"]').value) || 0;
            document.getElementById('total_cash').value = (hand + account + wallet).toFixed(2);
        }
    </script>
</x-app-layout>
