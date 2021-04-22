dbwebb publishpure game

# Struktur
[x] Din källkod placerar du i src/.

[x] Dina vyer placerar du i view/.

[x] I den mån du använder konfigurationsfiler så placerar du dem under config/.

Det finns ingen anledning att lägga till “webbsidor” direkt i htdocs/, allt hanteras via din frontcontroller.

[x] Om du lägger till andra paket med composer så måste de finnas med i din composer.json.

[x] Du behöver ha en Makefile som stödjer make install och make test på det viset som den bifogade Makefilen gör.

[ ] Lägg till en README.md till ditt repo och skriv något representativt i den. I slutändan bör den innehålla dokumentationen av ditt repo.

[ ] Du skall skapa och använda ett eget namespace för din kod samt uppdatera så att ditt __namespace fungerar i composers autoloader__.

# Klasser
Under ditt eget namespace, skapa följande efter bästa förmåga.

[x] Skapa en klass Dice.

[x] Man skall kunna slå/kasta/rulla tärningen.
[x] Man skall kunna hämta senaste slaget.
[x] Det skall vara konfigurerbart hur många sidor tärningen har.
[x] Skapa en klass GraphicalDice.

Den kan göra allt som Dice kan plus att den även kan ha en grafisk representation som visar upp en tärning.
Denna tärning skall ha 6 sidor.
Skapa en klass DiceHand som kan innehålla ett antal tärningar.

[x] Man kan konfigurera objektet hur många tärningar det skall innehålla.
[x] Man kan rulla alla tärningar på en gång.
[x] Man kan hämta värdena på de rullade tärningarna.

# Spel
[x]  Använd ovan klasser för att skapa en webbsida där man kan spela 21 mot datorn.

[x] Man skall kunna välja om man vill spela med en eller två tärningar.

[x] Man kastar tärningarna och får ett resultat. Därefter kan man kasta igen för att få mer poäng. Man skall komma så närma 21 som möjligt.

[x] När spelaren är nöjd så kan den “stanna”.

[x] Om spelaren får 21 skall du notera ett stort “Grattis!”.

[x] Om spelaren får över 21 så har den förlorat.

[x] Därefter är det datorns tur. För att göra det enkelt kan du låta datorn slå tills den vunnit eller tills den får över 21. Datorn vinner vid lika.

[x] När datorn slagit sina slag så visar du vem som vann denna rundan.

[x] Spara undan ställningen i antal rundor, vem som vunnit, spelaren eller datorn. 

[x] __Det skall finnas en möjlighet att nollställa poängställningen__.

[x] Se till att man nåt ditt spel via en länk “Game 21” i navbaren för din webbsida.

[???] Som ren överkurs kan du välja att implementera att du kan satsa “bitcoins” i varje spelrunda. Spelaren kan börja med 10 bitcoins och man kan satsa max 50% av sina bitcoins per spel. Banken (datorn) kan ha 100 bitcoins när du börjar. Klarar du av att vinna alla pengarna från banken?

# Publicera
[ ] När du är klar, kör make test för att köra alla testerna mot ditt repo. När man kör make test så bör det passera utan allvarliga felmeddelanden.

[ ] Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en dbwebb publishpure me och testköra den.

[ ] Committa alla filer till ditt repo och lägg till en ny tagg (1.0.*). Öka versionnumret om du lägger till ändringar (1.0.1, 1.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 1.0.0 och > 2.0.0.

[ ] Pusha upp repot till GitHub/GitLab, inklusive taggarna.

---------

[x] 1. Välkomstsida, visa ett formulär där man kan välja en eller två tärningar.
[x] 2. posta formuläret, initiera spelet med alla tärningar.
[x] 3. Redirect till spelsidan. Visa summan (börjar med 0)
[x] 4. Slå en tärningshand, via ett formulär, posta till en route som utför själva slaget och sparar resultatet i sessionen. Du kan spara hela tärningshanden i sessionen om du vill.
[x] 5. Redirect till spelsidan, visa tärningarna och totalsumman.
[x] 6. Repetera.
[x]7. Lägg till koll om man har över 21 (förlorat).
[x]8. Gör en möjlighet "Stanna", knapp som postar till callback som "löser datorns spel lite automatiskt".
[x]9. Redirect till slutsidan där ditt resultat visas, datorns resultat visas och du kan se vem som vann (eller skriv kod som berättar vem som vann omgången)



funktionen same: kollar om värdet finns och om det är samma som x



// function prettyDump($anyArray) {
//     foreach ($anyArray as $key => $value) {
//         if (is_array($value)) {
//             prettyDump($value);
//         } 
//         echo '<br>';
//         echo $key . ': ' . $value;
//     }
// }