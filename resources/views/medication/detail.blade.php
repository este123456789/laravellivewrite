
@php   
$id = $medication->id;
$name = $medication->name;
$description = $medication->description;
$price = $medication->price;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medication Detail') }}
        </h2>
    </x-slot>
    

<x-medication-detail :id=$id :name=$name :description=$description :price=$price />


</x-app-layout>