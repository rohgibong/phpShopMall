let titleInput = document.eventForm.titleInput;
let contentInput = document.eventForm.contentInput;
let startDate = document.eventForm.startDate;
let endDate = document.eventForm.endDate;

let today = new Date();
let day = String(today.getDate()).padStart(2, '0');
let month = String(today.getMonth() + 1).padStart(2, '0');
let year = today.getFullYear();

today = year + '-' + month + '-' + day;
document.getElementById('startDate').value = today;

function addEvent(){
  if(titleInput.value == ""){
    alert("제목을 입력해주세요!");
    titleInput.focus();
    return;
  }
  if(startDate.value == ""){
    alert("시작일을 입력해주세요!");
    return;
  }
  if(endDate.value == ""){
    alert("종료일을 입력해주세요!");
    return;
  }
  if(contentInput.value == ""){
    alert("내용을 입력해주세요!");
    contentInput.focus();
    return;
  }
  if(confirm("등록 하시겠습니까?")){
    document.eventForm.submit();
  }
}