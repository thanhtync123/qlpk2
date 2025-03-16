<!-- Cửa sổ thêm bệnh nhân -->
<div class="modal fade" id="modal-add-patient">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm bệnh nhân mới</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form class="needs-validation" method="post" action="{{ route('patients.store') }}" novalidate>
                        @csrf
                        @if (\App\Enums\UserRoles::isDoctor(Auth::user()->role) || \App\Enums\UserRoles::isAdmin(Auth::user()->role))
                            <input type="number" name="doctor_id" value="{{ Auth::user()->id }}" hidden>
                        @endif
                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <input id="name" name="name" type="text"
                                            class="@error('name') error-border @enderror model-field__input form-control"
                                            value="{{ old('name') }}" placeholder=" " required />
                                        <label for="name" class="model-field__label">Họ</label>
                                        <div class="model-field__bar"></div>
                                        @error('name')
                                            <div class="error">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <input id="lastname" name="lastname" type="text"
                                            class="@error('lastname') error-border @enderror model-field__input form-control"
                                            value="{{ old('lastname') }}" placeholder=" " required />
                                        <label for="lastname" class="model-field__label">Tên</label>
                                        @error('lastname')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <div class="model-field__bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <input type="number" id="noSSocial" name="noSSocial"
                                            class=" @error('noSSocial') error-border @enderror model-field__input form-control"
                                            value="{{ old('noSSocial') }}" placeholder=" "/>
                                        <label for="noSSocial" class="model-field__label">Số bảo hiểm</label>
                                        @error('noSSocial')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <div class="model-field__bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <input id="email" name="email" type="text"
                                            class=" @error('email') error-border @enderror model-field__input form-control"
                                            value="{{ old('email') }}" placeholder=" " required />
                                        <label for="email" class="model-field__label">Địa chỉ</label>
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                        <div class="model-field__bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="input-group">
                                        <input type="text" id="phone" name="phone"
                                            class=" @error('phone') error-border @enderror form-control"
                                        >
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="input-group date" id="dob" name="dob"
                                        data-target-input="nearest">
                                        <input type="date" name="dob" class="form-control"
                                            data-target="#dob" placeholder="Ngày sinh" required />
                                        <div class="input-group-append" data-target="#dob"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
