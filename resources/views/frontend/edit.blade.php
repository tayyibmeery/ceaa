@extends("frontend.layout.main")

@section("title", "Edit Profile")

@section("content")
<section class="bg-white py-4">
    <div class="container py-5">
        <div class="mb-4 text-center">
            <h2>Edit Profile</h2>
            <p class="text-muted">Update your personal information and education details</p>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <!-- Profile Picture Card -->
                <div class="card mb-4">
                    <div class="card-header bg-success py-3 text-center text-white">
                        <h5 class="mb-0">Profile Picture</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <img src="{{ asset("storage/" . (auth()->user()->profile_picture ?? "default-profile.jpg")) }}" class="rounded-circle mb-3 border border-2" width="150" height="150" id="preview-image">
                        </div>
                        <div class="mb-3">
                            <input type="file" class="form-control @error(" profile_picture") is-invalid @enderror" id="profile_picture" name="profile_picture" onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                            @error("profile_picture")
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header bg-success py-3 text-center text-white">
                        <h5 class="mb-0">Personal Information</h5>
                    </div>
                    <div class="card-body">
                        <!-- Success Message -->
                        @if (session("success"))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session("success") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- Error Message -->
                        @if (session("error"))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session("error") }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- Validation Errors -->
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <strong>Please fix the following errors:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form action="{{ route("profile.update") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")

                            <!-- Basic Information -->
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control @error(" first_name") is-invalid @enderror" name="first_name" value="{{ old("first_name", auth()->user()->first_name) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error(" last_name") is-invalid @enderror" name="last_name" value="{{ old("last_name", auth()->user()->last_name) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" class="form-control @error(" father_name") is-invalid @enderror" name="father_name" value="{{ old("father_name", auth()->user()->father_name) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control @error(" date_of_birth") is-invalid @enderror" name="date_of_birth" value="{{ old("date_of_birth", auth()->user()->date_of_birth) }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select @error(" gender") is-invalid @enderror" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old("gender", auth()->user()->gender) === "male" ? "selected" : "" }}>
                                            Male</option>
                                        <option value="female" {{ old("gender", auth()->user()->gender) === "female" ? "selected" : "" }}>
                                            Female</option>
                                        <option value="other" {{ old("gender", auth()->user()->gender) === "other" ? "selected" : "" }}>
                                            Other</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">CNIC</label>
                                    <input type="text" class="form-control @error(" cnic") is-invalid @enderror" name="cnic" value="{{ old("cnic", auth()->user()->cnic) }}" placeholder="XXXXX-XXXXXXX-X">
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Contact Information -->
                            <h5 class="mb-3">Contact Information</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Change Password</label>
                                    <input type="password" class="form-control @error(" password") is-invalid @enderror" name="password" placeholder="Leave blank to keep current password">
                                    @error("password")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm new password">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="text" class="form-control @error(" phone") is-invalid @enderror" name="phone" value="{{ old("phone", auth()->user()->phone) }}">
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control @error(" address") is-invalid @enderror" name="address" rows="2">{{ old("address", auth()->user()->address) }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Location Details -->
                            <h5 class="mb-3">Location Details</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Province of Domicile</label>
                                    <input type="text" class="form-control @error(" province_of_domicile") is-invalid @enderror" name="province_of_domicile" value="{{ old("province_of_domicile", auth()->user()->province_of_domicile) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">District of Domicile</label>
                                    <input type="text" class="form-control @error(" district_of_domicile") is-invalid @enderror" name="district_of_domicile" value="{{ old("district_of_domicile", auth()->user()->district_of_domicile) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Postal City</label>
                                    <input type="text" class="form-control @error(" postal_city") is-invalid @enderror" name="postal_city" value="{{ old("postal_city", auth()->user()->postal_city) }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Postal Address</label>
                                    <textarea class="form-control @error(" postal_address") is-invalid @enderror" name="postal_address" rows="1">{{ old("postal_address", auth()->user()->postal_address) }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Education Section -->
                            <h5 class="mb-3">Education Details</h5>
                            <div id="education-container">
                                @if (old("educations"))
                                @foreach (old("educations") as $index => $education)
                                <div class="education-entry mb-3 rounded border p-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Degree Title</label>
                                            <input type="text" class="form-control @error(" educations." . $index . ".degree_title" ) is-invalid @enderror" name="educations[{{ $index }}][degree_title]" value="{{ $education["degree_title"] }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Institute</label>
                                            <input type="text" class="form-control @error(" educations." . $index . ".institute" ) is-invalid @enderror" name="educations[{{ $index }}][institute]" value="{{ $education["institute"] }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Board/University</label>
                                            <input type="text" class="form-control @error(" educations." . $index . ".board_university" ) is-invalid @enderror" name="educations[{{ $index }}][board_university]" value="{{ $education["board_university"] }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" class="form-control @error(" educations." . $index . ".passing_year" ) is-invalid @enderror" name="educations[{{ $index }}][passing_year]" value="{{ $education["passing_year"] }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Grade/CGPA</label>
                                            <input type="text" class="form-control @error(" educations." . $index . ".grade_cgpa" ) is-invalid @enderror" name="educations[{{ $index }}][grade_cgpa]" value="{{ $education["grade_cgpa"] }}">
                                        </div>
                                    </div>
                                </div>
                                @error("educations." . $index . ".degree_title")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error("educations." . $index . ".institute")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error("educations." . $index . ".board_university")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error("educations." . $index . ".passing_year")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error("educations." . $index . ".grade_cgpa")
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @endforeach
                                @else
                                @forelse(auth()->user()->educations as $index => $education)
                                <div class="education-entry mb-3 rounded border p-3">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Degree Title</label>
                                            <input type="text" class="form-control" name="educations[{{ $index }}][degree_title]" value="{{ $education->degree_title }}">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Institute</label>
                                            <input type="text" class="form-control" name="educations[{{ $index }}][institute]" value="{{ $education->institute }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Board/University</label>
                                            <input type="text" class="form-control" name="educations[{{ $index }}][board_university]" value="{{ $education->board_university }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Passing Year</label>
                                            <input type="number" class="form-control" name="educations[{{ $index }}][passing_year]" value="{{ $education->passing_year }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Grade/CGPA</label>
                                            <input type="text" class="form-control" name="educations[{{ $index }}][grade_cgpa]" value="{{ $education->grade_cgpa }}">
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p class="text-muted text-center">No education details added yet.</p>
                                @endforelse
                                @endif
                            </div>

                            <div class="mb-4 text-center">
                                <button type="button" class="btn btn-outline-success" id="add-education">
                                    <i class="fas fa-plus me-1"></i>Add Education
                                </button>
                            </div>

                            <div class="d-flex justify-content-center gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i>Save Changes
                                </button>
                                <a href="{{ route("profile") }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-1"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push("scripts")
<script>
    document.getElementById('add-education').addEventListener('click', function() {
        const container = document.getElementById('education-container');
        const count = container.getElementsByClassName('education-entry').length;

        const template = `
            <div class="education-entry border rounded p-3 mb-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Degree Title</label>
                        <input type="text"
                              class="form-control @error('educations.${count}.degree_title') is-invalid @enderror"
                              name="educations[${count}][degree_title]"
                              value="{{ old('educations.${count}.degree_title') }}">
                        @error('educations.${count}.degree_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Institute</label>
                        <input type="text"
                              class="form-control @error('educations.${count}.institute') is-invalid @enderror"
                              name="educations[${count}][institute]"
                              value="{{ old('educations.${count}.institute') }}">
                        @error('educations.${count}.institute')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Board/University</label>
                        <input type="text"
                              class="form-control @error('educations.${count}.board_university') is-invalid @enderror"
                              name="educations[${count}][board_university]"
                              value="{{ old('educations.${count}.board_university') }}">
                        @error('educations.${count}.board_university')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Passing Year</label>
                        <input type="number"
                              class="form-control @error('educations.${count}.passing_year') is-invalid @enderror"
                              name="educations[${count}][passing_year]"
                              value="{{ old('educations.${count}.passing_year') }}">
                        @error('educations.${count}.passing_year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Grade/CGPA</label>
                        <input type="text"
                              class="form-control @error('educations.${count}.grade_cgpa') is-invalid @enderror"
                              name="educations[${count}][grade_cgpa]"
                              value="{{ old('educations.${count}.grade_cgpa') }}">
                        @error('educations.${count}.grade_cgpa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', template);
    });

</script>
@endpush
