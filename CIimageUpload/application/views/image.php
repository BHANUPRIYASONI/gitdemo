<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id=preview>

</div>

</body>
</html>

<script>

// Object.keys(localStorage).forEach((key)=>{
        
//         arr.push(key);
//         //console.log(arr.indexOf(key));
          
//      });
     var show=document.getElementById('preview');
        var str="";
        Object.keys(localStorage).forEach((key)=>{
        str += `<div class='alert alert-primary' role='alert'>
                    <div class='close'>
                        <span>`+key+`</span><p>`+localStorage.getItem(key)+`</p></span>
                    </div>
                    <div>
                        <span id='cross' onclick="remove('`+key+`')"><i class="bi bi-file-x"></i></span>&nbsp&nbsp
                        <span id='cross' onclick="edit('`+key+`')"><i class="bi bi-pencil-square"></i></span>
                    </div>
                </div>`;
        //console.log(localStorage.getItem(heading.value));
        
        });
        show.innerHTML = str;
</script>
