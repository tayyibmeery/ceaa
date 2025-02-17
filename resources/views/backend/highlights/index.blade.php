@extends('backend.layout.main')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Highlights</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Highlights</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Highlights Table</h3>
            <a href="{{ route('lights.create') }}" class="btn btn-primary float-right">Add Highlight</a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="highlightsTable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Icon Name</th>
                  <th>Icon Image</th>
                  <th>Title</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($highlights as $highlight)
                  <tr>
                    <td>{{ $highlight->id }}</td>
                    <td>{{ $highlight->icon_name }}</td>
                    <td>
                      <img src="{{ asset( $highlight->icon_image) }}" alt="Icon" width="50" height="50">
                    </td>
                    <td>{{ $highlight->title }}</td>
                    <td>
                      <a href="{{ route('lights.edit', $highlight->id) }}" class="btn btn-warning btn-sm">Edit</a>
                      <form action="{{ route('lights.destroy', $highlight->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{ $highlights->links() }}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</section>

@endsection

@section('scripts')
<script>
  $(function () {
    $('#highlightsTable').DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      "paging": true,
      "info": true,
      "ordering": true,
      "searching": true,
    });
  });
</script>
@endsection
