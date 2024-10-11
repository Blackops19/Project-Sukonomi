<style>
    .center {
    text-align: center;
  }
  .middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  body {
      background-color: black;
      font-family: monospace;
      color: lime;
      overflow: hidden;
      margin: 0;
    }

    .container {
      position: relative;
      width: 100%;
      height: 100vh;
    }

    .rain {
      position: absolute;
      color: lime;
      font-size: 15px;
      white-space: nowrap;
      animation: rain 5s linear infinite;
    }

    .message {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: lime;
      font-size: 2em;
    }

    .button {
      background-color: lime;
      color: black;
      border: none;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      position: relative;
    }



    @keyframes rain {
      0% {
        transform: translateY(-100%);
      }
      100% {
        transform: translateY(100vh);
      }
    }

    @keyframes move-button {
  0% {
    transform: translate(0, 0);
  }
  10% {
    transform: translate(100vw, 0);
  }
  20% {
    transform: translate(100vw, 100vh);
  }
  30% {
    transform: translate(0, 100vh);
  }
  40% {
    transform: translate(-100vw, 100vh);
  }
  50% {
    transform: translate(-100vw, 0);
  }
  60% {
    transform: translate(0, 0);
  }
  100% {
    transform: translate(0, 0);
  }
}
</style>

<div class="container">
<div class="message">
<div class="middle center">
    
 
  <?php
  require_once 'process/dbh.php';

  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Get the uploaded image
      $image = $_FILES['image'];

      // Get the user ID of the user who uploaded the image
      $user_id = $_POST['user_id'];

      // Check if the image is valid
      if ($image['error'] == 0) {
          // Get the image details
          $image_name = $image['name'];
          $image_tmp_name = $image['tmp_name'];
          $image_size = $image['size'];
          $image_type = $image['type'];

          // Check if the image is an allowed type
          $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
          if (in_array($image_type, $allowed_types)) {
              // Create a unique file name for the image
              $unique_image_name = uniqid(). '_'. $image_name;

              // Upload the image to the file system
              $upload_dir = 'uploads/';
              if (!file_exists($upload_dir)) {
                  mkdir($upload_dir, 0777, true);
              }
              $image_path = $upload_dir. $unique_image_name;
              move_uploaded_file($image_tmp_name, $image_path);

              // Insert the image path and user ID into the database
              $query = "INSERT INTO images (image_name, image_path, user_id) VALUES (?,?,?)";
              $stmt = $conn->prepare($query);
              $stmt->bind_param("ssi", $image_name, $image_path, $user_id);
              $stmt->execute();

              // Get the inserted image ID
              $image_id = $stmt->insert_id;

              // Display a success message
              echo "Image uploaded successfully!  ";
          } else {
              echo "Invalid image type. Only JPEG, PNG, and GIF are allowed.";
          }
      } else {
          echo "Error uploading image. Please try again.";
      }
  }

  // Close the connection
  $conn->close();
  ?>
  <br>
  <a href="claim.php">
    <button>Claim Your Reward</button>
  </a>
</div>
</div>
</div>

<script>    const container = document.querySelector('.container');

function createRain() {
  const rain = document.createElement('div');
  rain.classList.add('rain');

  const characters = '01';
  let rainText = '';
  for (let i = 0; i < 10; i++) {
    rainText += characters.charAt(Math.floor(Math.random() * characters.length));
  }

  rain.textContent = rainText;

  rain.style.left = `${Math.random() * 100}%`;
  rain.style.animationDuration = `${Math.random() * 3 + 2}s`;
  rain.style.animationDelay = `${Math.random() * 3}s`;

  container.appendChild(rain);
}

for (let i = 0; i < 100; i++) {
  createRain();
}

setInterval(() => {
  createRain();
  const lastRain = document.querySelector('.rain:last-child');
  if (lastRain) {
    lastRain.addEventListener('animationend', () => lastRain.remove());
  }
}, 100);</script>