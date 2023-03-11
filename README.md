# eZamowienia
Twoje eZamówienia na stronie WWW

Plik dodajemy do swojego serwera php
Edytujemy wartość: 

$json=file_get_contents("https://ezamowienia.gov.pl/mp-readmodels/api/Search/SearchTenders?organizationName=Szpital&OrganizationCity=Sandomierz&SortingColumnName=InitiationDate&SortingDirection=DESC&PublicationDateTo=2022-02-31T23:59:59&PageNumber=1&PageSize=20");

Wpisując swoje organizationName oraz OrganizationCity 

Można podmienić logo i favicon podmieniając wartości w:

--<-link rel="icon" type="image/ico" href="/images/favicon.ico"/ >
  
--<-img src="https://sand.pl/images/logo_21.png" alt="Szpital w Sandomierzu" class="responsive"/>

Działające rozwiązanie można podejrzeć na: https://sand.pl/ezamowienia.php 

Zapraszam do korzystania ;)
Pozdrawiam
Robert
