
$(document).ready(function(){
    var isCounting = false;
  var workTime = 25;
  var workTimeChanged = true;
  var breakTime = 5;
  var breakTimeChanged = true;
  var now;
  var x;
  var countDownDate;
  var breakWorkingTxt ='Working';
  var audio = new Audio('https://s3-us-west-2.amazonaws.com/devmatchkoller/sound/1-blop.wav');




      x = setInterval(function() {
          if(isCounting)
    {
      now = new Date();
      var distance = countDownDate - now ;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);


  $("#txt").text(minutes + ":" + seconds);
    }
  // If the count down is finished, write some text
        console.log(distance);
      if (distance < 1000)
      {
        //play ping noise
        audio.play();


        if($('#isWorking').text() =='Break')
          {
         var t = parseInt($('#workTime').text(),10);
         countDownDate.setMinutes ( now.getMinutes()  + t );
        distance = countDownDate - now;
        breakWorkingTxt = "Working";
        $('#isWorking').text(breakWorkingTxt);
          }else
            {
         var t = parseInt($('#break').text(),10);
         countDownDate.setMinutes ( now.getMinutes()  + t );
        distance = countDownDate - now;
          breakWorkingTxt = "Break"
        $('#isWorking').text(breakWorkingTxt);
            }
      }
    }, 1000);

//Add minute to working time
  $('#plusWorkTime').click(function(){
       if(!isCounting)
      {
    workTime +=1;
    workTimeChanged = true;
    $('#workTime').text(workTime);

      }
  });

    $('#minusWorkTime').click(function(){
         if(!isCounting)
      {
           if(workTime >1)
        {
          workTime -=1;
          workTimeChanged = true;
          $('#workTime').text(workTime);
        }
      }
  });

    $('#plusBreakTime').click(function(){
         if(!isCounting)
      {
    breakTime +=1;
    breakTimeChanged  =true;
    $('#break').text(breakTime);
      }
  });

    $('#minusBreakTime').click(function(){
      if(!isCounting)
      {
      if(breakTime >1)
        {
          breakTime -=1;
          breakTimeChanged = true;
          $('#break').text(breakTime);
        }
      }
  });



   $('#countDown').click(function(){
     if(isCounting){
         isCounting = false;
        $('#isWorking').text('Pause');
         console.log(1);
     }
     else
       {
        // console.log(0);
         if(workTimeChanged || breakTimeChanged){
         workTimeChanged = false;
         breakTimeChanged = false;
         now = new Date();
         countDownDate = new Date ( now );
           if(breakWorkingTxt =="Break")
             {
              var t = parseInt($('#break').text(),10);
             }else
               {
                var t = parseInt($('#workTime').text(),10);
               }

         countDownDate.setMinutes (now.getMinutes()  + t );
         isCounting = true;

       }
          isCounting = true;
           $('#isWorking').text(breakWorkingTxt);
       }
      });

});
