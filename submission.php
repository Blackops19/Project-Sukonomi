
<button id='submit-btn' onclick=showPopup(); return clickLimit(this);>Submit</button>



<div id='popup' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);'>
					<div style='background-color: #fff; padding: 20px; border: 1px solid #000; border-radius: 10px; width: 50%; margin: 40px auto; overflow-y: auto; max-height: 80vh;'>
					  <h1>Save This For Later</h1>
					  <h3>Step 1:</h3>
					  <img src='Screenshot 2024-07-20 074802.png' alt='Step 1 Image' style='width: 200px; height: 150px; margin: 0 auto; display: block;'>
					  <p>Log in to your Facebook account.</p>
					  <!-- ... -->
					  <button id='submit-btn'>Submit</button>
					</div>
				  </div>
				  
				<!-- Second popup -->
				<div id='popup2' style='display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);'>
				  <div style='background-color: #fff; padding: 20px; border: 1px solid #000; border-radius: 10px; width: 50%; margin: 40px auto; overflow-y: auto; max-height: 80vh;'>
					<h1>Submit Your Image</h1>
				 
				
					
					<!-- Add drag and drop functionality -->
				<form id='image-form' enctype='multipart/form-data' action='insert.php'> 
				  <div id='drag-drop-area' style='border: 1px dashed #ccc; padding: 20px; border-radius: 10px; overflow-y: auto; max-height: 300px;'>
					<p>Drag & drop an image or <input type='file' id='image-input' name='image' style='margin: 10px 0;'> </p>
					<div id='image-preview'></div>
				  </div>
				
				  <label for='facebook_name'>Facebook Name:</label>
				  <input type='text' id='facebook_name' name='facebook_name'>
				  <label for='gcash_name'>Gcash Name:</label>
				  <input type='text' id='gcash_name' name='gcash_name'>
				  <label for='gcash_number'>Gcash Number:</label>
				  <input type='text' id='gcash_number' name='gcash_number'>
				  <label for='contact_number'>Contact Number:</label>
				  <input type='text' id='contact_number' name='contact_number'>
				  <button id='submit-btn'>Submit</button>
				  <div id='response-message'></div>
				</form>
				
				  </div>
				</div>


                <script>// Function to show the first popup
function showPopup() {
				  document.getElementById('popup').style.display = 'block';
				}
				
				function hidePopup() {
				  document.getElementById('popup').style.display = 'none';
				}
				
				function showPopup2() {
				  document.getElementById('popup2').style.display = 'block';
				}
				
				function hidePopup2() {
				  document.getElementById('popup2').style.display = 'none';
				}
				
				document.getElementById('submit-btn').addEventListener('click', function() {
				  hidePopup();
				  showPopup2();
				});
				
				document.getElementById('close-btn').addEventListener('click', function() {
				  hidePopup2();
				});

                const dragDropArea = document.getElementById('drag-drop-area');

const imagePreview = document.getElementById('image-preview');
const form = document.getElementById('image-form');
const submitBtn = document.getElementById('submit-btn');

dragDropArea.addEventListener('dragover', (e) => {
  e.preventDefault();
});

dragDropArea.addEventListener('drop', (e) => {
  e.preventDefault();
  const files = e.dataTransfer.files;
  if (files.length > 0) {
    const file = files[0];
    const reader = new FileReader();
    reader.onload = (event) => {
      const imageData = event.target.result;
      imagePreview.innerHTML = `<img src="${imageData}" alt="Uploaded Image" style="max-width: 100%; height: auto;">`;
      imageInput.files = files;
    };
    reader.readAsDataURL(file);
  }
});

imageInput.addEventListener('change', (e) => {
  const file = imageInput.files[0];
  const reader = new FileReader();
  reader.onload = (event) => {
    const imageData = event.target.result;
    imagePreview.innerHTML = `<img src="${imageData}" alt="Uploaded Image" style="max-width: 100%; height: auto;">`;
  };
  reader.readAsDataURL(file);
});

submitBtn.addEventListener('click', (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'insert.php', true);
  xhr.onload = function() {
    if (xhr.status === 200) {
      document.getElementById('response-message').innerHTML = 'Image submitted successfully!';
    } else {
      document.getElementById('response-message').innerHTML = 'Error submitting image!';
    }
  };
  xhr.send(formData);
});
				</script>
		