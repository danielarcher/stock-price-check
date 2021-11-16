<section x-data="stockCheck()" id="stock-form" @submit.prevent="">
    <form action="">
        <h2 class="text-3xl font-extrabold my-5">Check Your Stock price</h2>
        <div class="my-2">

            <div class="flex">
                <input class="border w-full border-gray-400 block rounded-l focus:outline-none focus:border-indigo-800 p-2" id="symbol" type="text" placeholder="STOCK SYMBOL" x-model="formData.symbol">
                <input class="block rounded-r p-3 bg-indigo-800 text-white cursor-pointer hover:bg-indigo-600" type="submit" value="Check" @click="fetch()" x-model="submitButton">
            </div>

        </div>
        <div x-show="hasResult" x-transition:enter.duration.500ms x-transition:leave.duration.1000ms>
            <div class="flex content-center font-semibold text-sm">
                <span class="w-1/4 text-gray-800"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
      <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z" />
    </svg></span>
                <span class="w-1/4 text-green-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
    </svg></span>
                <span class="w-1/4 text-red-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
    </svg></span>
                <span class="w-1/4 text-blue-500"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg></span>
            </div>
            <div class="flex space-x-0">
                <input class="border w-1/4 border-gray-400 block rounded-l focus:outline-none focus:border-indigo-800 p-2" x-model="symbol">
                <input class="border w-1/4 border-gray-400 block focus:outline-none focus:border-indigo-800 p-2" x-model="high">
                <input class="border w-1/4 border-gray-400 block focus:outline-none focus:border-indigo-800 p-2" x-model="low">
                <input class="border w-1/4 border-gray-400 block rounded-r focus:outline-none focus:border-indigo-800 p-2" x-model="price">
            </div>
        </div>
        <div class="text-center font-semibold text-gray-600 pt-6" x-show="error" x-transition:enter.duration.500ms x-transition:leave.duration.1000ms>
            <p>No stock found for symbol: <span class="font-extrabold text-gray-900" x-text="symbol">1234</span></p>
        </div>
    </form>
</section>
<script src="{{ asset('/js/stock-ajax.js') }}"></script>

