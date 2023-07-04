let productName = document.productForm.productName;
let detailName = document.productForm.detailName;
let productPrice = document.productForm.productPrice;
let artistName = document.productForm.artistName;
let stock = document.productForm.stock;
let cateCode = document.productForm.cateCode;
let delPeriod = document.productForm.delPeriod;
let delPrice = document.productForm.delPrice;
let titleImg = document.productForm.titleImg;
let mainImg = document.productForm.mainImg;
let contentImg = document.productForm.contentImg;
let soldOut = document.productForm.soldOut;

function formInput(checkValue){
  if(productName.value == ""){
    alert("상품명을 입력해주세요.");
    productName.focus();
    return;
  }
  if(detailName.value == ""){
    alert("상품명을 입력해주세요.");
    detailName.focus();
    return;
  }
  if(productPrice.value == ""){
    alert("상품가격을 입력해주세요.");
    productPrice.focus();
    return;
  }
  if(productPrice.value <= 0){
    alert("상품가격을 정확하게 입력해주세요.");
    productPrice.focus();
    productPrice.select();
    return;
  }
  if(artistName.value == ""){
    alert("아티스트명을 입력해주세요.");
    artistName.focus();
    return;
  }
  if(stock.value == ""){
    alert("상품수량을 입력해주세요.");
    stock.focus();
    return;
  }
  if(stock.value < 0){
    alert("상품수량을 정확하게 입력해주세요.");
    stock.focus();
    stock.select();
    return;
  }
  if(delPeriod.value == ""){
    alert("배송기간을 입력해주세요.");
    delPeriod.focus();
    return;
  }
  if(delPeriod.value <= 0){
    alert("배송기간을 정확하게 입력해주세요.");
    delPeriod.focus();
    delPeriod.select();
    return;
  }
  if(delPrice.value == ""){
    alert("배송비를 입력해주세요.");
    delPrice.focus();
    return;
  }
  if(checkValue == "add"){
    if(titleImg.value == ""){
      alert("배너이미지를 등록해주세요.");
      titleImg.focus();
      return;
    }
    if(mainImg.value == ""){
      alert("메인이미지를 등록해주세요.");
      mainImg.focus();
      return;
    }
    if(contentImg.value == ""){
      alert("설명이미지를 등록해주세요.");
      contentImg.focus();
      return;
    }
    if(confirm("등록 하시겠습니까?")){
      document.productForm.submit();
    }
  } else {
    if(confirm("수정 하시겠습니까?")){
      document.productForm.submit();
    }
  }
}

function checkFile(input){
  let fileElement = document.getElementById(input);
  let filePath = fileElement.value;
  let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

  if(!allowedExtensions.exec(filePath)){
      alert('이미지 파일이 아닙니다.\n이미지 파일만 첨부해주세요.');
      fileElement.value = '';
      return false;
  }
  return true;
}


document.getElementById('titleImg').addEventListener('change', function() {
  checkFile('titleImg');
});

document.getElementById('mainImg').addEventListener('change', function() {
  checkFile('mainImg');
});

document.getElementById('contentImg').addEventListener('change', function() {
  checkFile('contentImg');
});

function goBack(){
  window.history.back();
}