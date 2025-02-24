<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .support {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔐 Yêu cầu đặt lại mật khẩu</h2>
        <p>Xin chào <strong>{{$user->first_name}} {{ $user->last_name}}</strong>,</p>
        <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn. Nếu bạn đã thực hiện yêu cầu này, vui lòng nhấn vào nút bên dưới để đặt lại mật khẩu:</p>
        
        <a href="{{$link}}" class="btn">Đặt lại mật khẩu</a>
        
        <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này. Tài khoản của bạn vẫn an toàn và không có thay đổi nào được thực hiện.</p>
        
        <p>Nếu bạn gặp bất kỳ khó khăn nào khi đặt lại mật khẩu hoặc có câu hỏi liên quan, vui lòng liên hệ với bộ phận hỗ trợ của chúng tôi.</p>
        
        <p class="footer">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</p>
        <p class="footer"><strong>Trân trọng,<br>Đội ngũ hỗ trợ</strong></p>
    </div>
</body>
</html>
