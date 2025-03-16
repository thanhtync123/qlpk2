@extends('layout')
@section('title', 'Quản lý Bệnh nhân')
@section('header', 'Danh sách Bệnh nhân')

@section('content')
    <div class="card">
        <div class="card-body">
            <div id="patients_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="patients_table" class="table table-bordered table-striped dataTable dtr-inline"
                            role="grid" aria-describedby="patients_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="patients_table" rowspan="1"
                                        colspan="1" aria-sort="ascending">STT</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="patients_table" rowspan="1"
                                        colspan="1" aria-sort="ascending">Họ</th>
                                    <th class="sorting" tabindex="0" aria-controls="patients_table" rowspan="1"
                                        colspan="1">Tên</th>
                                    <th class="sorting" tabindex="0" aria-controls="patients_table" rowspan="1"
                                        colspan="1">Ngày sinh</th>
                                    <th class="sorting" tabindex="0" aria-controls="patients_table" rowspan="1"
                                        colspan="1">Số điện thoại</th>
                                    <th class="sorting" tabindex="0" aria-controls="patients_table" rowspan="1"
                                        colspan="1">Địa chỉ</th>
                                    <th rowspan="1" colspan="1" style="width: 200px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp

                                @foreach ($patients as $patient)
                                    <tr role="row" class="{{ $counter % 2 == 0 ? 'even' : 'odd' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            {{ $patient['lastname'] }}</td>
                                        <td>{{ $patient['name'] }}</td>
                                        <td>{{ \Carbon\Carbon::parse($patient['dob'])->format('d/m/Y') }}</td>
                                        <td>{{ $patient['phone'] }}</td>
                                        <td>{{ $patient['email'] }}</td>
                                        <td style="width: 200px; text-align: center;">
                                            <a href="{{ route('patients.show', [$patient]) }}" class="btn btn-profile btn-del"
                                                style="height: 41px; min-width: 50px; margin: 2px;">
                                                <i class="fas fa-external-link-alt"></i>
                                            </a>

                                            <a href="{{ route('patients.edit', [$patient]) }}" class="btn btn-app btn-modify"
                                                style="height: 41px; min-width: 50px; margin: 2px;">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST"
                                                onsubmit="return confirm('Bạn có chắc chắn muốn xóa bệnh nhân này không?');"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="height: 41px; min-width: 50px; margin: 2px;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="add-btn-container">
                <button type="button" class="btn-default add-btn" data-toggle="modal" data-target="#modal-add-patient">
                    <i class="fas fa-user-plus" style="font-size: 29px; margin-bottom: 8px; margin-left: 1px;"></i>
                </button>
            </div>
        </div>
    </div>
    @include('modals._add_patient')
@endsection
