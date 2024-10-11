<style>
    .facebook-profile, .instagram-profile, .combined-profile {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.facebook-profile img, .instagram-profile img, .combined-profile img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin: 10px;
}

.facebook-profile h2, .instagram-profile h2, .combined-profile h2 {
  font-size: 24px;
  font-weight: bold;
  margin-top: 0;
}

.facebook-profile ul, .instagram-profile ul, .combined-profile ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.facebook-profile li, .instagram-profile li, .combined-profile li {
  margin-bottom: 10px;
}

.facebook-profile a, .instagram-profile a, .combined-profile a {
  text-decoration: none;
  color: #337ab7;
}

.facebook-profile a:hover, .instagram-profile a:hover, .combined-profile a:hover {
  color: #23527c;
}
</style>

<!-- Facebook Profile Section -->
<div class="facebook-profile">
  <img src="facebook-profile-picture.jpg" alt="Facebook Profile Picture">
  <h2>Facebook Name</h2>
  <p>Facebook Bio</p>
  <ul>
    <li><a href="https://www.facebook.com/username">Facebook Profile Link</a></li>
  </ul>
</div>

<!-- Instagram Profile Section -->
<div class="instagram-profile">
  <img src="instagram-profile-picture.jpg" alt="Instagram Profile Picture">
  <h2>Instagram Username</h2>
  <p>Instagram Bio</p>
  <ul>
    <li><a href="https://www.instagram.com/username">Instagram Profile Link</a></li>
  </ul>
</div>

<!-- Combined Profile Section -->
<div class="combined-profile">
  <h1>Combined Profile</h1>
  <img src="combined-profile-picture.jpg" alt="Combined Profile Picture">
  <h2>Combined Name</h2>
  <p>Combined Bio</p>
  <ul>
    <li><a href="https://www.facebook.com/username">Facebook Profile Link</a></li>
    <li><a href="https://www.instagram.com/username">Instagram Profile Link</a></li>
  </ul>
</div>

<script>
    // Get Facebook profile data using Facebook API
const facebookApiUrl = 'https://graph.facebook.com/v13.0/me?fields=name,picture,bio&access_token=YOUR_ACCESS_TOKEN';
fetch(facebookApiUrl)
  .then(response => response.json())
  .then(data => {
    const facebookName = data.name;
    const facebookPicture = data.picture.data.url;
    const facebookBio = data.bio;

    // Update Facebook profile section
    document.querySelector('.facebook-profile h2').textContent = facebookName;
    document.querySelector('.facebook-profile img').src = facebookPicture;
    document.querySelector('.facebook-profile p').textContent = facebookBio;
  });

// Get Instagram profile data using Instagram API
const instagramApiUrl = 'https://graph.instagram.com/v13.0/me?fields=username,profile_picture,bio&access_token=YOUR_ACCESS_TOKEN';
fetch(instagramApiUrl)
  .then(response => response.json())
  .then(data => {
    const instagramUsername = data.username;
    const instagramPicture = data.profile_picture.url;
    const instagramBio = data.bio;

    // Update Instagram profile section
    document.querySelector('.instagram-profile h2').textContent = instagramUsername;
    document.querySelector('.instagram-profile img').src = instagramPicture;
    document.querySelector('.instagram-profile p').textContent = instagramBio;
  });

// Combine Facebook and Instagram profile data
const combinedName = `${facebookName} (@${instagramUsername})`;
const combinedPicture = facebookPicture;
const combinedBio = `${facebookBio} ${instagramBio}`;

// Update combined profile section
document.querySelector('.combined-profile h2').textContent = combinedName;
document.querySelector('.combined-profile img').src = combinedPicture;
document.querySelector('.combined-profile p').textContent = combinedBio;
</script>