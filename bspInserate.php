<?php
include 'assets/php/head.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Inserat</title>
    <link rel="stylesheet" href="assets/css/bspInserat-style.css">
    <script>
        async function loadData() {
            try {
                const response = await fetch('fetch_data.php');
                const data = await response.text();
                document.getElementById('tableData').innerHTML = data;
            } catch (error) {
                console.error('Error:', error);
                alert("Error loading data");
            }
        }
        async function loadImg() {
            try {
                const response = await fetch('fetch_image.php');
                const data = await response.text();
                document.getElementById('tableImg').innerHTML = data;
            } catch (error) {
                console.error('Error:', error);
                alert("Error loading data");
            }
        }
    </script>
    <script>
        loadData();
        loadImg();
    </script>

</head>

<body>
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- Header Start-->
    <?php
    include 'assets/php/header.php';
    ?>
    <!-- Header End -->

    <!-- Header Mobile -->
    <?php
    include 'assets/php/mobileHeader.php';
    ?>
    <!-- Header Mobile End -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="bildInserat" border="1" id="tableImg">
        <!-- Data will be loaded here -->
    </div>

    <table border="1" id="tableData">
        <!-- Data will be loaded here -->
    </table>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <!--Footer Start-->
    <?php
    include 'assets/php/footer.php';
    ?>
    <!--Footer End-->

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/navColor.js"></script>

</body>

</html>