<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký thành công</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #fff;
            padding: 40px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }

        .container img {
            width: 80px;
            margin-bottom: 15px;
        }

        .container h1 {
            font-size: 26px;
            color: #333;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 16px;
            color: #666;
            line-height: 1.5;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            background-color: #ff7b00;
            color: white;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #e06b00;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="container">
        <img src="https://cdn-icons-png.flaticon.com/512/1486/1486482.png" alt="Success">
        <h1>Chào mừng, {{$user->first_name}} {{$user->last_name}} 🎉</h1>
        <p>Bạn đã đăng ký tài khoản thành công! Hãy khám phá và trải nghiệm những tính năng tuyệt vời ngay bây giờ.</p>
        <a href="http://127.0.0.1:8000/" class="btn">Bắt đầu ngay</a>
        <div class="footer">Nếu có bất kỳ thắc mắc nào, hãy liên hệ với đội ngũ hỗ trợ của chúng tôi.</div>
    </div>

</body>
</html>
