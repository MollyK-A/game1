# Struktur
[ ] Din källkod placerar du i src/.

[ ] Dina vyer placerar du i view/.

[ ] I den mån du använder konfigurationsfiler så placerar du dem under config/.

Det finns ingen anledning att lägga till “webbsidor” direkt i htdocs/, allt hanteras via din frontcontroller.

[ ] Om du lägger till andra paket med composer så måste de finnas med i din composer.json.

[ ] Du behöver ha en Makefile som stödjer make install och make test på det viset som den bifogade Makefilen gör.

[ ] Lägg till en README.md till ditt repo och skriv något representativt i den. I slutändan bör den innehålla dokumentationen av ditt repo.

[ ] Du skall skapa och använda ett eget namespace för din kod samt uppdatera så att ditt namespace fungerar i composers autoloader.

# Klasser
Under ditt eget namespace, skapa följande efter bästa förmåga.

[ ] Skapa en klass Dice.

[ ] Man skall kunna slå/kasta/rulla tärningen.
[ ] Man skall kunna hämta senaste slaget.
[ ] Det skall vara konfigurerbart hur många sidor tärningen har.
[ ] Skapa en klass GraphicalDice.

Den kan göra allt som Dice kan plus att den även kan ha en grafisk representation som visar upp en tärning.
Denna tärning skall ha 6 sidor.
Skapa en klass DiceHand som kan innehålla ett antal tärningar.

[ ] Man kan konfigurera objektet hur många tärningar det skall innehålla.
[ ] Man kan rulla alla tärningar på en gång.
[ ] Man kan hämta värdena på de rullade tärningarna.

# Spel
[ ]  Använd ovan klasser för att skapa en webbsida där man kan spela 21 mot datorn.

[ ] Man skall kunna välja om man vill spela med en eller två tärningar.

[ ] Man kastar tärningarna och får ett resultat. Därefter kan man kasta igen för att få mer poäng. Man skall komma så närma 21 som möjligt.

[ ] När spelaren är nöjd så kan den “stanna”.

[ ] Om spelaren får 21 skall du notera ett stort “Grattis!”.

[ ] Om spelaren får över 21 så har den förlorat.

[ ] Därefter är det datorns tur. För att göra det enkelt kan du låta datorn slå tills den vunnit eller tills den får över 21. Datorn vinner vid lika.

[ ] När datorn slagit sina slag så visar du vem som vann denna rundan.

[ ] Spara undan ställningen i antal rundor, vem som vunnit, spelaren eller datorn. Det skall finnas en möjlighet att nollställa poängställningen.

[ ] Se till att man nåt ditt spel via en länk “Game 21” i navbaren för din webbsida.

[???] Som ren överkurs kan du välja att implementera att du kan satsa “bitcoins” i varje spelrunda. Spelaren kan börja med 10 bitcoins och man kan satsa max 50% av sina bitcoins per spel. Banken (datorn) kan ha 100 bitcoins när du börjar. Klarar du av att vinna alla pengarna från banken?

Publicera
[ ] När du är klar, kör make test för att köra alla testerna mot ditt repo. När man kör make test så bör det passera utan allvarliga felmeddelanden.

[ ] Dubbelkolla att webbplatsen fungerar på studentservern genom att göra en dbwebb publishpure me och testköra den.

[ ] Committa alla filer till ditt repo och lägg till en ny tagg (1.0.*). Öka versionnumret om du lägger till ändringar (1.0.1, 1.0.2 och så vidare). Rättaren kommer normalt sett att använda din senaste tagg som är >= 1.0.0 och > 2.0.0.

[ ] Pusha upp repot till GitHub/GitLab, inklusive taggarna.