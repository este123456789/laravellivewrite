<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Medication Detail') }}
    </h2>
</x-slot>

<ul class="detail">

    <li># {{$id}}</li>
    <li>Nobre: {{$name}}</li>
    <li>Descripcon: {{$description}}</li>
    <li>Precio: $ {{$price}}</li>
</ul>