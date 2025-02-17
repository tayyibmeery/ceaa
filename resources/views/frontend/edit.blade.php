@extends('frontend.layout.main')

@section('title', 'Edit Profile')

@section('content')
<section style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card mb-4">
                    <div class="card-body">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Full Name -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name', optional(auth()->user())->first_name ?? '') }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                             <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', optional(auth()->user())->last_name ?? '') }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>




                             <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="father_name" class="form-label">Father Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name', optional(auth()->user())->father_name ?? '') }}">
                                    @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- CNIC -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('cnic') is-invalid @enderror" id="cnic" name="cnic" value="{{ old('cnic', optional(auth()->user()->candidate)->cnic ?? '') }}" placeholder="XXXXX-XXXXXXX-X" pattern="\d{5}-\d{7}-\d{1}" maxlength="15">
                                    @error('cnic')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <!-- Date of Birth -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', optional(auth()->user()->candidate)->date_of_birth ?? '') }}">
                                    @error('date_of_birth')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="phone" class="form-label">Phone</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', optional(auth()->user()->candidate)->phone ?? '') }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="address" class="form-label">Address</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address', optional(auth()->user()->candidate)->address ?? '') }}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Province of Domicile -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="province_of_domicile" class="form-label">Province of Domicile</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('province_of_domicile') is-invalid @enderror" id="province_of_domicile" name="province_of_domicile" value="{{ old('province_of_domicile', optional(auth()->user()->candidate)->province_of_domicile ?? '') }}">
                                    @error('province_of_domicile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- District of Domicile -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="district_of_domicile" class="form-label">District of Domicile</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('district_of_domicile') is-invalid @enderror" id="district_of_domicile" name="district_of_domicile" value="{{ old('district_of_domicile', optional(auth()->user()->candidate)->district_of_domicile ?? '') }}">
                                    @error('district_of_domicile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Postal City -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="postal_city" class="form-label">Postal City</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('postal_city') is-invalid @enderror" id="postal_city" name="postal_city" value="{{ old('postal_city', optional(auth()->user()->candidate)->postal_city ?? '') }}">
                                    @error('postal_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Postal Address -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="postal_address" class="form-label">Postal Address</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('postal_address') is-invalid @enderror" id="postal_address" name="postal_address">{{ old('postal_address', optional(auth()->user()->candidate)->postal_address ?? '') }}</textarea>
                                    @error('postal_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Gender -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="gender" class="form-label">Gender</label>
                                </div>
                                <div class="col-sm-9">
                                    <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                        <option value="male" {{ old('gender', optional(auth()->user()->candidate)->gender) == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender', optional(auth()->user()->candidate)->gender) == 'female' ? 'selected' : '' }}>Female</option>
                                        <option value="other" {{ old('gender', optional(auth()->user()->candidate)->gender) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Profile Picture -->
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <label for="profile_picture" class="form-label">Profile Picture</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture">
                                    @error('profile_picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Save Changes Button -->
                            <div class="d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
