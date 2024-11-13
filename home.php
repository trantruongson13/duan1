
<style>
    
</style><div class="row mb ">
    <div class="boxtrai mr">
        <div class="row">
            <div class="banner">
                <div class="slideshow-container">
                    <!-- Full-width images with number and caption text -->
                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                        <img src="../img/1.png" style="height: 600px; width: 100%; padding: 10px;" alt="Slide 1">
                        <!-- <div class="text">KAMITO TA11</div> -->
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                        <img src="../img/2.png" style="height: 600px; width: 100%; padding: 10px;" alt="Slide 2">
                        <!-- <div class="text">KAMITO QH19</div> -->
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext"></div>
                        <img src="../img/3.jpg" style="height: 600px; width: 100%; padding: 10px;" alt="Slide 3">
                        <!-- <div class="text">KAMITO</div> -->
                    </div>
                </div>
                <br>
                <!-- Dots/Circles for navigation -->
                <div style="text-align: center;">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $hinh = $img_path . $img;

                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }

                echo '<div class="boxsp ' . $mr . '">';
                echo '    <div class="row img"><a href="' . $linksp . '"><img src="../' . $hinh . '" alt=""></a></div>';
                echo '    <p>' . $price . '</p>';
                echo '    <a href="' . $linksp . '">' . $name . '</a>';
                echo '</div>';

                $i += 1;
            }
            ?>


        </div>
    </div>
    <div class="boxphai">
        <?php
        include "boxright.php";
        ?>

    </div>
</div>