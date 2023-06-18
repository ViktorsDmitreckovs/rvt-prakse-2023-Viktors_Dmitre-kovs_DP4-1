# Viesnīcas apkopēja uzskaites un darbu slodzes sarakstu izveidošanas sistēma
## Viktors Dmitrēckovs DP4-1
### Saite, kur var apskatīt projektu: http://vdviesnica.id.lv/
### Projekta apraksts
Kvalifikācijas darba uzdevums ir izveidot apkopēja uzskaites un darba slodzes sarakstu izveidošanas sistēmu viesnīcām. Ar tās palīdzību viesnīcas vadītāji var izveidot sarakstu un ievadīt informāciju par darbinieka nostrādāto stundas skaitu. Šī sistēma palīdzēs risināt viesnīcas vadītāju problēmu – papīra izmantošana darbinieka slodzes sarakstu izveidošanai. Galvenais iemesls tam ir tas, ka viesnīcā nav šim uzdevumam paredzētas sistēmas vai sistēma ir grūti saprotama un lietojama. Lai izlabotu problēmas, vajadzētu izveidot intuitīvi saprotamu sistēmu, kas neprasa no vadītāja daudz darbības. Tiešsaistes saraksts atvieglo vadītāja darbu, kas saistīta ar darbinieka sadalījumu viesnīca. Saraksts arī palīdzes ātri atrast darbinieku, kas ir brīvs konkrētā datuma.

Viesnīcas apkopēja uzskaites un darba slodzes sarakstu izveidošanas sistēmai ir jāizpilda vairākas funkcionalitātes:
*	tīmekļa lietojumprogrammas datu – darbinieki, vadītāji, viesnīcas, dzīvokļi un saraksti – pievienošana, rediģēšana, apstrāde un dzēšana;
*	sarakstu vizualizēšana atkarība no ievadītiem datiem;
*	darbinieku pievienošana pie saraksta;
*	iespēja darbiniekam un vadītājam apskatīt sarakstu;
*	iespēja vadītājam apskatīt informāciju par darbinieku;
*	darbinieku, vadītāju reģistrācija un autorizācija.

### Izmantotās tehnoloģijas
Laragon, MySQL 5.7.33 (2021.gada versija), MySQL Server 5.7., Visual Studio Code 1.73.1 (2022.gada versija), Javascript, PHP, HTML, CSS.
Izmantotas apmācības:
* https://www.geeksforgeeks.org/create-a-drop-down-list-that-options-fetched-from-a-mysql-database-in-php/
* https://youtu.be/wah7LavylBM
* https://www.w3schools.com/php/default.asp
* https://www.w3schools.com/js/default.asp
* https://code.visualstudio.com/learn
* https://www.heidisql.com/

### Uzstādīšanas instrukcijas
Sistēmai ir divu veidu palaišana. Pirmā no tām ir lietotāja puses palaišana. Lietotāja puses palaišana nav nekas vairāk par vienkāršu ieiešanu lapā ar pārlūkprogrammas starpniecību. Viss, kas lietotājam ir jāizdara – jāievada pārlūkprogrammā lapas saite un ar to arī sistēmas palaišana beidzas – lietotājs var brīvi aplūkot lapu. Otrais palaišanas veids ir administratora pusē. Šis palaišanas veids aktivizē pašu sistēmas darbību un sagatavo lapu publikai, līdz ar to atļaujot lietotājam to izmantot un brīvi aplūkot. Sistēmas sagatavošana publikai, tās konfigurēšana un uzstādīšana noris sekojoši.
*	Sākuma jāsāk ar to, ka visi sistēmas faili jāuzliek uz Laragon. Visvieglākais veids, ka to izdarīt, tas ir, Laragon programmatūru, spiest uz “Root”. Mapē, kas atveras procesā, jāvieto sistēmas faili. Cita gadījumā, jūs varat sākuma atvērt mapi “laragon” un pēc tam jāienāk uz mapi “www”.
*	Jāpārliecinās, ka ir aizvietots mapes “www” index.php fails ar failu no sistēmas mapē.
*	Kad iepriekšminētās darbības ir uztaisītā, jāatver “HeidiSQL”. To var izdarīt spiežot ar labo peles pogu uz “Database”. Jāizvēlas “MySQL” > “HeidiSQL” opciju. Atveriet jebkuru sesiju un tajā izveidojiet jaunu datubāzi. Pēc tam, tajā datubāze jāimportē .sql fails, lai izveidotu visas nepieciešamas datubāzes tabulas. 
*	Jāpārliecinās, ka sistēmas failos $user, $password, $database un $servername vērtības ir uzstādīti pareizi. Vairākos gadījumos $servername ir localhost un citas vērtības var pārbaudīt “Laragon” programmatūrā, atverot tajā “HeidiSQL”, kur $user ir lietotājs, $password ir parole un $database ir datubāze, kuru jūs izveidojat.

