<!DOCTYPE html>
<html lang="pl-PL">
  <head>
    <meta charset="utf-8">
    <title>Komis Samochodowy</title>
    <link rel="stylesheet" href="auto.css">
  </head>
  <body>
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'komis');

      $zapytanie1 = "SELECT samochody.id, samochody.marka, samochody.model FROM samochody";
      $zapytanie2 = "SELECT zamowienia.Samochody_id, zamowienia.klient FROM zamowienia";
      $zapytanie3 = "SELECT * FROM samochody where samochody.marka='Fiat'";

      $wynik1 = mysqli_query($conn, $zapytanie1);
      $wynik2 = mysqli_query($conn, $zapytanie2);
      $wynik3 = mysqli_query($conn, $zapytanie3);
    ?>
    <section id="baner">
      <h1>SAMOCHODY</h1>
    </section>
    <section id="lewy">
      <h2>Wykaz samochodów</h2>
      <ul>
        <?php
        while($row1 = mysqli_fetch_array($wynik1)){
          echo "<li>".$row1['id']." ".$row1['marka']." ".$row1['model']."</li>";
        }
        ?>
      </ul>
      <h2>Zamówienia</h2>
      <ul>
        <?php
        while($row2 = mysqli_fetch_array($wynik2)){
          echo "<li>".$row2['Samochody_id']." ".$row2['klient']."</li>";
        }
        ?>
      </ul>
    </section>
    <section id="prawy">
      <h2>Pełne dane: Fiat</h2>
        <?php
        while($row3 = mysqli_fetch_array($wynik3)){
          echo $row3['id']." / ".$row3['marka']." / ".$row3['model']." / ".$row3['rocznik']." / ".$row3['kolor']." / ".$row3['stan']." /</br>";
        }
        ?>

    </section>
    <?php
      wynik1 -> free();
      wynik2 -> free();
      wynik3 -> free();
      mysqli_close($conn);
    ?>
    <section id="stopka">
      <table>
        <td> <a href="kwerendy.txt">Kwerendy</a></td>
        <td>Autor: PESEL</td> <td><img src="auto.png" alt="komis samochodowy"></td>
      </table>
    </section>
  </body>
</html>
