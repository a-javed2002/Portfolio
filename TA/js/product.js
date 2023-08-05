function loadData(id) {
    for (const x in product) {
        if (product[x] == "[object Object]") {
            for (const y in product[x]) {
                if (x == id) {
                    document.getElementById("category-names").innerHTML = product[x].whatIs;
                    document.getElementById("banner-area").style.backgroundImage = `url(images/banner.jpg)`;
                    document.getElementById("banner-area").style.backgroundRepeat = "no-repeat";
                    document.getElementById("banner-area").style.backgroundPosition = "center";
                    document.getElementById("banner-area").style.backgroundSize = "cover";
                    document.getElementById("main_heading").innerHTML = product[x].name;
                    if (product[x].real_price != null) {
                        document.getElementById("price-detail").innerHTML = `
                <span id="real_price">$${product[x].real_price}</span>
                <i class='fas fa-arrow-right'></i>
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
                    document.getElementById("rating").innerHTML = "Rating: " + product[x].rating;
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
                    document.getElementById("information").innerHTML = `<ul>${temp3}</ul>` +
                        `<a href="#cart-button">See More</a>`;
                    document.getElementById("remove-1").innerHTML = product[x].name + "<br>" + product[x].information;

                    // var text = "";
                    // for (const z in product[x].age) {
                    //   text += `"` + product[x].age[z] + `"` + " ";
                    // }
                    // document.getElementById("age_main_div").innerHTML = text;

                    document.getElementById("main-image").src = product[x].image[0];
                    document.getElementById("main-image").alt = (product[x].name);
                    document.getElementById("main-image-heart").innerHTML = `
                    <img class="heart" src="" alt="${product[x].name}" onclick='fav(this,"${product[x].name}","${product[x].cart_image}",${product[x].price},"${product[x].url}","${product[x].status}")' title="ADD TO WISHLIST">
                    `
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

                    document.getElementById("all_button").innerHTML =
                        `
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
        console.log("card " + (i + 1))
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
                        name = ((product[x].name).slice(0, 30));
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


function redirect() {
    console.log("hi");
    var count = 0;
    var input = document.getElementById("data-list").value;
    for (const x in product) {
        if (product[x].name == input) {
            count++;
            var input = document.getElementById("data-list").value = "";
            console.log(x)
            console.log(product[x].name)
            console.log(input)
            console.log(product[x].url_category)
            setTimeout(function () {
                location.replace(product[x].url_category);
            }, 500);
        }
    }
    if (count == 0) {
        setTimeout(function () {
            location.replace("../404.html");
        }, 500);
    }
}

// sessionStorage.setItem("username", "abcd")

function comm() {
    if (sessionStorage.getItem("username") != null) {
        var date = date_time();
        var name = sessionStorage.getItem("username");
        if (sessionStorage.getItem("userImage") != null) {
            var image = sessionStorage.getItem("userImage");
        } else {
            var image = "../images/AVATAR.png";
        }
        var msg = document.getElementById("msg").value;
        // console.log("msg is " + msg);
        var temp = document.getElementById("review-count").innerHTML;
        var count = parseInt(temp);
        if (msg != "") {
            if (count >= 1) {
                var save_previous = document.getElementById("comment").innerHTML;
                document.getElementById("comment").innerHTML = `
${save_previous}
<hr style="height: 3px;color: #8a8a8a;opacity: 1;">
<div class="author-box d-nlock d-sm-flex">
              <div class="author-img mb-4 mb-md-0">
                <img loading="lazy" src="${image}" alt="author" style="width: 60px;height: 60px;filter: drop-shadow(2px 4px 6px black);">
              </div>
              <div class="author-info">
                <h3>${name}<span>${date}</span></h3>
                <p class="mb-2">${msg}</p>
              </div>
            </div>`;
            } else {
                document.getElementById("comment").innerHTML = `
            <div class="author-box d-nlock d-sm-flex">
              <div class="author-img mb-4 mb-md-0">
                <img loading="lazy" src="${image}" alt="author" style="width: 60px;height: 60px;filter: drop-shadow(2px 4px 6px black);">
              </div>
              <div class="author-info">
                <h3>${name}<span>${date}</span></h3>
                <p class="mb-2">${msg}</p>
              </div>
            </div>`;
            }
        }

        sessionStorage.setItem(
            "comments",
            document.getElementById("comment").innerHTML
        );
        var temp = sessionStorage.getItem("comments");
        document.getElementById("comment").innerHTML = temp;

        document.getElementById("comment").style.backgroundColor = "#545454";
        count++;
        document.getElementById("review-count").innerHTML = count;
        // document.getElementById("name").value = "";
        // document.getElementById("email").value = "";
        document.getElementById("msg").value = "";
    } else {
        alert("Please Login To Comment");
        window.location.href = "../form.html";

    }
}

function change_displays(value) {
    switch (value) {
        case 0:
            document.getElementById("remove-1").style.display = "block";
            document.getElementById("remove-2").style.display = "none";
            document.getElementById("des").style.color = "#00dd53";
            document.getElementById("rev").style.color = "black";
            document.getElementById("rem1").style.display = "block";
            document.getElementById("rem2").style.display = "none";
            break;
        case 1:
            document.getElementById("remove-1").style.display = "none";
            document.getElementById("remove-2").style.display = "block";
            document.getElementById("des").style.color = "black";
            document.getElementById("rev").style.color = "#00dd53";
            document.getElementById("rem1").style.display = "none";
            document.getElementById("rem2").style.display = "block";
            break;

        default:
            break;
    }
}
$(function () {
    if ($(".owl-2").length > 0) {
        $(".owl-2").owlCarousel({
            center: false,
            items: 1,
            loop: true,
            stagePadding: 0,
            margin: 20,
            smartSpeed: 1000,
            autoplay: true,
            nav: true,
            dots: true,
            pauseOnHover: false,
            responsive: {
                600: {
                    margin: 20,
                    nav: true,
                    items: 2,
                },
                1000: {
                    margin: 20,
                    stagePadding: 0,
                    nav: true,
                    items: 3,
                },
            },
        });
    }
});

function chkLogIn() {
    if (
        sessionStorage.getItem("username") != null &&
        sessionStorage.getItem("username") != undefined
    ) {
        document.getElementById("sign-up").style.display = "none";
        document.getElementById("log-in").style.display = "block";
        document.getElementById("counter").innerHTML =
            sessionStorage.getItem("counter");
        document.getElementById("counter2").innerHTML =
            sessionStorage.getItem("counter2");
        document.getElementById("usernameSaved").innerHTML = sessionStorage.getItem("username");
    } else {
        document.getElementById("sign-up").style.display = "block";
        document.getElementById("log-in").style.display = "none";
        document.getElementById("counter").innerHTML = "";
        document.getElementById("counter2").innerHTML = "";
    }
}

function SignOut() {
    if (confirm("Sign Out...!!!...Are Sure...!!!")) {
        sessionStorage.removeItem("username");
        sessionStorage.removeItem("showForm");
        chkLogIn();
		window.location.href="../index.html";
    }
}

function date_time() {
    a = new Date();
    date = a.toLocaleDateString();
    c = a.getDay();
    console.log(date);
    console.log(c);
    if (c == 1) {
        day = "Monday";
    } else if (c == 2) {
        day = "Tuesday";
    } else if (c == 3) {
        day = "Wednesday";
    } else if (c == 4) {
        day = "Thursday";
    } else if (c == 5) {
        day = "Friday";
    } else if (c == 6) {
        day = "Saturday";
    } else if (c == 0) {
        day = "Sunday";
    }
    // SETTING OF STANDARD TIME
    h = String(a.getHours());
    m = String(a.getMinutes());
    s = String(a.getSeconds());
    console.log(h);
    console.log(m);
    console.log(s);
    if (h.length == 1 && m.length == 1 && s.length == 1) {
        time = "0" + h + ":" + "0" + m + ":" + "0" + s;
    } else if (h.length == 1 && m.length == 1) {
        time = "0" + h + ":" + "0" + m + ":" + s;
    } else if (h.length == 1 && s.length == 1) {
        time = "0" + h + ":" + m + ":" + "0" + s;
    } else if (m.length == 1 && s.length == 1) {
        time = h + ":" + "0" + m + ":" + "0" + s;
    } else if (h.length == 1) {
        time = "0" + h + ":" + m + ":" + s;
    } else if (m.length == 1) {
        time = h + ":" + "0" + m + ":" + s;
    } else if (s.length == 1) {
        time = h + ":" + m + ":" + "0" + s;
    } else {
        time = h + ":" + m + ":" + s;
    }
    dt = time + " " + day + "  " + date;
    return dt;
    //PRINTING DETAIL
    // document.getElementById("flowing-date").innerHTML = dt;
    // setTimeout(function () {
    //     date_time();
    // }, 1000);
}

function navProductLoad(name) {
    console.log(name.innerHTML);
    localStorage.setItem("navProductLoad", (name.innerHTML));
    console.log(localStorage.getItem("navProductLoad"))
    setTimeout(function () {
        location.replace("../all.html");
    }, 500); // 0.5 seconds
}

//Images on Hover Opacity
function op_on(id) {
    document.getElementById(id).style.opacity = 1;
}

function op_off(id) {
    document.getElementById(id).style.opacity = 0.5;
    var container = document.getElementById("main-image").src;
    console.log(container);
    for (
        let i = 1; i <=
        parseInt(document.getElementById("total-images-in-pictures").innerHTML); i++
    ) {
        if (
            document.getElementById("other-img-" + i).src == container
        ) {
            document.getElementById("other-img-" + i).style.opacity = 1;
            break;
        }
    }
}

function change_image(image) {
    var container = document.getElementById("main-image");

    container.src = image.src;
    console.log(document.getElementById("total-images-in-pictures").innerHTML);
    for (
        let i = 1; i <=
        parseInt(document.getElementById("total-images-in-pictures").innerHTML); i++
    ) {
        document.getElementById("other-img-" + i).style.opacity = 0.5;
    }
    image.style.opacity = "1";
}

// back to top
function backToTop() {
    $("#back-to-top").on("click", function () {
        $("#back-to-top").tooltip("hide");
        $("body,html").animate({
                scrollTop: 0,
            },
            800
        );
        return false;
    });
}
backToTop();

function loaderAll() {
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
    }, 2000); // 5 seconds
}