<?php
session_start();

if (!isset($_SESSION['step'])){
  header('Location: RegisterStep1.php');
  exit();
} else {
  if($_SESSION['step'] != 2){
    header('Location: RegisterStep1.php');
    exit();
  };
};
$_SESSION['step'] = 2;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>City Frontiers</title>
    <link rel="icon" type="image/png" href="./media/icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
  <div id="load-block"></div>

  <section id="canvas-loc">
    <canvas id="landing-canvas"></canvas>
  </section>
  
  <div id="step">
    <section class="box">
      <h2><a href="logOut.php">CITY FRONTIERS</a></h2>
      <h4 id="register-title">Register</h4>
      <p class="step-info">Second step - Personal info</p>
      <form id="form-2" action="step2Action.php" method="POST">
        <div>
          <div>
            <p>First Name</p>
            <input type="text" name="firstName" value="<?php if(isset($_SESSION['firstName'])){echo $_SESSION['firstName'];}?>" required>
          </div>
          <div>
            <p>Last Name</p>
            <input type="text" name="lastName" value="<?php if(isset($_SESSION['lastName'])){echo $_SESSION['lastName'];}?>" required>
          </div>
        </div>
        <div>
          <div>
            <p>Sex</p>
            <select name="sex" required>
              <option value="M" <?php if(isset($_SESSION['sex'])){if($_SESSION['sex']=="M"){echo "selected='selected'";};}?>>&nbsp&nbsp Male</option>
              <option value="F" <?php if(isset($_SESSION['sex'])){if($_SESSION['sex']=="F"){echo "selected='selected'";};}?>>&nbsp&nbsp Female</option>
              <option value="O" <?php if(isset($_SESSION['sex'])){if($_SESSION['sex']=="O"){echo "selected='selected'";};}?>>&nbsp&nbsp Other</option>
            </select>
          </div>
          <div>
            <p>Birthday</p>
            <input type="date" name="bday" value="<?php if(isset($_SESSION['bday'])){echo $_SESSION['bday'];}?>" required>
          </div>
        </div>
        <p id="country">Country</p>
        <select  name="country" required>
          <option value="AF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AF"){echo "selected='selected'";};}?>>&nbsp&nbsp Afghanistan</option>
          <option value="AX" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AX"){echo "selected='selected'";};}?>>&nbsp&nbsp Åland Islands</option>
          <option value="AL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AL"){echo "selected='selected'";};}?>>&nbsp&nbsp Albania</option>
          <option value="DZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="DZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Algeria</option>
          <option value="AS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AS"){echo "selected='selected'";};}?>>&nbsp&nbsp American Samoa</option>
          <option value="AD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AD"){echo "selected='selected'";};}?>>&nbsp&nbsp Andorra</option>
          <option value="AO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AO"){echo "selected='selected'";};}?>>&nbsp&nbsp Angola</option>
          <option value="AI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AI"){echo "selected='selected'";};}?>>&nbsp&nbsp Anguilla</option>
          <option value="AQ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AQ"){echo "selected='selected'";};}?>>&nbsp&nbsp Antarctica</option>
          <option value="AG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AG"){echo "selected='selected'";};}?>>&nbsp&nbsp Antigua and Barbuda</option>
          <option value="AR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AR"){echo "selected='selected'";};}?>>&nbsp&nbsp Argentina</option>
          <option value="AM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AM"){echo "selected='selected'";};}?>>&nbsp&nbsp Armenia</option>
          <option value="AW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AW"){echo "selected='selected'";};}?>>&nbsp&nbsp Aruba</option>
          <option value="AU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AU"){echo "selected='selected'";};}?>>&nbsp&nbsp Australia</option>
          <option value="AT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AT"){echo "selected='selected'";};}?>>&nbsp&nbsp Austria</option>
          <option value="AZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Azerbaijan</option>
          <option value="BS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BS"){echo "selected='selected'";};}?>>&nbsp&nbsp Bahamas</option>
          <option value="BH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BH"){echo "selected='selected'";};}?>>&nbsp&nbsp Bahrain</option>
          <option value="BD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BD"){echo "selected='selected'";};}?>>&nbsp&nbsp Bangladesh</option>
          <option value="BB" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BB"){echo "selected='selected'";};}?>>&nbsp&nbsp Barbados</option>
          <option value="BY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BY"){echo "selected='selected'";};}?>>&nbsp&nbsp Belarus</option>
          <option value="BE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BE"){echo "selected='selected'";};}?>>&nbsp&nbsp Belgium</option>
          <option value="BZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Belize</option>
          <option value="BJ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BJ"){echo "selected='selected'";};}?>>&nbsp&nbsp Benin</option>
          <option value="BM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BM"){echo "selected='selected'";};}?>>&nbsp&nbsp Bermuda</option>
          <option value="BT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BT"){echo "selected='selected'";};}?>>&nbsp&nbsp Bhutan</option>
          <option value="BO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BO"){echo "selected='selected'";};}?>>&nbsp&nbsp Bolivia, Plurinational State of</option>
          <option value="BQ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BQ"){echo "selected='selected'";};}?>>&nbsp&nbsp Bonaire, Sint Eustatius and Saba</option>
          <option value="BA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BA"){echo "selected='selected'";};}?>>&nbsp&nbsp Bosnia and Herzegovina</option>
          <option value="BW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BW"){echo "selected='selected'";};}?>>&nbsp&nbsp Botswana</option>
          <option value="BV" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BV"){echo "selected='selected'";};}?>>&nbsp&nbsp Bouvet Island</option>
          <option value="BR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BR"){echo "selected='selected'";};}?>>&nbsp&nbsp Brazil</option>
          <option value="IO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IO"){echo "selected='selected'";};}?>>&nbsp&nbsp British Indian Ocean Territory</option>
          <option value="BN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BN"){echo "selected='selected'";};}?>>&nbsp&nbsp Brunei Darussalam</option>
          <option value="BG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BG"){echo "selected='selected'";};}?>>&nbsp&nbsp Bulgaria</option>
          <option value="BF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BF"){echo "selected='selected'";};}?>>&nbsp&nbsp Burkina Faso</option>
          <option value="BI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BI"){echo "selected='selected'";};}?>>&nbsp&nbsp Burundi</option>
          <option value="KH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KH"){echo "selected='selected'";};}?>>&nbsp&nbsp Cambodia</option>
          <option value="CM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CM"){echo "selected='selected'";};}?>>&nbsp&nbsp Cameroon</option>
          <option value="CA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CA"){echo "selected='selected'";};}?>>&nbsp&nbsp Canada</option>
          <option value="CV" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CV"){echo "selected='selected'";};}?>>&nbsp&nbsp Cape Verde</option>
          <option value="KY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KY"){echo "selected='selected'";};}?>>&nbsp&nbsp Cayman Islands</option>
          <option value="CF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CF"){echo "selected='selected'";};}?>>&nbsp&nbsp Central African Republic</option>
          <option value="TD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TD"){echo "selected='selected'";};}?>>&nbsp&nbsp Chad</option>
          <option value="CL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CL"){echo "selected='selected'";};}?>>&nbsp&nbsp Chile</option>
          <option value="CN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CN"){echo "selected='selected'";};}?>>&nbsp&nbsp China</option>
          <option value="CX" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CX"){echo "selected='selected'";};}?>>&nbsp&nbsp Christmas Island</option>
          <option value="CC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CC"){echo "selected='selected'";};}?>>&nbsp&nbsp Cocos (Keeling) Islands</option>
          <option value="CO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CO"){echo "selected='selected'";};}?>>&nbsp&nbsp Colombia</option>
          <option value="KM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KM"){echo "selected='selected'";};}?>>&nbsp&nbsp Comoros</option>
          <option value="CG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CG"){echo "selected='selected'";};}?>>&nbsp&nbsp Congo</option>
          <option value="CD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CD"){echo "selected='selected'";};}?>>&nbsp&nbsp Congo, the Democratic Republic of the</option>
          <option value="CK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CK"){echo "selected='selected'";};}?>>&nbsp&nbsp Cook Islands</option>
          <option value="CR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CR"){echo "selected='selected'";};}?>>&nbsp&nbsp Costa Rica</option>
          <option value="CI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CI"){echo "selected='selected'";};}?>>&nbsp&nbsp Côte d'Ivoire</option>
          <option value="HR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="HR"){echo "selected='selected'";};}?>>&nbsp&nbsp Croatia</option>
          <option value="CU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CU"){echo "selected='selected'";};}?>>&nbsp&nbsp Cuba</option>
          <option value="CW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CW"){echo "selected='selected'";};}?>>&nbsp&nbsp Curaçao</option>
          <option value="CY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CY"){echo "selected='selected'";};}?>>&nbsp&nbsp Cyprus</option>
          <option value="CZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Czech Republic</option>
          <option value="DK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="DK"){echo "selected='selected'";};}?>>&nbsp&nbsp Denmark</option>
          <option value="DJ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="DJ"){echo "selected='selected'";};}?>>&nbsp&nbsp Djibouti</option>
          <option value="DM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="DM"){echo "selected='selected'";};}?>>&nbsp&nbsp Dominica</option>
          <option value="DO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="DO"){echo "selected='selected'";};}?>>&nbsp&nbsp Dominican Republic</option>
          <option value="EC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="EC"){echo "selected='selected'";};}?>>&nbsp&nbsp Ecuador</option>
          <option value="EG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="EG"){echo "selected='selected'";};}?>>&nbsp&nbsp Egypt</option>
          <option value="SV" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SV"){echo "selected='selected'";};}?>>&nbsp&nbsp El Salvador</option>
          <option value="GQ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GQ"){echo "selected='selected'";};}?>>&nbsp&nbsp Equatorial Guinea</option>
          <option value="ER" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ER"){echo "selected='selected'";};}?>>&nbsp&nbsp Eritrea</option>
          <option value="EE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="EE"){echo "selected='selected'";};}?>>&nbsp&nbsp Estonia</option>
          <option value="ET" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ET"){echo "selected='selected'";};}?>>&nbsp&nbsp Ethiopia</option>
          <option value="FK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="FK"){echo "selected='selected'";};}?>>&nbsp&nbsp Falkland Islands (Malvinas)</option>
          <option value="FO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="FO"){echo "selected='selected'";};}?>>&nbsp&nbsp Faroe Islands</option>
          <option value="FJ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="FJ"){echo "selected='selected'";};}?>>&nbsp&nbsp Fiji</option>
          <option value="FI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="FI"){echo "selected='selected'";};}?>>&nbsp&nbsp Finland</option>
          <option value="FR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="FR"){echo "selected='selected'";};}?>>&nbsp&nbsp France</option>
          <option value="GF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GF"){echo "selected='selected'";};}?>>&nbsp&nbsp French Guiana</option>
          <option value="PF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PF"){echo "selected='selected'";};}?>>&nbsp&nbsp French Polynesia</option>
          <option value="TF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TF"){echo "selected='selected'";};}?>>&nbsp&nbsp French Southern Territories</option>
          <option value="GA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GA"){echo "selected='selected'";};}?>>&nbsp&nbsp Gabon</option>
          <option value="GM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GM"){echo "selected='selected'";};}?>>&nbsp&nbsp Gambia</option>
          <option value="GE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GE"){echo "selected='selected'";};}?>>&nbsp&nbsp Georgia</option>
          <option value="DE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="DE"){echo "selected='selected'";};}?>>&nbsp&nbsp Germany</option>
          <option value="GH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GH"){echo "selected='selected'";};}?>>&nbsp&nbsp Ghana</option>
          <option value="GI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GI"){echo "selected='selected'";};}?>>&nbsp&nbsp Gibraltar</option>
          <option value="GR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GR"){echo "selected='selected'";};}?>>&nbsp&nbsp Greece</option>
          <option value="GL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GL"){echo "selected='selected'";};}?>>&nbsp&nbsp Greenland</option>
          <option value="GD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GD"){echo "selected='selected'";};}?>>&nbsp&nbsp Grenada</option>
          <option value="GP" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GP"){echo "selected='selected'";};}?>>&nbsp&nbsp Guadeloupe</option>
          <option value="GU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GU"){echo "selected='selected'";};}?>>&nbsp&nbsp Guam</option>
          <option value="GT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GT"){echo "selected='selected'";};}?>>&nbsp&nbsp Guatemala</option>
          <option value="GG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GG"){echo "selected='selected'";};}?>>&nbsp&nbsp Guernsey</option>
          <option value="GN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GN"){echo "selected='selected'";};}?>>&nbsp&nbsp Guinea</option>
          <option value="GW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GW"){echo "selected='selected'";};}?>>&nbsp&nbsp Guinea-Bissau</option>
          <option value="GY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GY"){echo "selected='selected'";};}?>>&nbsp&nbsp Guyana</option>
          <option value="HT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="HT"){echo "selected='selected'";};}?>>&nbsp&nbsp Haiti</option>
          <option value="HM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="HM"){echo "selected='selected'";};}?>>&nbsp&nbsp Heard Island and McDonald Islands</option>
          <option value="VA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VA"){echo "selected='selected'";};}?>>&nbsp&nbsp Holy See (Vatican City State)</option>
          <option value="HN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="HN"){echo "selected='selected'";};}?>>&nbsp&nbsp Honduras</option>
          <option value="HK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="HK"){echo "selected='selected'";};}?>>&nbsp&nbsp Hong Kong</option>
          <option value="HU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="HU"){echo "selected='selected'";};}?>>&nbsp&nbsp Hungary</option>
          <option value="IS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IS"){echo "selected='selected'";};}?>>&nbsp&nbsp Iceland</option>
          <option value="IN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IN"){echo "selected='selected'";};}?>>&nbsp&nbsp India</option>
          <option value="ID" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ID"){echo "selected='selected'";};}?>>&nbsp&nbsp Indonesia</option>
          <option value="IR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IR"){echo "selected='selected'";};}?>>&nbsp&nbsp Iran, Islamic Republic of</option>
          <option value="IQ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IQ"){echo "selected='selected'";};}?>>&nbsp&nbsp Iraq</option>
          <option value="IE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IE"){echo "selected='selected'";};}?>>&nbsp&nbsp Ireland</option>
          <option value="IM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IM"){echo "selected='selected'";};}?>>&nbsp&nbsp Isle of Man</option>
          <option value="IL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IL"){echo "selected='selected'";};}?>>&nbsp&nbsp Israel</option>
          <option value="IT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="IT"){echo "selected='selected'";};}?>>&nbsp&nbsp Italy</option>
          <option value="JM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="JM"){echo "selected='selected'";};}?>>&nbsp&nbsp Jamaica</option>
          <option value="JP" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="JP"){echo "selected='selected'";};}?>>&nbsp&nbsp Japan</option>
          <option value="JE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="JE"){echo "selected='selected'";};}?>>&nbsp&nbsp Jersey</option>
          <option value="JO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="JO"){echo "selected='selected'";};}?>>&nbsp&nbsp Jordan</option>
          <option value="KZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Kazakhstan</option>
          <option value="KE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KE"){echo "selected='selected'";};}?>>&nbsp&nbsp Kenya</option>
          <option value="KI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KI"){echo "selected='selected'";};}?>>&nbsp&nbsp Kiribati</option>
          <option value="KP" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KP"){echo "selected='selected'";};}?>>&nbsp&nbsp Korea, Democratic People's Republic of</option>
          <option value="KR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KR"){echo "selected='selected'";};}?>>&nbsp&nbsp Korea, Republic of</option>
          <option value="KW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KW"){echo "selected='selected'";};}?>>&nbsp&nbsp Kuwait</option>
          <option value="KG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KG"){echo "selected='selected'";};}?>>&nbsp&nbsp Kyrgyzstan</option>
          <option value="LA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LA"){echo "selected='selected'";};}?>>&nbsp&nbsp Lao People's Democratic Republic</option>
          <option value="LV" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LV"){echo "selected='selected'";};}?>>&nbsp&nbsp Latvia</option>
          <option value="LB" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LB"){echo "selected='selected'";};}?>>&nbsp&nbsp Lebanon</option>
          <option value="LS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LS"){echo "selected='selected'";};}?>>&nbsp&nbsp Lesotho</option>
          <option value="LR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LR"){echo "selected='selected'";};}?>>&nbsp&nbsp Liberia</option>
          <option value="LY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LY"){echo "selected='selected'";};}?>>&nbsp&nbsp Libya</option>
          <option value="LI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LI"){echo "selected='selected'";};}?>>&nbsp&nbsp Liechtenstein</option>
          <option value="LT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LT"){echo "selected='selected'";};}?>>&nbsp&nbsp Lithuania</option>
          <option value="LU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LU"){echo "selected='selected'";};}?>>&nbsp&nbsp Luxembourg</option>
          <option value="MO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MO"){echo "selected='selected'";};}?>>&nbsp&nbsp Macao</option>
          <option value="MK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MK"){echo "selected='selected'";};}?>>&nbsp&nbsp Macedonia, the former Yugoslav Republic of</option>
          <option value="MG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MG"){echo "selected='selected'";};}?>>&nbsp&nbsp Madagascar</option>
          <option value="MW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MW"){echo "selected='selected'";};}?>>&nbsp&nbsp Malawi</option>
          <option value="MY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MY"){echo "selected='selected'";};}?>>&nbsp&nbsp Malaysia</option>
          <option value="MV" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MV"){echo "selected='selected'";};}?>>&nbsp&nbsp Maldives</option>
          <option value="ML" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ML"){echo "selected='selected'";};}?>>&nbsp&nbsp Mali</option>
          <option value="MT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MT"){echo "selected='selected'";};}?>>&nbsp&nbsp Malta</option>
          <option value="MH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MH"){echo "selected='selected'";};}?>>&nbsp&nbsp Marshall Islands</option>
          <option value="MQ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MQ"){echo "selected='selected'";};}?>>&nbsp&nbsp Martinique</option>
          <option value="MR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MR"){echo "selected='selected'";};}?>>&nbsp&nbsp Mauritania</option>
          <option value="MU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MU"){echo "selected='selected'";};}?>>&nbsp&nbsp Mauritius</option>
          <option value="YT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="YT"){echo "selected='selected'";};}?>>&nbsp&nbsp Mayotte</option>
          <option value="MX" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MX"){echo "selected='selected'";};}?>>&nbsp&nbsp Mexico</option>
          <option value="FM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="FM"){echo "selected='selected'";};}?>>&nbsp&nbsp Micronesia, Federated States of</option>
          <option value="MD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MD"){echo "selected='selected'";};}?>>&nbsp&nbsp Moldova, Republic of</option>
          <option value="MC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MC"){echo "selected='selected'";};}?>>&nbsp&nbsp Monaco</option>
          <option value="MN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MN"){echo "selected='selected'";};}?>>&nbsp&nbsp Mongolia</option>
          <option value="ME" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ME"){echo "selected='selected'";};}?>>&nbsp&nbsp Montenegro</option>
          <option value="MS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MS"){echo "selected='selected'";};}?>>&nbsp&nbsp Montserrat</option>
          <option value="MA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MA"){echo "selected='selected'";};}?>>&nbsp&nbsp Morocco</option>
          <option value="MZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Mozambique</option>
          <option value="MM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MM"){echo "selected='selected'";};}?>>&nbsp&nbsp Myanmar</option>
          <option value="NA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NA"){echo "selected='selected'";};}?>>&nbsp&nbsp Namibia</option>
          <option value="NR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NR"){echo "selected='selected'";};}?>>&nbsp&nbsp Nauru</option>
          <option value="NP" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NP"){echo "selected='selected'";};}?>>&nbsp&nbsp Nepal</option>
          <option value="NL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NL"){echo "selected='selected'";};}?>>&nbsp&nbsp Netherlands</option>
          <option value="NC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NC"){echo "selected='selected'";};}?>>&nbsp&nbsp New Caledonia</option>
          <option value="NZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NZ"){echo "selected='selected'";};}?>>&nbsp&nbsp New Zealand</option>
          <option value="NI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NI"){echo "selected='selected'";};}?>>&nbsp&nbsp Nicaragua</option>
          <option value="NE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NE"){echo "selected='selected'";};}?>>&nbsp&nbsp Niger</option>
          <option value="NG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NG"){echo "selected='selected'";};}?>>&nbsp&nbsp Nigeria</option>
          <option value="NU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NU"){echo "selected='selected'";};}?>>&nbsp&nbsp Niue</option>
          <option value="NF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NF"){echo "selected='selected'";};}?>>&nbsp&nbsp Norfolk Island</option>
          <option value="MP" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MP"){echo "selected='selected'";};}?>>&nbsp&nbsp Northern Mariana Islands</option>
          <option value="NO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="NO"){echo "selected='selected'";};}?>>&nbsp&nbsp Norway</option>
          <option value="OM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="OM"){echo "selected='selected'";};}?>>&nbsp&nbsp Oman</option>
          <option value="PK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PK"){echo "selected='selected'";};}?>>&nbsp&nbsp Pakistan</option>
          <option value="PW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PW"){echo "selected='selected'";};}?>>&nbsp&nbsp Palau</option>
          <option value="PS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PS"){echo "selected='selected'";};}?>>&nbsp&nbsp Palestinian Territory, Occupied</option>
          <option value="PA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PA"){echo "selected='selected'";};}?>>&nbsp&nbsp Panama</option>
          <option value="PG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PG"){echo "selected='selected'";};}?>>&nbsp&nbsp Papua New Guinea</option>
          <option value="PY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PY"){echo "selected='selected'";};}?>>&nbsp&nbsp Paraguay</option>
          <option value="PE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PE"){echo "selected='selected'";};}?>>&nbsp&nbsp Peru</option>
          <option value="PH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PH"){echo "selected='selected'";};}?>>&nbsp&nbsp Philippines</option>
          <option value="PN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PN"){echo "selected='selected'";};}?>>&nbsp&nbsp Pitcairn</option>
          <option value="PL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PL"){echo "selected='selected'";};}?>>&nbsp&nbsp Poland</option>
          <option value="PT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PT"){echo "selected='selected'";};}?>>&nbsp&nbsp Portugal</option>
          <option value="PR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PR"){echo "selected='selected'";};}?>>&nbsp&nbsp Puerto Rico</option>
          <option value="QA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="QA"){echo "selected='selected'";};}?>>&nbsp&nbsp Qatar</option>
          <option value="RE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="RE"){echo "selected='selected'";};}?>>&nbsp&nbsp Réunion</option>
          <option value="RO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="RO"){echo "selected='selected'";};}?>>&nbsp&nbsp Romania</option>
          <option value="RU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="RU"){echo "selected='selected'";};}?>>&nbsp&nbsp Russian Federation</option>
          <option value="RW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="RW"){echo "selected='selected'";};}?>>&nbsp&nbsp Rwanda</option>
          <option value="BL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="BL"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Barthélemy</option>
          <option value="SH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SH"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Helena, Ascension and Tristan da Cunha</option>
          <option value="KN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="KN"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Kitts and Nevis</option>
          <option value="LC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LC"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Lucia</option>
          <option value="MF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="MF"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Martin (French part)</option>
          <option value="PM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="PM"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Pierre and Miquelon</option>
          <option value="VC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VC"){echo "selected='selected'";};}?>>&nbsp&nbsp Saint Vincent and the Grenadines</option>
          <option value="WS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="WS"){echo "selected='selected'";};}?>>&nbsp&nbsp Samoa</option>
          <option value="SM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SM"){echo "selected='selected'";};}?>>&nbsp&nbsp San Marino</option>
          <option value="ST" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ST"){echo "selected='selected'";};}?>>&nbsp&nbsp Sao Tome and Principe</option>
          <option value="SA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SA"){echo "selected='selected'";};}?>>&nbsp&nbsp Saudi Arabia</option>
          <option value="SN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SN"){echo "selected='selected'";};}?>>&nbsp&nbsp Senegal</option>
          <option value="RS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="RS"){echo "selected='selected'";};}?>>&nbsp&nbsp Serbia</option>
          <option value="SC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SC"){echo "selected='selected'";};}?>>&nbsp&nbsp Seychelles</option>
          <option value="SL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SL"){echo "selected='selected'";};}?>>&nbsp&nbsp Sierra Leone</option>
          <option value="SG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SG"){echo "selected='selected'";};}?>>&nbsp&nbsp Singapore</option>
          <option value="SX" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SX"){echo "selected='selected'";};}?>>&nbsp&nbsp Sint Maarten (Dutch part)</option>
          <option value="SK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SK"){echo "selected='selected'";};}?>>&nbsp&nbsp Slovakia</option>
          <option value="SI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SI"){echo "selected='selected'";};}?>>&nbsp&nbsp Slovenia</option>
          <option value="SB" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SB"){echo "selected='selected'";};}?>>&nbsp&nbsp Solomon Islands</option>
          <option value="SO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SO"){echo "selected='selected'";};}?>>&nbsp&nbsp Somalia</option>
          <option value="ZA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ZA"){echo "selected='selected'";};}?>>&nbsp&nbsp South Africa</option>
          <option value="GS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GS"){echo "selected='selected'";};}?>>&nbsp&nbsp South Georgia and the South Sandwich Islands</option>
          <option value="SS" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SS"){echo "selected='selected'";};}?>>&nbsp&nbsp South Sudan</option>
          <option value="ES" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ES"){echo "selected='selected'";};}?>>&nbsp&nbsp Spain</option>
          <option value="LK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="LK"){echo "selected='selected'";};}?>>&nbsp&nbsp Sri Lanka</option>
          <option value="SD" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SD"){echo "selected='selected'";};}?>>&nbsp&nbsp Sudan</option>
          <option value="SR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SR"){echo "selected='selected'";};}?>>&nbsp&nbsp Suriname</option>
          <option value="SJ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SJ"){echo "selected='selected'";};}?>>&nbsp&nbsp Svalbard and Jan Mayen</option>
          <option value="SZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Swaziland</option>
          <option value="SE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SE"){echo "selected='selected'";};}?>>&nbsp&nbsp Sweden</option>
          <option value="CH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="CH"){echo "selected='selected'";};}?>>&nbsp&nbsp Switzerland</option>
          <option value="SY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="SY"){echo "selected='selected'";};}?>>&nbsp&nbsp Syrian Arab Republic</option>
          <option value="TW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TW"){echo "selected='selected'";};}?>>&nbsp&nbsp Taiwan, Province of China</option>
          <option value="TJ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TJ"){echo "selected='selected'";};}?>>&nbsp&nbsp Tajikistan</option>
          <option value="TZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Tanzania, United Republic of</option>
          <option value="TH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TH"){echo "selected='selected'";};}?>>&nbsp&nbsp Thailand</option>
          <option value="TL" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TL"){echo "selected='selected'";};}?>>&nbsp&nbsp Timor-Leste</option>
          <option value="TG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TG"){echo "selected='selected'";};}?>>&nbsp&nbsp Togo</option>
          <option value="TK" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TK"){echo "selected='selected'";};}?>>&nbsp&nbsp Tokelau</option>
          <option value="TO" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TO"){echo "selected='selected'";};}?>>&nbsp&nbsp Tonga</option>
          <option value="TT" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TT"){echo "selected='selected'";};}?>>&nbsp&nbsp Trinidad and Tobago</option>
          <option value="TN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TN"){echo "selected='selected'";};}?>>&nbsp&nbsp Tunisia</option>
          <option value="TR" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TR"){echo "selected='selected'";};}?>>&nbsp&nbsp Turkey</option>
          <option value="TM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TM"){echo "selected='selected'";};}?>>&nbsp&nbsp Turkmenistan</option>
          <option value="TC" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TC"){echo "selected='selected'";};}?>>&nbsp&nbsp Turks and Caicos Islands</option>
          <option value="TV" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="TV"){echo "selected='selected'";};}?>>&nbsp&nbsp Tuvalu</option>
          <option value="UG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="UG"){echo "selected='selected'";};}?>>&nbsp&nbsp Uganda</option>
          <option value="UA" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="UA"){echo "selected='selected'";};}?>>&nbsp&nbsp Ukraine</option>
          <option value="AE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="AE"){echo "selected='selected'";};}?>>&nbsp&nbsp United Arab Emirates</option>
          <option value="GB" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="GB"){echo "selected='selected'";};}?>>&nbsp&nbsp United Kingdom</option>
          <option value="US" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="US"){echo "selected='selected'";};}?>>&nbsp&nbsp United States</option>
          <option value="UM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="UM"){echo "selected='selected'";};}?>>&nbsp&nbsp United States Minor Outlying Islands</option>
          <option value="UY" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="UY"){echo "selected='selected'";};}?>>&nbsp&nbsp Uruguay</option>
          <option value="UZ" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="UZ"){echo "selected='selected'";};}?>>&nbsp&nbsp Uzbekistan</option>
          <option value="VU" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VU"){echo "selected='selected'";};}?>>&nbsp&nbsp Vanuatu</option>
          <option value="VE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VE"){echo "selected='selected'";};}?>>&nbsp&nbsp Venezuela, Bolivarian Republic of</option>
          <option value="VN" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VN"){echo "selected='selected'";};}?>>&nbsp&nbsp Viet Nam</option>
          <option value="VG" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VG"){echo "selected='selected'";};}?>>&nbsp&nbsp Virgin Islands, British</option>
          <option value="VI" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="VI"){echo "selected='selected'";};}?>>&nbsp&nbsp Virgin Islands, U.S.</option>
          <option value="WF" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="WF"){echo "selected='selected'";};}?>>&nbsp&nbsp Wallis and Futuna</option>
          <option value="EH" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="EH"){echo "selected='selected'";};}?>>&nbsp&nbsp Western Sahara</option>
          <option value="YE" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="YE"){echo "selected='selected'";};}?>>&nbsp&nbsp Yemen</option>
          <option value="ZM" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ZM"){echo "selected='selected'";};}?>>&nbsp&nbsp Zambia</option>
          <option value="ZW" <?php if(isset($_SESSION['country'])){if($_SESSION['country']=="ZW"){echo "selected='selected'";};}?>>&nbsp&nbsp Zimbabwe</option>
        </select>
        <div id="country-info">
          <div>
            <p>District</p>
            <select name="district">
              <option value="aveiro">&nbsp&nbsp Aveiro</option>
              <option value="beja">&nbsp&nbsp Beja</option>
              <option value="braga">&nbsp&nbsp Braga</option>
              <option value="braganca">&nbsp&nbsp Bragança</option>
              <option value="castelo branco">&nbsp&nbsp Castelo Branco</option>
              <option value="coimbra">&nbsp&nbsp Coimbra</option>
              <option value="evora">&nbsp&nbsp Évora</option>
              <option value="faro">&nbsp&nbsp Faro</option>
              <option value="guarda">&nbsp&nbsp Guarda</option>
              <option value="ilha da madeira">&nbsp&nbsp Ilha da Madeira</option>
              <option value="ilha das flores">&nbsp&nbsp Ilha das Flores</option>
              <option value="ilha porto santo">&nbsp&nbsp Ilha de Porto Santo</option>
              <option value="ilha santa maria">&nbsp&nbsp Ilha de Santa Maria</option>
              <option value="ilha sao jorge">&nbsp&nbsp Ilha de São Jorge</option>
              <option value="ilha sao miguel">&nbsp&nbsp Ilha de São Miguel</option>
              <option value="ilha do corvo">&nbsp&nbsp Ilha do Corvo</option>
              <option value="ilha do faial">&nbsp&nbsp Ilha do Faial</option>
              <option value="ilha do pico">&nbsp&nbsp Ilha do Pico</option>
              <option value="ilha graciosa">&nbsp&nbsp Ilha Graciosa</option>
              <option value="ilha terceira">&nbsp&nbsp Ilha Terceira</option>
              <option value="leiria">&nbsp&nbsp Leiria</option>
              <option value="lisboa" selected="selected">&nbsp&nbsp Lisboa</option>
              <option value="portalegre">&nbsp&nbsp Portalegre</option>
              <option value="porto">&nbsp&nbsp Porto</option>
              <option value="santarem">&nbsp&nbsp Santarém</option>
              <option value="setubal">&nbsp&nbsp Setúbal</option>
              <option value="viana do castelo">&nbsp&nbsp Viana do Castelo</option>
              <option value="vila real">&nbsp&nbsp Vila Real</option>
              <option value="viseu">&nbsp&nbsp Viseu</option>
            </select> 
          </div>
          <div>
            <p>County</p>
            <input type="text" name="county">

          </div>
        </div>
      </form>
      <p id="bottom-info" class="dropdown <?php if ($_SESSION['errorMessage'] != "Your personal information is private and safe") echo 'wrong-input';?> ">
        <?php
          if(isset($_SESSION['errorMessage'])){
            echo $_SESSION['errorMessage'];
            $_SESSION['errorMessage'] = "Your personal information is private and safe";
          }
        ?>
      </p>
      <div>
        <a href='redirectToStep1.php'>
          <span class="back-bt" id="back-to-1">BACK</span>
        </a>
        <span class="dark-bt" id="go-to-3">NEXT</span>
      </div>
    </section>
  </div>

  <script src="js/main.js"></script>
  <script src="js/three.js"></script>
  <script src="js/drawRegister2.js"></script>
</body>
</html>
