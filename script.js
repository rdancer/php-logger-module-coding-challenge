"use strict";

(function($){
  window.setInterval(updateLogPrintout, 1000);

  function updateLogPrintout(){
    fetch("access.log")
      .then(function(response){
      	return response.text();
      })
      .then(function(logText){
      	updateLogText(logText);
      });
  }

  function updateLogText(rawLogText) {
    let lines = rawLogText.match(/^.*((\r\n|\n|\r)|$)/gm);
    lines.reverse();
    lines = lines.map(x => x.replace(/(.{78})/g, "$1\n  "));
    let s = lines.join("");
    $("#logText").text(s);
  }

  $(".shape").click(function(){
    let shapeId = $(this).data("shape");
    fetch(`?shape=${shapeId}`);
  });
})(jQuery);
