<x-app-layout>


  <x-slot name="header">
       

       <div class="flex items-center justify-between mt-4">

           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('New Entry') }}
           </h2>

            <a href="{{ route('loans.index') }}"> 
              <x-primary-button class="ms-3">
                {{ __('Back') }} 
              </x-primary-button>
            </a>  

       </div>


   </x-slot>

   <div x-data="loanForm()" class="container mx-auto">


  <form method="post" action="{{ route('loans.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @csrf

    <!-- FRONT -->
    <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5"
    x-data="{
    billed: 0,
    cash: 0,
    online: 0,
    scrap: 0,
    weeks: 1,
    total_payment: '0.00',
    financed_amount: '0.00',
    weekly_installment_amount: '0.00',
    calculate() {
      let total = this.cash + this.online + this.scrap;
      this.total_payment = total.toFixed(2);

      let financed = this.billed - total;
      this.financed_amount = financed.toFixed(2);

      this.weekly_installment_amount =
        (Number(this.weeks) > 0 && financed > 0)
          ? (financed / Number(this.weeks)).toFixed(2)
          : '0.00';
    }
  }"
  x-init="
    $watch('cash', () => calculate());
    $watch('online', () => calculate());
    $watch('scrap', () => calculate());
    $watch('billed', () => calculate());
    $watch('weeks', () => calculate());
    calculate();
  ">
  
      <h3 class="text-lg font-semibold mb-4">Front</h3>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Invoice Number</span>
        <input name="invoice_number" required class="input w-full" />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Date of Sale</span>
        <input type="date" name="sale_date" required class="input w-full" />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Date of Closure</span>
        <input type="date" name="closure_date" required class="input w-full" />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Weekly Installment Day</span>
        <select name="weekly_installment_day" class="input w-full" required>
          <option>Monday</option><option>Tuesday</option><option>Wednesday</option>
          <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option>
        </select>
      </label>

      <label class="block mb-4">
          <span class="block mb-2 font-medium">Billed Amount</span>
          <input x-model.number="billed" name="billed_amount" type="number" step="0.01" class="input w-full" required />
        </label>

        <label class="block mb-4">
          <span class="block mb-2 font-medium">Cash Payment</span>
          <input x-model.number="cash" name="cash_payment" type="number" step="0.01" class="input w-full" required />
        </label>

        <label class="block mb-4">
          <span class="block mb-2 font-medium">Online Payment</span>
          <input x-model.number="online" name="online_payment" type="number" step="0.01" class="input w-full" required />
        </label>

        <label class="block mb-4">
          <span class="block mb-2 font-medium">Scrap Value</span>
          <input x-model.number="scrap" name="scrap_value" type="number" step="0.01" class="input w-full" required />
        </label>

        <label class="block mb-4">
          <span class="block mb-2 font-medium">Total Payment</span>
          <input x-model="total_payment" name="total_payment" id="total_payment" class="input w-full" readonly />
        </label>

        <label class="block mb-4">
          <span class="block mb-2 font-medium">Financed Amount</span>
          <input x-model="financed_amount" name="financed_amount" id="financed_amount" class="input w-full" readonly />
        </label>

        <label class="block mb-4">
          <span class="block mb-2 font-medium">Finance Period (weeks)</span>
          <input x-model.number="weeks" name="finance_period_weeks" type="number" min="1" class="input w-full" required />
        </label>

        <label class="block mb-2">
    <span class="block mb-2 font-medium">Weekly Installment Amount</span>
    <input x-model="weekly_installment_amount" name="weekly_installment_amount" class="input w-full" readonly />
  </label>

    </div>

    <!-- CUSTOMER -->
    <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">
      <h3 class="text-lg font-semibold mb-4">Customer</h3>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Name</span>
        <input name="customer[name]" pattern="[A-Za-z ]+" class="input w-full" required />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Address</span>
        <input name="customer[address]" class="input w-full" required />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Contact (10-digit)</span>
        <input name="customer[contact]" pattern="\d{10}" class="input w-full" required />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Alternate Contact</span>
        <input name="customer[alt_contact]" pattern="\d{10}" class="input w-full" />
      </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Vehicle Registration</span>
        <input name="customer[vehicle_registration]" class="input w-full" />
      </label>

      <div class="mt-6 p-4 rounded bg-gray-100 text-sm text-gray-700">
        <strong>Note:</strong> Back (admin-only values will be initialized automatically.  
        Total Remaining starts as Financed Amount.)
      </div>

      <div class="md:col-span-2 flex justify-end mt-5">
      <button class="px-6 py-3 bg-gray-900 hover:bg-gray-700 text-white font-semibold rounded-xl shadow">
        Save
      </button>
    </div>
    </div>

   
  </form>
</div>


@push('scripts')
<script src="https://unpkg.com/alpinejs" defer></script>
<script>
  window.loanForm = function () {
    return {
      billed: 0,
      cash: 0,
      online: 0,
      scrap: 0,
      weeks: 1,
      total_payment: "0.00",
      financed_amount: "0.00",
      weekly_installment_amount: "0.00",

      init() {
        this.calculate();

        this.$watch('cash', () => this.calculate());
        this.$watch('online', () => this.calculate());
        this.$watch('scrap', () => this.calculate());
        this.$watch('billed', () => this.calculate());
        this.$watch('weeks', () => this.calculate());
      },

      calculate() {
        let total = this.cash + this.online + this.scrap;
        this.total_payment = total.toFixed(2);

        let financed = this.billed - total;
        this.financed_amount = financed.toFixed(2);

        this.weekly_installment_amount =
          (Number(this.weeks) > 0 && financed > 0)
            ? (financed / Number(this.weeks)).toFixed(2)
            : "0.00";

        console.log(this.weekly_installment_amount);
      }
    };
  }
</script>

@endpush




</x-app-layout>
