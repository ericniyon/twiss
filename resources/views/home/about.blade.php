<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style>
       @import url("https://fonts.googleapis.com/css2?family=Muli&display=swap");

* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
html {
  scroll-behavior: smooth;
}
a {
  text-decoration: none;
}
body {
  height: 100%;
  font-family: "Muli", sans-serif;
  overflow-x: hidden;
  background-color: #f6f7f9;
}

body::-webkit-scrollbar {
  width: 0.5em;
}

body::-webkit-scrollbar-track {
  box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.3);
}

body::-webkit-scrollbar-thumb {
  background-color: #ef6c00;
  outline: 1px solid #315db3;
}
div.main {
  width: 100vw;
  background: white; /* fallback for old browsers */
  height: auto;
}
/* header */
.header {
  background-color: transparent;
  box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.25);
  position: fixed;
  width: 100%;
  z-index: 3;
}

.header ul {
  margin: 0;
  padding: 0;
  list-style: none;
  overflow: hidden;
}

.header li a {
  color: #333;
  font-size: 0.8rem;
  font-weight: bold;
  display: block;
  padding: 20px 20px;
  text-decoration: none;
}
.header-active {
  background-color: black;
}

.header-active li a {
  color: #fff;
}

.header li a:hover,
.header .menu-btn:hover {
  color: #ef6c00;
}

.header .logo {
  display: block;
  float: left;
  font-size: 2em;
  padding: 10px 20px;
  text-decoration: none;
}

/* menu */
.header .menu {
  clear: both;
  max-height: 0;
  transition: max-height 0.2s ease-out;
}

/* menu icon */
.header .menu-icon {
  cursor: pointer;
  float: right;
  padding: 28px 20px;
  position: relative;
  user-select: none;
}

.header .menu-icon .navicon {
  background: #333;
  display: block;
  height: 2px;
  position: relative;
  transition: background 0.2s ease-out;
  width: 18px;
}

.header .menu-icon .navicon:before,
.header .menu-icon .navicon:after {
  background: #333;
  content: "";
  display: block;
  height: 100%;
  position: absolute;
  transition: all 0.2s ease-out;
  width: 100%;
}

.header-active .menu-icon .navicon {
  background: #fff;
  display: block;
  height: 2px;
  position: relative;
  transition: background 0.2s ease-out;
  width: 18px;
}

.header-active .menu-icon .navicon:before,
.header-active .menu-icon .navicon:after {
  background: #fff;
  content: "";
  display: block;
  height: 100%;
  position: absolute;
  transition: all 0.2s ease-out;
  width: 100%;
}

.header .menu-icon .navicon:before {
  top: 5px;
}

.header .menu-icon .navicon:after {
  top: -5px;
}

/* menu btn */
.header .menu-btn {
  display: none;
}

.header .menu-btn:checked ~ .menu {
  max-height: 240px;
}

.header .menu-btn:checked ~ .menu-icon .navicon {
  background: transparent;
}

.header .menu-btn:checked ~ .menu-icon .navicon:before {
  transform: rotate(-45deg);
}

.header .menu-btn:checked ~ .menu-icon .navicon:after {
  transform: rotate(45deg);
}

.header .menu-btn:checked ~ .menu-icon:not(.steps) .navicon:before,
.header .menu-btn:checked ~ .menu-icon:not(.steps) .navicon:after {
  top: 0;
}

/* 48em = 768px */
@media (min-width: 48em) {
  .header li {
    float: left;
  }
  .header li a {
    padding: 20px 30px;
  }
  .header .menu {
    clear: none;
    float: right;
    max-height: none;
  }
  .header .menu-icon {
    display: none;
  }
}

@media (max-width: 48em) {
  .header li a {
    color: #424242;
    font-size: 0.8rem;
  }
  header ul {
    background-color: #fff;
  }

  .hero .about {
    grid-template-areas: "content content content";
  }
  .hero .about .about-image {
    display: none;
  }
}

.hero {
  padding-top: 10rem;
}

.hero .about {
  display: grid;
  margin: 2rem;
  grid-template-areas:
    "content image image "
    "content image image";
}

.hero .about .about-text {
  grid: content;
  padding-right: 2rem;
}
.hero .about .about-text p {
  font-size: 0.8rem;
  color: #808080;
}
.hero .about .about-text h1 {
  color: #000;
  padding-bottom: 1rem;
}
.hero .about .about-image {
  grid: image;
}
.hero .about .about-image img {
  width: 100%;
}
.hero .intro {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 2rem;
}

.hero .intro h1 {
  text-align: center;
  font-size: 1.5rem;
  padding-bottom: 1rem;
  color: #000;
}
.hero .intro p {
  text-align: center;
  font-size: 0.8rem;
  color: #808080;
}

.hero .team {
  padding-top: 5rem;
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  grid-gap: 2rem;
  margin-left: 4rem;
  text-align: center;
}
.hero .team .card img {
  width: 200px;
  height: 450px;
  
}

.hero .team .card h3 {
  color: #000;
  padding-top: 0.8rem;
  padding-bottom: 0.4rem;
  font-size: 0.8rem;
}
.hero .team .card p {
  color: #808080;
  font-size: 0.8rem;
}

/* footer section */

.footer-section {
  background-color: #f6f7f9;
  height: auto;
  margin-top: 4rem;
  padding-left: 5rem;
  padding-top: 5rem;
  padding-bottom: 5rem;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 4fr));
  grid-gap: 2rem;
}
.footer-section .logo {
  cursor: pointer;
}
.footer-section .footer-menu h3 {
  padding-bottom: 1rem;
  color: #808080;
}
.footer-section ul li {
  list-style-type: none;
  font-size: 1rem;
}
.footer-section ul li a {
  text-decoration: none;
  color: #424242;
}
.footer-section ul li a:hover {
  color: #ef6c00;
}

.bottom-footer {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 1rem;
  color: #424242;
  font-size: 0.8rem;
  opacity: 0.8;
}
.bottom-footer .copyright {
  padding-bottom: 1rem;
}
.bottom-footer .social-icons {
  display: flex;
  cursor: pointer;
}
.bottom-footer .social-icons span {
  padding-left: 1rem;
}

@media screen and (max-width: 620px) {
  .hero .team {
    margin-left: 0rem;
  }
}

       
       
       
   </style>
    <title>TWIS</title>
  </head>
  <body>
    <div class="main">
 <header style="background:orange" class="header">
        <a href="" class="logo">
          <img style="height:80px;width:200px" src="{{asset('master/images/logo.png')}}" alt="logo" />
        </a>
        <input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"
          ><span class="navicon"></span
        ></label>
        <ul class="menu">
          <li><a style="color:white; font-size:20px " href="/">Ahabanza</a></li>
         
          <li><a style="color:white; font-size:20px " href="/books/written-books">Ibitabo</a></li>
          <li><a style="color:white; font-size:20px "  href="/books/audio-books">Ibitabo by'amajwi</a></li>
         <!-- <li><a style="color:white" href="/cartoons">Cartoons</a></li> -->
         
       
           <li><a style="color:white; font-size:20px " href="/about">Abo turibo</a></li>
          <li><a style="color:white; font-size:20px " href="/partener">Abafatanyabikorwa</a></li>
         
        </ul>
      </header>
    </div>
    <!-- hero section -->
    <div class="hero">
      

      <div class="intro">
        <h1>Abo turibo</h1>
        <p style="font-size:20px; text-align: justify;
  text-justify: inter-word;">
         Dukunda abana.  Dukunda gusoma. Turi <strong> TWIS.</strong>
        </p>
      </div>

      <div style="margin-right:20px" class="team">
        <div class="card">
        <center>  <img style="width:100%; " src="{{asset('master/images/team/cliff.jpg')}}" alt="cliff" /> </center>
          <h3 class="member">Ingabo Cliff Richard </h3>
          <p class="role">CEO</p>
        </div>
        <div class="card">
          <center>  <img style="width:100%; " src="{{asset('master/images/team/daisy.jpg')}}" alt="daisy" /> </center>
          <h3 class="member">Kabarebe Daisy</h3>
          <p class="role">COO</p>
        </div>
        <div class="card">
          <center>  <img style="width:100%; " src="{{asset('master/images/team/yves.jpg')}}" alt="yves" /> </center>
          <h3 class="member">Mugiraneza H. Yves</h3>
          <p class="role">CTO</p>
        </div>
        <div class="card">
          <center>  <img style="width:100%;" src="{{asset('master/images/team/prince.jpg')}}" alt="prince" /> </center>
          <h3 class="member">Niyonshuti Prince</h3>
          <p class="role">Technical Operator</p>
        </div>


        


      </div>
    </div>
    <!-- end hero section -->

    <!-- end contact us section -->

 @include('partials.footer')
 <script src="js/scroll.js"></script>
  </body>
</html>