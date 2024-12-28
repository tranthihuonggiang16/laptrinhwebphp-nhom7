@include('member/includes/header')
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            /* background-color: #87cac3; */
            margin: 10px;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }

        .promotion {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .promotion h2 {
            color: #a55457;
            margin-top: 0;
        }

        .promotion p {
            color: #666666;
        }

        .promotion-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 20px;
        }

        .promotion-images img {
            width: 300px;
            height: auto;
            margin: 10px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .promotion-images img.show {
            opacity: 1;
        }
    </style>

    <div class="promotion" >
        <h2>Khuyến mãi hấp dẫn!</h2>
        <p>Xin chào các khách hàng yêu quý của VENUS, chúng mình xin gửi đến các bạn các chương trình khuyến mãi đặc
            biệt:</p>
        <ul>
            <li>Giảm giá 20% cho tất cả các mẫu kính mắt trong cửa hàng.</li>
            <li>Tặng mã khuyến mãi giảm&nbsp;10% &nbsp;cho mỗi đơn hàng trị giá trên 1.000.000 đồng.</li>
            <li>Thu gọng kính cũ, đổi gọng kính mới.</li>
        </ul>
        <p>Hãy đến ngay cửa hàng VENUS để tận hưởng ưu đãi này. Chương trình kéo dài từ ngày 15/12 đến 20/1.</p>
        <p>Ngoài ra, VENUS cũng cung cấp các mã khuyến mãi cho các quý khách hàng mua sắm ngay tại website.</p>
        <div class="promotion-images"><img data-thumb="original" original-height="540" original-width="540"
                src="https://scontent.fhan19-1.fna.fbcdn.net/v/t39.30808-6/470883917_1105559637708291_7855376165613837033_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEMyqaA0qgNaiZZjD0DSjDB9uRZno1wtT325FmejXC1PbWt3qmeAkx8rjb_y_fz6PCJd1SPpcYL2UdRUlPGiZcl&_nc_ohc=gnHbxYiw07cQ7kNvgG26Pv9&_nc_oc=Adi1lyJ7RtecgD_v-t_KNB_eb9SbYSQFl9XIGngQWV4zvs_AotcdH4-GfqKR-vEOSK4&_nc_zt=23&_nc_ht=scontent.fhan19-1.fna&_nc_gid=AHFB_wO_vSHxnhlnqxcFbfc&oh=00_AYCvHS1J5HDAIRAnb2r6VgFj4nIgeTTbUZjrx0XnIb3OOw&oe=676C62C1"
                style="width: 300px; height: 300px;" /> <img data-thumb="original" original-height="1080"
                original-width="" src="https://scontent.fhan19-1.fna.fbcdn.net/v/t39.30808-6/470989360_1105563507707904_8091406524636073522_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeEw7hIpP7kjuQGUfPYl88xQJZ5iI0kwlnAlnmIjSTCWcF1AbostM-fig7El6zf8WwHQTpYMxSU4YzWu1yLyzM2J&_nc_ohc=M_UKMO9LwTEQ7kNvgH-BcW2&_nc_oc=AdhcV1MtG48H0O8YJ2kSfs-PBKIM2TZABrpM6iNzrUUfCkmxdDSThOhF0Ms87AyzY04&_nc_zt=23&_nc_ht=scontent.fhan19-1.fna&_nc_gid=AJhOs6yL1e4zeCo5F_d3lzX&oh=00_AYALVW7bEAPM7emFErvOPA1TX0Upa4P8uYpYcM8nt1tTaQ&oe=676C537E" /> <img
                data-thumb="original" original-height="540" original-width="540"
                src="https://scontent.fhan19-1.fna.fbcdn.net/v/t39.30808-6/471155175_1105559671041621_4296564542621534475_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=833d8c&_nc_eui2=AeFZYlrWBYLcj36GShrTQq8HZQcwWPV9xrxlBzBY9X3GvILsXzITIFMnMDq2fLUlSCFX85ZlfODPJmwXblx6-CrP&_nc_ohc=2h4uH-qMM1UQ7kNvgFjbt2O&_nc_oc=AdjCdeCbPp44Fxf3yfteoDf2kxlaILa6_oT7gcxVlD96VTfGN4x8h-H1XPnoffNuWz4&_nc_zt=23&_nc_ht=scontent.fhan19-1.fna&_nc_gid=AmGxLb3wm2BU4cZbKdpE4cI&oh=00_AYC0XdhwNSgliiPkjng8O14SXkst3NI2FZjOhSiAqyKHpQ&oe=676C528E"
                style="width: 300px; height: 300px;" /></div>
        <p>Các bạn nhớ&nbsp;thường xuyên ghé website nhé, VENUS sẽ cập nhật thật nhiều ưu đãi cho các bạn trong tương
            lai.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.promotion-images img').each(function (index) {
                $(this).delay(300 * index).animate({ opacity: 1 }, 500);
            });
        });
    </script>
    @include('member/includes/footer')