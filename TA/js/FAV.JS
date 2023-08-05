function nameOf() {
  var count = 0;
  console.log(localStorage.getItem("itemJson2")==null)
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

function fav(img, name, image, price, url, status) {
  var chkImg = img.src.split("images/");
  console.log(chkImg[1]);
  if (chkImg[1] == "heart1.jpg") {
    var count = 0;
    console.log("Adding Fav....");
    console.log(name);
    console.log(image);
    console.log(price);
    console.log(url);
    console.log(status);

    if (status == 1) {
      status = "IN STOCK";
    } else {
      status = "OUT OF STOCK";
    }
    console.log(localStorage.getItem("itemJson2"));
    console.log("***************");
    if (localStorage.getItem("itemJson2") == null) {
      itemJsonArray = [];
      itemJsonArray.push([name, 1, price, url, status, image]);
      localStorage.setItem("itemJson2", JSON.stringify(itemJsonArray));
    } else {
      itemJsonArrayStr = localStorage.getItem("itemJson2");
      itemJsonArray = JSON.parse(itemJsonArrayStr);
      itemJsonArray.every((element) => {
        console.log("-----------");
        console.log(element[0]);
        if (name == element[0]) {
          count++;
          return false;
        } else {
          return true;
        }
      });

      if (count == 0) {
        itemJsonArray.push([name, 1, price, url, status, image]);
      } else {
        count = 0;
      }

      localStorage.setItem("itemJson2", JSON.stringify(itemJsonArray));
    }
    console.log(localStorage.getItem("itemJson2"));
    nameOf();
    favUpdate();
  } else if (chkImg[1] == "heart2.jpg") {
    var itemIndex = 0;
    console.log("Delete", name);
    itemJsonArrayStr = localStorage.getItem("itemJson2");
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
    localStorage.setItem("itemJson2", JSON.stringify(itemJsonArray));
    img.src = `images/heart1.jpg`;
    console.log(img.src);
  }
}

function favUpdate() {
  if (localStorage.getItem("itemJson2") == null) {
    itemJsonArray = [];
    localStorage.setItem("itemJson2", JSON.stringify(itemJsonArray));
  } else {
    itemJsonArrayStr = localStorage.getItem("itemJson2");
    itemJsonArray = JSON.parse(itemJsonArrayStr);
  }
  let tableBody = document.getElementById("tableBody2");
  let str = "";
  let status = "";
  console.log(itemJsonArray);
  itemJsonArray.forEach((element, index) => {
    console.log(index);
    console.log(element);
    console.log("---------");
    for (const x in product) {
      if (product[x].name.toLowerCase() == element[0].toLowerCase()) {
        console.log("hihihihi");
        if (product[x].status == 1) {
          status = `<span id="status" style="color:#28ff28;">In Stock</span>`;
        } else if (product[x].status == 0) {
          status = `<span id="status" style="color:#f34e4e;">Out Of Stock</span>`;
        }
        str += `
<tr>
    <th scope="row">${index + 1}</th>
      <td>
      <table class="table table-responsive mb-5 mt-5">
      <tr>
          <td>
              <a href=${product[x].url}><img src="${
          product[x].cart_image
        }" alt="picture" width="120px" height="100px"
                  style="padding-right:20px;"></a>
          </td>
          <td style="padding-top: 40px;font-weight: bolder;font-family: Verdana, Geneva, Tahoma, sans-serif;">${
            element[0]
          }</td>
      </tr>
  </table>
      </td>
    <td><d style="position:relative;top:83px;" id="price-${index + 1}">${
          product[x].price
        }</div></td>
    <td><d style="position:relative;top:83px;" id="status-${
      index + 1
    }">${status}</div></td>
    <td> <button style="margin:80px 0px;" class="btn btn-sm btn-danger btn-outline-warning" onclick="deletedFavItem('${
      element[0]
    }')">Remove</button> </td>
    <td style="display: none;"><div style="position:relative;top:83px;" id="p-${
      index + 1
    }">${element[2]}</div></td>
</tr>`;
      }
    }

    document.getElementById("counter2").innerHTML = `${index + 1}`;
    sessionStorage.setItem("counter2",`${index + 1}`);
  });
  tableBody.innerHTML = str;
}

function deletedFavItem(name) {
  var itemIndex = 0;
  console.log("Delete", name);
  itemJsonArrayStr = localStorage.getItem("itemJson2");
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
  localStorage.setItem("itemJson2", JSON.stringify(itemJsonArray));
  favUpdate();
  chkFavEmpty();
  //   countCheck();
}

function clearFavAll() {
  if (confirm("Do You Really Want To Clear?")) {
    console.log("Clearing The Storage");
    // localStorage.setItem("itemJson2", null);
    localStorage.removeItem("itemJson2");
    //   localStorage.clear();
    favUpdate();
    console.log(localStorage.removeItem("itemJson2"));
    document.getElementById("counter2").innerHTML = 0;
    localStorage.removeItem("counter2")
    chkFavEmpty();
    // countCheck();
    //   generateTotal();
  }
}

function chkFavEmpty() {
  console.log(document.getElementById("counter2").innerHTML);
  if (document.getElementById("counter2").innerHTML == 0) {
    document.getElementById("fav").style.display = "none";
    document.getElementById("fav-empty-msg").style.display = "block";
  } else {
    document.getElementById("fav").style.display = "block";
    document.getElementById("fav-empty-msg").style.display = "none";
  }
}
