<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Hoá dơn bán hàng</title>
</head>
<body>
    <h1>Cảm ơn bạn!</h1>
    
    <p>Thân gửi Tuấn,</p>
    
    <p>Cảm ơn bạn đã đặt hàng. Chúng tôi rất vui mừng khi có bạn là khách hàng của chúng tôi.</p>
    
    <p>Dưới đây là thông tin đặt hàng của bạn:</p>
    
    <table class="table">
        @foreach ($data as $item)
        <tr style="font-size: 14px;">
            <td class="text-center td-image d-none"></td>
            <td class="text-start td-name">
                <strong href="">{{$item->name}}</strong>
                <small><br>{{$item->size}}</small>
            </td>
            <td class="text-end td-qty">{{$item->size}}</td>
        </tr>;
        @endforeach       
    </table>
    
    <p>Nếu bạn có bất kỳ câu hỏi nào hoặc cần hỗ trợ thêm, xin vui lòng liên hệ với chúng tôi.</p>  
    <p>Thân ái,</p>
    <p>Group 4 - CloudComputing</p>
</body>
</html>