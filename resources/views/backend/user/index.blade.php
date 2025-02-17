@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users Table</h3>
            <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Add User</a>
          </div>
          <div class="card-body">
            <table id="usersTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>CNIC</th>
                  <th>Date of Birth</th>
                  <th>Phone</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->full_name }}</td> <!-- Full name instead of separate first/last name -->
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->cnic }}</td>
                    <td>{{ $user->date_of_birth }}</td>
                    <td>{{ $user->phone ?? 'N/A' }}</td>
                    <td>
                      <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        {{ $users->links() }}
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
  $(function () {
    $('#usersTable').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "paging": true,
      "info": true,
      "ordering": true,
      "searching": true, // Enable search functionality
    });
  });
</script>
@endsection
