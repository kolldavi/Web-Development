
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
    var location  = $('#street').val() + ","+$('#city').val();
      $greeting.text('So you want to live at ' + location + '?');
      //image from google streetview at location
      var imageUrl = 'https://maps.googleapis.com/maps/api/streetview?size=600x300&location='+location+'&key=1486658852767';
    //  console.log(imageUrl);
      //  add background-image
      $body.append('<img class="bgimg" src="'+imageUrl+'">');


      // Built by LucyBot. www.lucybot.com
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
      }).error(function(){
          $nytHeaderElem.text("The New York Times article could not be loaded");
      });
      return false;
};

$('#form-container').submit(loadData);
