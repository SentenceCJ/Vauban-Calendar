<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agenda Vauban</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
 <nav>
  <div class="top">
    <div class="logo" ><img src="img/logo-vauban-online-1-340x80.png" alt="..." width="345px">
    </div>
    <div class="mots">
        <a href="#">Centre de formation <img src="img/arrow.png" style="width: 12px; color : #0c165a;"></a>
        <a href="#">Cabinet de conseil <img src="img/arrow.png" style="width: 12px; color : #0c165a;"></a>
        <a href="#">Expertise</a>
        <a href="#">Actualitées</a>
        <a href="#">Contactez-nous</a>
    </div>
  </nav> 
</div>


<section>
  <form method="POST">
    <div class="calendar">
      <?php
      require '../src/Date/Month.php';
      $month = new App\Date\Month($_GET['month'] ?? null, $_GET['year'] ?? null);

      $firstDay = $month->getStartingDay()->modify('Monday this week');

      ?>

      <b class="title"><?=$month->toString(); ?></b>

      <div class="topCalendar">
        <a href="agenda.php?month=<?= $month->prevMonth()->month; ?>&year=<?= $month->prevMonth()->year; ?>" class="button">&lt;</a>
        <a href="agenda.php?month=<?= $month->nextMonth()->month; ?>&year=<?= $month->nextMonth()->year; ?>" class="button">&gt;</a>
      </div>

      <table class="cal__table">
        <?php
          for ($i = 0; $i < 6; $i++): //$i < $month->getWeeks() ?>
            <tr>
              <?php foreach ($month->days as $j => $day): 
                $date = (clone $firstDay)->modify("+" . ($j+$i*7) . "days");
              ?>
                <td>
                  <?php if($i === 0): ?>
                    <?= $month->days[$j]?> <br>
                  <?php endif; ?>

                  <div class="<?= $month->withinMonth($date) ? 'in': 'notIn'; ?>"><?= $date->format('d') ?></div>
                </td>
              <?php endforeach; ?>
            </tr>
          <?php endfor; ?>
      </table>

    </div>
  </form>
</section>
    <!-- <section>
    
      <div class="container">
        <br>
    
        <a target="_blank" href="https://calendar.google.com/event?action=TEMPLATE&amp;tmeid=NHY1ajI0Mmk1MDdnNTl1YzhldTIyOW9ob2kgdDVtYzFyNXRqZDRuM29qcm5iMXRycDlhM2tAZw&amp;tmsrc=t5mc1r5tjd4n3ojrnb1trp9a3k%40group.calendar.google.com"> Add Event</a> -->
    
     
      <!-- <div class="d-flex justify-content-center">
    
        <iframe
          src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=Europe%2FParis&src=dDVtYzFyNXRqZDRuM29qcm5iMXRycDlhM2tAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23D50000"
          style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
      </div>
      <div class="d-flex justify-content-end">
        <button class="btn btn-primary"
          onclick="window.location.href='https:calendar.google.com/event?action=TEMPLATE&amp;tmeid=NHY1ajI0Mmk1MDdnNTl1YzhldTIyOW9ob2kgdDVtYzFyNXRqZDRuM29qcm5iMXRycDlhM2tAZw&amp;tmsrc=t5mc1r5tjd4n3ojrnb1trp9a3k%40group.calendar.google.com';">
          Proposer un évenement
        </button>
      </div>
     </div>
    </section> --> 
    
    <div id="bande_horizontale">
      <div class="heading_container heading_center"> 
        
      </div>
    </div>    
  
<footer>
  <section>
    <div class="">
      <img src="img/bottom.png" alt="bottom" style="width:100%;">
    </div>
  </section>  
  
  
  <div class="container-footer">
    <div class="d-flex justify-content-center">
      <a style="padding-top:  25px; color:#0c165a;" href="https://www.vauban-online.com/politique-de-confidentialite">Politique de confidentialité</a> 
      
    </div>
    <div class="d-flex justify-content-center">
      <a style="color:#0c165a;" href="https://www.vauban-online.com/mentions-legales">Mention légales</a>
    </div>
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>