@extends('backend.layout.main')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ isset($user) ? 'Edit User' : 'Create User' }}</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ isset($user) ? 'Edit User' : 'Create User' }}</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- form card -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><small>{{ isset($user) ? 'Edit User' : 'Create User' }}</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form
            action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($user))
              @method('PUT')
            @endif
            <div class="card-body">
              <div class="row">
                <!-- First Name and Last Name in one row -->
                <div class="col-md-6 form-group">
                  <label for="first_name">First Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="first_name"
                    name="first_name"
                    placeholder="Enter first name"
                    value="{{ old('first_name', $user->first_name ?? '') }}"
                    required>
                </div>

                <div class="col-md-6 form-group">
                  <label for="last_name">Last Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="last_name"
                    name="last_name"
                    placeholder="Enter last name"
                    value="{{ old('last_name', $user->last_name ?? '') }}">
                </div>
              </div>

              <div class="row">
                <!-- Father's Name and CNIC in one row -->
                <div class="col-md-6 form-group">
                  <label for="father_name">Father's Name</label>
                  <input
                    type="text"
                    class="form-control"
                    id="father_name"
                    name="father_name"
                    placeholder="Enter father's name"
                    value="{{ old('father_name', $user->father_name ?? '') }}">
                </div>

                <div class="col-md-6 form-group">
                  <label for="cnic">CNIC</label>
                  <input
                    type="text"
                    class="form-control"
                    id="cnic"
                    name="cnic"
                    placeholder="Enter CNIC"
                    value="{{ old('cnic', $user->cnic ?? '') }}">
                </div>
              </div>

              <div class="row">
                <!-- Date of Birth and Phone in one row -->
                <div class="col-md-6 form-group">
                  <label for="date_of_birth">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    id="date_of_birth"
                    name="date_of_birth"
                    value="{{ old('date_of_birth', $user->date_of_birth ?? '') }}">
                </div>

                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    name="phone"
                    placeholder="Enter phone number"
                    value="{{ old('phone', $user->phone ?? '') }}">
                </div>
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <textarea
                  class="form-control"
                  id="address"
                  name="address"
                  placeholder="Enter address">{{ old('address', $user->address ?? '') }}</textarea>
              </div>

              <div class="row">
                <!-- Province and District in one row -->
                <div class="col-md-6 form-group">
                  <label for="province_of_domicile">Province of Domicile</label>
                  <input
                    type="text"
                    class="form-control"
                    id="province_of_domicile"
                    name="province_of_domicile"
                    placeholder="Enter province of domicile"
                    value="{{ old('province_of_domicile', $user->province_of_domicile ?? '') }}">
                </div>

                <div class="col-md-6 form-group">
                  <label for="district_of_domicile">District of Domicile</label>
                  <input
                    type="text"
                    class="form-control"
                    id="district_of_domicile"
                    name="district_of_domicile"
                    placeholder="Enter district of domicile"
                    value="{{ old('district_of_domicile', $user->district_of_domicile ?? '') }}">
                </div>
              </div>

              <div class="row">
                <!-- Postal City and Postal Address in one row -->
                <div class="col-md-6 form-group">
                  <label for="postal_city">Postal City</label>
                  <input
                    type="text"
                    class="form-control"
                    id="postal_city"
                    name="postal_city"
                    placeholder="Enter postal city"
                    value="{{ old('postal_city', $user->postal_city ?? '') }}">
                </div>

                <div class="col-md-6 form-group">
                  <label for="postal_address">Postal Address</label>
                  <textarea
                    class="form-control"
                    id="postal_address"
                    name="postal_address"
                    placeholder="Enter postal address">{{ old('postal_address', $user->postal_address ?? '') }}</textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="gender">Gender</label>
                <select
                  class="form-control"
                  id="gender"
                  name="gender">
                  <option value="male" {{ old('gender', $user->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
                  <option value="female" {{ old('gender', $user->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
                  <option value="other" {{ old('gender', $user->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
              </div>

              <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input
                  type="file"
                  class="form-control"
                  id="profile_picture"
                  name="profile_picture">
              </div>

              <div class="form-group">
                <label for="role">Role</label>
                <select
                  class="form-control"
                  id="role"
                  name="role" required>
                  <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="user" {{ old('role', $user->role ?? '') == 'user' ? 'selected' : '' }}>User</option>
                </select>
              </div>

              <div class="form-group">
                <label for="email">Email address</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter email"
                  value="{{ old('email', $user->email ?? '') }}"
                  required>
              </div>

              @if(!isset($user)) <!-- Only show password fields when creating -->
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    required>
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Confirm password"
                    required>
                </div>
              @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">{{ isset($user) ? 'Update' : 'Save' }}</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>

@endsection
