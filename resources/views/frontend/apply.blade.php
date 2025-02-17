@extends('frontend.layout.main')

@section('title', 'Apply for Job: ' . $jobPost->title)

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 result_resp m-t-30 m-b-30 ">
                <div class="heading-text heading-section text-center">
                    <h4 class="hs_heading">Apply for Job: {{ $jobPost->title }}</h4>
                </div>

                <div class="border p-50 rounded-lg border-success">

                    @if($missingFields)
                    <!-- Alert for Missing Profile Fields -->
                    <div class="alert alert-warning">
                        <strong>Profile Incomplete:</strong> Please update your profile to complete your application. <br>
                        Missing Fields:
                        <ul>
                            @foreach($missingFields as $field)
                            <li>{{ $field }}</li>
                            @endforeach
                        </ul>
                        <div class="text-center">
                            <a href="{{ route('profile.edit') }}" class="btn btn-danger mt-2">Update Profile</a>
                        </div>
                    </div>
                    @else

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
                    <form action="{{ route('postsjob.apply', $jobPost->id) }}" method="POST" enctype="multipart/form-data" id="application-form">
                        @csrf

                        <!-- Candidate Information (Read-Only) -->
                        <div class="row">
                            <h5>Profile Picture</h5>

                            <div class="form-group col-12 text-center">
                                <label for="profile_picture">Current Profile Picture:</label>
                                <div>
                                    <img src="{{ asset('storage/' . (optional(auth()->user())->profile_picture ?? 'default-profile.jpg')) }}" alt="Profile Image" class="img-fluid rounded-circle" style="max-width: 150px; height: auto;">
                                </div>
                                <div>
                                    <label for="profile_picture" class="d-block mt-2">Upload a new profile picture (optional):</label>
                                    <input type="file" id="profile_picture" name="profile_picture" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h5>Candidate Information</h5>

                            <div class="form-group col-6">
                                <label for="first_name">First Name:</label>
                                <input type="text" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}" class="form-control readonly" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Last Name:</label>
                                <input type="text" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}" class="form-control readonly" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="father_name">Father Name:</label>
                                <input type="text" id="father_name" name="father_name" value="{{ auth()->user()->father_name }}" class="form-control readonly" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="dob">Date of Birth:</label>
                                <input type="text" id="dob" name="dob" value="{{ auth()->user()->date_of_birth }}" class="form-control readonly" readonly>
                            </div>

                             <div class="form-group col-6">
                                <label for="cnic">CNIC</label>
                                <input type="text" id="cnic" name="cnic" value="{{ auth()->user()->cnic }}" class="form-control readonly" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="phone">Phone Number:</label>
                                <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}" class="form-control readonly" readonly>
                            </div>

                            <div class="form-group col-6">
                                <label for="address">Address:</label>
                                <textarea id="address" name="address" class="form-control readonly" readonly>{{ auth()->user()->address }}</textarea>
                            </div>

                            <div class="form-group col-6">
                                <label for="province_of_domicile">Province of Domicile:</label>
                                <input type="text" id="province_of_domicile" name="province_of_domicile" value="{{ auth()->user()->province_of_domicile }}" class="form-control readonly" readonly>
                            </div>

                            <div class="form-group col-6">
                                <label for="district_of_domicile">District of Domicile:</label>
                                <input type="text" id="district_of_domicile" name="district_of_domicile" value="{{ auth()->user()->district_of_domicile }}" class="form-control readonly" readonly>
                            </div>

                            <div class="form-group col-6">
                                <label for="postal_city">Postal City:</label>
                                <input type="text" id="postal_city" name="postal_city" value="{{ auth()->user()->postal_city }}" class="form-control readonly" readonly>
                            </div>

                            <div class="form-group col-12">
                                <label for="postal_address">Postal Address:</label>
                                <textarea id="postal_address" name="postal_address" class="form-control readonly" readonly>{{ auth()->user()->postal_address }}</textarea>
                            </div>
                        </div>

                        <!-- Upload Documents -->
                        <div class="row">
                            <h5>Upload Documents</h5>

                            <div class="form-group col-6">
                                <label for="resume">Resume (PDF, DOC, DOCX):</label>
                                <input type="file" id="resume" name="resume" class="form-control">
                            </div>

                            <div class="form-group col-6">
                                <label for="cover_letter">Cover Letter (PDF, DOC, DOCX):</label>
                                <input type="file" id="cover_letter" name="cover_letter" class="form-control">
                            </div>

                            <div class="form-group col-6">
                                <label for="fees_receipt">Fees Receipt (PDF, JPG, PNG):</label>
                                <input type="file" id="fees_receipt" name="fees_receipt" class="form-control">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group text-center m-t-20">
                            <button type="submit" class="btn btn-primary">Apply</button>
                            <a href="{{ route('profile') }}" class="btn btn-danger">GO Back Profile</a>
                        </div>
                    </form>

                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

@endpush

@push('styles')
<style>
    .readonly {
        background-color: #f7f7f7;
        color: #495057;
        border: 1px solid #ced4da;
        cursor: not-allowed;
    }
    .readonly:focus {
        background-color: #f7f7f7;
        border-color: #ced4da;
        box-shadow: none;
    }
</style>
@endpush
