  <?php 
  session_start();
  if(!isset($_SESSION['user'])){
      include 'index.php';
      die();
  }
  ?>


<html>
<head>
<style>
@import url("https://fonts.googleapis.com/css?family=Catamaran:600,800");

:root {
  --font: "Catamaran";
  --title: 800;
  --button: 600;
}



h1 {
  font-family: var(--font);
  font-weight: var(--title);
  margin: 10px;
  font-size: 36px;
  top: 30%;
  position: relative;
}

button#slippingButton {
  transform-origin: 0 0;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  width: 88px;
  height: 44px;
  border-radius: 22px;
  border: none;
  outline: none;
  background: #e75a70;
  color: #f9f9f9;
  font-family: var(--font);
  font-weight: var(--button);
  font-size: 16px;
}

button::-moz-focus-inner {
  border: 0;
}

canvas {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

#goofy {
  border: 3px solid green;
  height: 80px;
  width: 200px;
  -webkit-filter: url("#goo");
  filter: url("#goo");
  position: relative;
}

#devil {
  filter: contrast(1.4);
}

.containerr {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  left: 0;
  right: 0;
}

.slipping {
  -webkit-transition: transform 0.5s cubic-bezier(0, 0.97, 0.77, 1.12);
  transition: transform 0.5s cubic-bezier(0, 0.97, 0.77, 1.12);
}

.slippingSlave {
  -webkit-transition: transform 0.5s cubic-bezier(0.87, 0.5, 0.37, 1.76);
  transition: transform 0.5s cubic-bezier(0.87, 0.5, 0.37, 1.76);
}

.slave {
  transform-origin: 0 0;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  width: 48px;
  height: 44px;
  border-radius: 15px;
  border: none;
  outline: none;
  background: #888;
}

</style>

</head>
<?php include "headerbefore.php"?> 
<body>

 
   
<br><br><br><br><br><br><br> <br> 
<form method="POST">

<?php
            // if($_GET['user']=="")
             
         //   echo("<script> window.open('singinform.php','_parent'); </script>");
             //     else
               $ss=$_SESSION['user'];
             //     {
         echo( "<h3 style='color:black'><b> Are you sure delete your account : </b></h3>".$ss);
                //  }
                ?>

              <?php    
             if(isset($_POST['submit']) and $_POST['submit']=="yes")
              {
                  $ss=$_SESSION['user'];

               include "connection.php";
               $db=new connection();
               $insert="delete from clint where Username='$ss'";
               $add= $db->rundb($insert);
               if($add=="Ok")
                    echo("<script> window.open('index.php','_parent');</script>");                
              }
          ?>
<h1>Unsubscribe? 💔</h1>
<div class="containerr" style="filter: url('#goo'); -webkit-filter: url('#goo');">
  <div style="position: relative; top: 30%;">
    <button class="slave slippingSlave"></button>
    <button id="slippingButton" name="submit" class="slipping">yes <span id="devil">😈</span></button>
  </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" version="1.1">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                <feComposite in="SourceGraphic" in2="goo" operator="atop" />
            </filter>
        </defs>
    </svg>
                

      

             
          
  
    </form>


 
<script>
const slippingButton = document.querySelector("#slippingButton");
const slave = document.querySelector(".slave");
const goofy = document.querySelector("#goofy");
var canvas;
let centerX, centerY, ran;
let x = 0,
  y = 0,
  r = 0,
  count = 0;

const circle = () => {
  const radius = 150;
  let circle = [];
  let x = Math.random() * 150;
  let y = Math.sqrt(radius ** 2 - x ** 2);

  if (Math.random() < 0.5) {
    circle = [x, y];
  } else {
    circle = [-x, -y];
  }

  return circle;
};

const transition = (moveX, moveY) => {
  slippingButton.style = `left: 20%; top: 20%;`;
  slave.style = `left: 20%; top: 20%;`;
};

slippingButton.addEventListener("mouseover", function() {
  let position = circle();
  count++;
  if (count == 3) {
    count = 0;
    console.log("RESET!!! 🤯");

    x = position[0];
    y = position[1];
  } else {
    x += position[0];
    y += position[1];
  }
  slippingButton.style = `transform: translate(${x}px, ${y}px)`;
  slave.style = `transform: translate(${x}px, ${y}px)`;
  console.log(slippingButton.style.transform);
});

function setup() {
  canvas = createCanvas(windowWidth, windowHeight);
  r =
    windowWidth > windowHeight
      ? (windowHeight - 100) / 3
      : (windowWidth - 100) / 3;
  console.log(r);
}

function draw() {
  fill(210);
  noStroke();
  centerX =
    slippingButton.getBoundingClientRect().x + slippingButton.offsetWidth / 2;
  centerY =
    slippingButton.getBoundingClientRect().y + slippingButton.offsetHeight / 2;
  for (let i = 0; i < 3; ++i) {
    ran = random(40 - i * 5);
    ellipse(centerX, centerY, ran, ran);
    fill(200 - i * 10);
  }
}


</script>

</body>
<?php include "footer.php"?> 
</html>