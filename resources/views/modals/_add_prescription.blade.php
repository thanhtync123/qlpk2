<!-- Cửa sổ thêm đơn thuốc -->
<div class="modal fade" id="modal_add_prescription">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm đơn thuốc mới</h4>
            </div>
            <div class="modal-body">
                <!-- Nội dung chính -->
                <div class="container">
                    <form class="needs-validation" method="post" action="{{ route('prescriptions.store') }}" novalidate>
                        @csrf
                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                        <input type="hidden" name="name" value="{{ $patient->name }}">
                        <input type="hidden" name="lastname" value="{{ $patient->lastname }}">

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <textarea id="content" name="content" cols="30" rows="10"
                                            class="@error('content') error-border @enderror form-field__textarea form-control"
                                            required>{{ old('content') }}</textarea>
                                        <div class="model-field__bar"></div>
                                        @error('content')
                                            <div class="error">
                                                {{ $message }}
                                            </div>
                                        @enderror
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
