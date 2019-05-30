
function main(){
  $("#load-block").fadeOut(500);

  $("#go-to-about").click( function(){
    setTimeout(function(){
      $("#fading-header").css('opacity', '1');
    }, 600)
  });

  $("#login-submit").click( function(){
    $("#login-form").submit();
  });

  $("#admin-login-submit").click( function(){
    $("#admin-login-form").submit();
  });

  $('input[name=id]').keypress(function( event ) {
    if ( event.which == 13 ) {
      $('input[name=psw]').focus()
    }
  });

  $('input[name=psw]').keypress(function( event ) {
    if ( event.which == 13 ) {
      $("#login-form").submit();
      $("#admin-login-form").submit();
    }
  });

  $("#search").click( function(){
    if ( $("#search-box").width() > 40){
      $("#search-form").submit();
    } else {
      $("#search-box").animate({ width: 550 }, 500 );
      setTimeout(function(){
        $("#close").fadeIn(100);
      }, 50);
      setTimeout(function(){
        $("#search-form > select").fadeIn(150);
      }, 200);
      setTimeout(function(){ 
        $("#search-form > input").fadeIn(150);
      }, 450);
    };
  });

  $("#close").click( function(){
    $("#search-box").animate({ width: 40 }, 500 );
    $("#search-form > input").fadeOut(50);
      setTimeout(function(){
        $("#search-form > select").fadeOut(150);
      }, 100);
      setTimeout(function(){ 
        $("#close").fadeOut(100);
      }, 400);
  });

  //-----------TUTORIAL----------//

  $("#next-1").click( function(){
    $("#first").fadeOut(250, function(){
      $("#first").hide();
      $("#second").fadeIn(250);
    })
  });

  $("#next-2").click( function(){
    $("#second").fadeOut(250, function(){
      $("#second").hide();
      $("#third").fadeIn(250);
    })
  });

  $("#back-2").click( function(){
    $("#second").fadeOut(250, function(){
      $("#second").hide();
      $("#first").fadeIn(250);
    })
  });

  $("#back-3").click( function(){
    $("#third").fadeOut(250, function(){
      $("#third").hide();
      $("#second").fadeIn(250);
    })
  });

  //--------------------admin---------------------//
  $("#down-bt").click(function(){
    $("#create-coll-form").submit();
    $("#add-card-form").submit();
    $("#giveaway-form").submit();
  });

  $("input[name=power]").on( "input", function() {
    $("#power-input").html($(this).val());
  });

  $("input[name=rarity]").on( "input", function() {
    $("#rarity-input").html($(this).val());
  });

  $("input[name=price]").on( "input", function() {
    $("#price-input").html($(this).val());
  });

  $('input[name=password]').keypress(function( event ) {
    if ( event.which == 13 ) {
      $("#giveaway-form").submit();
    };
  });

  $(document).on("click", ".view", function(){
    user = $(this).parent().parent().find("p").html();
    user = user.split('•');
    user = user[0].replace(/\s+/g, '');
    window.location = "AdminUserProfile.php?user=" + user;
  });

  //--------------windows-mechanics---------------//

  $(document).on("click", ".skip, #window-block", function(){
    $(".window").fadeOut(200, function(){
      $(this).hide()
    });
    $("#window-block").fadeOut(200, function(){
      $(this).hide()
    });
  });

  $(document).on("click", ".return", function(){
    $("#one-collection").fadeOut(200, function(){
      $(this).hide()
    });
    $("#coll-store").fadeOut(200, function(){
      $(this).hide()
    });
  });

  $("#coll-bt").click( function(){
    $("#collections").fadeIn(200)
    $("#window-block").fadeIn(200)
  });

  $("#cards-bt").click( function(){
    $("#cards-in-planet").fadeIn(200)
    $("#window-block").fadeIn(200)
  });

  $("#store-bt").click( function(){
    $("#store").fadeIn(200)
    $("#window-block").fadeIn(200)
  });

  $("#chat-bt").click( function(){
    $("#chat-room").fadeIn(200)
    $("#window-block").fadeIn(200)
    updateChat();
  });

  $("#send-msg").click( function(){
    txt = $("#msg-to-send").val();
    sendMessage(txt);
    $("#msg-to-send").val("");
    updateChat();
  });

  $("#msg-to-send").keypress(function( event ) {
    if ( event.which == 13 ) {
      txt = $("#msg-to-send").val();
      sendMessage(txt);
      $("#msg-to-send").val("");
      updateChat();
    }
  });

  //-------------background-music--------------//
  var music = document.getElementById("bg-music");
  if (document.body.contains(music)) {
    music.volume = 0.4;
  }

  $("#icon-top-2").click( function(){
    console.log("io")
    if ($(this).attr('src') == "../media/sound_on.png"){
      music.pause()
      $(this).attr('src', '../media/sound_off.png' )
    } else {
      music.play()
      $(this).attr('src', '../media/sound_on.png' )
    }
  });

  //-------------AJAX REQUESTS--------------//
  function sendMessage(txt) {
    console.log("AQUI");
    console.log(txt);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "sendMessage.php?txt=" + txt);
    xmlhttp.send();
  };

  function updateChat() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("chat-interior").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "updateChat.php");
    xmlhttp.send();
  };

  function updateCards() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("cards-go-here").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "updateCards.php?_=" + new Date().getTime(), true);
    xmlhttp.send();
  };
  $(document).on("click", "#cards-bt", function(){
    updateCards()
  });

  function updateColls() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("colls-go-here").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "updateColls.php", true);
    xmlhttp.send();
  };
  $(document).on("click", "#coll-bt", function(){
    updateColls()
  });

  function updateOneColl(coll) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("one-collection").innerHTML = this.responseText;
        };
    };
    xmlhttp.open("GET", "updateOneColl.php?coll=" + coll, true);
    xmlhttp.send();
  }

  function updateStoreColl(coll) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("coll-store").innerHTML = this.responseText; 
        };
    };
    xmlhttp.open("GET", "updateStoreColl.php?coll=" + coll, true);
    xmlhttp.send();
  }

  $(document).on("click", ".coll", function(){
    coll= $(this).attr('id');
    if($(this).parent().attr('id') == "colls-to-store"){
      console.log("111");
      updateStoreColl(coll);
      $("#coll-store").fadeIn(200);
    } else if ($(this).parent().attr('id') == "colls-go-here") {
      console.log("222");
      updateOneColl(coll);
      $("#one-collection").fadeIn(200);
    } else {
      console.log("333");
      window.location.href = "AdminColl.php?coll=" + coll;
    };
    
  }); 

  function updateStore() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("colls-to-store").innerHTML = this.responseText; 
      };
    };
    xmlhttp.open("GET", "updateCollsToStore.php", true);
    xmlhttp.send();
  }
  $(document).on("click", "#store-bt", function(){
    updateStore();
  });

  function buyCard(card) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("money-status").innerHTML = this.responseText;
      };
    };
    xmlhttp.open("POST", "buyCard.php?card=" + card, true);
    xmlhttp.send();
    updateMoneyStatus();
  }
  
  $(document).on("click", ".buy", function(){
    card = $(this).parent().parent().find( "h3" ).html();
    coll = $(this).parent().parent().parent().parent().find( "h1" ).html();
    buyCard(card);

    setTimeout(updateStoreColl(coll), 300);
  });

  function deleteCard(card) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "deleteCard.php?card=" + card, true);
    xmlhttp.send();
  }

  $(document).on("click", ".delete-bt", function(){
    card = $(this).parent().find( "h3" ).html();
    coll = $(this).parent().parent().parent().find( "h2" ).html();
    deleteCard(card);
    //updateStatusMoney(card);
    updateCards();
  });

  function updatePopulationStatus() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("population-status").innerHTML = this.responseText;
      };
    };
    xmlhttp.open("GET", "updateStatusPopulation.php", true);
    xmlhttp.send();
  };

  function updateHappinessStatus() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("happiness-status").innerHTML = this.responseText;
      };
    };
    xmlhttp.open("GET", "updateStatusHappiness.php", true);
    xmlhttp.send();
  };

  function updateMoneyStatus() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("money-status").innerHTML = this.responseText;
      };
    };
    xmlhttp.open("GET", "updateStatusMoney.php", true);
    xmlhttp.send();
  };

  //--------ASYNCHRONOUS-UPDATES----------//


  if(window.location.href.indexOf("ome.php") > -1) {
    setInterval (function(){
      updateCards();
      updateColls();
      updateOneColl($("#coll-name").html());
      updateStore();
      updateStoreColl($("#store-coll-name").html());
      updatePopulationStatus();
      updateHappinessStatus();
      updateChat();
    }, 3000);
    
    updateMoneyStatus();
    setInterval (function(){
      updateMoneyStatus();
    }, 10000);
  }
  
};

$(document).ready(function(){main()});