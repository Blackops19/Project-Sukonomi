<!DOCTYPE html>
<html>
<head>
  <title>Coin Shop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="shop.css">
  <link rel="stylesheet" href="menu.css">
  <style>
 		
     body{
		background-color: #90EE90;
		}
		

    .container {
      width: 90%;
      max-width: 1200px;
      background-color: #F5FFB7; /* Light gray background */
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      margin-top: 10vh;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .coin-shop-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .coin-shop-header .close-button {
      background-color: transparent;
      border: none;
      cursor: pointer;
    }

    .coin-shop-header .close-button i {
      font-size: 24px;
      color: #333;
    }

    .coin-shop-header .user-info {
      display: flex;
      align-items: center;
    }

    .coin-shop-header .user-info img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .coin-shop-header .user-info span {
      font-weight: bold;
    }

    .coin-shop-header .coins-info {
      display: flex;
      align-items: center;
    }

    .coin-shop-header .coins-info img {
      width: 20px;
      height: 20px;
      margin-right: 5px;
    }

    .coin-shop-header .coins-info span {
      font-size: 18px;
    }

    .coin-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .coin-options button {
      background-color: #e0e0e0; /* Light gray button */
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .coin-options button:hover {
      background-color: #ddd; /* Slightly darker on hover */
    }

    .coin-packages {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
    }

    .coin-package {
      width: 180px;
      background-color: #fff; /* White package */
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 20px;
      text-align: center;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .coin-package img {
      width: 150px;
      height: 150px;
      margin-bottom: 10px;
    }


    .coin-package h3 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .coin-package p {
      margin-bottom: 10px;
    }

    .coin-package .price {
      font-size: 16px;
      font-weight: bold;
      color: #333;
    }

    .coin-package .bonus {
      font-size: 14px;
      color: #555;
    }

    .button-group {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .button-group button {
      background-color: #4CAF50; /* Green button */
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      color: white;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .button-group button:hover {
      background-color: #45a049; /* Slightly darker on hover */
    }

  </style>
</head>
<body>

<div class="topnav">
    <div class="topnav-left">
    <a href="#" id="menu-icon" class="closebtn" onclick="openNav()">
  <img src="assets/2-removebg-preview (1).png" alt="icon" width="40" height="40">
</a>

<!-- Side navigation menu -->
<div id="sidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
    <img src="assets/2-removebg-preview (1).png" alt="Close" width="40" height="40">
  </a>
 
  <ul style="list-style: none;">
  <li>
    <a href="uloginwel.php">
      <img src="assets/12.png" alt="Home" width="40" height="40">
      Home
    </a>
  </li>
  <li>
    <a href="raffle_cat.php">
      <img src="assets/14.png" alt="Raffle Draw" width="40" height="40">
         Raffle 
    </a>
  </li>

  
 
  <li>
    <a href="shop_cat.php">
      <img src="assets/16.png" alt="Shop" width="40" height="40">
      Shop
    </a>
  </li>
</ul>
</div>


</div>
    <div class="topnav-right">
	<a href="#">
    <img src="assets/10.png" alt="icon" width="40" height="40" style="border-radius: 50%">
  </a>
  <a href="#">
    <img src="assets/8.png" alt="icon" width="40" height="40" style="border-radius: 50%">
  </a>
  <a href="#">
    <img src="6.png" alt="icon" width="40"height="40" style="border-radius: 50%">
  </a>
  <a href="#">
    <img src="assets/4.png" alt="icon" width="40"height="40" style="border-radius: 50%">
  </a>


  <a href="#">
    <img src="" alt="profile" width="40" height="40" style="border-radius: 50%">
  </a>
    </div>
	</div>

	 
	
		
	
		
		





  <div class="container">
  <h1>Silver Coin Shop</h1>

  <div class="coin-packages">
    <div class="coin-package">
      <img src="assets/silver-1-removebg-preview.png" alt="Coin Package">
      <h3>1 </h3>
      <p>1 coins</p>
      <div class="price">1.00 Php</div>
      <div class="text-center">
        <button class="btn btn-primary">Buy Now</button>
      </div>
    </div>
    <div class="coin-package">
      <img src="assets/silver-2-removebg-preview.png" alt="Coin Package">
      <h3>7 </h3>
      <p>6 coins + 1Bonus</p>
      <div class="price">6.00 Php</div>
      <div class="text-center">
        <button class="btn btn-primary">Buy Now</button>
      </div>
    </div>
    <div class="coin-package">
      <img src="assets/silver-4-removebg-preview.png" alt="Coin Package">
      <h3>28</h3>
      <p>25 Coins + 3 Bonus</p>
      <div class="price">25.00 Php</div>
      <div class="text-center">
        <button class="btn btn-primary">Buy Now</button>
      </div>
    </div>
    <div class="coin-package">
      <img src="assets/6-removebg-preview (1).png" alt="Coin Package">
      <h3>100</h3>
      <p>100 Coins </p>
      <div class="price">100.00 Php </div>
      <div class="text-center">
        <button class="btn btn-primary">Buy Now</button>
      </div>
    </div>
    <div class="coin-package">
      <img src="assets/5-removebg-preview (1).png" alt="Coin Package">
      <h3>228</h3>
      <p style="font-size: 14.5px;">200 Coins + 28 Bonus</p>
      <div class="price">200.00 Php</div>
      <div class="text-center">
        <button class="btn btn-primary">Buy Now</button>
      </div>
    </div>
    <div class="coin-package">
      <img src="assets/5-removebg-preview (2).png" alt="Coin Package">
      <h3>356</h3>
      <p style="font-size: 14.5px;">300 Coins + 56 Bonus</p>
      <div class="price">300.00 Php</div>
      <div class="text-center">
        <button class="btn btn-primary">Buy Now</button>
      </div>
    </div>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
  <script src="menu.js"></script>
</body>
</html>