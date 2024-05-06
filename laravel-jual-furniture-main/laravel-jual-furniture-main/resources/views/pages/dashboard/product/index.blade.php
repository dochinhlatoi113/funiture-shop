<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                // responsive
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,

                ajax: {
                    url: '{!! url()->current() !!}'
                },

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: '5%'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    }
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-10">
                <a href="{{ route('dashboard.product.create') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded-md shadow-lg">
                    + Create Product
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <table id="crudTable" class="display nowrap" style="width: 100%">
                        <thead class="text-left">
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
