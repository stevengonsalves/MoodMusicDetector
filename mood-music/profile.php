<?php

    session_start();

    if(empty($_SESSION['isLogin'])){

        echo "<script>alert('Kindly login to proceed');location.href='index.php'</script>";
    }

    require_once 'include/header.php';

?>
<div class="text-center">
    <div class="artist-profiles">
            <!-- Artist 1 -->
            <div class="profile artist1">
                <img src="arijith.jpg" alt="Artist 1 Name">
                <h1>Arijith Singh</h1>
                <p>Arijit Singh (born 25 April 1987) is an Indian playback singer and music composer.The recipient of several accolades including a National Film Award and seven Filmfare Awards, he has recorded songs in several Indian languages.</p>
            </div>

            <!-- Artist 2 -->
            <div class="profile artist2">
                <img src="sonu.jpeg" alt="Artist 2 Name">
                <h1>Sonu Nigam</h1>
                <p>Sonu Nigam (born 30 July 1973) is an Indian playback singer, music director, dubbing artist and actor.</p>
            </div>

            <!-- Artist 3 -->
            <div class="profile artist2">
                <img src="armaan.jpeg" alt="Artist 2 Name">
                <h1>Armaan Malik</h1>
                <p>Armaan Malik (born 22 July 1995) is an Indian singer, songwriter, record producer, voice-over, performer & actor. He is known for his singing in multiple languages, including Hindi, Telugu, English, Bengali, Kannada, Marathi, Tamil, Gujarati, Punjabi, Urdu and Malayalam.</p>
            </div>

            <!-- Artist 4 -->
            <div class="profile artist2">
                <img src="neha.jpeg" alt="Artist 2 Name">
                <h1>Neha Kakkar</h1>
                <p>Neha Kakkar Singh, is an Indian playback singer.She is the younger sister of playback singers Tony Kakkar and Sonu Kakkar. She began performing at a very early age at religious events.</p>
            </div>
            <!-- Add more artists as needed -->
    </div>
</div>
<?php
    require_once 'include/footer.php';
?>
