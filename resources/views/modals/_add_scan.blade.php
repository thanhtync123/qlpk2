<!-- Hộp thoại bật lên thêm quét mới -->
<div class="modal fade" id="modal-scan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tải ảnh scan</h4>
            </div>
            <div class="modal-body">
                <!-- Nội dung chính -->
                <div class="container">
                    <form class="needs-validation" method="post" action="{{ route('scans.store') }}" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <input type="number" name="patient_id" id="patient_id" value="{{ $patient->id }}" hidden>
                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <input id="type" name="type" type="text"
                                            class="@error('type') error-border @enderror model-field__input form-control"
                                            value="{{ old('type') }}" placeholder=" " required />
                                        <label for="type" class="model-field__label">Mô tả</label>
                                        <div class="model-field__bar"></div>
                                        @error('type')
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
                                        <input type="file" id="image" name="image">
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
