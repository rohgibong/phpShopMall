let imageArray = [
  {
    imageName: "sideBanner1.jpg",
    link: "product_detail.php?productCode=11"
  },
  {
    imageName: "sideBanner2.jpg",
    link: "product_detail.php?productCode=3"
  },
  {
    imageName: "sideBanner3.jpg",
    link: "product_detail.php?productCode=6"
  },
  {
    imageName: "sideBanner4.jpg",
    link: "product_detail.php?productCode=12"
  },
  {
    imageName: "sideBanner5.jpg",
    link: "product_detail.php?productCode=14"
  },
  {
    imageName: "sideBanner6.jpg",
    link: "product_detail.php?productCode=7"
  },
  {
    imageName: "sideBanner7.jpg",
    link: "product_detail.php?productCode=1"
  }
];

let randomIndex = Math.floor(Math.random() * imageArray.length);
let randomImage = imageArray[randomIndex];

let imagePath = "../../img/sideBanner/" + randomImage.imageName;
let linkUrl = randomImage.link;
$("#adImage").attr("src", imagePath);
$("#adLink").attr("href", linkUrl);

$(document).ready(function (){
  function scrollToTop() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
  }

  $("#scrollTopBtn").click(function() {
    scrollToTop();
  });

  if($('#contentDiv').length){
    function stickyBanner(){
      let currentTop = parseInt($("#adContainer").css("top"));
      let animateTime = 800;
      $(window).scroll(function() {
        let position = $(window).scrollTop();
        let mov_pos;
        if(position < 1){
          mov_pos = currentTop;
        } else {
          mov_pos = currentTop + position;
        }
        $("#adContainer").stop().animate({"top": mov_pos + "px"}, animateTime);
      });
    }
    stickyBanner();
  }
});

let current = 1;
let wishBtn = document.getElementById("wishBtn");
let wishImg = document.getElementById("wishImg");
let form = document.getElementById('buyForm');

$('#plusBtn').click(function(){
  current++;
  if(current > 10){
		current=10;
		alert("최대 수량은 10개입니다.");
	}
  $('#amountInput').val(current);
  let totalPrice = current * productPrice;
  $('#totalPrice').val(totalPrice.toLocaleString());
  $('#allTotal').val(totalPrice.toLocaleString());
});

$('#minusBtn').click(function(){
  current--;
  if(current < 1){
		current=1;
		alert("최소 수량은 1개입니다.");
	}
  $('#amountInput').val(current);
  let totalPrice = current * productPrice;
  $('#totalPrice').val(totalPrice.toLocaleString());
  $('#allTotal').val(totalPrice.toLocaleString());
});

$(document).ready(function() {
  $('#amountInput').on('input', function() {
    if($(this).val() <= 0){
      alert("최소 수량은 1개입니다.");
      let amount = 1;
      $('#amountInput').val(amount);
      current = amount;
      let totalPrice = amount * productPrice;
      $('#totalPrice').val(totalPrice.toLocaleString());
      $('#allTotal').val(totalPrice.toLocaleString());
    } else if($(this).val() > 10){
      alert("최대 수량은 10개입니다.");
      let amount = 10;
      $('#amountInput').val(amount);
      current = amount;
      let totalPrice = amount * productPrice;
      $('#totalPrice').val(totalPrice.toLocaleString());
      $('#allTotal').val(totalPrice.toLocaleString());
    } else {
      let amount = $(this).val();
      $('#amountInput').val(amount);
      current = amount;
      let totalPrice = amount * productPrice;
      $('#totalPrice').val(totalPrice.toLocaleString());
      $('#allTotal').val(totalPrice.toLocaleString());
    }
  });
});

wishBtn.addEventListener("mouseover", function() {
  wishImg.src = "../../img/redheart.png";
});

wishBtn.addEventListener("mouseout", function() {
  wishImg.src = "../../img/heart.png";
});

function buy(){
  $('#memberNoData').val(memberNo);
  $('#productCodeData').val(productCode);
  $('#amountData').val(current);
  if(memberNo <= 0){
    location.href="../../login/php/login_loginPage.php";
  } else {
    form.submit();
  }
}

function addWish(){
  let param = "memberNo=" + memberNo + "&productCode=" + productCode;
  $.ajax({
		type: "post",
		data: param,
		url: "./process/addWishProc.php",
  });
}

function addCart(){
  let param = "memberNo=" + memberNo + "&productCode=" + productCode + "&amount=" + current;
  $.ajax({
		type: "post",
		data: param,
		url: "./process/addCartProc.php",
  });
}

function soldout(soldOut){
  if(soldOut == 'O'){
    alert("이미 품절된 상품입니다.");
  } else {
    if(confirm("해당 상품을 품절 상태로 바꾸시겠습니까?")){
      location.href="./process/soldoutProc.php?productCode="+productCode;
    }
  }
}

function modify(){
  if(confirm("해당 상품의 정보를 수정하시겠습니까?")){
    location.href="../../manage/php/manage_productModify.php?productCode="+productCode;
  }
}