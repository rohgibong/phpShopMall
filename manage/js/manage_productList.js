function move(productCode){
  document.detailForm.productCode.value = productCode;
  document.detailForm.submit();
}
function productAdd(){
  location.href="manage_productAdd.php"
}