<html lang="en">
<head>
  <title>Postępowania Szpital w Sandomierzu</title>
  <link rel="icon" type="image/ico" href="/images/favicon.ico"/ >
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
.responsive {
  max-width: 100%;
  height: auto;
}
</style>
</head>
<body>

<img src="https://sand.pl/images/logo_21.png" alt="Szpital w Sandomierzu" class="responsive"/>

<?php
$json=file_get_contents("https://ezamowienia.gov.pl/mp-readmodels/api/Search/SearchTenders?organizationName=Szpital&OrganizationCity=Sandomierz&SortingColumnName=InitiationDate&SortingDirection=DESC&PublicationDateTo=2022-02-31T23:59:59&PageNumber=1&PageSize=20");
$data =  json_decode($json);

//print_r($data);


echo "<div ><table class='table table-striped table-hover'>";
        echo "<thead><tr>";
      
            echo "<th><B>NAZWA ZAMÓWIENIA</B></th>";
//			echo "<th><B>IDENTYFIKATOR POSTĘPOWANIA</B></th>";
			echo "<th><B>ZAMAWIAJĄCY</B></th>";
			echo "<th><B>NUMER BZP/TED</B></th>";
			echo "<th ><B>TERMIN SKŁADANIA</B></th>";
			echo "<th><B>DATA WSZCZĘCIA POSTĘPOWANIA</B></th>";
			echo "<th><B></B></th>";
			
        
        echo "</tr></thead>";
		echo "<tbody>"; 
        foreach($data as $row){
          echo "<tr>";          


	echo "<td> $row->title </td>";		
//    echo "<td> $row->objectId </td>";
	echo "<td> $row->organizationName </td>";	
	echo "<td> $row->bzpNumber $row->tedContractNoticeNumber </td>";
	echo "<td> ";
		$dzien = date('d', strtotime($row->submissionOffersDate));
		$dzien_tyg = date('l', strtotime($row->submissionOffersDate));
		$miesiac = date('n', strtotime($row->submissionOffersDate));
		$rok = date('Y', strtotime($row->submissionOffersDate));
		$godzina = date('H:i', strtotime($row->submissionOffersDate));
		$miesiac_pl = array(1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');
		$dzien_tyg_pl = array('Monday' => 'poniedziałek', 'Tuesday' => 'wtorek', 'Wednesday' => 'środa', 'Thursday' => 'czwartek', 'Friday' => 'piątek', 'Saturday' => 'sobota', 'Sunday' => 'niedziela');
		echo $dzien." ".$miesiac_pl[$miesiac]." ".$rok."r., godz. ".$godzina;
	//echo date('Y-m-d H:i', strtotime($row->submissionOffersDate)+ 60*60);
	echo "</td>";
	echo "<td> ";
		$dzien2 = date('d', strtotime($row->initiationDate));
		$dzien_tyg2 = date('l', strtotime($row->initiationDate));
		$miesiac2 = date('n', strtotime($row->initiationDate));
		$rok2 = date('Y', strtotime($row->initiationDate));
		$godzina2 = date('H:i', strtotime($row->initiationDate));
		$miesiac_pl2 = array(1 => 'stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia');
		$dzien_tyg_pl2 = array('Monday' => 'poniedziałek', 'Tuesday' => 'wtorek', 'Wednesday' => 'środa', 'Thursday' => 'czwartek', 'Friday' => 'piątek', 'Saturday' => 'sobota', 'Sunday' => 'niedziela');
		echo $dzien2." ".$miesiac_pl2[$miesiac2]." ".$rok2."r., godz. ".$godzina2;

	//echo date('Y-m-d H:i', strtotime($row->initiationDate));
	echo "</td>";

	echo "<td> <a href='https://ezamowienia.gov.pl/mp-client/search/list/$row->objectId'>Szczegóły</a></td>";
	
	
	
     //       foreach($row as $col){
       //         echo "<td> $col </td>";
     //       }
            echo "</tr>";
        }
        echo "</tbody></table></div>";

        return $posicoes;
?>

</body>
</html>