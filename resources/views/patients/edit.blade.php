@extends('layout')
@section('title', 'Cập nhật người dùng ' . $patient->lastname . ' ' . $patient->name)
@section('header', 'Cập nhật người dùng: ' . $patient->lastname . ' ' . $patient->name)

@section('content')
    <div class="card">
        <div class="card-body">
            <form class="needs-validation" method="post" action="{{ route('patients.update', [$patient]) }}" novalidate>
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="lastname">Họ</label>
                    <input id="lastname" name="lastname" type="text"
                        class="@error('lastname') error-border @enderror form-control "
                        value="{{ old('lastname', $patient->lastname) }}" placeholder=" " required />
                    @error('lastname')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input id="name" name="name" type="text"
                        class="@error('name') error-border @enderror form-control "
                        value="{{ old('name', $patient->name) }}" placeholder=" " required />
                    @error('name')
                        <div class="error">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="noSSocial">Số bảo hiểm</label>
                    <input type="number" id="noSSocial" name="noSSocial"
                        class=" @error('noSSocial') error-border @enderror  form-control"
                        value="{{ old('noSSocial', $patient->noSSocial) }}" placeholder=" " required />
                    @error('noSSocial')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ</label>
                    <input id="email" name="email" type="text"
                        class=" @error('email') error-border @enderror form-control"
                        value="{{ old('email', $patient->email) }}" placeholder=" " required />
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <div class="input-group">
                        <input type="text" id="phone" name="phone"
                            class=" @error('phone') error-border @enderror form-control"
                            required value="{{ old('phone', $patient->phone) }}">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone">Ngày sinh</label>
                    <div class="input-group">
                        <input type="date" id="dob2" name="dob"
                            class=" @error('dob') error-border @enderror form-control"
                            required value="{{ old('dob', $patient->dob) }}">
                        <div class="input-group-append">
                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
