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
echo '<section class="films">';
echo '<h2>Top films</h2><hr>';
echo '<div class="films__wrap">
<div class="films__buttons p-2">
<button class="films__button All">All</button>
  <button class="films__button space-opera">Space opera</button>
  <button class="films__button science-fiction">Science fiction</button>
  <button class="films__button superhero-film">Superhero film</button>
</div>';
echo '<div class="row films__list" id="films">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <a href="#sortby"><img
      src="./assets/images/star-wars-the-last-jedi.jpg"
      class="w-100 shadow-1-strong rounded mb-4 films__item space"
      alt="SW Last Jedi"
    /></a>
    <a href="#sortby"><img
      src="./assets/images/star-wars-revenge-og-the-sith.jpg"
      class="w-100 shadow-1-strong rounded mb-4 films__item space"
      alt="SW Revenge of The Sith"
    /></a>
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
    <a href="#sortby"><img
      src="./assets/images/star-wars-the-rise-of-skywalker.jpg"
      class="w-100 shadow-1-strong rounded mb-4 films__item space"
      alt="Mountains in the Clouds"
    /></a>
    <a href="#sortby"><img
      src="./assets/images/avatar.jpg"
      class="w-100 shadow-1-strong rounded mb-4 films__item fiction"
      alt="Boat on Calm Water"
    /></a>
  </div>
  <div class="col-lg-4 mb-4 mb-lg-0">
  <a href="#sortby"><img
      src="./assets/images/avengers-infinity-war.jpg"
      class="w-100 shadow-1-strong rounded mb-4 films__item superhero"
      alt="Waves at Sea"
    /></a>
    <a href="#sortby"><img
      src="./assets/images/avengers-endgame.jpg"
      class="w-100 shadow-1-strong rounded mb-4 films__item superhero"
      alt="Yosemite National Park"
    /></a>
  </div>  
</div>
</div>';
echo "</section>";

$str_form_up = '<hr><section class="sessions"><div class="container">';
$str_form_s = '<form action="index.php#sortby" method="post" name="sort_form" id="sortby">
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
</div><hr>';
echo $str_form_up;
if (isset($_POST['sort'])) {
  $how_to_sort = $_POST['sort'];
  echo "<h3>Sort by: $how_to_sort</h3>";
}else{
  echo "<h3>Sort by: </h3>";
}
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
echo "</section>";
include "footer.php";