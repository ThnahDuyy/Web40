<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" type="text/css" href="styles.css">

  <style>
    /*   CSS  Home */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
      position: relative;
    }
    .introduction {
      text-align: center;
      margin-top: 10px;
    }
    .functional-buttons {
      text-align: center;
      margin-top: 10px;
    }
    .functional-buttons button {
      margin: 10px;
      background-color: royalblue;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .functional-buttons button:hover {
      background-color: #1e90ff;
      transform: scale(1.1);
    }

    .logo {
      position: absolute;
      bottom: 10px;
      left: 10px;
      cursor: pointer;
    }
    .logo:hover {
      transform: scale(1.1);

    }
    /* Hiệu ứng cho ảnh nằm ngang */
    .video-container {
      position: relative;
      width: 100%;
      height: 50vh;
      overflow: hidden;
    }
    .video-container video {
      position: absolute;
      top: 50%;
      left:50%;
      transform: translate(-50%, -50%);
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none;
    }


    @keyframes slide {
      0% {
        transform: translateX(100%);
      }
      100% {
        transform: translateX(-100%);
      }
    }

    /* CSS neww */
    .news-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      margin-top: 20px;
    }
    .news {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      max-width: calc(50% - 20px);
      margin-bottom: 20px;
    }
    .news h2 {
      color: #333;
    }
    .news p {
      color: #666;
    }

    /* CSS images */
    .image-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin-top: 20px;
    }
    .image-container div {
      margin: 0 10px;
    }
    .image-container img {
      width: 400px;
      height: auto;
    }
    .logo {
    text-align: center;
    margin-top: 50px; /* Dịch chuyển logo lên phía trên */
    position: absolute; /* Sử dụng absolute positioning */
    top: 0; /* Đặt logo ở trên cùng của trang */
    left: 50%; /* Canh giữa theo chiều ngang */
    transform: translateX(-50%); /* Dịch chuyển logo sang trái 50% để căn giữa */
    cursor: pointer;
  }

  .logo img {
    width: 200px; /* Kích thước của logo */
    height: auto;
  }
  </style>

</head>

<body>
  <!-- Header -->
  <?php include_once "header.php" ?>

  <!-- introduction -->
  <div class="introduction">
    <div class="announcement-container">
      <div class="announcement"></div>
    </div>
  </div>

  <!--  Video -->
  <div class="video-container">
    <video id="slideshow" autoplay muted loop controls>
      <source src="HatchfulExport-All/a.mp4" type="video/mp4">
     </video>
  </div>

<!-- Logo-->
<div class="logo">
    <a href="Home.php">
      <img src="HatchfulExport-All/FGW_logo_d.jpg" alt="FGW Logo">
    </a>
  </div>


  <!-- news -->
  <div class="news-container">
    <div class="news">
      <h2>University of Greenwich partners with South East London is leading arts centre The Albany</h2>
      <p>he Albany arts centre exists to inspire, develop and support creativity for the benefit of the community. The partnership has been developed through the strong relationships with the university’s School of Stage and Screen.
University of Greenwich students will have the opportunity to gain hands-on experience in a range of roles through work placements and internships. It is a fantastic opportunity for staff and students to network with the creative industry and form important connections to help bring young talent to the sector.</p>
      <a href="https://www.gre.ac.uk/articles/public-relations/university-of-greenwich-partners-with-south-east-londons-leading-arts-centre-the-albany">Xem thêm...</a>
    </div>
    <div class="news">
      <h2>Taking part in the Green Greenwich Summit 2024</h2>
      <p>Last week, we took part in the Royal Borough of Greenwich’s Green Greenwich Summit 2024. During the summit, the university took part in panels and delivered presentations to attendees.
      <a href="https://www.gre.ac.uk/articles/public-relations/taking-part-in-the-green-greenwich-summit">Xem thêm...</a></p>
    </div>
    <div class="news">
      <h2>https://www.gre.ac.uk/about-us/history-of-the-university</h2>
      <p>Find out about the history of the university's institutions."</p>
      <a href="https://www.gre.ac.uk/about-us/history-of-the-university">Xem thêm...</a>
    </div>
    <div class="news">
      <h2>University of Greenwich partners with South East London’s leading arts centre The Albany</h2>
      <p>he Albany arts centre exists to inspire, develop and support creativity for the benefit of the community. The partnership has been developed through the strong relationships with the university’s School of Stage and Screen.

University of Greenwich students will have the opportunity to gain hands-on experience in a range of roles through work placements and internships. It is a fantastic opportunity for staff and students to network with the creative industry and form important connections to help bring young talent to the sector.</p>
      <a href="https://www.gre.ac.uk/articles/public-relations/university-of-greenwich-partners-with-south-east-londons-leading-arts-centre-the-albany">Xem thêm...</a>
    </div>
  </div>

  <!-- anh o duoi-->
  <div class="image-container">
    <div>
      <a href="https://www.facebook.com/Greenwichvietnamstudentlife">
        <img src="HatchfulExport-All/3.jpg" alt="Greenwich Vietnam Student Life">
      </a>
    </div>
    <div>
      <a href="https://www.facebook.com/Greenwichvietnamstudentlife">
        <img src="HatchfulExport-All/4.jpg" alt="Greenwich Vietnam Student Life">
      </a>
    </div>
  </div>
  <div class="image-container">
    <div>
      <a href="https://www.facebook.com/Greenwichvietnamstudentlife">
        <img src="HatchfulExport-All/5.jpg" alt="Greenwich Vietnam Student Life">
      </a>
    </div>
    <div>
      <a href="https://www.facebook.com/Greenwichvietnamstudentlife">
        <img src="HatchfulExport-All/6.jpg" alt="Greenwich Vietnam Student Life">
      </a>
    </div>
  </div>


  </div>

   <?php include_once "footer.php" ?>

  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
