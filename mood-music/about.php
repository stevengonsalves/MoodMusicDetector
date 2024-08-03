<?php

    session_start();

    if(empty($_SESSION['isLogin'])){

        echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    }

    require_once 'include/header.php';

?>

    <!-- Skills Section Begin -->
    <section class="skills spad">
        <div class="container">
            <div class="section-title">
                <h2 class="text-center">Music Mood</h2>
    
            </div>
                <p>Music can boost the brain's production of the hormone dopamine. This increased dopamine production helps relieve feelings of anxiety and depression. Music is processed directly by the amygdala, which is the part of the brain involved in mood and emotions.</p>
       
        </div>
    </section>
    <!-- Skills Section End -->

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


    <!-- About Services Section Begin -->
    <section class="about-services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="about__services__item">
                        <div class="about__services__item__pic set-bg" data-setbg="img/services/as-1.jpg">
                            <div class="icon">
                                <img src="img/services/as-icon-1.png" alt="">
                            </div>
                        </div>
                        <div class="about__services__item__text">
                            <h4>Romantic</h4>
                            <p>Romantic music is a stylistic movement in Western Classical music associated with the period of the 19th century commonly referred to as the Romantic era .</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="about__services__item">
                        <div class="about__services__item__pic set-bg" data-setbg="img/services/as-2.jpg">
                            <div class="icon">
                                <img src="img/services/as-icon-2.png" alt="">
                            </div>
                        </div>
                        <div class="about__services__item__text">
                            <h4>Clubs and bar</h4>
                            <p>Clubbing and raves have historically referred to grass-roots organized, anti-establishment and unlicensed all night dance parties, typically featuring electronically produced dance music, such as techno, house, trance and drum and bass.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="about__services__item">
                        <div class="about__services__item__pic set-bg" data-setbg="img/services/as-3.jpg">
                            <div class="icon">
                                <img src="img/services/as-icon-3.png" alt="">
                            </div>
                        </div>
                        <div class="about__services__item__text">
                            <h4>Energetic</h4>
                            <p>A directive to a musician to perform the marked passage of music with energy or in a vigorous and energetic manne.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Services Section End -->

    <?php
         require_once 'include/footer.php';
    ?>