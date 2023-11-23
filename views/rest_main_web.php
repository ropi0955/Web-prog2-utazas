<div class="page-heading about-heading header-text";">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>REST</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <?php
$url = "http://beadandofeladat.njeweb2.nhely.hu/models/rest_server_model.php";
$result = "";
if(isset($_POST['az']))
{
  $_POST['az'] = trim($_POST['az']);
  $_POST['nev'] = trim($_POST['nev']);
  $_POST['orsz'] = trim($_POST['orsz']);
  
  if($_POST['az'] == "" && $_POST['nev'] != "" && $_POST['orsz'] != "")
  {
      $data = Array("nev" => $_POST["nev"], "orsz" => $_POST["orsz"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  elseif($_POST['az'] == "")
  {
    $result = "Hiba! Hiányos adatok!";
  }

  elseif($_POST['az'] >= 1 && ($_POST['nev'] != "" || $_POST['orsz'] != ""))
  {
      $data = Array("az" => $_POST["az"], "nev" => $_POST["nev"], "orsz" => $_POST["orsz"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  elseif($_POST['az'] >= 1)
  {
      $data = Array("az" => $_POST["az"]);
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($ch);
      curl_close($ch);
  }
  
  else
  {
    echo "Hiba! Rossz azonosító (az): ".$_POST['az']."<br>";
  }
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);

?>



    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Helységek</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
            <?= $result ?>
            <?= $tabla ?><br>
            <b>Beszúrás</b>hoz adja meg a helység nevét és országát. Kérjük, az "Azonosító" mezőt hagyja üresen, mert azt rendszerünk automatikusan generálja!<br><br>
            <b>Módosítás</b>hoz töltse ki a helyég azonosítóját, új nevét és/vagy országát.<br><br>
            <b>Törlés</b>hez írja be a sor azonosítóját és nyomja meg a küldés gombot!<br><br>
            <form method="post">
            <fieldset>
              <label for="az">Azonosító:</label> <input type="text" name="az">
            </fieldset><br>
            <fieldset>Név: <input type="text" name="nev" maxlength="45"> Ország: <input type="text" name="orsz" maxlength="45"></fieldset><br><br>
            <input type="submit" value = "Küldés">
            </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/rest.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
