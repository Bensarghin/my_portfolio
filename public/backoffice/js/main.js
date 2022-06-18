var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

  let imgInput = document.getElementById('image-input');
  
        imgInput.addEventListener('change', function (e) {
            if (e.target.files) {
                let imageFile = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = document.createElement("img");
                    img.onload = function (event) {
                        // Dynamically create a canvas element
                        var canvas = document.createElement("canvas");

                        // var canvas = document.getElementById("canvas");
                        var ctx = canvas.getContext("2d");

                        // Actual resizing
                        ctx.drawImage(img, 0, 0, 300, 300);

                        // Show resized image in preview element
                        var dataurl = canvas.toDataURL(imageFile.type);
                        document.getElementById("preview").src = dataurl;
                    }
                    img.src = e.target.result;
                }
                reader.readAsDataURL(imageFile);
            }
        });