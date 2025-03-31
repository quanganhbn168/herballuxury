<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa phần thưởng</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sửa phần thưởng</h1>
        <form action="{{ route('rewards.update', $reward) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Tên phần thưởng</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $reward->name }}" required>
            </div>
            <div class="form-group">
                <label for="color">Màu sắc</label>
                <input type="color" name="color" id="color" class="form-control" value="{{ $reward->color }}" required>
            </div>
            <div class="form-group">
                <label for="probability">Xác suất</label>
                <input type="number" name="probability" id="probability" class="form-control" min="1" value="{{ $reward->probability }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>