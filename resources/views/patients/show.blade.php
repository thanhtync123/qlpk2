@extends('layout')
@section('title', 'Quản lý bệnh nhân')
@section('header', 'Hồ sơ bệnh nhân')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <!-- Hộp thông tin phi y tế -->
             <button>
            <a href="{{ route('patients.print', [$patient]) }}"
                                                                    target="_blank" class="btn btn-default"><i
                                                                        class="fa fa-print"></i>
                                                                    In</a>
                                                                    </button>
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Thông tin bệnh nhân</h3>


                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="card-body">
                        <form class="needs-validation" method="post" action="{{ route('patients.update', [$patient]) }}"
                            novalidate>
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label for="lastname">Họ</label>
                                <input id="lastname" name="lastname" type="text" class="form-control"
                                    value="{{ old('lastname', $patient->lastname) }}" />
                            </div>
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder=" "
                                    value="{{ old('name', $patient->name) }}" />
                            </div>

                            <div class="form-group">
                                <label for="noSSocial">Số an sinh xã hội</label>
                                <input id="noSSocial" name="noSSocial" type="text" class=" form-control"
                                    value="{{ old('noSSocial', $patient->noSSocial) }}" />
                            </div>

                            <div class="form-group">
                                <label for="dob">Ngày sinh</label>
                                <input type="date" name="dob" id="dob2" class="form-control"
                                    value="{{ old('dob', $patient->dob) }}" required />
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control"
                                    value="{{ old('email', $patient->email) }}" />
                            </div>


                            <div class="form-group">
                                <label for="phone">Điện thoại</label>
                                <input id="phone" name="phone" type="text" class="form-control"
                                    value="{{ old('phone', $patient->phone) }}" />
                            </div>

                            <div class="form-group">

                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /. Hộp thông tin phi y tế -->

            <!-- Hộp lịch hẹn -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Lịch hẹn</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body" style="display: block;">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="appointment_table"
                                    class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Ngày</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Thời gian bắt đầu</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Thời gian kết thúc</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Lý do</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($appointments as $appointment)
                                            <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                            <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ \Carbon\Carbon::parse($appointment['date'])->format('d/m/Y') }}
                                            </td>

                                            <td>{{ str_replace(['AM', 'PM'], ['sáng', 'tối'], \Carbon\Carbon::parse($appointment['start_time'])->format('h:i A')) }}</td>
                                            <td>{{ str_replace(['AM', 'PM'], ['sáng', 'tối'], \Carbon\Carbon::parse($appointment['end_time'])->format('h:i A')) }}</td>


                                                <td class="truncate">{{ $appointment['motivation'] }}</td>
                                                <td
                                                    style="padding-right: -3.25rem;border-right-width: 0px;height: 37px;width: 95.833px;">
                                                    Sẽ cập nhật sau
                                                    {{-- <a href="{{ route('scans.show', [$appointment->id]) }}"
                                            class="btn btn-profile btn-del"
                                            style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;"
                                            title="preview"><i class="fas fa-external-link-alt"></i></a>

                                        <a href="{{ route('scans.download', $appointment->id) }}"
                                            class="btn btn-app btn-modify"
                                            style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;">
                                            <i class="fas fa-download"></i>
                                        </a> --}}

                                                </td>
                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="  btn-success add-btn" data-toggle="modal"
                                    data-target="#modal_add_appointment">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. Hộp lịch hẹn -->

            <!-- Hộp Thư giới thiệu y tế -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Thư giới thiệu</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div id="infoMedical" class="card-body" style="display: block;">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="orientationLtrs_table"
                                    class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Ngày
                                            </th>


                                            <th rowspan="1" colspan="1">
                                                Nội dung
                                            </th>
                                            <th rowspan="1" colspan="1">
                                                Hành động
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($orientationLtrs as $ltr)
                                            <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $ltr['updated_at'] }}</td>
                                                <td class="truncate">{{ $ltr['content'] }}</td>
                                                <td>
                                                    <a href="{{ route('orientationLtr.show', [$ltr->id]) }}"
                                                        target="_blank" class="btn btn-default"><i
                                                            class="fa fa-print"></i>
                                                        In</a>
                                                </td>
                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="  btn-success add-btn" data-toggle="modal"
                                    data-target="#modal-add-orientationLtr">
                                    +
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- /. Hộp Thư giới thiệu y tế -->
        </div>
        <div class="col-md-6">
            <!-- Hộp thông tin y tế -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Thông tin y tế của bệnh nhân</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div id="infoMedical" class="card-body" style="display: block;">
                    <div class="card-body">
                        <form class="needs-validation" method="post"
                            action="{{ route('patients.update', [$patient]) }}" novalidate>
                            @csrf
                            @method('PUT')
                            <input id="name" name="name" type="text" class=" form-field__input"
                                placeholder=" " value="{{ old('name', $patient->name) }}" hidden  />
                            <input id="lastname" name="lastname" type="text" class=" form-field__input"
                                value="{{ old('lastname', $patient->lastname) }}" hidden />
                            <input id="noSSocial" name="noSSocial" type="text" class=" form-field__input"
                                value="{{ old('noSSocial', $patient->noSSocial) }}" hidden />
                            <input type="date" name="dob" required value="{{ old('dob', $patient->dob) }}"
                                hidden />
                            <input id="email" name="email" type="text" class=" form-field__input"
                                value="{{ old('email', $patient->email) }}"hidden />
                            <input id="phone" name="phone" type="text" class=" form-field__input"
                                value="{{ old('phone', $patient->phone) }}" hidden />

                            <div class="form-group">
                                <label for="diseases">Bệnh</label>
                                <input id="diseases" name="diseases" type="text" class=" form-control   "
                                    placeholder="Bệnh1,Bệnh2" value="{{ old('diseases', $patient->diseases) }}" />
                            </div>
                            <div class="form-group">
                                <label for="allergies">Dị ứng</label>
                                <input id="allergies" name="allergies" type="text" class=" form-control "
                                    placeholder="Dị ứng 1,dị ứng 2"
                                    value="{{ old('allergies', $patient->allergies) }}" />
                            </div>
                            <div class="form-group">
                                <label for="antecedents">Tiền sử</label>
                                <textarea name="antecedents" id="antecedents" cols="30" rows="5" class="form-control">{{ old('antecedents', $patient->antecedents) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="comments">Ghi chú</label>
                                <textarea name="comments" id="comments" cols="30" rows="5" class="form-control">{{ old('comments', $patient->comments) }}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                        <hr>

                    </div>

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /. Hộp thông tin y tế -->

            <!-- Hộp đơn thuốc -->
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Đơn thuốc</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="prescriptions_table"
                                    class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Ngày</th>


                                            <th rowspan="1" colspan="1">
                                                <!-- dòng kê đơn -->
                                                 Đơn thuốc

                                            </th>
                                            <th rowspan="1" colspan="1">
                                                <!-- dòng kê đơn -->
                                                Hành động
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($prescriptions as $prescription)
                                            <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                
                                                {{ \Carbon\Carbon::parse($prescription['updated_at'])->format('d/m/Y') }}</td>
                                                 
                                               
                                                <td>{!! nl2br(e($prescription['content'])) !!}</td>


                                                <td>
                                                    <a href="{{ route('prescriptions.print', [$prescription->id]) }}"
                                                        target="_blank" class="btn btn-default"><i
                                                            class="fa fa-print"></i>
                                                        In</a>
                                                </td>
                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    </tbody>

                                </table>
                                <button type="button" class="  btn-success add-btn" data-toggle="modal"
                                    data-target="#modal_add_prescription">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /. Hộp đơn thuốc -->

            <!-- Hộp kết quả chụp chiếu -->
            <div class="card card-secondary ">
                <div class="card-header">
                    <h3 class="card-title">Kết quả chụp chiếu</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Thu gọn">
                            <i class="fas fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="scans_info" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="scans_info_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="scans_info"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Ngày</th>
                                            <th rowspan="1" colspan="1">Loại</th>
                                            <th rowspan="1" colspan="1">Hình ảnh</th>
                                            <th rowspan="1" colspan="1">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp
                                        @foreach ($scans as $scan)
                                            <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                 {{ \Carbon\Carbon::parse($scan['updated_at'])->format('d/m/Y') }}    
                                                </td>
                                                <td>{{ $scan['type'] }}</td>
                                                <td>
                                                    <img src="{{ asset($scan->scan_path) }}" 
                                                    alt="Scan Image" width="200">
                                                </td>
                                                <td
                                                    style="padding-right: -3.25rem;border-right-width: 0px;height: 37px;width: 95.833px;">
                                                                      
                                                    @php
                                                        $arr = explode('/', $scan->scan_path);
                                                        $name = end($arr);
                                                        $path = '/images/' . $name;
                                                    @endphp
                                                    <a href={{ $path }}
                                                        onclick="window.open(this.href, '_blank', 'left=50%,top=50%,width=500,height=500,toolbar=1,resizable=1'); return false;"
                                                        class="btn btn-profile btn-del"
                                                        style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;"
                                                        title="preview"><i class="fas fa-external-link-alt"></i>
                                                        {{-- <img src="{{ url($path) }}" alt="Image" /> --}}
                                                    </a>


                                                    <a href="{{ route('scans.download', $scan->id) }}"
                                                        class="btn btn-app btn-modify"
                                                        style="height: 41px;min-width: 46px;margin: 0px;padding: 0px;">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php
                                                $counter++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <button type="button" class="  btn-success add-btn" data-toggle="modal"
                                    data-target="#modal-scan">
                                    +
                                </button>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <!-- /. Hộp kết quả chụp chiếu -->
        </div>

    </div>

    @include('modals._add_scan', ['patient' => $patient])
    @include('modals._add_orientationLtr', ['patient' => $patient])
    @include('modals._add_appointment')
    @include('modals._add_prescription', ['patient' => $patient])
@endsection