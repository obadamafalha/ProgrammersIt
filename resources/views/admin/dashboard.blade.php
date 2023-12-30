<x-guest-layout>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
        </div>
      

    </header>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container p-4">
                    <div class="pb-5">
                        <a class="btn btn-success" href="{{ route('export_excel') }}">Excel </a>
                        <a class="btn btn-danger" href="{{ route('export_pdf') }}">Pdf </a>
                    </div>
                    <table class="table table-striped-columns" id="myTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Event</th>
                                <th>Subject Type</th>
                                <th>Properties</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($activity as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ EmailOfUser($item['causer_id']) }}</td>
                                    <td>{{ $item['event'] }}</td>
                                    <td>{{ $item['subject_type'] }}</td>
                                    <td>{{ $item['properties'] }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</x-guest-layout>
