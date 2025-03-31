<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý phần thưởng</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Quản lý phần thưởng</h1>
        <a href="{{ route('rewards.create') }}" class="btn btn-primary mb-3">Thêm phần thưởng</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Màu sắc</th>
                    <th>Xác suất</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rewards as $reward)
                    <tr>
                        <td>{{ $reward->name }}</td>
                        <td>
                            <div style="width: 50px; height: 20px; background-color: {{ $reward->color }};"></div>
                        </td>
                        <td>{{ $reward->probability }}</td>
                        <td>
                            <a href="{{ route('rewards.edit', $reward) }}" class="btn btn-sm btn-warning">Sửa</a>
                            <form action="{{ route('rewards.destroy', $reward) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>