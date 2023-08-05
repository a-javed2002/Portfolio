function navProductLoad(name){
    console.log(name.innerHTML);
    localStorage.setItem("navProductLoad",(name.innerHTML));
    console.log(localStorage.getItem("navProductLoad"))
    setTimeout(function () {
    location.replace("all.html");
}, 500);  // 0.5 seconds
}

function run() {
    console.log(localStorage.getItem("navProductLoad"))
    if (localStorage.getItem("navProductLoad") != undefined) {
        var name = localStorage.getItem("navProductLoad");
    console.log(localStorage.getItem("navProductLoad"))
        navProduct(name);
        localStorage.removeItem("navProductLoad");
    }
    else {
        searchLoad("ALL PRODUCTS", 'cat-1');
        searchByCategory();
        nameOf();
    }
    innerPages();
    chkLogIn();
    loaderAll();
}
function navProduct(item) {
    var name;
    var sample;
    var id;
    console.log(item);
    console.log(name);
    if (item.innerHTML == undefined) {
      console.log("here 1")
      name = (item).trim();
    } else {
      console.log("here 2")
        name = (item.innerHTML).trim();
    }
    console.log(name);
    for (let i = 0; i < totalCategory; i++) {
        console.log("infor");
        sample = ((document.getElementById("cat-" + (i + 1)).innerHTML).split(">"))
        sample = (sample[1]).split("<")
        if ((name).toLowerCase() == (sample[0]).toLowerCase()) {
            id = "cat-" + (i + 1);
            break;
        }
        console.log(sample[0]);
    }
    console.log(id);
    setTimeout(function () {
        searchLoad(item, id);
    }, 1000);
}

function nameOf() {
  var count = 0;
  console.log(localStorage.getItem("itemJson2"))
  if (localStorage.getItem("itemJson2") != "[]" && localStorage.getItem("itemJson2") != null && localStorage.getItem("itemJson2") != undefined) {
    itemJsonArrayStr = localStorage.getItem("itemJson2");
    itemJsonArray = JSON.parse(itemJsonArrayStr);
    // const parentElement = document.querySelector('.heart');
    let allChildren = document.querySelectorAll(".heart");
    console.log(allChildren);
    allChildren.forEach((item) => {
      count++;
      var test = item.alt;
      console.log(test);
      console.log("first loop");
      itemJsonArray.every((element) => {
        console.log("-----------");
        console.log(element[0]);
        if (test == element[0]) {
          console.log("exit here 1");
          item.src = "images/heart2.jpg";
          return false;
        } else {
          console.log("exit here 2");
          item.src = "images/heart1.jpg";
          return true;
        }
      });
    });
    console.log(count);
  } else {
    let allChildren = document.querySelectorAll(".heart");
    allChildren.forEach((item) => {
      item.src = "images/heart1.jpg";
    });
  }
}

var totalCategory = 23;
var checkBoxFilters = 9;

function searchLoad(item, id) {
  console.log(item);
  console.log(item.innerHTML);
  console.log(id);
  if (item.innerHTML == undefined) {
    var name = item.trim();
  } else {
    var name = (item.innerHTML).trim();
  }
  console.log(name);
  sessionStorage.setItem("category", name);
  sessionStorage.setItem("id", id);
  for (let i = 0; i < totalCategory; i++) {
    // console.log(i+1);
    document.getElementById("cat-" + (i + 1)).style.backgroundColor = "white";
  }
  document.getElementById(id).style.backgroundColor = "#3cb9fc";
  document.getElementById(id).style.borderBottomRightRadius = "50%";
  document.getElementById(id).style.borderTopRightRadius = "50%";
  searchByCategory();
}

function searchByCategory() {
  var item = sessionStorage.getItem("category");
  var id = sessionStorage.getItem("id");

  // console.log(item.innerHTML);
  if (id == "cat-1") {
    document.getElementById("category-names").innerHTML = `ALL PRODUCTS`;
    document.getElementById("banner-area").style.backgroundImage =
      "url(images/banner/banner1.png)";
    document.getElementById("banner-area").style.backgroundRepeat = "no-repeat";
    document.getElementById("banner-area").style.backgroundPosition = "center";
    document.getElementById("banner-area").style.backgroundSize = "cover";
    document.getElementById("product-details").innerHTML = `<p>
                        No matter a person's age, it's important to understand the basic parts of a computer. Learning the names and functions of these seven main computer components will help new and young technology users to communicate effectively with others about the tasks they are using a computer to perform.
                        </p>`;
    allProducts();
  } else {
    document.getElementById("category-names").innerHTML = `${item}`;
    document.getElementById(
      "banner-area"
    ).style.backgroundImage = `url(${item}/images/banner.jpg)`;
    document.getElementById("banner-area").style.backgroundRepeat = "no-repeat";
    document.getElementById("banner-area").style.backgroundPosition = "center";
    document.getElementById("banner-area").style.backgroundSize = "cover";
    for (const x in product) {
      if (item.toLowerCase() == product[x].whatIs.toLowerCase()) {
        document.getElementById(
          "product-details"
        ).innerHTML = `<p>${product[x].whatIsDescription}</p>`;
        break;
      }
    }
    var count = 0;
    var data = [];
    for (const x in product) {
      if (item.toLowerCase() == product[x].whatIs.toLowerCase()) {
        count++;
        data.push(product[x].price + "---" + product[x].name);
      }
    }
    console.log(count);
    console.log(data);
    showByCategory(data);
  }
}

function showByCategory(arr) {
  if (document.getElementById("checkbox-1").checked == true) {
    console.log("chk-1");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 <= 50) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-2").checked == true) {
    console.log("chk-2");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 >= 50 && p1 <= 100) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-3").checked == true) {
    console.log("chk-3");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 >= 150 && p1 <= 200) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-4").checked == true) {
    console.log("chk-4");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 >= 250 && p1 <= 300) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-5").checked == true) {
    console.log("chk-5");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 >= 350 && p1 <= 400) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-6").checked == true) {
    console.log("chk-6");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 >= 450 && p1 <= 500) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-7").checked == true) {
    console.log("chk-7");
    var data = [];
    for (let i = 0; i < arr.length; i++) {
      var p1 = parseFloat(arr[i].split("---")[0]);
      if (p1 >= 500) {
        data.push(arr[i]);
      }
    }
    console.log(data);
    printingCards(data);
  } else if (document.getElementById("checkbox-8").checked == true) {
    console.log("chk-8");
    ascendingSorting(arr);
    console.log(arr);
    printingCards(arr);
  } else if (document.getElementById("checkbox-9").checked == true) {
    console.log("chk-9");
    ascendingSorting(arr);
    arr.reverse();
    console.log(arr);
    printingCards(arr);
  } else {
    console.log("NO PRICE FILTER");
    printingCards(arr);
  }
}

function ascendingSorting(data) {
  for (let a = 0; a < data.length; a++) {
    for (let i = 0; i < data.length; i++) {
      if (i + 1 == data.length) {
        break;
      }
      var p1 = parseFloat(data[i].split("---")[0]);
      var p2 = parseFloat(data[i + 1].split("---")[0]);
      // console.log(p1)
      // console.log(p2)
      // console.log("--------------------")
      // console.log(p1 + p1)
      // console.log(p2 + p2)
      if (p1 > p2) {
        swap = data[i + 1];
        data[i + 1] = data[i];
        data[i] = swap;
      }
    }
  }
}
var printingArray = "";
var start = 0;
var currrentPage = 1;

function pages(page) {
  // document.getElementById("page-3").style.backgroundColor = "blue";
  // document.getElementById("page-"+page).style.backgroundColor="#3cb9fc";
  // document.getElementById("page-"+page).style.color="white";
  currrentPage = page;
  start = (parseInt(page) - 1) * 6;
  console.log(start);
  searchByCategory();
}

function pagesByArrow(val) {
  console.log("cp " + currrentPage);
  currrentPage = currrentPage + parseInt(val);
  if (currrentPage <= 0) {
    currrentPage = 1;
  } else if (currrentPage >= printingArray.length / 6) {
    currrentPage = Math.ceil(printingArray.length / 6);
  }
  console.log("cp " + currrentPage);
  pages(currrentPage);
}

function printingCards(data) {
  printingArray = data;
  if (data.length > 0) {
    document.getElementById("pagination").style.display = "flex";
    var pages = "";
    for (let i = 0; i < data.length / 6; i++) {
      pages += `
                    <li class="page-item" onclick="pages(${
                      i + 1
                    })"><a id="page-${
        i + 1
      }" class="page-link" href="#main-container">${i + 1}</a></li>
                    `;
    }
    document.getElementById("pagination").innerHTML =
      `<li onclick="pagesByArrow(-1)" class="page-item"><a class="page-link" href="#main-container"><i
                                            class="fas fa-angle-double-left"></i></a></li>` +
      pages +
      `<li onclick="pagesByArrow(1)" class="page-item"><a class="page-link" href="#main-container"><i
                                            class="fas fa-angle-double-right"></i></a></li>`;
    var inif = 0;
    var cards = "";
    var status = "";
    for (let i = start; i < data.length; i++) {
      console.log("i as start is " + i);
      if (inif >= 6) {
        console.log("inif value is " + inif);
        break;
      }
      var name = data[i].split("---")[1];
      for (const x in product) {
        if (name.toLowerCase() == product[x].name.toLowerCase()) {
          inif++;
          if (product[x].status == 1) {
            status = `<span id="status" style="color:#28ff28;">In Stock</span>`;
          } else if (product[x].status == 0) {
            status = `<span id="status" style="color:#f34e4e;">Out Of Stock</span>`;
          }
          if (product[x].real_price != null) {
            var price = `
                        <span id="real_price" style="color:red;text-decoration: line-through;">$${product[x].real_price}</span>
                        <i class='fas fa-arrow-right' style="color:red;"></i>
                        <i class='fas fa-arrow-right' style="color:green;"></i>
                        <span id="price_now" style="color:green;">$${product[x].price}</span>
                        `;
          } else {
            var price = `
                        <span>$${product[x].price}</span>
                        `;
          }
          cards += `
                        <div class="row">
                      <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                        <div class="bg-image hover-zoom ripple rounded ripple-surface">
                          <a href="${product[x].url}">
                            <img src="${product[x].cart_image}" class="w-100" />
                          </a>
                          <a href="#!">
                            <div class="hover-overlay">
                              <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-6 col-xl-9">
                        <h5>${product[x].name}</h5>
                        <div class="d-flex flex-row">
                          <span class="text-truncate"><b>Information :</b>${product[x].information}</span>
                        </div>
                        <p class=" mb-4 mb-md-0 text-truncate" style="font-size: 14px;">
                          This product is non-returnable and non-refundable.<br>
                          <b>Note:</b> Currently, this item is available only to customers located in the Pakistan.<br>
                          <b>Status:</b> ${status}<br>
                          <b>Rating:</b> ${product[x].rating}
                        </p>
                        <div class="align-items-center mb-1">
                          <h4 class="mb-1 me-1">${price}</h4>
                        </div>
                        <h6 class="text-success">Free shipping</h6>
                        <div class="my-4">
                        <span class="">
                    <img class="heart" src="" alt="${product[x].name}" onclick='fav(this,"${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}","${product[x].status}")' title="ADD TO WISHLIST">
                        </span>
                          <a href="${product[x].url}">
                            <button class="button-29" role="button" type="button" title="SEE DETAILS">SEE DETAILS</button>
                          </a>
                          <button class="button-29" role="button" type="button" onclick='add_to_cart("${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}")' title="ADD TO CART">ADD TO CART</button>
                            <button class="button-29" role="button" type="button" onclick='buy_now("${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}")'>BUY NOW</button>
                          
                        </div>
                      </div>
                    </div>
                    <hr class="hr-styling-2">`;
        }
      }
    }
    document.getElementById("product-cards-by-category").innerHTML = cards;
    console.log(data.length);
    for (let i = 0; i < data.length / 6; i++) {
      document.getElementById("page-" + (i + 1)).style.backgroundColor =
        "white";
      document.getElementById("page-" + (i + 1)).style.color = "black";
    }
    document.getElementById("page-" + currrentPage).style.backgroundColor =
      "#3cb9fc";
    document.getElementById("page-" + currrentPage).style.color = "white";
    nameOf();
    start = 0;
  } else {
    document.getElementById("pagination").style.display = "none";
    console.log("nononono");
    document.getElementById(
      "product-cards-by-category"
    ).innerHTML = `<h1 style="color:black;">PRODUCT NOT AVAILABLE</h1>`;
    document.getElementById("category-names").innerHTML = `ALL PRODUCTS`;
    document.getElementById("banner-area").style.backgroundImage =
      "url(images/banner/banner1.png)";
    document.getElementById("banner-area").style.backgroundRepeat = "no-repeat";
    document.getElementById("banner-area").style.backgroundPosition = "center";
    document.getElementById("banner-area").style.backgroundSize = "cover";
    document.getElementById("product-details").innerHTML = `<p >
                        No matter a person's age, it's important to understand the basic parts of a computer. Learning the names and functions of these seven main computer components will help new and young technology users to communicate effectively with others about the tasks they are using a computer to perform.
                        </p>`;
  }
}

function allProducts() {
  var count = 0;
  var data = [];
  for (const x in product) {
    count++;
    data.push(product[x].price + "---" + product[x].name);
  }
  console.log(count);
  console.log(data);
  showByCategory(data);
}

function clearfilters() {
  for (let i = 0; i < checkBoxFilters; i++) {
    document.getElementById("checkbox-" + (i + 1)).checked = false;
  }
  for (let i = 0; i < totalCategory; i++) {
    document.getElementById("cat-" + (i + 1)).style.backgroundColor = "white";
  }
  document.getElementById("cat-1").style.backgroundColor = "#3cb9fc";
  document.getElementById("cat-1").style.borderBottomRightRadius = "50%";
  document.getElementById("cat-1").style.borderTopRightRadius = "50%";
  document.getElementById("category-names").innerHTML = `ALL PRODUCTS`;
  document.getElementById("banner-area").style.backgroundImage =
    "url(images/banner/banner1.png)";
  document.getElementById("banner-area").style.backgroundRepeat = "no-repeat";
  document.getElementById("banner-area").style.backgroundPosition = "center";
  document.getElementById("banner-area").style.backgroundSize = "cover";
  document.getElementById("product-details").innerHTML = `<p>
                        No matter a person's age, it's important to understand the basic parts of a computer. Learning the names and functions of these seven main computer components will help new and young technology users to communicate effectively with others about the tasks they are using a computer to perform.
                        </p>`;
  allProducts();
}

function innerPages() {
  var c = 0;
  var text = "";
  for (const x in product) {
      // console.log(product[x].name);
      text += `<option value="${product[x].name}">`
      c++;
  }
  document.getElementById("datalistOptions").innerHTML = `
${text}
`;
  console.log("total products" + c);
}


function redirect2() {
	// console.log("hi");
  var count=0;
	var input = document.getElementById("data-list").value;
	for (const x in product) {
		if (product[x].name == input) {
      count++;
			var input = (document.getElementById("data-list").value = "");
			console.log(x);
			console.log(product[x].name);
			console.log(input);
			console.log(product[x].url);
			setTimeout(function () {
				location.replace(product[x].url);
			}, 500); // 0.5 seconds
			break;
		}
	}
		if (count==0) {
      setTimeout(function () {
        location.replace("404.html");
      }, 500);
    }
}

function loaderAll(){
  document.getElementById("blurpop").style.display = "block";
              document.getElementById("popup").innerHTML = `
						<h1>
							<span>L</span>
							<span>O</span>
							<span>A</span>
							<span>D</span>
							<span>I</span>
							<span>N</span>
							<span>G</span>
							<span>.</span>
							<span>.</span>
							<span>.</span>
						</h1>
						`
            var popup = document.getElementById('popup');
						popup.classList.toggle('active');
            setTimeout(function () {
              document.getElementById("blurpop").style.display = "none";
              var popup = document.getElementById('popup');
							popup.classList.toggle('active');
            }, 2000);  // 5 seconds
}