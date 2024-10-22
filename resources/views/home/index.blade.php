<!DOCTYPE html>
<html lang="en">
   <head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

     @include('home.css');
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
       @include('home.header');
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->
      @include('home.slider');
      <!-- end banner -->
      <!-- about -->
      @include('home.about');
      <!-- end about -->
      <!-- our_room -->
      @include('home.room');
      <!-- end our_room -->
      <!-- gallery -->
      @include('home.gallery');
      <!-- end gallery -->
      <!-- blog -->
      @include('home.blog');
      <!-- end blog -->
      <!--  contact -->
      @include('home.contact');
      <!-- end contact -->
      <!--  footer -->
      @include('home.footer');
      <script type="text/javascript">
         $(window).scroll(function(){
            sessionStorage.scrollTop =$(this).scrollTop();
         });
         $(document).ready(function(){
            if(sessionStorage.scrollTop != "undefined"){
               $(window).scrollTop(sessionStorage.scrollTop);
            }
         });
      </script>
   </body>
</html>