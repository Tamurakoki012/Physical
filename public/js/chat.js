$(function(){
  let carUl = $('.carousel > ul');
  $('.carousel > span').on('click', function(){
    if($(this).hasClass('prev')){
      carUl.animate({'margin-left':'-100%'}, 1000, function(){
        carUl.css('margin-left', '0');
        carUl.append($('.carousel > ul > li:first-child'));
      });
    } else{
      carUl.prepend($('.carousel > ul > li:last-child'));
      carUl.css('margin-left', '-100%');
      carUl.animate({'margin-left':'0'}, 1000);
    }
  });
  // 自動実行
  setInterval(function(){
        $('.carousel > span.next').click();
    },3000);
});
