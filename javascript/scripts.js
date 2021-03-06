/* Please Note JS ES6/7 syntax used */

//global variable for username
let username = "username";

//general ajax function
function ajaxRequest(method, url, async, data, callback) {
  var request = new XMLHttpRequest();
  request.open(method, url, async);

  if (method == "POST") {
    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
  }

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      if (request.status == 200) {
        var response = request.responseText;
        callback(response);
      } else {
        alert(request.statusText);
      }
    }
  };
  request.send(data);
}

//method for login
const login = () => {
  username = document.getElementById("usernameField").value;
  let password = document.getElementById("passwordField").value;
  //console.log(username,password)
  let url = "php/login.php";
  let data = "username=" + username + "&password=" + password;
  ajaxRequest("POST", url, true, data, displayData);
};

//Method to update login with response
const displayData = response => {
  let login = document.getElementById("login_text");

  if (response == true) {
    getUserStocks();
    document.getElementById("login").style.display = "none";
    login.innerHTML = "Logged in as:  " + username;
  } else {
    login.innerHTML = "Login Failed - Wrong Username or Password";
    login();
  }
};

//get all stocks using username from userstocks table
const getUserStocks = () => {
  let url = "php/getStocks.php";
  let data = "username=" + username;
  ajaxRequest("POST", url, true, data, displayStocks);
};

//display list users stocks
const displayStocks = response => {
  let displayUserStocks = document.getElementById("displayStocks");
  displayUserStocks.innerHTML = response;
  if (response == null) {
    alert("You have no stocks in your portfolio");
  }
  //console.log(response)
};

//onclick function to show more detail about each stock
const stockInfo = stockId => {
  //alert(stockId)
  let url = "php/getStockInfo.php";
  let data = "id=" + stockId;
  ajaxRequest("POST", url, true, data, displayStockData);
};

//callback function for stockInfo updates div element with required stock info
const displayStockData = response => {
  //console.log(response);
  let stockData = document.getElementById("displayStockData");
  stockData.innerHTML = response;
};

//functin to get list of stocks from server
const listStocks = () => {
  let data = "";
  let url = "php/listStocks.php";
  ajaxRequest("POST", url, true, data, displayListOfStocks);
};

//function to dispaly list of stocks
const displayListOfStocks = response => {
  let stocksTable = document.getElementById("displayStocks");
  stocksTable.innerHTML = response;
};

//method to target radio button data and convert to js array then passed to AJAX
const selectStocks = () => {
  let selectedStock = document.getElementsByName("stockChoice");
  let stocksArr = [];

  for (let i = 0; i < selectedStock.length; i++) {
    if (selectedStock[i].checked) {
      stocksArr.push(selectedStock[i].value);
      console.log(stocksArr);
    }
  }

  url = "php/addSelectedStocks.php";
  data = "stocksArr=" + stocksArr + "&username=" + username;
  console.log(username);
  ajaxRequest("POST", url, true, data, getUserStocks);
};

//function to delete a stock
const deleteUserStock = stockId => {
  let url = "php/deleteUserStock.php";
  let data = "username=" + username + "&stockId=" + stockId;
  ajaxRequest("POST", url, true, data, getUserStocks);
};
