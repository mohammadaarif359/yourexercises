@extends('web_new.layouts.clinic.main')

@section('content')
    <div class="main-section ps-singin mb-5">
        <div class="container">
            <div class="row ps-border-bottom mx-4" data-aos="fade" data-aos-duration="2000">
                <div class="col-12 p-0">
                    <h1 class="heading-xl cl-lBlue fw-500">Hii, {{ $data['user']['name'] }}</h1>
                    <p class="paragraph cl-dblue">
                        You are taking the medial service from <b>{{ $data['patient_doctor']['user'] ? $data['patient_doctor']['user']['name'] : '' }}</b> .
                    </p>
                </div>
            </div>
            <hr>
            <div class="contact-section  mt-5">
                <h2 class="paragraph-xxl cl-dblue">Your Profile Details</h2>
                <form class="mt-4" id='frm-doctor-profile' name='frm-doctor-profile' method='POST' action="#" enctype="multipart/form-data">
			        @csrf
                    <input type='hidden' name='id' value="{{ old('id', $data['id'] ?? '') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="clinic_name">Name</label>
                            <input type="text" name="clinic_name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name', $data['user']['name'] ?? '') }}" readonly>
                            @error('name')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name', $data['user']['email'] ?? '') }}" readonly>
                            @error('email')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="dob">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob', $data['dob'] ?? '') }}" readonly>
                            @error('dob')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="gender">Gender</label>
                            <select name="gender" class="form-control" id="gender" readonly>
                                <option value="">Select Gender</option>
                                @foreach(config('custom.gender') as $k => $val)
                                    <option value="{{ $k }}" {{ old('gender',$data['gender'] ?? '') == $k ? 'selected' : '' }}>{{ $val }}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="address">Address</label>
                            <textarea name="address" class="form-control" id="address" placeholder="Enter clinic address" rows='3' readonly>{{ old('address', $data['address'] ?? '') }}</textarea>
                            @error('address')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label" for="medical_history">Medical History</label>
                            <textarea name="medical_history" class="form-control" id="description" placeholder="Enter description" rows='3' readonly>{{ old('medical_history', $data['medical_history'] ?? '') }}</textarea>
                            @error('medical_history')
                                <span class="error-helper">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    
@section('pagejs')
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
@endsection