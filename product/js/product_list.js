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

let subTitle1 = document.getElementById("subTitle1");
let subTitle2 = document.getElementById("subTitle2");
let subTitle3 = document.getElementById("subTitle3");
let subTitle4 = document.getElementById("subTitle4");

if(cateCode == 1){
  subTitle1.className = "changeTitle";
} else if(cateCode == 2){
  subTitle2.className = "changeTitle";
} else if(cateCode == 3){
  subTitle3.className = "changeTitle";
} else if(cateCode == 4){
  subTitle4.className = "changeTitle";
}

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