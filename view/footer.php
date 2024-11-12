<style>
    /* Footer styling */
.footer {
    background-color: #333; /* Nền màu tối cho footer */
    color: white;
    padding: 40px 20px;
    text-align: left;
    font-family: Arial, sans-serif;
}

/* Footer logo styling */
.footer h2 {
    font-size: 2.5em;
    color: white;
    font-weight: bold;
    margin-bottom: 20px;
}

/* Section titles */
.footer h5 {
    color: #4CAF50; /* Màu chữ của tiêu đề */
    margin-bottom: 20px;
    font-size: 1.2em;
}

/* Footer sections layout */
.footer .info_section {
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

/* Column styling for each section */
.footer .info_section .col-md-3 {
    flex: 1;
    padding: 0 20px;
}

/* Contact information styling */
.footer .info_contact div,
.footer .info_info,
.footer .info_insta,
.footer .info_form {
    margin-bottom: 20px;
}

.footer .info_contact p,
.footer .info_info p {
    font-size: 0.9em;
    color: #ddd; /* Màu chữ nhạt */
}

.footer .info_contact img,
.footer .info_insta .insta-box img,
.footer .social_box a img {
    filter: brightness(0) invert(1); /* Đổi màu icon sang trắng */
}

/* Instagram section styling */
.footer .info_insta .insta-box {
    width: 60px;
    height: 60px;
    overflow: hidden;
    border-radius: 8px;
    margin: 5px;
}

.footer .info_insta .row {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.footer .insta-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
}

.footer .insta-box:hover img {
    transform: scale(1.1); /* Phóng to ảnh khi rê chuột */
}

/* Newsletter form styling */
.footer .info_form input[type="email"] {
    padding: 10px;
    width: calc(100% - 120px);
    border-radius: 5px 0 0 5px;
    border: none;
    outline: none;
}

.footer .info_form button {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    transition: background-color 0.3s;
}

.footer .info_form button:hover {
    background-color: #45a049;
}

/* Social media icons */
.footer .social_box {
    display: flex;
    gap: 15px;
    margin-top: 15px;
}

.footer .social_box a {
    font-size: 1.5em;
    color: white;
    transition: color 0.3s;
}

.footer .social_box a:hover {
    color: #4CAF50;
}

/* Responsive design adjustments */
@media (max-width: 768px) {
    .footer .info_section {
        flex-direction: column;
        text-align: center;
    }

    .footer .info_section .col-md-3 {
        margin-bottom: 20px;
    }
    
    .footer .info_form input[type="email"] {
        width: 100%;
    }

    .footer .info_form button {
        width: 100%;
        margin-top: 10px;
    }

    .footer .social_box {
        justify-content: center;
        margin-top: 20px;
    }
}

</style>
<div class="row mb footer">
            <h1>
            <section class="info_section layout_padding2">
    <div class="container">
        <div class="info_logo">
            <h2>Cửa hàng ProMac</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="info_contact">
                   <a href=""><h5>Địa Chỉ :131-Trịnh Văn Bô</h5></a> 
                   <a href=""><h5>Liên hệ : 038805678</h5></a> 
                   <a href=""><h5>Gmail : Minhlvph49143@gamil.com</h5></a> 
               <a href=""><h5>Instagram : ProMac_shop</h5></a>
               <a href=""><h5>Facebook : ProMac_shop</h5></a>
                </div>
            </div>
           
           
            <!-- <div class="col-md-3">
                <div class="info_form">
                    <h5>Newsletter</h5>
                    <form action="">
                        <input type="email" placeholder="Enter your email">
                        <button>Subscribe</button>
                    </form>
                    <div class="social_box">
                        <a href=""><img src="images/fb.png" alt=""></a>
                        <a href=""><img src="images/twitter.png" alt=""></a>
                        <a href=""><img src="images/linkedin.png" alt=""></a>
                        <a href=""><img src="images/youtube.png" alt=""></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>

            </h1>
        </div>
    </div>
    <script>
        let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
    </script>
</body>

</html>