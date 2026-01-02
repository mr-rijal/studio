<x-guest-layout for="web" page="Family Registration">
    <section class="content-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h2 class="card-title text-center mb-4" style="color: var(--primary-color);">
                                Family Registration
                            </h2>
                            <p class="text-center text-muted mb-4">
                                Please fill out the form below to register your family. All fields marked with <span
                                    class="text-danger">*</span> are required.
                            </p>

                            <form method="POST" action="#" id="familyRegistrationForm">
                                @csrf

                                <h5 class="mb-3 mt-4" style="color: var(--primary-color);">Parent/Guardian Information
                                </h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="parent_first_name" class="form-label fw-semibold">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('parent_first_name') is-invalid @enderror"
                                            id="parent_first_name" name="parent_first_name"
                                            value="{{ old('parent_first_name') }}" required>
                                        @error('parent_first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="parent_last_name" class="form-label fw-semibold">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('parent_last_name') is-invalid @enderror"
                                            id="parent_last_name" name="parent_last_name"
                                            value="{{ old('parent_last_name') }}" required>
                                        @error('parent_last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="parent_email" class="form-label fw-semibold">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="email"
                                            class="form-control @error('parent_email') is-invalid @enderror"
                                            id="parent_email" name="parent_email" value="{{ old('parent_email') }}"
                                            required>
                                        @error('parent_email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="parent_phone" class="form-label fw-semibold">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="tel"
                                            class="form-control @error('parent_phone') is-invalid @enderror"
                                            id="parent_phone" name="parent_phone" value="{{ old('parent_phone') }}"
                                            required>
                                        @error('parent_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label fw-semibold">Address <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label fw-semibold">City <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="state" class="form-label fw-semibold">State <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('state') is-invalid @enderror"
                                            id="state" name="state" value="{{ old('state') }}" required>
                                        @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="zip_code" class="form-label fw-semibold">ZIP Code <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('zip_code') is-invalid @enderror" id="zip_code"
                                            name="zip_code" value="{{ old('zip_code') }}" required>
                                        @error('zip_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <h5 class="mb-3 mt-4" style="color: var(--primary-color);">Emergency Contact</h5>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="emergency_contact_name" class="form-label fw-semibold">Emergency
                                            Contact Name <span class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control @error('emergency_contact_name') is-invalid @enderror"
                                            id="emergency_contact_name" name="emergency_contact_name"
                                            value="{{ old('emergency_contact_name') }}" required>
                                        @error('emergency_contact_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="emergency_contact_phone" class="form-label fw-semibold">Emergency
                                            Contact Phone <span class="text-danger">*</span></label>
                                        <input type="tel"
                                            class="form-control @error('emergency_contact_phone') is-invalid @enderror"
                                            id="emergency_contact_phone" name="emergency_contact_phone"
                                            value="{{ old('emergency_contact_phone') }}" required>
                                        @error('emergency_contact_phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <h5 class="mb-3 mt-4" style="color: var(--primary-color);">Additional Information</h5>
                                <hr>

                                <div class="mb-3">
                                    <label for="number_of_children" class="form-label fw-semibold">Number of
                                        Children</label>
                                    <input type="number"
                                        class="form-control @error('number_of_children') is-invalid @enderror"
                                        id="number_of_children" name="number_of_children"
                                        value="{{ old('number_of_children', 1) }}" min="1">
                                    @error('number_of_children')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="additional_notes" class="form-label fw-semibold">Additional
                                        Notes</label>
                                    <textarea class="form-control @error('additional_notes') is-invalid @enderror" id="additional_notes"
                                        name="additional_notes" rows="4" placeholder="Any additional information you'd like to provide...">{{ old('additional_notes') }}</textarea>
                                    @error('additional_notes')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary-custom"
                                        style="background-color: var(--accent-color); color: white; border: none;">
                                        Submit Registration
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .content-section {
            background-color: var(--light-bg);
            min-height: 70vh;
        }

        .card {
            border-radius: 10px;
        }

        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .form-label {
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .btn-primary-custom {
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(52, 152, 219, 0.3);
        }

        hr {
            margin: 1rem 0;
            opacity: 0.2;
        }
    </style>
</x-guest-layout>
