$(document).ready(function () {
    // check cart-empty
    function CheckItemCart(countItem) {
        if (countItem > 0) {
            $('.cart-empty').addClass('d-none');
            $('.cart-product').removeClass('d-none');
            $('#cart-content').css({
                'transform': 'none',
                'margin-top': '10px',
            });
        }
        else {
            $('.cart-empty').removeClass('d-none');
            $('.cart-product').addClass('d-none');
            $('#cart-content').css('transform', 'translateY(25%)');
        }
    }

    // add to cart
    function addToCart(cart) {
        let table = $('.cart-product .table tbody');
        table.empty();
        // let currentUrl = window.location.href;
        // let slug = currentUrl.match(/\/([^\/]+)\//)[1];
        cart.forEach(function (item) {
            let html = `<tr style="font-size: 14px;">
                    <td class="text-center td-image">${item['id']}</td>
                    <td class="text-start td-name">
                        <a href="">${item['name']}</a>
                        <small><br>Size ${item['size']}</small>
                    </td>
                    <td class="text-end td-qty">x${item['quantity']}</td>
                    <td class="text-end td-total">${item['price'] * 2 * item['quantity']}.000đ</td>
                    <td class="text-end td-remove">
                        <button type="button" title="Loại bỏ" class="cart-remove" data-id="${item['id']}" data-size="${item['size']}">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </td>
                </tr>`;
            table.append(html);
        });
    }


    function LoadCart(){
        $.ajax({
            url: `/showItemCart`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#count_product').text(response.length);         
                addToCart(response);
                CheckItemCart(response.length);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    }
    LoadCart();

    // show notification
    function ShowToast(message){
        $('.toast-body').text(message);
        var toastContainer = $('#toast-container');
        var toast = toastContainer.find('.toast');
        toastContainer.removeClass('d-none');
        toast.toast('show');

        setTimeout(function () {
            toastContainer.addClass('d-none');
            toast.toast('hide');
        }, 3500); // Delay for 2 seconds before hiding the toast 
    }

    // product to cart to controller using ajax
    $('.btn-cart').off('click').on('click', function () {
        // process cart
        let p_id = $('#product-id').val();
        let p_quantity = $('#product-quantity').val();
        let p_size = $('.radio-clicked').find('.square-radio--content').text();
        let data_p = {
            id: p_id,
            quantity: p_quantity,
            size: p_size,
        };
    
        $.ajax({
            url: `/addToCart`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                data_p: JSON.stringify(data_p),
            },
            success: function (response) {
                $('#count_product').text(response.length);         
                addToCart(response);
                CheckItemCart(response.length);
                // $('.toast-body').text('Thêm vào giỏ hàng thành công!');
                ShowToast('Thêm vào giỏ hàng thành công!');
            },
            error: function (error) {
                console.log(error.responseText);
                // $('.toast-body').text('Đã xảy ra lỗi!');
                ShowToast('Đã xảy ra lỗi!');
            }
        });
    });

    $(document).off('click').on('click', '.cart-remove', function() {
        let id_p = $(this).attr('data-id');
        let size = $(this).attr('data-size');
        $.ajax({
            url: `/deleteItemCart`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id_p,
                size: size,
            },
            success: function (response) {
                LoadCart();
                // ShowToast(response);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    });
});