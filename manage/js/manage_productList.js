function productAdd(){
  location.href="manage_productAdd.php"
}

function deleteOne(productCode, productName, soldOut){
  if(soldOut == 'O'){
    alert("이미 품절된 상품입니다.");
  } else {
    if(confirm("해당 상품을 품절 상태로 바꾸시겠습니까? ("+productName+")")){
      location.href="./process/productDeleteProc.php?productCode="+productCode;
    }
  }
}