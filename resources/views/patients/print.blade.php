<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông Tin Bệnh Nhân - In</title>

    <!-- Google Font & Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <style>
       body {
           font-family: 'Source Sans Pro', sans-serif;
           margin: 0 auto;
           padding: 20px;
           width: 80%;
           background: #fff;
       }

       .header {
           text-align: center;
           margin-bottom: 20px;
           border-bottom: 2px solid #000;
           padding-bottom: 10px;
       }

       .header img {
           max-width: 200px;
           height: auto;
           display: block;
           margin: 0 auto 10px auto;
       }

       .header h2 {
           margin: 0;
       }

       .table {
           width: 100%;
           border-collapse: collapse;
           margin-top: 20px;
       }

       .table th, .table td {
           border: 1px solid #ddd;
           padding: 10px;
           text-align: left;
       }

       .table th {
           background: #f2f2f2;
       }

       .info-section {
           margin-bottom: 20px;
       }

       .info-section h3 {
           border-bottom: 2px solid #000;
           padding-bottom: 5px;
       }

       @media print {
           body {
               width: 100%;
               margin: 0;
               padding: 0;
           }
       }
    </style>
</head>
<body>

<div class="header">
        <img src="{{ asset('images/anhlogo.jpg') }}" alt="Logo">
        <h2>Phòng Khám Y Khoa Thanh Quyền</h2>
        <p>Địa chỉ: Thị trấn Cái Nhum - Vĩnh Long | Điện thoại: 0123456789 | Email: [Email]</p>
    </div>

    <div class="info-section">
        <h3>Thông Tin Bệnh Nhân</h3>
        <table class="table">
            <tr><th>ID</th><td>{{ $patient->id }}</td></tr>
            <tr><th>Họ và Tên</th><td>{{ $patient->lastname }} {{ $patient->name }}</td></tr>
            <tr><th>Số BHXH</th><td>{{ $patient->noSSocial }}</td></tr>
            <tr><th>Ngày Sinh</th><td>{{ \Carbon\Carbon::parse($patient->dob)->format('d/m/Y') }}</td></tr>

            <tr><th>Số Điện Thoại</th><td>{{ $patient->phone }}</td></tr>
            <tr><th>Email</th><td>{{ $patient->email }}</td></tr>
        </table>
    </div>

    <div class="info-section">
        <h3>Thông Tin Y Tế</h3>
        <table class="table">
            <tr><th>Bệnh Lý</th><td>{{ $patient->diseases }}</td></tr>
            <tr><th>Dị Ứng</th><td>{{ $patient->allergies }}</td></tr>
            <tr><th>Tiền Sử Bệnh</th><td>{{ $patient->antecedents }}</td></tr>
            <tr><th>Ghi Chú</th><td>{{ $patient->comments }}</td></tr>
        </table>
    </div>

    <!-- Ảnh Scan -->
    <div class="info-section">
        <h3>Ảnh Scan</h3>
        @if($patient->scans->isEmpty())
            <p>Không có ảnh scan nào.</p>
        @else
            <table class="table">
                <tr><th>Mô tả</th><th>Ảnh</th></tr>
                @foreach($patient->scans as $scan)
                    <tr>
                        <td>{{ $scan->type }}</td>
                        <td>                                           
                                                    <img src="{{ asset($scan->scan_path) }}" 
                                                    alt="Scan Image" width="200">
                                                </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>

    <!-- Đơn thuốc -->
    <div class="info-section">
        <h3>Đơn Thuốc</h3>
        @if($patient->prescriptions->isEmpty())
            <p>Không có đơn thuốc nào.</p>
        @else
            <table class="table">
                <tr><th>Nội dung</th></tr>
                @foreach($patient->prescriptions as $prescription)
                    <tr>
                    <td>{!! nl2br(e($prescription['content'])) !!}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>


    <!-- Lịch hẹn -->
    <div class="info-section">
        <h3>Lịch Hẹn/Tái Khám</h3>
        @if($patient->appointments->isEmpty())
            <p>Không có lịch hẹn nào.</p>
        @else
            <table class="table">
                <tr><th>Ngày</th><th>Thời gian</th><th>Lý do</th></tr>
                @foreach($patient->appointments as $appointment)
                    <tr>
                    <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d/m/Y') }}</td>

                        <td>{{ $appointment->start_time }} - {{ $appointment->end_time }}</td>
                        <td>{{ $appointment->motivation }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>

    <script>
        window.addEventListener("load", function() {
            window.print();
        });
    </script>
</body>
</html>
