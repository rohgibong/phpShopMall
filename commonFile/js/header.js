function search(){
  let searchValue = document.getElementById("searchInput").value;
  if(searchValue == ""){
    alert("검색어를 입력해주세요.");
  } else {
    location.href="../../product/php/product_list.php?searchValue="+searchValue;
  }
}

function moveUserPage(){
  if(memberNo > 0){
    location.href='../../member/php/member_myPage.php';
  } else {
    location.href='../../login/php/login_loginPage.php';
  }
}

function moveCartPage(){
  location.href='../../cart/php/cart_list.php';
}
