<div class="page-heading about-heading header-text" style="background-image: url(assets/images/hotel.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h2>Szállásaink</h2>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Nehezen tud választani?</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
             Szállásaink minden igényt ki tudnak elégíteni. Ha gyermekkel szeretne utazni, talán inkább kedvenc háziállatát hozná, vagy ha pont az ilyen "zajongásoktól" szeretne távol maradni, nincs más dolga mint velünk utazni. <br>
              <br>Az alábbi diagramon személtetjük szállodáink távolságát a reptértől, illetve a tengerparttól. Tudjuk, hogy a legtöbb utazónak a nap végén ez az ami segíthet dönteni két szálloda között.<br><br>

            <?php $conn=new mysqli("localhost","root","","utazasdb");?>

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['Szállodák', 'Tengerpart', 'Reptér'],
                  <?php
                    $query="select * from szalloda";
                    $res=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_array($res)){
                      $az=$data['az'];
                      $nev=$data['nev'];
                      $tengerp=$data['tengerpart_tav'];
                      $rept=$data['repter_tav'];
                  ?>
                  ['<?php echo $az;?>',<?php echo $tengerp;?>,<?php echo $rept;?>],   
                  <?php   
                    }
                  ?> 
                ]);

                var options = {
                  chart: {
                    title: 'SZÁLLODÁINK',
                    subtitle: 'Kilóméterben mutatjuk a szállodákat (kék a tengerparttól, piros a reptértől)',
                    vAxis: {title: 'KM'},
                  },
                  bars: 'vertical' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>

            <div id="barchart_material" style="width: 1000px; height: 700px;"></div>
                <table>
                  <?php
                  $dbh = new PDO('mysql:host=localhost;dbname=utazasdb', 'root', '',
                                              array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
                  $result = $dbh->query("SELECT * FROM szalloda ORDER BY az DESC")->fetchAll();
                  ?>
                  <?php foreach ($result as $r) {
                  echo '<tr><td>' . $r['az'] . "</td><td>" . $r['nev'] . "</td></tr>";
                  } ?>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
