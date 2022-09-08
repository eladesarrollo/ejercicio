@csrf
<div class="mb-6">
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
    <span class="text-xs text-red-600">
        @error('name')
            {{ $message }}
        @enderror
    </span>
    <input type="text" id="name" name="name"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="name" value="{{ old('name', $cooperator->name) }}">
</div>
<div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Correo
        electrónico</label>
    <span class="text-xs text-red-600">
        @error('email')
            {{ $message }}
        @enderror
    </span>
    <input type="text" id="email" name="email"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="email" value="{{ old('email', $cooperator->email) }}">
</div>
<div class="mb-6">
    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dirección</label>
    <span class="text-xs text-red-600">
        @error('address')
            {{ $message }}
        @enderror
    </span>
    <input type="text" id="address" name="address"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="address" value="{{ old('address', $cooperator->address) }}">
</div>
<div class="mb-6">
    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Teléfono</label>
    <span class="text-xs text-red-600">
        @error('phone')
            {{ $message }}
        @enderror
    </span>
    <input type="text" id="phone" name="phone"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="phone" value="{{ old('phone', $cooperator->phone) }}">
</div>
<button type="submit"
    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enviar</button>
