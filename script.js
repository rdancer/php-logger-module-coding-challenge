/**
 * Enliven the page using jQuery, events, and async XMLHttpRequests
 */

"use strict";

(function($){
  const LOG_PATH = $(document.currentScript).data("log-path");

  window.setInterval(updateLogPrintout, 1000);

  function updateLogPrintout(){
    fetch(LOG_PATH)
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
