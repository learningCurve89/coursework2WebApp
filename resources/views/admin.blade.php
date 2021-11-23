<x-layout title="Admin Area">
    <h1>Admin Area</h1>
    <p>You must be logged in to see this!</p>
    <p>You are {{Auth::user()->name}}.</p>
</x-layout>
<table id="user-table" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach(App\Models\User::all() as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@push('scripts')
<script>
    $(document).ready(function () {
        $('#user-table').DataTable();
    });
</script>
@endpush