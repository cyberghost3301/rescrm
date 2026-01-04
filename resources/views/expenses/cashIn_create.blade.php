<x-app-layout>


  <x-slot name="header">
       

       <div class="flex items-center justify-between mt-4">

           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Cash In Create') }}
           </h2>

            <a href="{{ route('cashIn.index') }}"> 
                <x-primary-button class="ms-3">
                    {{ __('Back') }}  
                </x-primary-button>
            </a> 

       </div>


   </x-slot>

   <x-message></x-message>

   <div class="grid grid-cols-1 md:grid-cols-2 px-3 gap-6">

  

  <form method="post" action="{{route('cashIn.store')}}">
    @csrf

    <!-- FRONT -->
    <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">

    <h3 class="text-lg font-semibold mb-4">Enter Cash In </h3>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Date</span>
        <input type="date" name="date" required class="input w-full" />
      </label>

      <label class="block mb-4">
            <span class="block mb-2 font-medium">Amount</span>
            <input type="number" name="amount" min="1" required class="input w-full" />
     </label>

      <label class="block mb-4">
        <span class="block mb-2 font-medium">Head</span>
        <input type="text" name="head" required class="input w-full" />
      </label>

        <div class="md:col-span-2 flex justify-end mt-5">
            <button class="px-6 py-3 bg-gray-900 hover:bg-gray-700 text-white font-semibold rounded-xl shadow">
                Submit
            </button>
        </div>

    </div>

  </form>

  <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">

      <h3 class="text-lg font-semibold mb-4">Cash In List</h3>

      <table class="w-full">
                    <thead class="bg-gray-50" >
                        <tr class="border-b" >
                            <th class="px-6 py-3 text-left">#</th>
                            <th class="px-6 py-3 text-left">Date</th>
                            <th class="px-6 py-3 text-left"> Amount </th>
                            <th class="px-6 py-3 text-left"> Head </th>
                        
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if($cashIns->isNotEmpty())
                            @foreach($cashIns as $cashIn)
                            <tr class="border-b" >
                                <td class="px-6 py-3 text-left">{{$cashIn->id}}</td>
                                <td class="px-6 py-3 text-left">{{ \Carbon\Carbon::parse($cashIn->entry_date)->format('d M, Y')}}</td>
                                <td class="px-6 py-3 text-left"> {{ $cashIn->amount}}</td>
                                <td class="px-6 py-3 text-left">{{ $cashIn->note}}</td>
                              
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
      
    </div>

    
</div>





</x-app-layout>
