<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo - Bài viết đã được duyệt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            background: #fff;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .content {
            padding: 20px;
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Bài viết của bạn đã được duyệt</div>
        <div class="content">
            <p>Xin chào</p>
            <p>Bài viết "<b>{{ $title }}</b>" của bạn đã được duyệt và đăng tải thành công.</p>
            <p>Bạn có thể xem bài viết tại liên kết bên dưới:</p>

            <p style="text-align: center;">
                <a href="http://127.0.0.1:8000/training/posts/detail/{{$slug}}" class="btn">Xem bài viết</a>
            </p>
            <p>Cảm ơn bạn đã đóng góp nội dung!</p>
        </div>
        <div class="footer">
            © 2024 Website của bạn. Mọi quyền được bảo lưu.
        </div>
    </div>
</body>
</html>
