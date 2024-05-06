<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaction &raquo; {{ $transaction->name }} &raquo; Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('dashboard.transaction.update', $transaction->id) }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3 mb-6">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Status</label>
                            <select name="status"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="{{ $transaction->status }}" selected>{{ $transaction->status }}</option>
                                <option disabled>--- select status ---</option>
                                <option value="PENDING">PENDING</option>
                                <option value="SUCCESS">SUCCESS</option>
                                <option value="CANCELLED">CANCELLED</option>
                                <option value="FAILED">FAILED</option>
                                <option value="SHIPPING">SHIPPING</option>
                                <option value="SHIPPED">SHIPPED</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mt-2 mb-6">
                        <div class="w-full px-3">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-10 rounded-md shadow-lg">Update
                                Transaction</button>

                            <a href="{{ route('dashboard.transaction.index') }}"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-10 ml-3 rounded-md shadow-lg">
                                Cancel
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- CKEditor 4 --}}
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
</x-app-layout>
