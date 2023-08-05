//MUSIC
// function go() {
//   document.getElementById("myAudio").play();
// }
/*CART*/
let global_variable_item;
let global_variable_price;
let global_variable_img;
let global_variable_link;
let global_variable_total;
let str3;
let previous_value;
let price;
let quantity;
let temp2;

// str += `
//       <tr>
//           <th scope="row">${index + 1}</th>
//             <td><a href=${element[4]}><img src=${element[3]} alt="picture" width="120px" height="100px" style="padding-right:20px;"></a>${element[0]}</td>
//           <td><input class="form-control" id="q-${index + 1}" min="1" max="5" title="max 5" onchange="itemPrice('price-${index + 1}','q-${index + 1}')" style="text-align:center;width:70%;margin:30px auto;" type="number" value="1" pattern="[1-9]{1,}"></td>
//           <td><d style="position:relative;top:33px;" id="price-${index + 1}">${element[2]}</div></td>
//           <td> <button style="margin:30px 0px;" class="btn btn-sm btn-outline-danger" onclick="deleted('${
//             element[0]
//           }',${element[2]})">Remove</button> </td>
//       </tr>`;

function add_to_cart(item, img, price, link) {
  global_variable_item = item;
  global_variable_price = price;
  global_variable_img = img;
  global_variable_link = link;
  localStorage.setItem("add_to_cart_item", global_variable_item);
  localStorage.setItem("add_to_cart_price", global_variable_price);
  localStorage.setItem("add_to_cart_img", global_variable_img);
  localStorage.setItem("add_to_cart_link", global_variable_link);
  console.log(global_variable_item + "\n");
  console.log(global_variable_price + "\n");
  console.log(global_variable_img + "\n");
  console.log(global_variable_link + "\n");
  getAndUpdate();
  update();
}

function update() {
  global_variable_item = localStorage.getItem("add_to_cart_item");
  global_variable_price = localStorage.getItem("add_to_cart_price");
  global_variable_img = localStorage.getItem("add_to_cart_img");
  global_variable_link = localStorage.getItem("add_to_cart_link");
  if (localStorage.getItem("itemJson") == null) {
    itemJsonArray = [];
    localStorage.setItem("itemJson", JSON.stringify(itemJsonArray));
  } else {
    itemJsonArrayStr = localStorage.getItem("itemJson");
    itemJsonArray = JSON.parse(itemJsonArrayStr);
  }
  let tableBody = document.getElementById("tableBody");
  let str = "";
  let str2 = "";
  itemJsonArray.forEach((element, index) => {
    for (const x in product) {
      if (product[x].name.toLowerCase() == element[0].toLowerCase()) {
        console.log("hihihihi");

        str += `
        <tr>
            <th scope="row">${index + 1}</th>
              <td>
              <table class="table table-responsive mb-5 mt-5">
              <tr>
                  <td>
                      <a href=${product[x].url}><img src=${
          product[x].cart_image
        } alt="picture" width="120px" height="100px"
                          style="padding-right:20px;"></a>
                  </td>
                  <td style="padding-top: 40px;font-weight: bolder;font-family: Verdana, Geneva, Tahoma, sans-serif;">${
                    element[0]
                  }</td>
              </tr>
          </table>
              </td>
            <td><input class="form-control" id="q-${
              index + 1
            }" min="1" max="5" title="max 5" onchange="itemPrice('price-${
          index + 1
        }','q-${index + 1}','p-${
          index + 1
        }','${element[0]}')" style="margin:80px auto;" type="number" value="${element[1]}" pattern="[1-9]{1,}"></td>
            <td><d style="position:relative;top:83px;" id="price-${
              index + 1
            }">${((product[x].price)*element[1]).toFixed(2)}</div></td>
            <td> <button style="margin:80px 0px;" class="btn btn-sm btn-danger btn-outline-warning" onclick="deleted('${
              element[0]
            }')">Remove</button> </td>
            <td style="display: none;"><div style="position:relative;top:83px;" id="p-${
              index + 1
            }">${(element[2])}</div></td>
        </tr>`;
      }
    }

    document.getElementById("counter").innerHTML = `${index + 1}`;
    sessionStorage.setItem("counter", `${index + 1}`);
    str3 = parseFloat(global_variable_total) + parseFloat(`${element[2]}`);
  });
  document.getElementById("total-cart-bill").innerHTML = str3;
  tableBody.innerHTML = str;
}
function getAndUpdate() {
  console.log("Updating List....");
  console.log(global_variable_item);
  console.log(global_variable_price);
  console.log(global_variable_img);
  console.log(global_variable_link);
  var count = 0;
  if (localStorage.getItem("itemJson") == null) {
    itemJsonArray = [];
    itemJsonArray.push([
      global_variable_item,
      1,
      global_variable_price,
      global_variable_img,
    ]);
    cartClick();
    localStorage.setItem("itemJson", JSON.stringify(itemJsonArray));
  } else {
    itemJsonArrayStr = localStorage.getItem("itemJson");
    itemJsonArray = JSON.parse(itemJsonArrayStr);
    itemJsonArray.every((element) => {
      console.log("-----------");
      console.log(element[0]);
      if (global_variable_item == element[0]) {
        count++;
        return false;
      } else {
        return true;
      }
    });

    if (count == 0) {
      itemJsonArray.push([
        global_variable_item,
        1,
        global_variable_price,
        global_variable_img,
        global_variable_link,
        global_variable_total,
      ]);
      cartClick();
    } else {
      alert("already added to cart");
      count = 0;
    }

    localStorage.setItem("itemJson", JSON.stringify(itemJsonArray));
  }
  update();
}
function deleted(name) {
  var itemIndex = 0;
  console.log("Delete", name);
  itemJsonArrayStr = localStorage.getItem("itemJson");
  itemJsonArray = JSON.parse(itemJsonArrayStr);
  itemJsonArray.every((element) => {
    console.log("-----------");
    console.log(element[0]);
    if (name == element[0]) {
      return false;
    } else {
      itemIndex++;
      return true;
    }
  });
  itemJsonArray.splice(itemIndex, 1);
  localStorage.setItem("itemJson", JSON.stringify(itemJsonArray));
  update();
  generateTotal();
  chkCartEmpty();
  //   countCheck();
}
function clearStorage() {
  if (confirm("Do You Really Want To Clear?")) {
    console.log("Clearing The Storage");
    // localStorage.clear();
    localStorage.removeItem("itemJson");
    document.getElementById("total-cart-bill").innerHTML = 0;
    update();
    document.getElementById("counter").innerHTML = 0;
    chkCartEmpty();
    // countCheck();
    generateTotal();
  }
}

function chkCartEmpty() {
  if (document.getElementById("counter").innerHTML == 0) {
    document.getElementById("cart").style.display = "none";
    document.getElementById("cart-empty-msg").style.display = "block";
  } else {
    document.getElementById("cart").style.display = "block";
    document.getElementById("cart-empty-msg").style.display = "none";
  }
}

function buy_now(name, pic, price, link) {
  if (
    sessionStorage.getItem("username") != null &&
    sessionStorage.getItem("username") != undefined
  ) {
    sessionStorage.setItem("buyNow", "1");
    sessionStorage.setItem("itemName", name);
    sessionStorage.setItem("totalBill", price);
    sessionStorage.setItem("buylink1", link);
    sessionStorage.setItem("buypic", pic);
    var url = window.location.href.split("TA/");
    url = url[1].split("/");
    url = url[0].toLowerCase();
    console.log(url);
    for (const x in product) {
      if (product[x].whatIs.toLowerCase() == url) {
        var go = "../bill.html";
        break;
      } else {
        var go = "bill.html";
      }
    }
    console.log(go);
    setTimeout(function () {
      location.replace(go);
    }, 500);
  }
  else{
    var url = window.location.href.split("TA/");
    url = url[1].split("/");
    url = url[0].toLowerCase();
    console.log(url);
    for (const x in product) {
      if (product[x].whatIs.toLowerCase() == url) {
        var go = "../form.html";
        break;
      } else {
        var go = "form.html";
      }
    }
    console.log(go);
    setTimeout(function () {
      location.replace(go);
    }, 500);
  }
}

function vary() {
  var quantity = document.getElementById("quantity").value;
  var price = document.getElementById("price").innerHTML;
  // alert(quantity+"  "+price);
  document.getElementById("tprice").innerHTML =
    "$" + parseFloat(price) * parseInt(quantity);
}

function discard() {
  if (confirm("Do You Really Want To Discard Order?")) {
    document.body.style.opacity = 1;
    document.getElementById("buy_now_bill").style.display = "none";
    document.getElementById("arrow").style.display = "block";
    document.body.style.overflow = "auto";

    setTimeout(function () {
      document.body.style.overflowX = "hidden";
    }, 500);
  }
}

function generateTotal() {
  let total = 0;
  let temp;
  let k = document.getElementById("counter").innerHTML;
  for (let i = 0; i < k; i++) {
    temp = document.getElementById("price-" + (i + 1)).innerHTML;
    total = parseFloat(total) + parseFloat(temp);
  }
  document.getElementById("total-cart-bill").innerHTML = total.toFixed(2);
}

function cartClick() {
  document.getElementById("cartClick").style.display = "block";
  setTimeout(function () {
    document.getElementById("cartClick").style.display = "none";
  }, 1000);
}

function checkOut(params) {
  sessionStorage.setItem(
    "sstotalbill",
    parseFloat(document.getElementById("total-cart-bill").innerHTML)
  );
  sessionStorage.setItem(
    "sstotatalitems",
    document.getElementById("counter").innerHTML
  );
  console.log(sessionStorage.getItem("sstotalbill"));
  console.log(sessionStorage.getItem("sstotatalitems"));
}
