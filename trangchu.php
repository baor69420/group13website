<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="trangchu.css">
  <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Trang chủ</title>
  <link rel="icon" type="image/x-icon" href="favicon.png">
  <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.search-box input[type="text"]').on("keyup input", function(){
                /* Get input value on change */
                var inputVal = $(this).val();
                var resultDropdown = $(this).siblings(".result");
                if(inputVal.length){
                    $.get("backend-search.php", {term: inputVal}).done(function(data){
                        // Display the returned data in browser
                        resultDropdown.html(data);
                    });
                } else{
                    resultDropdown.empty();
                }
            });
            
            // Set search input value on click of result item
            $(document).on("click", ".result p", function(){
                $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                $(this).parent(".result").empty();
            });
        });
    </script>
</head>

<body>
    <!-- 1. Logo và thanh tìm kiếm -->
    <div class="tophead">
        <!-- Logo -->
        <a href="trangchu.php">
            <img src="logonobg.png" alt="13 Logo" style="width:160px; height:auto; margin-top:7px; margin-left: 10px; display: flex;">
        </a>
        <!-- Thanh tìm kiếm -->
    </div>
    <!-- 2. Thanh menu -->
    <div class="menu-bar">
        <a class="active" href="trangchu.html">Trang chủ</a>
        <a href="about.html">Về chúng tôi</a>
    </div>

    <!-- 3. Ảnh nền trang chủ -->
    <div class="rectangle">
        <h1>SCIDICT - KHOA HỌC KHÔNG KHÓ</h1>
        <p>Hàng ngàn học sinh tin tưởng chúng tôi với các thuật ngữ khoa học. Còn bạn thì sao?</p>
        <div class="search-box">
            <input type="text" autocomplete="off" placeholder="Nhập từ khóa để bắt đầu tìm kiếm" />
            <div class="result"></div>
        </div>
    </div>
        
    

    <!-- CHÂN TRANG -->
    <footer>
        <!-- 1. Logo -->
        <a href="trangchu.php"><img src="logonobg.png" alt="13 Logo" style="width: 160px"></a>
        
        <!-- 2. Icon -->
        <div class="hover-icon">
            <img src="envelope.png">
            <img src="telephone.png">
            <img src="placeholder.png">
        </div>
        
        <!-- 3. Bản quyền -->
        <div class="copyright">
            <p>2022 © All Rights Reserved.</p>
        </div>
        
    </footer> 

</body>
</html>
