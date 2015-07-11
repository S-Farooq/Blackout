var page = require("webpage").create(),
    system = require("system");

if (system.args.length < 3) {
  console.log("Use capture.js URL [id]");
  phantom.exit();
}

var url = system.args[1];
var filename = Math.random().toString(36).slice(2) + ".png";
var id = system.args.length > 2 ? system.args[2] : null;

page.open(url, function(status) {
    if (status != "success") {
      console.log("Failed to load " + url);
      phantom.exit();
    }
    if (id) {
      var left = page.evaluate(function(id) {
        return document.getElementById(id).offsetLeft;
      }, id);
      var top = page.evaluate(function(id) {
        return document.getElementById(id).offsetTop;
      }, id);
      var width = page.evaluate(function(id) {
        return document.getElementById(id).offsetWidth;
      }, id);
      var height = page.evaluate(function(id) {
        return document.getElementById(id).offsetHeight;
      }, id);
      page.clipRect = {
        left: left,
        top: top,
        width: width,
        height: height
      };
    }
    page.render(filename);
    console.log(filename);
    phantom.exit();
});