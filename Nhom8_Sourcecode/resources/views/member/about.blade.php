@include('member/includes/header')
<style type="text/css">
  #layout {
    margin-left: 5%;
    margin-right: 5%;
  }

  main {
    background-color: rgb(235, 245, 251); /* Màu nền dịu nhẹ hơn */
    line-height: 1.8em;
    color: #333; /* Màu chữ tối hơn để dễ đọc */
    padding: 1em;
    border: double 4px rgba(100, 150, 200, 0.8); /* Màu viền hài hòa hơn */
    border-radius: 25px;
    margin-top: 20px;
    text-align: justify;
  }

  .container1 {
    display: flex;
    height: 80vh;
  }

  .left-section {
    flex: 5;
    background-color: rgb(240, 240, 240); /* Màu nền trung tính nhẹ hơn */
    padding: 20px;
  }

  .hethong {
    margin-left: 90px;
    color: #444; /* Màu chữ đồng nhất với màu chữ chính */
    display: inline-block;
  }

  .imght {
    margin-bottom: -45px;
    margin-left: 20px;
  }

  .left-section img {
    max-width: 100%;
    height: auto;
  }

  .right-section {
    flex: 7;
    background-color: rgb(220, 235, 245); /* Màu nền dịu mắt và đồng bộ hơn */
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin-right: 10px;
  }

  iframe {
    width: 90%;
    height: 90%;
    border: none;
  }
</style>

  <div id="layout">
    <main>
      <p><span style="text-align:justify;"><img data-thumb="original" original-height="709" original-width="540"
            src="https://mediaelly.sgp1.digitaloceanspaces.com/uploads/2020/12/21152834/kinh-HQ-2.jpg"
            style="margin-right: 10px; margin-left: 10px; float: left; border-width: 0px; border-style: solid; width: 300px; height: 350px;" /></span>Chào
        mừng đến với cửa hàng <span style="color:rgb(118, 166, 194);"><em><strong>kính mắt VENUS - nơi khám phá thế giới một cách
              đẳng cấp</strong></em> <em><strong>qua những cửa sổ mà chúng tôi mang lại</strong></em>.</span> VENUS, từ
        ngôn ngữ Phần Lan, là biểu tượng của sự mở cửa ra thế giới và đón nhận ánh sáng. Chúng tôi tự hào giới thiệu một
        thương hiệu không chỉ mang đến những sản phẩm chất lượng cao về kính mắt và phụ kiện mắt, mà còn là nguồn cảm
        hứng cho phong cách sống đẳng cấp và đầy cá tính.</p>
      <p ><strong style="color:rgb(118, 166, 194);">VENUS</strong> không chỉ xem kính mắt là một công cụ để cải thiện tầm nhìn, mà còn coi đó là một biểu
        tượng thời trang và phản ánh cái tôi độc đáo của từng người.&nbsp;Sự chất lượng và độ tin cậy luôn đứng hàng đầu
        trong mọi sản phẩm kính mắt của <strong style="color: rgb(118, 166, 194);">VENUS</strong>. VENUS luôn&nbsp;chọn lựa những nhà sản xuất uy tín và
        sử dụng các vật liệu chất lượng cao.&nbsp;</p>
      <p>Với một bộ sưu tập đa dạng và phong phú, VENUS tự hào mang đến cho bạn nhiều lựa chọn về kiểu dáng, màu sắc và
        thiết kế. Từ những kiểu kính mắt cổ điển và thanh lịch đến những mẫu kính thời trang và hiện đại;&nbsp;từ kính
        mắt cận, kính mát, kính áp tròng, đến kính bảo hộ, tất cả đều được cung cấp với chất lượng và hiệu suất tối ưu.1787
        Đội ngũ chuyên gia kính mắt của VENUS sẽ luôn sẵn sàng tư vấn và hỗ trợ bạn trong quá trình chọn lựa sản phẩm,
        đảm bảo bạn tìm thấy chiếc kính mắt phù hợp nhất. VENUS hiểu rằng mỗi người có những nhu cầu riêng và VENUS
        cam kết đáp ứng mọi yêu cầu của bạn với sự tận tâm và chuyên nghiệp.</p>
      <p>Đặc biệt, <strong style="color:rgb(118, 166, 194);">VENUS</strong> luôn cập nhật xu hướng mới nhất trong ngành kính mắt để mang đến cho bạn
        những sản phẩm độc đáo và thú vị. VENUS không ngừng nỗ lực nghiên cứu và áp dụng công nghệ tiên tiến vào quy
        trình sản xuất, từ việc lựa chọn vật liệu đến công nghệ gia công, nhằm đảm bảo rằng bạn luôn được trải nghiệm
        những sản phẩm tốt nhất và đáp ứng xu hướng thịnh hành.</p>
      <p><strong style="color: rgb(118, 166, 194)7;">VENUS</strong> hứa hẹn sẽ giúp bạn mở ra cửa sổ đến một thế giới kính mắt đa dạng, nơi đảm bảo sự hoàn
        hảo và sự thoải mái tuyệt đối cho đôi mắt của bạn. Hãy để VENUS&nbsp;trở thành đối tác tin cậy của bạn trong
        việc chăm sóc và làm đẹp cho đôi mắt với&nbsp;cam kết mang đến cho bạn những&nbsp;trải nghiệm mua sắm tuyệt vời
        và dịch vụ khách hàng tận tâm!</p>
    </main>

    <!-- Start Vutrutruyenthong -->
    <div class="we-help-section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7 mb-5 mb-lg-0">
            <div class="imgs-grid">
              <div class="grid grid-1"><a href="https://www.instagram.com/kinhmat.venus/" target="_blank"><img
                    src="Trangchinh/images/ig2.jpg" alt="Untree.co"></a></div>
              <div class="grid grid-3"><a href="https://www.facebook.com/share/15i1evYEjf/?mibextid=wwXIfr"
                  target="_blank"><img src="Trangchinh/images/fb1.jpg" alt="Untree.co"></a></div>
            </div>
          </div>
          <div class="col-lg-5 ps-lg-5">
            <h2 class="section-title mb-4">Vũ trụ truyền thông</h2>
            <p>Kính mắt VENUS chắc không còn quá xa lạ với giới trẻ nữa. Đây là kênh thông tin mua sắm và
              giải
              trí dành cho giới trẻ, là “món ăn tinh thần” hằng ngày không thể thiếu của mỗi người trẻ.
            </p>
            <p>Kính mắt VENUS, thành lập từ năm 2020, đã trở thành lựa chọn không thể thiếu đối với giới
              trẻ
              sau hơn ba năm phát triển.
              Với việc cập nhật nhanh chóng về xu hướng thời trang và sự hiểu biết sâu sắc về sở thích của
              khán giả thông qua các
              mạng xã hội như Facebook, TikTok và Instagram, kính mắt VENUS vẫn duy trì vị trí hàng đầu
              cho
              những người
              muốn trải nghiệm nội dung giải trí đặc sắc và đầy đủ thông tin cần thiết. Cho dù bạn tìm
              kiếm
              những bài viết hấp dẫn hay những video cuốn hút,
              kính mắt VENUS đảm bảo sự kết hợp hoàn hảo giữa giải trí và những thông tin quan trọng.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- End Vutrutruyenthong -->
<!--start maps-->
    <div class="container1">
      <div class="left-section">
        <img class="imght" src="Trangchinh/images/Vector-3-1.svg">
        <h2 class="hethong">Hệ thống cửa hàng</h2>

      </div>
      <div class="right-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6559019192687!2d105.82804937430542!3d21.006426088547123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac7e35fe12e7%3A0x2b5a883e46940ddd!2zTmcuIDEgUC4gQ2jDuWEgQuG7mWMsIFRydW5nIExp4buHdCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1703848610304!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
<!--End maps-->
<br>

@include('member/includes/footer')