function move(productCode){
  document.detailForm.productCode.value = productCode;
  document.detailForm.submit();
}

function productAdd(){
  location.href="manage_productAdd.php"
}

function deleteOne(productCode, productName){
  if(confirm("해당 상품을 삭제하시겠습니까? ("+productName+")")){
    location.href="./process/productDeleteProc.php?productCode="+productCode;
  }
}