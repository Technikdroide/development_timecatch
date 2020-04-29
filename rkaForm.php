<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Das hier ist eine Formularseite</title>
    <link rel="stylesheet" type="text/css" href="rkaForm.css">
  </head>

  <body>
    <!-- Anfang Headercontainer / h1 / div container-->
    <div class="headerContainer">
      <h1>RKA</h1>
      <div id="headerContainerDiv">
          <label for="gesellschaft">Gesellschaft: </label>
          <input type="text" name="gesellschaft" value="">

          <label for"standort">Standort: </label>
          <input type="text" name="standort" value="">
          <br><br>
      </div>
    </div>

    <!-- Anfang ReiseanmeldungContainer / label/ div container-->

    <label for="container_name">1. Reiseanmeldung*</label>
    <hr>
    <div class="signup_container_wrapper">
      <div class="signup_input_container">

        <div class="leftside_signup_container">
          <!-- linke Seite Signup-Container -->
          <div class="leftside_signup_container_input">
            <!-- Anfang leftside input container-->
            <input type="text" name="name" value="">
            <br>
            <input type="text" name="personalnummer" value="">
            <br>
            <input type="text" name="kostenstelle" value="">
            <br>
            <input type="text" name="reiseziel" value="">
            <br>
            <input type="text" name="mitreisende" value="">
            <br>
          </div>

          <div class="leftside_signup_container_label">
            <!-- Anfang leftside label container-->
            <label for="name">Name: </label>
            <br>
            <label for="personalnummer">Personalnummer: </label>
            <br>
            <label for="kostenstelle">Kostenstelle: </label>
            <br>
            <label for="reiseziel">Reiseziel: </label>
            <br>
            <label for="mitreisende">Mitreisende: </label>
            <br>
          </div>
        </div>

        <div class="rightside_signup_container">
          <!-- Rechte Seite Signup-Container -->
          <div class="rightside_signup_container_input">
            <!-- Anfang rightside input container-->
            <input type="date" name="abfahrt" value="">
            <br>
            <input type="date" name="rueckkehr" value="">
            <br>
            <input type="text" name="reisezweck" value="">
          </div>
          <div class="rightside_signup_container_label">
            <!-- Anfang rightside label container-->
            <label for="abfahrt">Abfahrt: </label>
            <br>
            <label for="rueckkehr">Rueckkehr: </label>
            <br>
            <label for="reisezweck">Reisezweck: </label>
          </div>
        </div>
      </div>

      <div class="checkbox_input_container">
        <input type="checkbox" name="firmenwagen" value="">
        <label for="firmenwagen">Firmenwagen</label>

        <input type="checkbox" name="mietwagen" value="">
        <label for="mietwagen">Mietwagen</label>

        <input type="checkbox" name="privatwagen" value="">
        <label for="privatwagen">Privatwagen</label>

      </div>


    </div>

  </body>
</html>
