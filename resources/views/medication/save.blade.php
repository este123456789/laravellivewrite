<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Medication') }}
        </h2>
    </x-slot>
    <div x-data="{
        form: {
            name: '',
            description: '',
            price: '',
            errors: {},
            submit() {
                debugger;
                // Reset errors
                this.errors = {};
    
                // Validate fields
                if (typeof this.name != 'undefined' && !this.name) {
                    this.errors.name = 'Name is required';
                }
                if (typeof this.description != 'undefined' && !this.description) {
                    this.errors.description = 'Description is required';
                }
                if (typeof !this.price != 'undefined' && !this.price) {
                    this.errors.price = 'Price is required';
                } else if (!this.isValidPrice(this.price)) {
                    this.errors.price = 'Invalid price';
                }
    
                // If there are no errors, submit the form
                if (Object.keys(this.errors).length === 0) {
                    // Aquí iría tu lógica para enviar el formulario
                    console.log('Formulario válido, se puede enviar');
                }
            },
            isValidPrice(price) {
                // Función para validar el formato del precio
                return !isNaN(price);
            }
        }
    }">
        <p class="form__msg">{{ $msg }}</p>
        <div class="form__content">

            <form class="form max-w-md mx-auto" action="/guardar" method="POST">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" x-model="form.name" required="required"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p x-text="form.errors.name" class="error-message">error</p>
                </div>

                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" x-model="form.description" required="required"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                    <p x-text="form.errors.description" class="error-message">error</p>
                </div>

                <div>
                    <label for="price">Price</label>
                    <input name="price" type="number" id="price" x-model="form.price" required="required"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p x-text="form.errors.price" class="error-message">error</p>
                </div>

                <button type="submit"
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
