let silverBalance = 0;
let goldBalance = 0;
let diamondBalance = 0;


// Update the coin balance display
function updateCoinBalance() {
  document.getElementById("silver-balance").innerHTML = silverBalance;
  document.getElementById("gold-balance").innerHTML = goldBalance;
  document.getElementById("diamond-balance").innerHTML = diamondBalance;
}

// Store the coin balances in localStorage
localStorage.setItem("silverBalance", silverBalance);
localStorage.setItem("goldBalance", goldBalance);
localStorage.setItem("diamondBalance", diamondBalance);

// Example function to add coins to the balance
function addCoins(type, amount) {
  if (type === "silver") {
    silverBalance += amount;
  } else if (type === "gold") {
    goldBalance += amount;
  } else if (type === "diamond") {
    diamondBalance += amount;
  }
  updateCoinBalance();
}

// Initialize the coin balance display
updateCoinBalance();

// Event listener for the Entry button
document.getElementById("s-ent").addEventListener("click", function() {
  // Check if there's enough silver balance
  if (silverBalance >= 1) {
    // Deduct 1 silver coin from the balance
    silverBalance -= 1;
    updateCoinBalance();
    
    // Show the name input container
    document.getElementById("name-input-container").style.display = "block";
  } else {
    alert("Not enough silver balance!");
  }
});





