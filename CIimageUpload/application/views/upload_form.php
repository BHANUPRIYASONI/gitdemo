
<!doctype html>
<html lang="en">

    
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  
    <style>
    #show {
        background-color: antiquewhite;
        width: 60%;
        padding-top: 3%;
        margin-left: 37%;
        margin-top: -13%;
        padding-left: 3%;
        padding-right: 3%;
        padding-bottom: 2%;
    }

    #container {
        background-color: antiquewhite;
        width: 32%;
        margin-left: 5px;
        line-height: normal;
    }

    .close {
        padding-left: 3%;
        margin-left: -8px;
    }

    #cross {
        color: red;
        cursor: pointer;
    }

    .alert alert-primary {
        text-align: justify;
    }
    .error {
        color: red;
    }
    </style>
    
<head>
    
    <title>imageUpload</title>
</head>

<body>

        <div >
            <h1>Image Upload Using Ajax</h1>
            <form class="imageUploadUsingAjax" enctype="multipart/form-data">
                
                <div>
                User Name <input type=text name="username" id="username">
                </div>
                <br>

                <div>
                Upload Image <input type="file" name="userImage[]" multiple id="userImage">
                </div>
                <br>
                <div id="imageDiv">
               </div>
               <!-- <a href="" onclick="myFunction()">see images</a> -->
               <br>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>

        <div class="col-md-8" id="show">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="info">
                
                </tbody>
            </table>
        </div>
    </div>
    </body>
    </html>

    <script>
        $('.imageUploadUsingAjax').validate({
            rules:{
                username:{
                    required: true,
                },
                userImage:{
                    required: true,
                },
            },
            message:{
                username:{
                    required: "Please enter name",
                },
                userImage:{
                    required: "Please select image",
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "<?php echo base_url('imageUploadApi');?>",
                    type: 'post',
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    data: new FormData($('.imageUploadUsingAjax')[0]),
                    success: function(response) {
                        if (response.status == 200) {
                        $('.imageUploadUsingAjax')[0].reset();
                        $('#username').val('');
                        $('#userImage').val('');
                        getData();
                    } else {
                        alert(response.message);
                    }  
                    }
                });
            }

        })


    getData();

    function getData() {
        $.ajax({
            url: "<?php echo base_url();?>getData",
            type: 'get',
            dataType: 'json',
            success: function(response) {
                // console.log(response.userData);
                var main_content = '';
                if (response.userData.length > 0) {
                    $.each(response.userData, function(index, row) {
                        main_content +=
                      `<tr>
                        <td>` + (++index) + `</td>
                        <td>` + row.userName + `</td>
                        <td><img src="<?php echo base_url();?>` + row.userImage + `" alt="" width="30" height="30" ></td>
                        <td>
                        <button type="button" onclick="setUserInfo(` + row.user_id + `);" class="btn btn-info me-2">Edit</button>
                        <button type="button" onclick="removeUserInfo(` + row.user_id + `);" class="btn btn-warning">Delete</button>
                        </td>
                        </tr>`;
                        //console.log(main_content);
                    })
                } else {
                    main_content = `No Data Found!`
                }

                $('#info').html(main_content);
                
            }
        });
    }

    
    window.onload = function () {
    var fileUpload = document.getElementById("userImage");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("userImage");
            dvPreview.innerHTML = "";
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "100";
                        img.width = "100";
                        img.src = e.target.result;
                        document.getElementById("imageDiv").appendChild(img);
                    }
                 reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};


// function myFunction() {
//     bannerImage = document.getElementById('imageDiv');
// imgData = getBase64Image(bannerImage);
// localStorage.setItem("imgData", imgData);
//    var Image = document.getElementById('imageDiv')[0].value;
//    console.log(Image.value);    
//   var storage = localStorage.setItem(Image.value); 
//    Image.value="";
      
//     }
//     window.open("<?php echo base_url("image")?>", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=100,left=500,width=600,height=400");

// function swipe() {
//    var largeImage = document.getElementById('largeImage');
//    largeImage.style.display = 'block';
//    largeImage.style.width=200+"px";
//    largeImage.style.height=200+"px";
//    var url=largeImage.getAttribute('src');
//    window.open(url,'Image','width=largeImage.stylewidth,height=largeImage.style.height,resizable=1');
// }


</script>