# Viesnīcas apkopēja uzskaites un darbu slodzes sarakstu izveidošanas sistēma
## Viktors Dmitrēckovs DP4-1
### Links, kur var apskatīt projektu: http://vdviesnica.id.lv/
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
Laragon, MySQ 5.7.33 (2021.gada versija), MySQL Server 5.7., Visual Studio Code 1.73.1 (2022.gada versija), Javascript, PHP, HTML, CSS.
Izmantotas apmācības:
* https://www.geeksforgeeks.org/create-a-drop-down-list-that-options-fetched-from-a-mysql-database-in-php/
* https://youtu.be/wah7LavylBM
* https://www.w3schools.com/php/default.asp
* https://www.w3schools.com/js/default.asp
* https://code.visualstudio.com/learn
* https://www.heidisql.com/

### Uzstādīšanas instrukcijas
Sistēmai ir divu veidu palaišana. Pirmā no tām ir lietotāja puses palaišana. Lietotāja puses palaišana nav nekas vairāk par vienkāršu ieiešanu lapā ar pārlūkprogrammas starpniecību. Viss, kas lietotājam ir jāizdara – jāievada pārlūkprogrammā lapas saite un ar to arī sistēmas palaišana beidzas – lietotājs var brīvi aplūkot lapu. Otrais palaišanas veids ir administratora pusē. Šis palaišanas veids aktivizē pašu sistēmas darbību un sagatavo lapu publikai, līdz ar to atļaujot lietotājam to izmantot un brīvi aplūkot. Sistēmas sagatavošana publikai, tās konfigurēšana un uzstādīšana noris sekojoši.

1. Sākuma jāpielādē projektu no https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1 .
2. Jāinstalē Laragon
* Atveriet saiti laragon.org. <br />
![Attēls1](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/1cfc8f1c-3de4-452d-a5b9-489d3b8106e2)

* Spiediet uz “Download”. <br />
![Attēls2](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/391cc493-f614-4b26-8abd-924acc646570)

*	Lejupielādējat pilno versiju “Laragon Full”. <br />
![Attēls3](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/c8f34d46-1775-4ac8-9fe1-9501f03f5966)
 
*	Atveriet failu, kuru jūs lejupielādējiet, un izvelēties mapi, kura Jūs gribat saglabāt programmu. <br />
![Attēls4](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/9a124f95-e811-479f-92d2-3ff36ff9d10a)
 
*	Tālāk mēs izvēlējamies obligāti 2. un 3. opciju, 1. opciju pēc Jūsu skata. <br />
![Attēls5](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/5239e31a-f396-44ae-a088-01cd9acaaca0)
 
*	Pēc tam spiežam uz “Install”. Sagaidām kamēr instalējas programma un beigas izvēlējamies opciju “Run Laragon” un spiežam uz “Finish”. <br />
![Attēls6](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/3374525a-9b56-4b55-af2c-e481c76cb544)

3. Lejupielādējot Laragon, pieslēdziet to. Tas automātiski notiks, ja Jūs izvēlējāties ”Run Laragon” opciju programmas instalācijā. Laragon parāda sākumekrānu, kur Jums jāspiež uz pogu “Start”. Maz pagaidiet un beigas ekrāna būs tāda ziņa. <br />
![Attēls7](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/fae9d113-4743-4b59-9cec-7512f9a34a06) 
 
4. Ja paradās tāda ziņa, klikšķiniet uz “Database” ar labo peles pogu. Izvelēties MySQL un klikšķiniet uz apakš opciju “HeidiSQL”. <br />
![Attēls8](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/3e83b4a5-dd23-4fba-82e4-821ef1932e90)

5. Jums paradās “Session manger”, kur Jūs veidosiet savu datubāzi. Vispirms izvēlējāties jebkuru eksistējošo sesiju vai izveidojiet jaunu un spiediet uz pogu “Open”. <br />
![Attēls9](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/407f5956-96f6-40bd-b9a3-f787ead49077)

6. Pēc tam Jums jāizveido jaunu datubāzi. Jaunajā loga Jūs redzēsiet sesiju ar datubāzēm. Klikšķiniet ar labo peles pogu uz sesiju. Izvēlēties “Create new” un spiežat uz apakšopciju “Database”. Jāievada datubāzes nosaukumu “viesnica_dp41”. <br />
![Attēls10](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/5ab7270c-faac-4b10-9727-76e9b977a26c)
 
7. Klikšķiniet vienu reizi ar kreiso peles pogu uz jauno izveidoto datubāzi. Pēc tam klikšķiniet uz opciju “File”, kas atrodas augšēja joslā. Izvēlēties opciju “Run SQL file…”. <br />
![Attēls11](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/a7d61552-bec2-47c3-a7e6-eb748a2d8959)

8. Izvelēties .sql failu, kas atrodas mapē “viesnicas_dp41”. <br />
![Attēls12](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/bda1e32e-a6ac-427d-9b15-4394dcce0d2b) 

9. Maz jāpagaida, lai pievienotu tabulas Jūsu datubāze. Kad viss pabeidzas izvelēties datubāzi un spiežat uz pogu “Refresh” vai klaviatūra “F5”. Pārbaudiet vai datubāze tiek pievienoti tabulas. <br />
![Attēls13](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/4a2d475d-0d4a-4c13-85e6-02bb26e0b9ab)

10.	Rezultāta datubāze jābūt 7 tabulas. <br />
![Attēls14](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/6412a2d6-d781-4cef-9f05-f697b9ee8c62)
 
11.	Tagad mums jāpievieno failu ar projektu uz Laragon.
*	Ieiet uz laragon programmatūru sākumlapu un spiediet uz pogu “Root”. <br />
![Attēls15](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/95117bf7-a62e-4be7-b161-b8a3736054c0)

 
*	Ievietojiet “viesnica_dp41” mapi uz jaunu mapi, kas paradās pēc “Root” spiešana. <br />
![Attēls16](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/a25eb719-115b-4d9d-bd7c-0e6db21c15de) 

*	Klikšķiniet uz failu index.php ar kreiso pogu, izvēlēties opciju, ar kuru palīdzību Jūs varat mainīt faila saturu (piem. “Edit with Notepad++”). <br />
![Attēls17](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/185091ee-2e8e-4fef-b249-2d3816b6c2c1) 

*	Jānomaina faila tekstu uz to, kas ir redzams attēla. <br />
![Attēls18](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/f15c5e31-ed93-47fd-90e0-4762751954a2)

12. Atgriezties pie Root mapē, kas radās Laragon programmatūras sākumā, pēc tam klikšķiniet uz mapi ar projektu kas ir redzams attēlā. Failiem jānomaina vērtības, kas atbilde par pieslēgšanu pie datubāze. Teksts redzams attēlā. <br />
![Attēls19](https://github.com/ViktorsDmitreckovs/rvt-prakse-2023-Viktors_Dmitreckovs_DP4-1/assets/70627510/bfcdf209-5096-4cd8-83be-2835339fdf4a) 

* “User” un “password” Jūs varat pārbaudīt attēlā, kas ir  5.punktā.
13. Beigas jārestartē(jānomaina vārdu) programmu un tagad Jūs varat aplūkot savu projektu.


