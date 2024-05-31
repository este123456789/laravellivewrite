<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Medication List') }}
        </h2>
    </x-slot>


    <div>


        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">


            <div x-data="medicationsData">
                <table id="medicationTable" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="px-6 py-3"  @click="sort('name')">Nombre</th>
                            <th class="px-6 py-3"  @click="sort('description')">Descripción</th>
                            <th class="px-6 py-3"  @click="sort('price')">Precio</th>
                            <th class="px-6 py-3" ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-if="!medicamentos">
                            <tr>
                                <td class="px-6 py-4" colspan="4"><i>Loading...</i></td>
                            </tr>
                        </template>
                        <template x-for="medi in pagedMedi" :key="medi.id">
                            <tr class="bg-white dark:bg-gray-800">
                                <td class="px-6 py-4" x-text="medi.name"></td>
                                <td class="px-6 py-4" x-text="medi.description"></td>
                                <td class="px-6 py-4">$ <span  x-text="medi.price"></span> </td>
                                <td class="px-6 py-4"><a x-bind:href="'/detail/id/' + medi.id" >
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                            <path stroke="currentColor" stroke-width="2"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>

                                    </a> </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
                <div class="custom-pre-next">

                    <button @click="previousPage"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7"/>
                    </svg>
                </button> <button @click="nextPage"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                </svg>
            </button>
        </div>
            </div>

        </div>
    </div>


    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('medicationsData', () => ({
                medications: null,
                sortCol: null,
                sortAsc: false,
                pageSize: 4,
                curPage: 1,
                async init() {
                    let resp = await fetch('/medications');
                    // Add an ID value
                    let data = await resp.json();
                    this.medications = data;
                },
                nextPage() {
                    if ((this.curPage * this.pageSize) < this.medications.length) this.curPage++;
                },
                previousPage() {
                    if (this.curPage > 1) this.curPage--;
                },
                sort(col) {
                    if (this.sortCol === col) this.sortAsc = !this.sortAsc;
                    this.sortCol = col;
                    this.medications.sort((a, b) => {
                        if (a[this.sortCol] < b[this.sortCol]) return this.sortAsc ? 1 : -1;
                        if (a[this.sortCol] > b[this.sortCol]) return this.sortAsc ? -1 : 1;
                        return 0;
                    });
                },
                get pagedMedi() {
                    if (this.medications) {
                        return this.medications.filter((row, index) => {
                            let start = (this.curPage - 1) * this.pageSize;
                            let end = this.curPage * this.pageSize;
                            if (index >= start && index < end) return true;
                        })
                    } else return [];
                }
            }))
        });
    </script>


</x-app-layout>
