<x-app-layout>


  <x-slot name="header">
       

       <div class="flex items-center justify-between mt-4">

           <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('Create Prospects') }}
           </h2>

            <a href="{{ route('prospect.index') }}"> 
                <x-primary-button class="ms-3">
                    {{ __('Back') }}  
                </x-primary-button>
            </a> 

       </div>


   </x-slot>

   <x-message></x-message>

 

  

        <form method="post" action="{{ route('prospect.store') }}">
        @csrf
        
        
          <div class="grid grid-cols-3 md:grid-cols-1 px-3 gap-6">

            <div class="bg-white p-6 rounded-xl shadow mb-5 mt-5">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-6">

        {{-- Date --}}
        <div>
            <label class="block mb-2 font-medium">Date</label>
            <input type="date" name="date" required class="input w-full">
        </div>

        {{-- Customer Name --}}
        <div>
            <label class="block mb-2 font-medium">Customer Name</label>
            <input type="text" name="customer_name" required class="input w-full">
        </div>

        {{-- Locality --}}
        <div>
            <label class="block mb-2 font-medium">Locality</label>
            <input type="text" name="locality" required class="input w-full">
        </div>

        {{-- Contact No --}}
        <div>
            <label class="block mb-2 font-medium">Contact No</label>
            <input type="text" name="contact_no" required class="input w-full">
        </div>

        {{-- Alt Contact No --}}
        <div>
            <label class="block mb-2 font-medium">Alt Contact No</label>
            <input type="text" name="alt_contact_no" class="input w-full">
        </div>

        {{-- Requirement --}}
        <div>
            <label class="block mb-2 font-medium">Requirement</label>
            <input type="text" name="requirement" required class="input w-full">
        </div>

        {{-- Mode --}}
        <div>
            <label class="block mb-2 font-medium">Mode</label>
            <select name="mode" required class="input w-full">
                <option value="">Select...</option>
                <option value="cash">Cash</option>
                <option value="credit">Credit</option>
            </select>
        
        </div>

    </div>

    {{-- Submit Button --}}
    <div class="flex justify-end mt-6">
        <button class="px-6 py-3 bg-gray-900 hover:bg-gray-700 text-white font-semibold rounded-xl shadow">
            Submit
        </button>
    </div>

</div>


         </div>
         
        

            

        </form>




    
   





</x-app-layout>
