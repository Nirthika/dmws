@extends('layouts.app')

@section('content')
<script>
  window.onload = magnify;
  function magnify(imgID, zoom) {
    var img, glass, w, h, bw;
    img = document.getElementById(imgID);
    /*create magnifier glass:*/
    glass = document.createElement("DIV");
    glass.setAttribute("class", "img-magnifier-glass");
    /*insert magnifier glass:*/
    img.parentElement.insertBefore(glass, img);
    /*set background properties for the magnifier glass:*/
    glass.style.backgroundImage = "url('" + img.src + "')";
    glass.style.backgroundRepeat = "no-repeat";
    glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
    bw = 3;
    w = glass.offsetWidth / 2;
    h = glass.offsetHeight / 2;
    /*execute a function when someone moves the magnifier glass over the image:*/
    glass.addEventListener("mousemove", moveMagnifier);
    img.addEventListener("mousemove", moveMagnifier);
    /*and also for touch screens:*/
    glass.addEventListener("touchmove", moveMagnifier);
    img.addEventListener("touchmove", moveMagnifier);
    function moveMagnifier(e) {
      var pos, x, y;
      /*prevent any other actions that may occur when moving over the image*/
      e.preventDefault();
      /*get the cursor's x and y positions:*/
      pos = getCursorPos(e);
      x = pos.x;
      y = pos.y;
      /*prevent the magnifier glass from being positioned outside the image:*/
      if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
      if (x < w / zoom) {x = w / zoom;}
      if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
      if (y < h / zoom) {y = h / zoom;}
      /*set the position of the magnifier glass:*/
      glass.style.left = (x - w) + "px";
      glass.style.top = (y - h) + "px";
      /*display what the magnifier glass "sees":*/
      glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
    }
    function getCursorPos(e) {
      var a, x = 0, y = 0;
      e = e || window.event;
      /*get the x and y positions of the image:*/
      a = img.getBoundingClientRect();
      /*calculate the cursor's x and y coordinates, relative to the image:*/
      x = e.pageX - a.left;
      y = e.pageY - a.top;
      /*consider any page scrolling:*/
      x = x - window.pageXOffset;
      y = y - window.pageYOffset;
      return {x : x, y : y};
    }
  }
</script>

<div class="container" style="margin-top: 3%">
    <div class="accordion" id="accordionExample">
        <div class="row justify-content-center">
          <div class="card" style="width: 70%">
        <div class="card-body">
          <h5 class="card-title">Jaffna Dengue Risk Map</h5>
        </div>
        <div class="img-magnifier-container" style="width: 100%;">
          <img class="card-img-bottom" id="map1" src="images/denqueRiskMap1.png">
        </div>
      </div>      
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card" style="width: 70%">
        <div class="card-body">
          <h5 class="card-title">Jaffna Dengue Risk Map include Main Road and DS Division Boundry</h5>
        </div>
        <div class="img-magnifier-container" style="width: 100%">
          <img class="card-img-bottom" id="map2" src="images/denqueRiskMap2.jpg">
        </div>
      </div>      
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card" style="width: 70%">
        <div class="card-body">
          <h5 class="card-title">Jaffna Dengue Risk Map include Minor Road</h5>
        </div>
        <div class="img-magnifier-container" style="width: 100%">
          <img class="card-img-bottom" id="map3" src="images/denqueRiskMap3DS.jpg">
        </div>
      </div>    
        </div>
        <br/>
        <div class="row justify-content-center">
            <div class="card" style="width: 70%">
        <div class="card-body">
          <h5 class="card-title">Jaffna Dengue Risk Map include GS Division</h5>
        </div>
        <div class="img-magnifier-container" style="width: 100%">
          <img class="card-img-bottom" id="map4" src="images/denqueRiskMap4GS.jpg">
        </div>
      </div>      
        </div>
        <br/>        
    </div>
</div>

<script>
  /* Initiate Magnify Function with the id of the image, and the strength of the magnifier glass:*/
  magnify("map1", 3);
  magnify("map2", 3);
  magnify("map3", 3);
  magnify("map4", 3);
</script>
@endsection
