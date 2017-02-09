
function loadData() {

    var $body = $('body');
    var $wikiElem = $('#wikipedia-links');
    var $nytHeaderElem = $('#nytimes-header');
    var $nytElem = $('#nytimes-articles');
    var $greeting = $('#greeting');

    // clear out old data before new request
    $wikiElem.text("");
    $nytElem.text("");

    // load streetview

    // YOUR CODE GOES HERE!


    //loaction user typed in
    if($('#city').val()!== ""){
    var location  = $('#street').val() + ", "+$('#city').val();
      $greeting.text('So you want to live at ' + location + '?');
      //image from google streetview at location
      var imageUrl = 'http://maps.googleapis.com/maps/api/streetview?size=600x300&location='+location+'&key=AIzaSyCSXXOgQCWuwmnAMFBCtGjqXUGz6-QEcZ0';
    //  console.log(imageUrl);
      //  add background-image


          $('.bgimg').attr('src',imageUrl);

      // get articles about city from nyTimes
      var cityString = $('#city').val();

      var newYorkTimesUrl = "https://api.nytimes.com/svc/search/v2/articlesearch.json?q="+ cityString+'&sort=newest&api-key=10cbb059af054687af59a32196fe6008';

      var article ="";
      $.getJSON(newYorkTimesUrl, function(data){
          $nytHeaderElem.text("New York Times Articels about: " + cityString);
          articles = data.response.docs;

      //  console.log(articles);

        for(var i=0;i<articles.length;i++){
          var article = articles[i];
            $nytHeaderElem.append('<li class="article"> <a href="'+article.web_url+'">'+article.headline.main+'</a><p>'+ article.snippet+'</p></li>');
        }

      }).error(function(e){
          $nytHeaderElem.text("The New York Times article could not be loaded");
      });


      var wikiURL = "https://en.wikipedia.org/w/api.php?action=opensearch&search="+cityString+"&format=json&json&callback=wikiCallback";
      console.log(wikiURL);
      // Using jQuery
      var atricleText;

      var wikiTimeout = setTimeout(function(){
        $wikiElem.text('failed to load data from wiki');
      },5000);
      $.ajax({
        url:wikiURL,
        dataType: "jsonp",
        jsonp: "callback",
        success: function(response){
          var articles  = response[1];

          for(var i =0;i<articles.length;i++){
            atricleText = articles[i];
          //  console.log(atricleText);
          var url = "https://en.wikipedia.org/wiki/" + atricleText;
          $wikiElem.append('<li><a href="'+url +'">'+atricleText+'</a></li>');


          }
            clearTimeout(wikiTimeout);
        }
      })
}
      return false;

};


$('#form-container').submit(loadData);
