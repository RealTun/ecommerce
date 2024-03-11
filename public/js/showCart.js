// show and hide cart
$('.shopping-cart').mouseenter(function() {
    $('#cart-content').addClass('d-block');
});

$('.shopping-cart').mouseleave(function() {
    $('#cart-content').removeClass('d-block');
});
