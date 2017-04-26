
$(document).ready(function(){
  var isCounting = false;
  var workTime = 25;
  var workTimeChanged = true;
  var breakTime = 5;
  var breakTimeChanged = true;
  var now = new Date();
  var x;
  var countDownDate =new Date ();
  var breakWorkingTxt ='Working';
  var timer  = 1000;
  var distance;
  var pauseDate = new Date();
  var audio = new Audio('https://s3-us-west-2.amazonaws.com/devmatchkoller/sound/1-blop.wav');




x = setInterval(function() {
    if(isCounting)
    {
        now = new Date();
        //milliseconds till break or worktime
        distance = countDownDate.getTime() - now.getTime() ;

        // Time calculations
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        console.log(countDownDate);

        //display how much time is left with 2 digitits in each
        $("#txt").text(("0" + minutes).slice(-2) + ":" + ("0" + seconds).slice(-2));
      }
  // If the count down is finished, write some text
      if (distance < 1000)
      {
        //play ping noise when time mode is switched
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
         pauseDate = new Date();
         //console.log("pause:"+now);

     }
     else
       {
        // set new times once start up after pause
        now = new Date();
          // get how long paused
        distance = (now.getTime() - pauseDate.getTime() );
        // add how long paused to set Time
        countDownDate = new Date(distance + countDownDate.getTime());

        //if user changes time update clock
         if(workTimeChanged || breakTimeChanged){
         workTimeChanged = false;
         breakTimeChanged = false;
         now = new Date();
         countDownDate = new Date ();
           if(breakWorkingTxt =="Break")
             {
              var min = parseInt($('#break').text(),10);

             }else
               {
                var min = parseInt($('#workTime').text(),10);

               }

         countDownDate.setMinutes (now.getMinutes()  + min );
         isCounting = true;

       }
          isCounting = true;
           $('#isWorking').text(breakWorkingTxt);
       }
      });

});
