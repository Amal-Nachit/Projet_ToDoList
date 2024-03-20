<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 formRegister bg-white">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <?php
  // Si vous utilisez le fetch ,
  // Pensez à enlever la balise, ou transformez la simplement en div.
  ?>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <div class="space-y-6">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 email">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
       
        </div>
        <div class="mt-2">
          <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 password">
        </div>
      </div>
         <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
        <div class="mt-2">
          <input id="firstName" name="name" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 firstName">
        </div>
      </div>
          <div>
        <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
        <div class="mt-2">
          <input id="lastName" name="name" type="text"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 indent-3 lastName">
        </div>
      </div>

      <div>
        <button  onclick="handleRegister()" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
         </div>
     
    </div>

    
  </div>
  <p class="toast text-red bg-white w-1/2 h-20 mx-auto"></p>
</div>