<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
echo '<style>
@keyframes blink {
    0% {opacity: 1;}
    50% {opacity: 0;}
    100% {opacity: 1;}
}
footer {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
    display: flex;
    flex-wrap: wrap;
}
footer > * {
    flex: 1;
}
footer h3 {
    font-size: 24px;
    margin-bottom: 10px;
}
footer p {
    margin: 0;
}
footer a {
    color: white;
    transition: color 0.5s;
}
footer a:hover {
    color: #ff0;
}
footer button {
    animation: blink 1s infinite;
}
footer img {
    width: 50px;
    height: 50px;
    margin: 10px;
    transition: transform 0.5s;
}
footer img:hover {
    transform: scale(1.2);
}
footer .support, footer .social-media, footer .company-info {
    text-align: left;
}
footer .social-media a {
    font-size: 18px;
}

</style>';

echo '<footer>';
echo '<div class="social-media">';
echo '<h4>Mạng Xã Hội</h4>';
echo '<ul>';
echo '<li><a href="#"><i class="fa fa-facebook-official"></i> Facebook</a></li>';
echo '<li><a href="#"><i class="fa fa-commenting"></i> Zalo</a></li>';
echo '<li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>';
echo '</ul>';
echo '</div>';
echo '<div class="company-info">';
echo '<h3>SPORT SHOES</h3>';
echo '<p>Địa chỉ: 55 Giải Phóng Đồng Tâm, Giáp Bát, Thanh X, Hà Nội, Việt Nam</p>';
echo '<p>Điện thoại: 0985652423</p>';
echo '<p>Email: info@sportshoes.com</p>';
echo '</div>';
echo '<div class="support">';
echo '<h4>Hỗ Trợ Khách Hàng</h4>';
echo '<ul>';
echo '<li><a href="#">Làm thế nào để đặt hàng?</a></li>';
echo '<li><a href="#">Phương thức thanh toán nào được chấp nhận?</a></li>';
echo '<li><a href="#">Tôi có thể theo dõi đơn hàng của tôi như thế nào?</a></li>';
echo '</ul>';
echo '<button>Trò Chuyện Ngay</button>';
echo '</div>';
?>
</body>
</html>