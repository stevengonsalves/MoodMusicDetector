<?php

    session_start();

    if(empty($_SESSION['isLogin'])){

        echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    }

    require_once 'include/header.php';

?>

    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="img/hero-bg.png">
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <h1>Feel the Music By Mood</h1>
                    </div>
                </div>
            </div>
        
        <div class="linear__icon">
            <i class="fa fa-angle-double-down"></i>
        </div>
    </section>
    <!-- Hero Section End -->
        <!-- About Section Begin -->
        <section class="about about--page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__text">
                        <div class="section-title">
                            <h2 class="text-center">He heard something that he knew to be music</h2>
                        </div>
                        <p>Music is generally defined as the art of arranging sound to create some combination of form, harmony, melody, rhythm, or otherwise expressive content.Definitions of music vary depending on culture,though it is an aspect of all human societies and a cultural universal. While scholars agree that music is defined by a few specific elements, there is no consensus on their precise definitions.The creation of music is commonly divided into musical composition, musical improvisation, and musical performance,though the topic itself extends into academic disciplines, criticism, philosophy, and psychology. Music may be performed or improvised using a vast range of instruments, including the human voice.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->


    <!-- Services Section Begin -->
    <section class="services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="services__left set-bg" data-setbg="img/services/service-left.jpg">
                        <a href="https://www.youtube.com/watch?v=JGwWNGJdvx8" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="row services__list">
                        <div class="col-lg-6 p-0 order-lg-1 col-md-6 order-md-1">
                            <div class="service__item deep-bg">
                                <img src="img/services/service-1.png" alt="">
                                <h4>Romantic</h4>
                                <p>Romantic music is a stylistic movement in Western Classical music associated with the period of the 19th century commonly referred to as the Romantic era .</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-2 col-md-6 order-md-2">
                            <div class="service__item">
                                <img src="img/services/service-2.png" alt="">
                                <h4>Clubs and bar</h4>
                                <p>Clubbing and raves have historically referred to grass-roots organized, anti-establishment and unlicensed all night dance parties, typically featuring electronically produced dance music, such as techno, house, trance and drum and bass..</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-4 col-md-6 order-md-4">
                            <div class="service__item deep-bg">
                                <img src="img/services/service-4.png" alt="">
                                <h4>Sad</h4>
                                <p>People tend to listen to sad music more often when they are in emotional distress or feeling lonely, or when they are in introspective moods.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-3 col-md-6 order-md-3">
                            <div class="service__item">
                                <img src="img/services/service-3.png" alt="">
                                <h4>Energetic</h4>
                                <p>A directive to a musician to perform the marked passage of music with energy or in a vigorous and energetic manne.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

<?php
    require_once 'include/footer.php';
?>