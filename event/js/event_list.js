function changeEvent(value) {
  if (value == 'o'){
    location.href = 'event_list.php?process=o';
  } else {
    location.href = 'event_list.php?process=x';
  }
}