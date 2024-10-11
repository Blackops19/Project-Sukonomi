const logoutButton = document.querySelector('.logout');

logoutButton.addEventListener('click', () => {
  // Remove the user's authentication token from local storage
  localStorage.removeItem('token');

  // Redirect the user to the login page
  window.location.href = 'login.html';
});

    const wheel = document.getElementById('wheel');
    const wheelCtx = wheel.getContext('2d');
    const spinBtn = document.getElementById('spin-btn');
    const winnerOutput = document.getElementById('winner-output');
    const nameInput = document.getElementById('name-input');
    const addNameBtn = document.getElementById('add-name-btn');
    const arrow = document.getElementById('arrow');
    const winnerHistoryList = document.getElementById('winner-history-list');

    let wheelAngle = 0;
    let wheelSpeed = 0;
    let wheelFriction = 0.95;
    let winner;
    let names = [];
    const maxNames = 10; // limit the number of names to 10
    let winnerHistory = [];

    wheelCtx.fillStyle = '#fff';
    wheelCtx.fillRect(0, 0, wheel.width, wheel.height);

    addNameBtn.addEventListener('click', () => {
      const name = nameInput.value.trim();
      if (name !== '' && names.length < maxNames) {
        names.push(name);
        nameInput.value = '';
        drawWheel();
        if (names.length === maxNames) {
          spinBtn.click(); // auto spin when the limit is reached
        }
      }
    });

    spinBtn.addEventListener('click', () => {
      wheelSpeed = 10;
      wheelAngle = 0;
      winner = null;
      requestAnimationFrame(animateWheel);
    });

    function drawWheel() {
      wheelCtx.clearRect(0, 0, wheel.width, wheel.height);
      const angleStep = (2 * Math.PI) / names.length;
      names.forEach((name, index) => {
        const angle = index * angleStep;
        const x = wheel.width / 2 + Math.cos(angle) * wheel.width / 2;
        const y = wheel.height / 2 + Math.sin(angle) * wheel.height / 2;
        wheelCtx.fillStyle = `hsl(${index * 360 / names.length}, 100%, 50%)`;
        wheelCtx.beginPath();
        wheelCtx.moveTo(wheel.width / 2, wheel.height / 2);
        wheelCtx.lineTo(x, y);
        wheelCtx.arc(wheel.width / 2, wheel.height / 2, wheel.width / 2, angle, angle + angleStep);
        wheelCtx.fill();
        wheelCtx.fillStyle
        wheelCtx.fillStyle = '#000';
        wheelCtx.font = '24px Arial';
        wheelCtx.textAlign = 'center';
        wheelCtx.textBaseline = 'middle';
        wheelCtx.fillText(name, x, y);
      });
    }

 function animateWheel() {
  wheelCtx.clearRect(0, 0, wheel.width, wheel.height);
  wheelCtx.save();
  wheelCtx.translate(wheel.width / 2, wheel.height / 2);
  wheelCtx.rotate(wheelAngle);
  wheelCtx.translate(-wheel.width / 2, -wheel.height / 2);
  drawWheel();
  wheelCtx.restore();
  wheelAngle += wheelSpeed;
  wheelSpeed *= wheelFriction;
  if (wheelSpeed < 0.1) {
    wheelSpeed = 0;
    const winningIndex = Math.floor((wheelAngle / (2 * Math.PI)) * names.length);
    const winningSection = (winningIndex + names.length) % names.length;
    winner = names[winningSection];
    winnerOutput.textContent = `The winner is: ${winner}`;
  
    winnerHistory.push(winner);
    updateWinnerHistory();
  } else {
    requestAnimationFrame(animateWheel);
  }
}

    function updateWinnerHistory() {
      winnerHistoryList.innerHTML = '';
      winnerHistory.forEach((winner, index) => {
        const li = document.createElement('li');
        li.textContent = `Round ${index + 1}: ${winner}`;
        winnerHistoryList.appendChild(li);
      });
    }



