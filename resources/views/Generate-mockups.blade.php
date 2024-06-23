<?php use App\Models\Product; ?>

<!doctype html>
@extends('frontlayout.frontlayout')
@section('content')
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  
  <!------ Include the above in your HEAD tag ---------->

  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <style>
    table {
      width: 100%;
    }

    #example_filter {
      float: right;
    }

    #example_paginate {
      float: right;
    }

    label {
      display: inline-flex;
      margin-bottom: .5rem;
      margin-top: .5rem;

    }

    .drawing-area {
      position: absolute;
      top: 60px;
      left: 122px;
      z-index: 10;
      width: 200px;
      height: 400px;
      border: 1px solid transparent;
      /* Set border to transparent initially */
      transition: border-color 0.3s ease;

      /* Add a transition effect for a smooth change */
      &:hover {
        border-color: #ccc;
      }
    }

    .canvas-container {
      width: 200px;
      height: 400px;
      position: relative;
      user-select: none;
    }

    #tshirt-div {
      width: 452px;
      height: 548px;
      position: relative;
      background-color: #fff;
    }

    #canvas {
      position: absolute;
      width: 200px;
      height: 400px;
      left: 0px;
      top: 0px;
      user-select: none;
      cursor: default;
    }
  </style>
</head>

<body>


  <div class="container" style="margin-top:50px">
    <div class="row">
      <div class="col-sm-8">
        <div id="tshirt-div">
          <!-- 
                    Initially, the image will have the background tshirt that has transparency
                    So we can simply update the color with CSS or JavaScript dinamically
                -->
          <img id="tshirt-backgroundpicture" src="{{ asset('admin/product_image/largeimage/'.$productDetails['product_image']) }}" 
          style="height: 445px"/>

          <div id="drawingArea" class="drawing-area">
            <div class="canvas-container">
              <canvas id="tshirt-canvas" width="200" height="400"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <p>To remove a loaded picture on the T-Shirt select it and press the <kbd>DEL</kbd> key.</p>
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>

        <!---->
        <div
          style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius: 25px;padding: 20px;
          background-image: linear-gradient(to right top, #fc8689, #fd7ba0, #f475bd, #db78dc, #b082f9); color: white;">
          <label for="tshirt-custompicture">Upload your own design:</label>
          <input type="file" id="tshirt-custompicture" />
        </div>




        <button id="download-btn" type="button" class="btn btn-dark"
          style="margin-top:20px;     box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;  border-color: #ffde59;
    background: #ffde59;">Download T-Shirt</button>



      </div>
    </div>

    <!-- Carousel wrapper -->

    <!-- Carousel wrapper -->


  </div>

  <div class="container" style="margin-top:50px;">

    <h3 style=" background-color:#343a40;color: white; padding: 10px 15px;margin-bottom: 20px; ">Suggested vendors</h3>
    
  </div>

  <!-- Carousel wrapper -->
  <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel">
    <!-- Controls -->
    <div class="d-flex justify-content-center mb-4">
      <button class="carousel-control-prev position-relative" type="button" data-mdb-target="#carouselMultiItemExample"
        data-mdb-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next position-relative" type="button" data-mdb-target="#carouselMultiItemExample"
        data-mdb-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- Inner -->
    <div class="carousel-inner py-4">
      <!-- Single item -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <img class="rounded-circle shadow-1-strong mb-4"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp" alt="avatar" style="width: 150px;" />
              <h5 class="mb-3">Anna Deynah</h5>
              <p>UX Designer</p>
              <p class="text-muted">
                <i class="fas fa-quote-left pe-2"></i>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id
                officiis hic tenetur quae quaerat ad velit ab hic tenetur.
              </p>
              <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
              </ul>
            </div>

            <div class="col-lg-4 d-none d-lg-block">
              <img class="rounded-circle shadow-1-strong mb-4"
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(32).webp" alt="avatar" style="width: 150px;" />
              <h5 class="mb-3">John Doe</h5>
              <p>Web Developer</p>
              <p class="text-muted">
                <i class="fas fa-quote-left pe-2"></i>
                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid commodi.
              </p>
              <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li><i class="fas fa-star fa-sm"></i></li>
                <li>
                  <i class="fas fa-star-half-alt fa-sm"></i>
                </li>
              </ul>
            </div>


          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <img class="rounded-circle shadow-1-strong mb-4"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(3).webp" alt="avatar" style="width: 150px;" />
                <h5 class="mb-3">John Doe</h5>
                <p>UX Designer</p>
                <p class="text-muted">
                  <i class="fas fa-quote-left pe-2"></i>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id
                  officiis hic tenetur quae quaerat ad velit ab hic tenetur.
                </p>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                </ul>
              </div>

              <div class="col-lg-4 d-none d-lg-block">
                <img class="rounded-circle shadow-1-strong mb-4"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(4).webp" alt="avatar" style="width: 150px;" />
                <h5 class="mb-3">Alex Rey</h5>
                <p>Web Developer</p>
                <p class="text-muted">
                  <i class="fas fa-quote-left pe-2"></i>
                  Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                  suscipit laboriosam, nisi ut aliquid commodi.
                </p>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li>
                    <i class="fas fa-star-half-alt fa-sm"></i>
                  </li>
                </ul>
              </div>

              <div class="col-lg-4 d-none d-lg-block">
                <img class="rounded-circle shadow-1-strong mb-4"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(5).webp" alt="avatar" style="width: 150px;" />
                <h5 class="mb-3">Maria Kate</h5>
                <p>Photographer</p>
                <p class="text-muted">
                  <i class="fas fa-quote-left pe-2"></i>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                  praesentium voluptatum deleniti atque corrupti.
                </p>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="far fa-star fa-sm"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Single item -->
        <div class="carousel-item">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <img class="rounded-circle shadow-1-strong mb-4"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(6).webp" alt="avatar" style="width: 150px;" />
                <h5 class="mb-3">Anna Deynah</h5>
                <p>UX Designer</p>
                <p class="text-muted">
                  <i class="fas fa-quote-left pe-2"></i>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id
                  officiis hic tenetur quae quaerat ad velit ab hic tenetur.
                </p>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                </ul>
              </div>

              <div class="col-lg-4 d-none d-lg-block">
                <img class="rounded-circle shadow-1-strong mb-4"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(8).webp" alt="avatar" style="width: 150px;" />
                <h5 class="mb-3">John Doe</h5>
                <p>Web Developer</p>
                <p class="text-muted">
                  <i class="fas fa-quote-left pe-2"></i>
                  Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                  suscipit laboriosam, nisi ut aliquid commodi.
                </p>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li>
                    <i class="fas fa-star-half-alt fa-sm"></i>
                  </li>
                </ul>
              </div>

              <div class="col-lg-4 d-none d-lg-block">
                <img class="rounded-circle shadow-1-strong mb-4"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(7).webp" alt="avatar" style="width: 150px;" />
                <h5 class="mb-3">Maria Kate</h5>
                <p>Photographer</p>
                <p class="text-muted">
                  <i class="fas fa-quote-left pe-2"></i>
                  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                  praesentium voluptatum deleniti atque corrupti.
                </p>
                <ul class="list-unstyled d-flex justify-content-center text-warning mb-0">
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="fas fa-star fa-sm"></i></li>
                  <li><i class="far fa-star fa-sm"></i></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Inner -->
    </div>
    <!-- Carousel wrapper -->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.3/fabric.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
    <script>


      let canvas = new fabric.Canvas('tshirt-canvas');

      function updateTshirtImage(imageURL) {
        fabric.Image.fromURL(imageURL, function (img) {
          img.scaleToHeight(300);
          img.scaleToWidth(300);
          canvas.centerObject(img);
          canvas.add(img);
          canvas.renderAll();
        });
      }



      document.getElementById('tshirt-custompicture').addEventListener("change", function (e) {
        var reader = new FileReader();

        reader.onload = function (event) {
          var imgObj = new Image();
          imgObj.src = event.target.result;

          imgObj.onload = function () {
            var img = new fabric.Image(imgObj);
            img.scaleToHeight(300);
            img.scaleToWidth(300);
            canvas.centerObject(img);
            canvas.add(img);
            canvas.renderAll();
          };
        };

        if (e.target.files[0]) {
          reader.readAsDataURL(e.target.files[0]);
        }
      }, false);

      document.addEventListener("keydown", function (e) {
        var keyCode = e.keyCode;

        if (keyCode == 46) {
          console.log("Removing selected element on Fabric.js on DELETE key !");
          canvas.remove(canvas.getActiveObject());
        }
      }, false);

      document.getElementById('download-btn').addEventListener('click', function () {
        domtoimage.toPng(document.getElementById('tshirt-div'))
          .then(function (dataUrl) {
            var a = document.createElement('a');
            a.href = dataUrl;
            a.download = 'tshirt_with_logo.png';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
          })
          .catch(function (error) {
            console.error('Oops, something went wrong!', error);
          });
      });


    </script>

    <script>$(document).ready(function () {
        $('#example').DataTable(

          {

            "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
            "iDisplayLength": 5
          }
        );
      });


      function checkAll(bx) {
        var cbs = document.getElementsByTagName('input');
        for (var i = 0; i < cbs.length; i++) {
          if (cbs[i].type == 'checkbox') {
            cbs[i].checked = bx.checked;
          }
        }
      }</script>
</body>

</html>
@endsection