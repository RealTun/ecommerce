<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Hoá dơn bán hàng</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1>Cảm ơn bạn!</h1>

    <p>Thân gửi {{Auth::user()->name}},</p>

    <p>Cảm ơn bạn đã đặt hàng. Chúng tôi rất vui mừng khi có bạn là khách hàng của chúng tôi.</p>

    <p>Dưới đây là thông tin đặt hàng của bạn:</p>

    <table>
        <thead>
            <th>STT</th>
            <th>Sản phẩm</th>
            <th>Kích cỡ</th>
            <th>Số lượng</th>
        </thead>
        @php
            $count = 1;
        @endphp
        <tbody>
            @foreach ($data as $item)
                <tr style="font-size: 14px;">
                    <td>{{ $count++ }}</td>
                    <td>
                        <strong href="">{{ $item->name }}</strong>
                    </td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->quantity }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ thêm, xin vui lòng liên hệ với chúng tôi.</p>
    <p>Thân ái,</p>
    <p>Group 4 - CloudComputing</p>
</body>

</html>
