function loadDataC(id) {
  for (const x in product) {
    if (product[x] == "[object Object]") {
      for (const y in product[x]) {
        if (x == id) {
          console.log(product[x].banner);
          document.getElementById(
            "parallex"
          ).style.backgroundImage = `url(${product[x].banner})`;
          document.getElementById("category-names").innerHTML =
            product[x].whatIs;
          document.getElementById(
            "banner-area"
          ).style.backgroundImage = `url(images/banner.jpg)`;
          document.getElementById("banner-area").style.backgroundRepeat =
            "no-repeat";
          document.getElementById("banner-area").style.backgroundPosition =
            "center";
          document.getElementById("banner-area").style.backgroundSize = "cover";
          document.getElementById("main_heading").innerHTML = product[x].name;
          if (product[x].real_price != null) {
            document.getElementById("price-detail").innerHTML = `
                <span id="real_price">$${product[x].real_price}</span>
                <span style="font-size: 30px;"> --------></span>
                <span id="price_now">$${product[x].price}</span>
                `;
          } else {
            document.getElementById("price-detail").innerHTML = `
                <span>$${product[x].price}</span>
                `;
          }

          var status;
          if (product[x].status == 1) {
            status = `<span id="status" style="color:#28ff28;">In Stock</span>`;
          } else if (product[x].status == 0) {
            status = `<span id="status" style="color:#f34e4e;">Out Of Stock</span>`;
          }

          document.getElementById("status").innerHTML = "Status: " + status;
          document.getElementById("rating").innerHTML =
            "Rating: " + product[x].rating;
          // console.log("abc " + product[x].price);
          var infor = product[x].information.split(".");
          // console.log(infor)
          var temp3 = "";
          // for (const i in infor) {
          //     temp3+=`<li>${infor[i]}</li>`;
          // }
          for (let i = 0; i < infor.length - 1; i++) {
            if (i == 8) {
              break;
            }
            temp3 += `<li>${infor[i]}</li>`;
          }
          document.getElementById("information").innerHTML =
            `<ul>${temp3}</ul>` + `<a href="#parallex">See More</a>`;
          document.getElementById("remove-1").innerHTML =
            product[x].name + "<br>" + product[x].information;

          // var text = "";
          // for (const z in product[x].age) {
          //   text += `"` + product[x].age[z] + `"` + " ";
          // }
          // document.getElementById("age_main_div").innerHTML = text;

          document.getElementById("main-image").src = product[x].image[0];
          document.getElementById("main-image").alt = product[x].name;
          document.getElementById("main-image-heart").innerHTML = `
                    <img class="heart" src="" alt="${product[x].name}" onclick='fav(this,"${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}","${product[x].status}")' title="ADD TO WISHLIST">
                    `;
          // console.log(product[x].url)
          var text2 = "",
            p = 0;
          for (const z in product[x].image) {
            p++;
            text2 += `<img id="other-img-${p}" onclick="change_image(this)" onmouseover="op_on('other-img-${p}')" onmouseleave="op_off('other-img-${p}')" src="${product[x].image[z]}" width="70">`;
          }
          document.getElementById("images").innerHTML = text2;
          document.getElementById("total-images-in-pictures").innerHTML = p;

          // if (product[x].comment != "null") {
          //   // console.log("in comments");
          //   // console.log(product[x].comment);
          //   document.getElementById("comment").innerHTML = product[x].comment;
          // }

          document.getElementById("all_button").innerHTML = `
                              <button class="btn btn-outline-dark text-uppercase mr-2 px-4" onclick='buy_now("${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}")'>BUY NOW</button>
              <button id="cart-button" class="btn btn-dark text-uppercase mr-2 px-4" onclick='add_to_cart("${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}")' title="ADD TO CART">ADD TO CART</button>`;
        }
      }
    } else {
      // console.log(x + " is " + product[x] + "<br>");
    }
  }
  // document.getElementById("img-1").style.opacity = 1;
}
function cardJson(p1, p2, p3, p4, p5, p6) {
  var number_of_cards = 6;
  const ids = [p1, p2, p3, p4, p5, p6];
  for (let i = 0; i < number_of_cards; i++) {
    console.log("card " + (i + 1));
    var id = ids[i];
    var status;
    var name;
    for (const x in product) {
      if (product[x] == "[object Object]") {
        for (const y in product[x]) {
          if (x == id) {
            if (product[x].status == 1) {
              status = `<span id="status" style="color:#28ff28;">In Stock</span>`;
            } else if (product[x].status == 0) {
              status = `<span id="status" style="color:#f34e4e;">Out Of Stock</span>`;
            }
            name = product[x].name.slice(0, 30);
            document.getElementById("product-cards-" + (i + 1)).innerHTML = `
                        <div class="card-content">
                            <a href="${product[x].url_category}">
                    <img src="${product[x].card_image}" alt="${product[x].name}" class="card-img">
                    
                    <span class="card-img-2">
                    <img class="heart" src="" alt="${product[x].name}" onclick='fav(this,"${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}","${product[x].status}")' title="ADD TO WISHLIST">
                    </span>
                    <h1 class="card-title">${name}...</h1>
                    <div class="card-body">
                        <div class="card-star">
                            <span class="rating-value">${product[x].rating}</span>
                            <span class="star">&#9733;</span>
                        </div>
                        <p class="card-price">${product[x].price}</p>
                    </div>
            </a>
                    <div class="card-footer">
                    <button class="btn btn-border text-uppercase mr-2 px-4 buy-now" onclick='buy_now("${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}")'>BUY NOW</button>
                        <button class="btn btn-border cart"
                            onclick='add_to_cart("${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}")'>Add
                            To Cart</button>
                    </div>
                </div>
                    `;
          }
        }
      } else {
        // console.log(x + " is " + product[x] + "<br>");
      }
    }
  }
}

function navConsole(name) {
	name = name.innerHTML.split(">");
	name = name[1].trim();
	console.log(name);
	// console.log(name[1]);
	var url = window.location.href.split("TA/");
	url = url[1].split("/");
	url = url[0].toLowerCase();
	console.log(url);
	for (const y in product) {
		if (name.toLowerCase() == product[y].name.toLowerCase()) {
			console.log("name match");
			for (const x in product) {
				if (product[x].whatIs.toLowerCase() == url) {
					console.log("hi");
					var urlRedirct = product[y].url_category;
					break;
				} else {
					console.log("h2");
					var urlRedirct = product[y].url;
				}
				console.log("h3");
			}
			break;
		}
	}
	console.log(urlRedirct);
	setTimeout(function () {
		location.replace(urlRedirct);
	}, 500); // 0.5 seconds
}

function loadDataS(id) {
  for (const x in product) {
    if (product[x] == "[object Object]") {
      for (const y in product[x]) {
        if (x == id) {
          console.log(product[x].banner);
          document.getElementById("category-names").innerHTML =
            product[x].whatIs;
          document.getElementById(
            "banner-area"
          ).style.backgroundImage = `url(images/banner.jpg)`;
          document.getElementById("banner-area").style.backgroundRepeat =
            "no-repeat";
          document.getElementById("banner-area").style.backgroundPosition =
            "center";
          document.getElementById("banner-area").style.backgroundSize = "cover";
          document.getElementById("main_heading").innerHTML = product[x].name;
          if (product[x].real_price != null) {
            document.getElementById("price-detail").innerHTML = `
                <span id="real_price">$${product[x].real_price}</span>
                <span style="font-size: 30px;"> --------></span>
                <span id="price_now">$${product[x].price}</span>
                `;
          } else {
            document.getElementById("price-detail").innerHTML = `
                <span>$${product[x].price}</span>
                `;
          }

          var status;
          if (product[x].status == 1) {
            status = `<span id="status" style="color:#28ff28;">In Stock</span>`;
          } else if (product[x].status == 0) {
            status = `<span id="status" style="color:#f34e4e;">Out Of Stock</span>`;
          }

          document.getElementById("status").innerHTML = "Status: " + status;
          document.getElementById("rating").innerHTML =
            "Rating: " + product[x].rating;
          // console.log("abc " + product[x].price);
          var infor = product[x].information.split(".");
          // console.log(infor)
          var temp3 = "";
          // for (const i in infor) {
          //     temp3+=`<li>${infor[i]}</li>`;
          // }
          for (let i = 0; i < infor.length - 1; i++) {
            if (i == 8) {
              break;
            }
            temp3 += `<li>${infor[i]}</li>`;
          }
          document.getElementById("information").innerHTML =
            `<ul>${temp3}</ul>` + `<a href="#parallex">See More</a>`;
          document.getElementById("remove-1").innerHTML =
            product[x].name + "<br>" + product[x].information;

          // var text = "";
          // for (const z in product[x].age) {
          //   text += `"` + product[x].age[z] + `"` + " ";
          // }
          // document.getElementById("age_main_div").innerHTML = text;

          document.getElementById("main-image").src = product[x].image[0];
          document.getElementById("main-image").alt = product[x].name;
          document.getElementById("main-image-heart").innerHTML = `
                    <img class="heart" src="" alt="${product[x].name}" onclick='fav(this,"${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}","${product[x].status}")' title="ADD TO WISHLIST">
                    `;
          // console.log(product[x].url)
          var text2 = "",
            p = 0;
          for (const z in product[x].image) {
            p++;
            text2 += `<img id="other-img-${p}" onclick="change_image(this)" onmouseover="op_on('other-img-${p}')" onmouseleave="op_off('other-img-${p}')" src="${product[x].image[z]}" width="70">`;
          }
          document.getElementById("images").innerHTML = text2;
          document.getElementById("total-images-in-pictures").innerHTML = p;

          // if (product[x].comment != "null") {
          //   // console.log("in comments");
          //   // console.log(product[x].comment);
          //   document.getElementById("comment").innerHTML = product[x].comment;
          // }

          document.getElementById("all_button").innerHTML = `
          <button onclick="download()" class="btn btn-dark text-uppercase mr-2 px-4"><i class="fa fa-download"></i> Download</button>
          `;
        }
      }
    } else {
      // console.log(x + " is " + product[x] + "<br>");
    }
  }
  // document.getElementById("img-1").style.opacity = 1;
}

function cardJsonS(p1, p2, p3, p4, p5, p6) {
  var number_of_cards = 6;
  const ids = [p1, p2, p3, p4, p5, p6];
  for (let i = 0; i < number_of_cards; i++) {
    console.log("card " + (i + 1));
    var id = ids[i];
    var status;
    var name;
    for (const x in product) {
      if (product[x] == "[object Object]") {
        for (const y in product[x]) {
          if (x == id) {
            if (product[x].status == 1) {
              status = `<span id="status" style="color:#28ff28;">In Stock</span>`;
            } else if (product[x].status == 0) {
              status = `<span id="status" style="color:#f34e4e;">Out Of Stock</span>`;
            }
            name = product[x].name.slice(0, 30);
            document.getElementById("product-cards-" + (i + 1)).innerHTML = `
                        <div class="card-content">
                            <a href="${product[x].url_category}">
                    <img src="${product[x].card_image}" alt="${product[x].name}" class="card-img">
                    
                    <span class="card-img-2">
                    <img class="heart" src="" alt="${product[x].name}" onclick='fav(this,"${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}","${product[x].status}")' title="ADD TO WISHLIST">
                    </span>
                    <h1 class="card-title">${name}...</h1>
                    <div class="card-body">
                        <div class="card-star">
                            <span class="rating-value">${product[x].rating}</span>
                            <span class="star">&#9733;</span>
                        </div>
                        <p class="card-price">${product[x].price}</p>
                    </div>
            </a>
                    <div class="card-footer">
                    <p style="visibility: hidden;">jdsapoksad</p>
                    <button onclick="download()" class="btn btn-dark text-uppercase mr-2 px-4"><i class="fa fa-download"></i> Download</button>
                    </div>
                </div>
                    `;
          }
        }
      } else {
        // console.log(x + " is " + product[x] + "<br>");
      }
    }
  }
}

function download() {
  axios({
      // url:'https://source.unsplash.com/random/500x500',
      url:'https://source.unsplash.com/400x300/?coding,software',
      
      method: 'GET',
      responseType: 'blob'
  })
      .then((response) => {
          const url = window.URL
              .createObjectURL(new Blob([response.data]));
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', 'image.jpg');
          document.body.appendChild(link);
          link.click();
          document.body.removeChild(link);
      })
}