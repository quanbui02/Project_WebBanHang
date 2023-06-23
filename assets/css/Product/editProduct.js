const onBack = () => {
    window.location.href =
      `/Project_WebBanHang/Template-Views/Admin/Product/Index.php`
  }

  function deleteImageContainer(element) {
    var imageContainer = element.parentNode;
    imageContainer.remove();
  }


  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };

  var processFiles = (input) => {
    var $input = document.getElementById("input");
    // If has files in this input.
    if (input.files) {
      for (var file in input.files) {
        if (isNaN(file)) return;
        var reader = new FileReader();
        let $imgContainer = document.createElement("div"); // Create a container for the image and the X button
        $imgContainer.setAttribute("class", "image-container");
        let $img = document.createElement("img");
        $img.setAttribute("class", "review");
        reader.onload = function(e) {
          $img.setAttribute("src", e.target.result);
        }
        reader.readAsDataURL(input.files[file]);

        let $deleteBtn = document.createElement("span"); // Create the X button
        $deleteBtn.setAttribute("class", "delete-btn");
        $deleteBtn.innerText = "X";
        $deleteBtn.addEventListener("click", function() {
          $imgContainer.remove(); // Remove the image container when the X button is clicked
        });

        $imgContainer.appendChild($img); // Add the image to the container
        $imgContainer.appendChild($deleteBtn); // Add the X button to the container
        $input.appendChild($imgContainer); // Add the image container to the input container
      }
    }
  }

  var $input = document.getElementById("images");
  $input.addEventListener("change", function() {
    processFiles(this)
  });