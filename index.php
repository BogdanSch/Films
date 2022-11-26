<?php
include "header.php";
include "action.php";

// echo "<h1>Welcome on Film+</h1><hr>";
echo '<div class="main-banner">
<div class="row">
  <div class="col-lg-7">
    <div class="header-text">
      <h6>Welcome To Film+</h6>
      <h4><em>Browse</em> Our Popular Films Right Here</h4>
      <div class="main-button">
        <a href="#sessions">Browse Now</a>
      </div>
    </div>
  </div>
</div>
</div><hr>';
echo '<h2>Top films</h2><hr>
<div class="row" id="films">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="./assets/images/star-wars-the-last-jedi.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="SW Last Jedi"
    />

    <img
      src="./assets/images/star-wars-revenge-og-the-sith.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="SW Revenge of The Sith"
    />
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="./assets/images/star-wars-the-rise-of-skywalker.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Mountains in the Clouds"
    />

    <img
      src="./assets/images/avatar.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
    />
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="./assets/images/avengers-infinity-war.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Waves at Sea"
    />

    <img
      src="./assets/images/avengers-endgame.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Yosemite National Park"
    />
  </div>
</div>';
// echo '<section class="section" id="projects">
// <div class="container">

//   <div class="row">
//       <div class="col-lg-3">
//           <div class="section-heading">
//               <h6>Жанры</h6>
//               <h6>(в прокате 6 фильмов)</h6>
//           </div>
//           <div class="filters">
//               <ul>
//                   <li class="active" data-filter="*">Все</li>
//                   <li data-filter=".des">Боевик</li>
//                   <li data-filter=".dev">Военный</li>
//                   <li data-filter=".tsh">Вестерн</li>
//               </ul>
//           </div>
//       </div>
//       <div class="col-lg-9">
//           <div class="filters-content">
//               <div class="row grid" style="position: relative; height: 701.887px;"> 
//                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all tsh" style="position: absolute; left: 0%; top: 0px;">
//                     <div class="item">
//                       <a href="https://images.moviesanywhere.com/8009215fb4980144700824b5817872e3/28219b33-2ed2-47a1-82ba-7fc700a1a77d.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="https://images.moviesanywhere.com/8009215fb4980144700824b5817872e3/28219b33-2ed2-47a1-82ba-7fc700a1a77d.jpg" alt=""></a> 
//                     </div>
//                   </div>
                  
//                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des" style="position: absolute; left: 33.1944%; top: 0px;">
//                     <div class="item">
//                       <a href="images/JohnWick2.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="images/JohnWick2.jpg" alt=""></a>
//                     </div>
//                   </div>
//                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all dev" style="position: absolute; left: 66.5278%; top: 0px;">
//                     <div class="item">
//                       <a href="images/1917.jpg  " data-lightbox="image-1" data-title="Our Projects"><img src="images/1917.jpg  " alt=""></a>
//                     </div>
//                   </div>
//                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all gra" style="position: absolute; left: 66.5278%; top: 345px;">
                   
//                   </div>
//                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all tsh" style="position: absolute; left: 0%; top: 352px;">
//                     <div class="item">
//                       <a href="images/jango.jpg  " data-lightbox="image-1" data-title="Our Projects"><img src="images/jango.jpg" alt="jango"></a>
//                     </div>
//                   </div>
//                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all dev" style="position: absolute; left: 33.1944%; top: 352px;">
//                     <div class="item">
//                       <a href="images/yarost.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="images/yarost.jpg" alt=""></a>
//                     </div>
//                   </div>
                  
//                   <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 all des" style="position: absolute; left: 66.5278%; top: 375px;">
//                     <div class="item">
//                       <a href="images/medmaks.jpg" data-lightbox="image-1" data-title="Our Projects"><img src="images/medmaks.jpg" alt=""></a>
                      
//                     </div>
//                   </div>
            
//               </div>
//           </div>
//       </div>
//   </div>
// </div>
// </section>';

$str_form_s = '<hr>
<div class="container" id="sessions">
  <h3 class= "my-2">Sort by:</h3>
  <form action="index.php" method="post" name="sort_form">
  <select name="sort" id="sort" size="1">
    <option value="name">name</option>
    <option value="price">price</option>
    <option value="year">year</option>
    <option value="slogan">slogan</option>
    <option value="rating">rating</option>
    <option value="producer">producer</option>
    <option value="studio">studio</option>
    <option value="sessions">sessions</option>
    <option value="places">places</option>
    <option value="discount">discount</option>
  </select>
  <input type="submit" name="submit" value="OK" class="btn btn-secondary my-2" >
  </form>
</div> <hr>';
echo $str_form_s;

if (isset($_POST['sort'])) {
    $how_to_sort = $_POST['sort'];
    sorting($how_to_sort);
}

$out = out_arr();

if (count($out) > 0) {
    foreach ($out as $row) {
        echo $row;
    }
} else {
    echo "No data...";
}

include "footer.php";