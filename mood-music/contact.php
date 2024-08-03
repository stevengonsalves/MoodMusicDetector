<?php

    session_start();

    if(empty($_SESSION['isLogin'])){

        echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    }

    require_once 'include/header.php';

?>

<!-- Contact Section Begin -->
<section class="contact spad">
        <div class="container">
            <div class="row justify-content-center"> <!-- Center align content -->
                <div class="col-lg-4">
                    <div class="contact__address "> <!-- Add card and shadow -->
                        <div class="section-title">
                            <h2>Contact info</h2>
                        </div>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker"></i>
                                <h5>Address</h5>
                                <p>abc def </p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <h5>Phone Number</h5>
                                <span>91+000000000<br>
                                </br>91+000000000</span>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <h5>Email</h5>
                                <p>xyz@gamail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <?php
       require_once 'include/footer.php';

       ?>