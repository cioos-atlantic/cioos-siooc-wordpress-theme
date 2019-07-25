var Isotope = require("isotope-layout");

$(window).on("load", function() {
  "use strict";
  if ($(".masonry-grid").length > 0) {
    new Isotope(".masonry-grid", {
      packery: {
        gutter: 0
      }
    });
  }
});
