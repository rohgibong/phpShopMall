function orderItem() {
  let selectedItems1 = [];
  let selectedItems2 = [];

  let productCodeInputs = document.querySelectorAll('input[name="productCodes[]"]');
  let amountInputs = document.querySelectorAll('input[name="amounts[]"]');
  let delMessage = document.getElementById('delTextArea').value;

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

  document.body.appendChild(form);
  form.submit();
}
