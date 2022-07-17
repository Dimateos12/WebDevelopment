<!DOCTYPE html>
<html lang="en">
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css"
  rel="stylesheet"
/>

<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"
></script>
<head>
  <meta charset="utf-8" />
  <script data-ezscrex='false' data-cfasync='false' data-pagespeed-no-defer>var __ez = __ez || {}; __ez.stms = Date.now(); __ez.evt = {}; __ez.script = {}; __ez.ck = __ez.ck || {}; __ez.template = {}; __ez.template.isOrig = true; __ez.queue = (function () {
      var count = 0, incr = 0, items = [], timeDelayFired = false, hpItems = [], lpItems = [], allowLoad = true; var obj = {
        func: function (name, funcName, parameters, isBlock, blockedBy, deleteWhenComplete, proceedIfError) {
          var self = this; this.name = name; this.funcName = funcName; this.parameters = parameters === null ? null : (parameters instanceof Array) ? parameters : [parameters]; this.isBlock = isBlock; this.blockedBy = blockedBy; this.deleteWhenComplete = deleteWhenComplete; this.isError = false; this.isComplete = false; this.isInitialized = false; this.proceedIfError = proceedIfError; this.isTimeDelay = false; this.process = function () {
            log("... func = " + name); self.isInitialized = true; self.isComplete = true; log("... func.apply: " + name); var funcs = self.funcName.split('.'); var func = null; if (funcs.length > 3) { } else if (funcs.length === 3) { func = window[funcs[0]][funcs[1]][funcs[2]]; } else if (funcs.length === 2) { func = window[funcs[0]][funcs[1]]; } else { func = window[self.funcName]; }
            if (typeof func !== 'undefined' && func !== null) { func.apply(null, this.parameters); }
            if (self.deleteWhenComplete === true) delete items[name]; if (self.isBlock === true) { log("----- F'D: " + self.name); processAll(); }
          }
        }, file: function (name, path, isBlock, blockedBy, async, defer, proceedIfError) { var self = this; this.name = name; this.path = path; this.async = async; this.defer = defer; this.isBlock = isBlock; this.blockedBy = blockedBy; this.isInitialized = false; this.isError = false; this.isComplete = false; this.proceedIfError = proceedIfError; this.isTimeDelay = false; this.process = function () { self.isInitialized = true; log("... file = " + name); var scr = document.createElement('script'); scr.src = path; if (async === true) scr.async = true; else if (defer === true) scr.defer = true; scr.onerror = function () { log("----- ERR'D: " + self.name); self.isError = true; if (self.isBlock === true) { processAll(); } }; scr.onreadystatechange = scr.onload = function () { var state = scr.readyState; log("----- F'D: " + self.name); if ((!state || /loaded|complete/.test(state))) { self.isComplete = true; if (self.isBlock === true) { processAll(); } } }; document.getElementsByTagName('head')[0].appendChild(scr); } }, fileLoaded: function (name, isComplete) { this.name = name; this.path = ""; this.async = false; this.defer = false; this.isBlock = false; this.blockedBy = []; this.isInitialized = true; this.isError = false; this.isComplete = isComplete; this.proceedIfError = false; this.isTimeDelay = false; this.process = function () { }; }
      }; function init() { window.addEventListener("load", function () { setTimeout(function () { timeDelayFired = true; log('TDELAY -----'); processAll(); }, 5000); }, false); }
      function addFile(name, path, isBlock, blockedBy, async, defer, proceedIfError, priority) {
        var item = new obj.file(name, path, isBlock, blockedBy, async, defer, proceedIfError); if (priority === true) { hpItems[name] = item } else { lpItems[name] = item }
        items[name] = item; checkIfBlocked(item);
      }
      function setallowLoad(settobool) { allowLoad = settobool }
      function addFunc(name, func, parameters, isBlock, blockedBy, autoInc, deleteWhenComplete, proceedIfError, priority) {
        if (autoInc === true) name = name + "_" + incr++; var item = new obj.func(name, func, parameters, isBlock, blockedBy, deleteWhenComplete, proceedIfError); if (priority === true) { hpItems[name] = item } else { lpItems[name] = item }
        items[name] = item; checkIfBlocked(item);
      }
      function addTimeDelayFile(name, path) { var item = new obj.file(name, path, false, [], false, false, true); item.isTimeDelay = true; log(name + ' ... ' + ' FILE! TDELAY'); lpItems[name] = item; items[name] = item; checkIfBlocked(item); }
      function addTimeDelayFunc(name, func, parameters) { var item = new obj.func(name, func, parameters, false, [], true, true); item.isTimeDelay = true; log(name + ' ... ' + ' FUNCTION! TDELAY'); lpItems[name] = item; items[name] = item; checkIfBlocked(item); }
      function checkIfBlocked(item) { if (isBlocked(item) === true || allowLoad == false) return; item.process(); }
      function isBlocked(item) {
        if (item.isTimeDelay === true && timeDelayFired === false) { log(item.name + " blocked = TIME DELAY!"); return true; }
        if (item.blockedBy instanceof Array) { for (var i = 0; i < item.blockedBy.length; i++) { var block = item.blockedBy[i]; if (items.hasOwnProperty(block) === false) { log(item.name + " blocked = " + block); return true; } else if (item.proceedIfError === true && items[block].isError === true) { return false; } else if (items[block].isComplete === false) { log(item.name + " blocked = " + block); return true; } } }
        return false;
      }
      function markLoaded(filename) {
        if (!filename || 0 === filename.length) { return; }
        if (filename in items) { var item = items[filename]; if (item.isComplete === true) { log(item.name + ' ' + filename + ': error loaded duplicate') } else { item.isComplete = true; item.isInitialized = true; } } else { items[filename] = new obj.fileLoaded(filename, true); }
        log("markLoaded dummyfile: " + items[filename].name);
      }
      function logWhatsBlocked() { for (var i in items) { if (items.hasOwnProperty(i) === false) continue; var item = items[i]; isBlocked(item) } }
      function log(msg) { var href = window.location.href; var reg = new RegExp('[?&]ezq=([^&#]*)', 'i'); var string = reg.exec(href); var res = string ? string[1] : null; if (res === "1") console.debug(msg); }
      function processAll() { count++; if (count > 200) return; log("let's go"); processItems(hpItems); processItems(lpItems); }
      function processItems(list) { for (var i in list) { if (list.hasOwnProperty(i) === false) continue; var item = list[i]; if (item.isComplete === true || isBlocked(item) || item.isInitialized === true || item.isError === true) { if (item.isError === true) { log(item.name + ': error') } else if (item.isComplete === true) { log(item.name + ': complete already') } else if (item.isInitialized === true) { log(item.name + ': initialized already') } } else { item.process(); } } }
      init(); return { addFile: addFile, addDelayFile: addTimeDelayFile, addFunc: addFunc, addDelayFunc: addTimeDelayFunc, items: items, processAll: processAll, setallowLoad: setallowLoad, markLoaded: markLoaded, logWhatsBlocked: logWhatsBlocked, };
    })(); __ez.evt.add = function (e, t, n) { e.addEventListener ? e.addEventListener(t, n, !1) : e.attachEvent ? e.attachEvent("on" + t, n) : e["on" + t] = n() }, __ez.evt.remove = function (e, t, n) { e.removeEventListener ? e.removeEventListener(t, n, !1) : e.detachEvent ? e.detachEvent("on" + t, n) : delete e["on" + t] }; __ez.script.add = function (e) { var t = document.createElement("script"); t.src = e, t.async = !0, t.type = "text/javascript", document.getElementsByTagName("head")[0].appendChild(t) }; __ez.dot = {}; __ez.vep = (function () {
      var pixels = [], pxURL = "/detroitchicago/grapefruit.gif"; function AddPixel(vID, pixelData) { if (__ez.dot.isDefined(vID) && __ez.dot.isValid(pixelData)) { pixels.push({ type: 'video', video_impression_id: vID, domain_id: __ez.dot.getDID(), t_epoch: __ez.dot.getEpoch(0), data: __ez.dot.dataToStr(pixelData) }); } }
      function Fire() {
        if (typeof document.visibilityState !== 'undefined' && document.visibilityState === "prerender") { return; }
        if (__ez.dot.isDefined(pixels) && pixels.length > 0) {
          while (pixels.length > 0) {
            var j = 5; if (j > pixels.length) { j = pixels.length; }
            var pushPixels = pixels.splice(0, j); var pixelURL = __ez.dot.getURL(pxURL) + "?orig=" + (__ez.template.isOrig === true ? 1 : 0) + "&v=" + btoa(JSON.stringify(pushPixels)); __ez.dot.Fire(pixelURL);
          }
        }
        pixels = [];
      }
      return { Add: AddPixel, Fire: Fire };
    })();</script>
  <script data-ezscrex='false' data-cfasync='false'
    data-pagespeed-no-defer>__ez.pel = (function () {
        var pixels = [], pxURL = "/porpoiseant/army.gif"; function AddAndFirePixel(adSlot, pixelData) { AddPixel(adSlot, pixelData, 0, 0, 0, 0, 0); Fire(); }
        function AddAndFireOrigPixel(adSlot, pixelData) { AddPixel(adSlot, pixelData, 0, 0, 0, 0, 0, true); Fire(); }
        function GetCurrentPixels() { return pixels; }
        function AddPixel(adSlot, pixelData, revenue, est_revenue, bid_floor_filled, bid_floor_prev, stat_source_id, isOrig) {
          if (!__ez.dot.isDefined(adSlot) || __ez.dot.isAnyDefined(adSlot.getSlotElementId, adSlot.ElementId) == false) { return; }
          if (typeof isOrig === 'undefined') { isOrig = false; }
          var ad_position_id = parseInt(__ez.dot.getTargeting(adSlot, 'ap')); var impId = __ez.dot.getSlotIID(adSlot), adUnit = __ez.dot.getAdUnit(adSlot, isOrig); var compId = parseInt(__ez.dot.getTargeting(adSlot, "compid")); var lineItemId = 0; var creativeId = 0; var ezimData = getEzimData(adSlot); if (typeof ezimData == 'object') {
            if (ezimData.creative_id !== undefined) { creativeId = ezimData.creative_id; }
            if (ezimData.line_item_id !== undefined) { lineItemId = ezimData.line_item_id; }
          }
          if (__ez.dot.isDefined(impId, adUnit) && __ez.dot.isValid(pixelData)) { if ((impId !== "0" || isOrig === true) && adUnit !== "") { pixels.push({ type: "impression", impression_id: impId, domain_id: __ez.dot.getDID(), unit: adUnit, t_epoch: __ez.dot.getEpoch(0), revenue: revenue, est_revenue: est_revenue, ad_position: ad_position_id, ad_size: "", bid_floor_filled: bid_floor_filled, bid_floor_prev: bid_floor_prev, stat_source_id: stat_source_id, country_code: __ez.dot.getCC(), pageview_id: __ez.dot.getPageviewId(), comp_id: compId, line_item_id: lineItemId, creative_id: creativeId, data: __ez.dot.dataToStr(pixelData), is_orig: isOrig || __ez.template.isOrig, }); } }
        }
        function AddPixelById(impFullId, pixelData, isOrig, revenue) {
          var vals = impFullId.split('/'); if (__ez.dot.isDefined(impFullId) && vals.length === 3 && __ez.dot.isValid(pixelData)) {
            var adUnit = vals[0], impId = vals[2]; var pix = { type: "impression", impression_id: impId, domain_id: __ez.dot.getDID(), unit: adUnit, t_epoch: __ez.dot.getEpoch(0), pageview_id: __ez.dot.getPageviewId(), data: __ez.dot.dataToStr(pixelData), is_orig: isOrig || __ez.template.isOrig }; if (typeof revenue !== 'undefined') { pix.revenue = revenue; }
            pixels.push(pix);
          }
        }
        function Fire() {
          if (typeof document.visibilityState !== 'undefined' && document.visibilityState === "prerender") return; if (__ez.dot.isDefined(pixels) && pixels.length > 0) {
            var allPixels = [pixels.filter(function (pixel) { return pixel.is_orig }), pixels.filter(function (pixel) { return !pixel.is_orig })]; allPixels.forEach(function (pixels) {
              while (pixels.length > 0) {
                var isOrig = pixels[0].is_orig || false; var j = 5; if (j > pixels.length) { j = pixels.length; }
                var pushPixels = pixels.splice(0, j); var pixelURL = __ez.dot.getURL(pxURL) + "?orig=" + (isOrig === true ? 1 : 0) + "&sts=" + btoa(JSON.stringify(pushPixels)); if (typeof window.isAmp !== 'undefined' && isAmp && typeof window._ezaq !== 'undefined' && _ezaq.hasOwnProperty("domain_id")) { pixelURL += "&visit_uuid=" + _ezaq['visit_uuid']; }
                __ez.dot.Fire(pixelURL);
              }
            });
          }
          pixels = [];
        }
        function getEzimData(adSlot) {
          if (typeof _ezim_d == "undefined") { return false; }
          var adUnitName = __ez.dot.getAdUnitPath(adSlot).split('/').pop(); if (typeof _ezim_d === 'object' && _ezim_d.hasOwnProperty(adUnitName)) { return _ezim_d[adUnitName]; }
          for (var ezimKey in _ezim_d) { if (ezimKey.split('/').pop() === adUnitName) { return _ezim_d[ezimKey]; } }
          return false;
        }
        return { Add: AddPixel, AddAndFire: AddAndFirePixel, AddAndFireOrig: AddAndFireOrigPixel, AddById: AddPixelById, Fire: Fire, GetPixels: GetCurrentPixels, };
      })();</script>
  <!-- Basic -->

  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />

  <title>Timups</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <link rel='canonical' href='http://localhost/WebDevelopment/strona/index.html' />
  <script type="text/javascript">var ezouid = "1";</script>
  <base href="http://localhost/WebDevelopment/strona/index.html">
  <script type='text/javascript'>
    var ezoTemplate = 'old_site_noads';
    if (typeof ezouid == 'undefined') {
      var ezouid = 'none';
    }
    var ezoFormfactor = '1';
    var ezo_elements_to_check = Array();
  </script><!-- START EZHEAD -->
  <script data-ezscrex="false" type='text/javascript'>
    var soc_app_id = '0';
    var did = 317139;
    var ezdomain = 'html.design';
    var ezoicSearchable = 1;
  </script>
  <!--{jquery}-->
  <!-- END EZHEAD -->
  <script data-ezscrex="false" type="text/javascript"
    data-cfasync="false">var _ezaq = { "ad_cache_level": 0, "ad_lazyload_version": 0, "ad_load_version": 0, "city": "Rome", "country": "IT", "days_since_last_visit": -1, "domain_id": 317139, "engaged_time_visit": 0, "ezcache_level": 2, "ezcache_skip_code": 0, "form_factor_id": 1, "framework_id": 1, "is_return_visitor": false, "is_sitespeed": 0, "last_page_load": "", "last_pageview_id": "", "lt_cache_level": 0, "metro_code": 0, "page_ad_positions": "", "page_view_count": 0, "page_view_id": "5b3ae88e-23cd-4b51-5e39-d8aaa5f18211", "position_selection_id": 0, "postal_code": "00139", "pv_event_count": 0, "response_size_orig": 23718, "response_time_orig": 5, "serverid": "18.198.207.183:24802", "state": "RM", "t_epoch": 1657049632, "template_id": 120, "time_on_site_visit": 0, "url": "https://html.design/demo/timups/index.html", "user_id": 0, "word_count": 384, "worst_bad_word_level": 0 }; var _ezExtraQueries = "&ez_orig=1";</script>
  <script data-ezscrex='false' data-pagespeed-no-defer data-cfasync='false'>
    function create_ezolpl(pvID, rv) {
      var d = new Date();
      d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      __ez.ck.setByCat("ezux_lpl_317139=" + new Date().getTime() + "|" + pvID + "|" + rv + "; " + expires, 3);
    }
    function attach_ezolpl(pvID, rv) {
      if (document.readyState === "complete") {
        create_ezolpl(pvID, rv);
      }
      if (window.attachEvent) {
        window.attachEvent("onload", create_ezolpl, pvID, rv);
      } else {
        if (window.onload) {
          var curronload = window.onload;
          var newonload = function (evt) {
            curronload(evt);
            create_ezolpl(pvID, rv);
          };
          window.onload = newonload;
        } else {
          window.onload = create_ezolpl.bind(null, pvID, rv);
        }
      }
    }

    __ez.queue.addFunc("attach_ezolpl", "attach_ezolpl", ["5b3ae88e-23cd-4b51-5e39-d8aaa5f18211", "false"], false, ['/detroitchicago/boise.js'], true, false, false, false);
  </script>
  <script
    type="text/javascript">var _audins_dom = "html_design", _audins_did = 317139; __ez.queue.addFile('/detroitchicago/cmbv2.js', '/detroitchicago/cmbv2.js?gcb=195-0&cb=04-1y02-5y06-12y07-1y19-6y0b-5y0d-16y13-3y17-4y1c-2y21-3y2d-4y55-1&cmbcb=86&sj=x04x02x06x07x19x0bx0dx13x17x1cx21x2dx55', true, [], true, false, true, false);</script>
  <script type="text/javascript"
    defer>__ez.queue.addFile('/detroitchicago/cmbdv2.js', '/detroitchicago/cmbdv2.js?gcb=195-0&cb=03-5y0c-5y18-4&cmbcb=86&sj=x03x0cx18', true, ['/detroitchicago/cmbv2.js'], true, false, true, false);</script>
</head>

<body>

  <div class="hero_area">
    <div class="hero_social">
      <a href="">
        <i class="fa fa-facebook" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-twitter" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-linkedin" aria-hidden="true"></i>
      </a>
      <a href="">
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </a>
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              Timups
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="watches.html"> Watches </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
            </ul>
            <div class="user_option-box">
              <a href="logginform.html">
                <i class="fa fa-user"  href="" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-cart-plus" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-search" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Smart Watches
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit
                      amet, lobortis semper quam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Smart Watches
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit
                      amet, lobortis semper quam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="container-fluid ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Smart Watches
                    </h1>
                    <p>
                      Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit
                      amet, lobortis semper quam.
                    </p>
                    <div class="btn-box">
                      <a href="" class="btn1">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="images/slider-img.png" alt="" />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
          <li data-target="#customCarousel1" data-slide-to="1"></li>
          <li data-target="#customCarousel1" data-slide-to="2"></li>
        </ol>
      </div>

    </section>
    <!-- end slider section -->
  </div>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Watches
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6 ">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w1.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $300
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  Featured
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w2.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $125
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w3.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $110
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w4.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $145
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w5.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $195
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6  col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w6.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $170
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-6 col-xl-3">
          <div class="box">
            <a href="">
              <div class="img-box">
                <img src="images/w1.png" alt="" />
              </div>
              <div class="detail-box">
                <h6>
                  Smartwatch
                </h6>
                <h6>
                  Price:
                  <span>
                    $230
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View All
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container  ">
      <div class="row">
        <div class="col-md-6 col-lg-5 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="" />
          </div>
        </div>
        <div class="col-md-6 col-lg-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About Us
              </h2>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If
              you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing
              hidden in
              the middle of text. All
            </p>
            <a href="">
              Read More
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- feature section -->

  <section class="feature_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Features Of Our Watches
        </h2>
        <p>
          Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f1.png" alt="" />
            </div>
            <div class="detail-box">
              <h5>
                Fitness Tracking
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
              <a href="">
                <span>
                  Read More
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f2.png" alt="" />
            </div>
            <div class="detail-box">
              <h5>
                Alerts &amp; Notifications
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
              <a href="">
                <span>
                  Read More
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f3.png" alt="" />
            </div>
            <div class="detail-box">
              <h5>
                Messages
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
              <a href="">
                <span>
                  Read More
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="box">
            <div class="img-box">
              <img src="images/f4.png" alt="" />
            </div>
            <div class="detail-box">
              <h5>
                Bluetooth
              </h5>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
              </p>
              <a href="">
                <span>
                  Read More
                </span>
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end feature section -->

  <!-- contact section -->

  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contact Us
              </h2>
            </div>
            <form action="">
              <div>
                <input type="text" placeholder="Full Name " />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/contact-img.jpg" alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel client_owl-carousel">
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/c1.jpg" alt="" />
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Mark Thomas
                    </h5>
                    <h6>
                      Customer
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore
                  et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum
                  dolore eu fugia
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="img-box">
                <img src="images/c2.jpg" alt="" />
              </div>
              <div class="detail-box">
                <div class="client_info">
                  <div class="client_name">
                    <h5>
                      Alina Hans
                    </h5>
                    <h6>
                      Customer
                    </h6>
                  </div>
                  <i class="fa fa-quote-left" aria-hidden="true"></i>
                </div>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                  labore
                  et
                  dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum
                  dolore eu fugia
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_detail">
            <h4>
              About
            </h4>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin
              words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Reach at..
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  <span class="__cf_email__" data-cfemail="caaeafa7a58aada7aba3a6e4a9a5a7">[email&#160;protected]</span>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="footer_contact">
            <h4>
              Subscribe
            </h4>
            <form action="#">
              <input type="text" placeholder="Enter email" />
              <button type="submit">
                Subscribe
              </button>
            </form>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 footer-col">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-info">
        <p>
          © <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&amp;callback=myMap"></script>
  <!-- End Google Map -->


  <include id="includedContent"></include>
  <script>
    $(function () {
      $("#includedContent").load("../htmlads.html");
    });
  </script>



  <script type='text/javascript' style='display:none;' async>
  </script>

  <script type="text/javascript" data-cfasync="false"></script>
</body>

</html>