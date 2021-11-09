var poster = 
{
  templates: {
    temp1: document.getElementById("template1"),
    temp1radio: document.getElementById("tempradio1"),
    temp2: document.getElementById("template2"),
    temp2radio: document.getElementById("tempradio2"),
    tempvalue: document.getElementsByName("templateradio"),
    url: "",
  },
  month: document.getElementById("monthSelect"),
  data: {
    image: document.getElementById("pageImg"),
    quote: document.getElementById("pageQuote"),
    section: document.getElementById("pageSection"),
    moment: {
      date: document.getElementById("date"),
      message: document.getElementById("pageSM"),
      btn: document.getElementById("placeDate"),
    }
  },
  submitData: document.getElementById("submitMonth01"),
  resetData: document.getElementById("resetbtn"),
};

poster.templates.url = "assets/images/templates/";

//INIT Canvas

var canvas = new fabric.Canvas("preview", {
  preserveObjectStacking: true,
});
canvas.backgroundColor = "white";

window.onload = (event) => {
  var url = "assets/images/templates/template 1/month0.png";
  fabric.Image.fromURL(url, function (t_img) {
    canvas.setBackgroundImage(t_img);
    canvas.renderAll();
    canvas.setHeight(t_img.height);
    canvas.setWidth(t_img.width);
  });
  poster.templates.temp1radio.checked = true;

  document.getElementById("downloadbtn").style.display = "none";
  /* BACK PAGES */
};

poster.templates.temp1.addEventListener("click", function () {
  poster.templates.temp1radio.checked = true;
  var url = "assets/images/templates/template 1/month0.png";
  poster.templates.url = url;
  fabric.Image.fromURL(url, function (t_img) {
    canvas.setBackgroundImage(t_img);
    canvas.renderAll();
    canvas.setHeight(t_img.height);
    canvas.setWidth(t_img.width);
  })
}, false);

poster.templates.temp2.addEventListener("click", function () {
  poster.templates.temp2radio.checked = true;
  var url = "assets/images/templates/template 2/month0.png";
  poster.templates.url = url;
  fabric.Image.fromURL(url, function (t_img) {
    canvas.setBackgroundImage(t_img);
    canvas.renderAll();
    canvas.setHeight(t_img.height);
    canvas.setWidth(t_img.width);
  })
}, false);
/* DELETE SELECTED ELEMENT */
$("html").keydown(function (e) {
  if (e.keyCode == 46) {
    canvas.remove(canvas.getActiveObject());
  }
});


/* ADD IMAGE */

poster.data.image.addEventListener("change", placeImg, false);
poster.data.quote.addEventListener("change", placeCQuote, false);
poster.data.section.style.display = "none";

var addPage = document.getElementById("nxtbtn");
addPage.disabled = true;

function placeImg(e) {
  if (poster.data.image.value == null) {
    addPage.disabled = true;
  } else {
    addPage.disabled = false;
  }
  var URL = window.webkitURL || window.URL;
  let image = {
    x: 226,
    y: 263,
    w: 806,
    h: 1073,
  }
  var url = URL.createObjectURL(e.target.files[0]);
  var clip = new fabric.Rect({
    fill: "white",
    top: image.y,
    left: image.x,
    width: image.w,
    height: image.h,
    absolutePositioned: true,
  });
  fabric.Image.fromURL(url, function (img) {
    img.clipPath = clip;
    img.set({
      transparentCorners: false,
      cornerColor: "white",
      cornerStrokeColor: "black",
      borderColor: "black",
      cornerSize: 20,
      padding: 5,
      cornerStyle: "circle",
      originX: 'center',
      originY: 'center',
      top: image.y + (clip.height * 0.5),
      left: image.x + (clip.width * 0.5),
      hasControls: true,
    });
    img.scaleToHeight(image.h);
    canvas.backgroundColor = "white";
    canvas.add(img);
    canvas.renderAll();
  });
}

function placeQuote(e) {
  var text = poster.data.quote.value;
  if (poster.data.quote.value == "") {
    addPage.disabled = true;
  } else {
    addPage.disabled = false;
  }
  var textbox = new fabric.Textbox(text, {
    fontSize: 56,
    fontFamily: "Arial",
    textAlign: "center",
    left: 183,
    top: 1400,
    width: 900,
    fill: "black",
    transparentCorners: false,
    cornerColor: "white",
    cornerStrokeColor: "black",
    borderColor: "black",
    cornerSize: 20,
    cornerStyle: "circle",
    lineHeight: 0.9,
    backgroundColor: "white",
    editable: false,
  });
  canvas.add(textbox);
}

function placeCQuote(e) {
  if (poster.data.moment.message.value == null) {
    addPage.disabled = true;
  } else {
    addPage.disabled = false;
  }
  var box = new fabric.Rect({
    height: 400,
    width: 750,
    fill: "white"
  });
  var text = poster.data.quote.value;
  var textbox = new fabric.Textbox(text, {
    fontSize: 64,
    fontFamily: "Arial",
    textAlign: "center",
    originX: 'center',
    originY: 'center',
    left: 0.5 * 750,
    top: 0.5 * 400,
    width: 740,
    height: 740,
    fixedFontSize: 30,
    fill: "black",
    fontWeight: "bold",
    editable: false,
    transparentCorners: false,
  });
  var group = new fabric.Group([box, textbox], {
    left: 1293,
    top: 641
  })
  canvas.add(group);
}

poster.data.moment.btn.addEventListener("click", () => {
  var box = new fabric.Rect({
    height: 200,
    width: 770,
    fill: 'rgba(0,0,0,0)',
  });
  var textbox = new fabric.Textbox(poster.data.moment.message.value, {
    fontSize: 56,
    fontFamily: "Arial",
    fontStyle: "Italic",
    originX: 'center',
    originY: 'bottom',
    textAlign: 'center',
    left: 0.5 * 770,
    top: 200,
    width: 800,
    fill: "white",
    transparentCorners: false,
    cornerColor: "white",
    cornerStrokeColor: "black",
    borderColor: "black",
    editable: false,
    lineHeight: 0.9,
  });
  var group = new fabric.Group([box, textbox], {
    left: 230,
    top: 30,
  })
  canvas.add(group);
});


let i = 0;
var months = [
  "Cover Page", "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

function renderCanvas() {
    addPage.disabled = true;
    poster.data.section.style.display = "block";
    poster.data.quote.removeEventListener("change", placeCQuote, false);
    poster.data.image.addEventListener("change", placeImg, false);
    poster.data.quote.addEventListener("change", placeQuote, false);
    poster.data.quote.removeEventListener("change", placeCQuote, false);
    document.querySelector("#alert").style.display = "block";
    poster.data.image.disabled = true;
    poster.data.quote.disabled = true;
    poster.data.moment.message.disabled = true;
    poster.data.moment.btn.disabled = true;
    var dataURL = canvas.toDataURL('image/png');
    $.ajax({
      type: "POST",
      url: "upload.php",
      data: {
        imgBase64: dataURL,
        month: "month" + (i),
        template: (poster.templates.temp1radio.checked) ? 1 : 2
      },
      success:function (o) {
        
        document.querySelector("#alert").style.display = "none";
        var obj = canvas.getObjects();
        obj.forEach(o => {
            canvas.remove(o);
        });
        console.log('saved');
        poster.data.image.disabled = false;
        poster.data.quote.disabled = false;
        poster.data.moment.message.disabled = false;
        poster.data.image.value = null;
        poster.data.quote.value = "";
        poster.data.moment.message.value = "";
        poster.data.moment.btn.disabled = false;
        if (i <= 12) {
          if (i < 12) {
            document.getElementById("month-id").innerText = months[i + 1];
            if (poster.templates.temp1radio.checked == true) {
              var url = "assets/images/templates/template 1/month" + (i + 1) + ".png";
              fabric.Image.fromURL(url, function (t_img) {
                canvas.setBackgroundImage(t_img);
                canvas.renderAll();
                canvas.setHeight(t_img.height);
                canvas.setWidth(t_img.width);
              });
            } else {
              var url = "assets/images/templates/template 2/month" + (i + 1) + ".png";
              fabric.Image.fromURL(url, function (t_img) {
                canvas.setBackgroundImage(t_img);
                canvas.renderAll();
                canvas.setHeight(t_img.height);
                canvas.setWidth(t_img.width);
              });
            }
          } else {
            addPage.style.display = "none";
            poster.resetData.style.display = "none";
            document.getElementById("downloadbtn").style.display = "inline-block";
            document.getElementById("thankyou_jumbo").style.display = "block";
            document.getElementById("downloadbtn").addEventListener("click", () => {
              document.getElementById("wait-messgage").style.display = "block";
            });
            document.getElementById("sample").style.display = "none";
            document.getElementById("template_container").style.display = "none";
          }
        }
        i++;
    },
    });
    console.log(i);
  
}

/* var obj = canvas.getObjects();
obj.forEach(o => {
  canvas.remove(o);
}); */