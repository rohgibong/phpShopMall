let pointInput = document.getElementById("pointInput");
let userPoint = +point;
let getPoint = +pointInput.value;

function orderItem() {
  let selectedItems1 = [];
  let selectedItems2 = [];

  let productCodeInputs = document.querySelectorAll('input[name="productCodes[]"]');
  let amountInputs = document.querySelectorAll('input[name="amounts[]"]');
  let delMessage = document.getElementById('delTextArea').value;
  let pointInputValue = document.getElementById('pointInput').value;

  productCodeInputs.forEach(function(input) {
    selectedItems1.push(input.value);
  });

  amountInputs.forEach(function(input) {
    selectedItems2.push(input.value);
  });

  let form = document.createElement('form');
  form.method = 'post';
  form.action = './process/paymentProc.php';

  selectedItems1.forEach(function(item) {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'productCodes[]';
    input.value = item;
    form.appendChild(input);
  });

  selectedItems2.forEach(function(item) {
    let input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'amounts[]';
    input.value = item;
    form.appendChild(input);
  });

  let delMessageInput = document.createElement('input');
  delMessageInput.type = 'hidden';
  delMessageInput.name = 'delMessage';
  delMessageInput.value = delMessage;
  form.appendChild(delMessageInput);

  let pointInput = document.createElement('input');
  pointInput.type = 'hidden';
  pointInput.name = 'pointValue';
  pointInput.value = pointInputValue;
  form.appendChild(pointInput);

  let selectedPayMethod = document.querySelector('input[name="payMethod"]:checked');
  if (selectedPayMethod) {
    let payMethodInput = document.createElement('input');
    payMethodInput.type = 'hidden';
    payMethodInput.name = 'payMethod';
    payMethodInput.value = selectedPayMethod.value;
    form.appendChild(payMethodInput);
  }

  document.body.appendChild(form);
  form.submit();
}

function checkInput(event){
  let input = event.target.value;

  let onlyDigits = input.replace(/\D/g, '');

  let noZero = onlyDigits.replace(/^0+/, '');

  event.target.value = noZero;
}

function inputPoint(){
  if(userPoint < 1000){
    alert('포인트는 최소 1000P부터 사용 가능합니다.');
  } else if(userPoint > calTotalPrice){
    pointInput.value = calTotalPrice;
  } else {
    pointInput.value = point;
  }
}

function checkPoint(){
  if(userPoint < getPoint){
    alert('보유 포인트보다 많은 포인트를 입력하셨습니다.\n최대 '+userPoint+'P 까지 사용가능합니다.');
    pointInput.value = point;
  } else if(getPoint > 0 && getPoint < 1000){
    alert('포인트는 최소 1000P부터 사용 가능합니다.');
    pointInput.value = 0;
  } else if(getPoint > calTotalPrice){
    alert('포인트는 상품 결제금액보다 더 많이 사용하실 수 없습니다.\n상품의 금액만큼 포인트를 사용해주세요.');
    pointInput.value = calTotalPrice;
  }
}


pointInput.addEventListener('change', function() {
  checkPoint();
});