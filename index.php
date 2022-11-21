<?php
include "header.php";
include "action.php";

echo "<h1>Welcome on Film+</h1><hr>";
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
echo '<!-- Gallery -->
<div class="row">
  <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
    <img
      src="https://images.moviesanywhere.com/8009215fb4980144700824b5817872e3/28219b33-2ed2-47a1-82ba-7fc700a1a77d.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="SW Last Jedi"
    />

    <img
      src="https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="SW Revenge of The Sith"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Mountains in the Clouds"
    />

    <img
      src="https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Boat on Calm Water"
    />
  </div>

  <div class="col-lg-4 mb-4 mb-lg-0">
    <img
      src="https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Waves at Sea"
    />

    <img
      src="https://m.media-amazon.com/images/M/MV5BNTc4MTc3NTQ5OF5BMl5BanBnXkFtZTcwOTg0NjI4NA@@._V1_FMjpg_UX1000_.jpg"
      class="w-100 shadow-1-strong rounded mb-4"
      alt="Yosemite National Park"
    />
  </div>
</div>
<!-- Gallery -->';

$str_form_s = '<hr>
<div class="container" id="sessions">
  <h3 class= "my-2">Sort by:</h3>
  <form action="index.php" method="post" name="sort_form">
  <select name="sort" id="sort" size="1">
    <option value="name">name</option>
    <option value="price">price</option>
    <option value="date">date</option>
    <option value="slogan">slogan</option>
    <option value="rating">rating</option>
    <option value="producer">producer</option>
    <option value="studio">studio</option>
    <option value="sessions">sessions</option>
    <option value="places">date</option>
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