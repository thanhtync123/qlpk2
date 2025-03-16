<!-- Cửa sổ đặt lịch hẹn -->

<div class="modal fade" id="modal_add_appointment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm lịch hẹn</h4>
            </div>
            <div class="modal-body">

                <div class="container">
                    <form class="needs-validation" method="POST" action="{{ route('appointment.store') }}" novalidate>
                        @csrf

                        <input type="hidden" name="doctor_id" value="{{ Auth::user()->id }}">

                        <div class="row">
                            <div class="col-sm">
                                <div class="form-group">
                                  
                                    <div class="model-field__control">
                                    <input name = "patient_id" type="hidden" value="{{ request()->segment(2) }}">


                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="model-field__control">
                                        <textarea id="motivation" name="motivation" type="text"
                                            class="form-field__textarea form-control"
                                            placeholder="Lý do đặt lịch" required></textarea>
                                        <div class="model-field__bar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="input-group date" id="date" name="date"
                                        data-target-input="nearest">
                                        <input type="date" name="date" class="form-control"
                                            data-target="#date" placeholder="Ngày hẹn" required />
                                        <div class="input-group-append" data-target="#date"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Thời gian bắt đầu -->
                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="input-group">
                                        <input type="time" name="start_time" id="start_time"
                                            class="form-control" title="Thời gian bắt đầu"
                                            required />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kết thúc thời gian bắt đầu -->

                        <!-- Thời gian kết thúc -->
                        <div class="row">
                            <div class="col-sm">
                                <div class="model-field">
                                    <div class="input-group">
                                        <input type="time" name="end_time" id="end_time" class="form-control"
                                            title="Thời gian kết thúc" required />
                                        <div class="input-group-append">
                                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Kết thúc thời gian kết thúc -->

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
